<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Services\MarkovMelodyGenerator;
use Illuminate\Support\Facades\Storage;
use App\Services\MelodySimilarity;

use App\Models\Melody;

use Illuminate\Http\Request;

class MelodyGeneratorController extends Controller
{
    public function generateMelody(MarkovMelodyGenerator $generator)
    {
        $melody = $generator->generate(16, 'C'); 
        $melodyString = implode(' ', $melody);
    
        $melodyModel = new Melody();
        $melodyModel->user_id = Auth::id();
        $melodyModel->title = 'Markov Melody ' . now()->format('Y-m-d H:i:s');
        $melodyModel->notes = $melodyString;
        $melodyModel->save();
    
        return view('musicxml.melody', ['melody' => $melodyModel]);
    }
    
public function exportToMusicXML($id)
{
    $melody = Melody::findOrFail($id);
    $notes = explode(' ', $melody->notes);

    $xml = '<?xml version="1.0" encoding="UTF-8"?>
    <!DOCTYPE score-partwise PUBLIC "-//Recordare//DTD MusicXML 3.1 Partwise//EN"
    "http://www.musicxml.org/dtds/partwise.dtd">
    <score-partwise version="3.1">
      <part-list>
        <score-part id="P1">
          <part-name>Melody</part-name>
        </score-part>
      </part-list>
      <part id="P1">
        <measure number="1">';

    foreach ($notes as $i => $note) {
        if ($i > 0 && $i % 4 === 0) {
            $xml .= '</measure><measure number="' . (($i / 4) + 1) . '">';
        }

        $xml .= '
        <note>
          <pitch>
            <step>' . strtoupper($note) . '</step>
            <octave>4</octave>
          </pitch>
          <duration>1</duration>
          <type>quarter</type>
        </note>';
    }

    $xml .= '</measure>
      </part>
    </score-partwise>';

    $filename = 'melody_' . $melody->id . '.musicxml';
    Storage::disk('public')->put('musicxml/' . $filename, $xml);

    return response()->download(storage_path('app/public/musicxml/' . $filename));
}
public function compareMelodies(Request $request, MelodySimilarity $similarityService)
{
    $id1 = $request->input('melody1_id');
    $id2 = $request->input('melody2_id');

    $melody1 = Melody::findOrFail($id1);
    $melody2 = Melody::findOrFail($id2);

    $score = $similarityService->similarityScore($melody1->notes, $melody2->notes);

    return view('melody.compare', [
        'melody1' => $melody1,
        'melody2' => $melody2,
        'score' => $score
    ]);
}
public function compareMelodiesFromRequest(Request $request)
{
    $ids = $request->input('ids');

    if (!is_array($ids) || count($ids) !== 2) {
        return redirect()->back()->with('error', 'Please select exactly 2 melodies to compare.');
    }

    // Debug output to check IDs received
    \Log::info('Comparing melodies', ['ids' => $ids]);

    try {
        $melody1 = Melody::findOrFail($ids[0]);
        $melody2 = Melody::findOrFail($ids[1]);
    } catch (\Exception $e) {
        \Log::error('Melody not found', ['error' => $e->getMessage()]);
        return redirect()->back()->with('error', 'One or both melodies not found.');
    }

    $notes1 = explode(' ', $melody1->notes);
    $notes2 = explode(' ', $melody2->notes);

    $matches = 0;
    $length = min(count($notes1), count($notes2));

    for ($i = 0; $i < $length; $i++) {
        if ($notes1[$i] === $notes2[$i]) {
            $matches++;
        }
    }

    $score = $length > 0 ? $matches / $length : 0;

    return view('melody.compare', compact('melody1', 'melody2', 'score'));
}


}
