<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MusicXmlController extends Controller
{
    public function upload()
    {
        return view('musicxml.upload');
    }
    public function analyze(Request $request)
{
    $request->validate([
        'musicxml' => 'required|file|mimes:xml,musicxml',
    ]);

    $file = $request->file('musicxml');

    $filename = time() . '_' . $file->getClientOriginalName();
    $file->storeAs('public/musicxml', $filename);

    $xml = simplexml_load_file($file->getPathname());

    $title = (string) $xml->work->{'work-title'} ?? 'Unknown';
    $key = null;
    $tempo = null;
    $noteCount = 0;

    foreach ($xml->part->measure as $measure) {
        if (!$key && isset($measure->attributes->key->fifths)) {
            $key = (string) $measure->attributes->key->fifths;
        }

        if (!$tempo && isset($measure->direction->sound['tempo'])) {
            $tempo = (float) $measure->direction->sound['tempo'];
        }

        foreach ($measure->note as $note) {
            if (!isset($note->rest)) {
                $noteCount++;
            }
        }
    }

    return view('musicxml.result', compact('title', 'key', 'tempo', 'noteCount', 'filename'));
}
}
