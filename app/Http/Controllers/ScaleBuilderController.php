<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScaleBuilderController extends Controller
{
    private $allNotes = ['C', 'C#', 'D', 'D#', 'E', 'F', 'F#', 'G', 'G#', 'A', 'A#', 'B'];

    private $scales = [
        'major' => [2, 2, 1, 2, 2, 2, 1],
        'minor' => [2, 1, 2, 2, 1, 2, 2],
        'pentatonic' => [2, 2, 3, 2, 3],
        'harmonic minor' => [2, 1, 2, 2, 1, 3, 1],
    ];

    public function showForm()
    {
        return view('scale-builder.form', ['allNotes' => $this->allNotes, 'scaleTypes' => array_keys($this->scales)]);
    }

    public function generateScale(Request $request)
    {
        $request->validate([
            'root' => 'required|string',
            'scale_type' => 'required|string'
        ]);

        $root = strtoupper($request->input('root'));
        $scaleType = $request->input('scale_type');

        if (!in_array($root, $this->allNotes) || !isset($this->scales[$scaleType])) {
            return back()->withErrors(['Invalid input']);
        }

        $intervals = $this->scales[$scaleType];
        $scale = [$root];

        $index = array_search($root, $this->allNotes);

        foreach ($intervals as $step) {
            $index = ($index + $step) % count($this->allNotes);
            $scale[] = $this->allNotes[$index];
        }

        return view('scale-builder.result', [
            'root' => $root,
            'scaleType' => ucfirst($scaleType),
            'notes' => $scale,
            'allNotes' => $this->allNotes,
            'scaleTypes' => array_keys($this->scales),  
        ]);
        
        
    }
}
