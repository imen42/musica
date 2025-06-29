<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Melody;

class MozartDiceController extends Controller
{
    public function generate()
    {
        // Example table: measures with options
        $table = [
            1 => ['C', 'D', 'E'],
            2 => ['F', 'G', 'A'],
            3 => ['B', 'C', 'D'],
            4 => ['E', 'F', 'G'],
            5 => ['A', 'B', 'C'],
            6 => ['D', 'E', 'F'],
            7 => ['G', 'A', 'B'],
            8 => ['C', 'D', 'E']
        ];

        $selectedNotes = [];

        foreach ($table as $measure => $options) {
            $dice = rand(1, 6) + rand(1, 6);
            $index = $dice % count($options);
            $selected = $options[$index];
            $selectedNotes[] = $selected;
        }

        $melodyString = implode(' ', $selectedNotes);

        $melody = new Melody();
        $melody->user_id = Auth::id();
        $melody->title = 'Mozart Dice Game - ' . now()->format('Y-m-d H:i:s');
        $melody->notes = $melodyString;
        $melody->save();

        return view('musicxml.melody', ['melody' => $melody]);
    }
}
