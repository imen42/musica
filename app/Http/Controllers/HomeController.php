<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Melody;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    public function index()
    {
        $melodies = Melody::where('user_id', Auth::id())->get();

        // Pass melodies to the view
        return view('home', compact('melodies'));    }
}
