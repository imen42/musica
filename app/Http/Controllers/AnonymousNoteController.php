<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class AnonymousNoteController extends Controller
{
    public function create()
    {
        return view('notes.anonymous.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'note' => 'required|string|max:10000',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $encrypted = Crypt::encryptString($request->note);
        $hash = bin2hex(random_bytes(8));
        Session::put("anon_note_{$hash}", [
            'note' => $encrypted,
            'created_at' => now(), 
        ]);
        return redirect()->route('notes.anonymous.show', $hash);
    }

    public function show($hash)
    {
        if (!Session::has("anon_note_{$hash}")) {
            abort(404);
        }
    
        $noteData = Session::get("anon_note_{$hash}");
    
        if (now()->diffInMinutes($noteData['created_at']) > 30) {
            abort(404);
        }

        $note = Crypt::decryptString($noteData['note']);
        $link = route('notes.anonymous.show', $hash);

    
        return view('notes.anonymous.show', compact('note', 'link'));
    }
}
