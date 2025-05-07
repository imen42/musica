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
        Session::put("anon_note_{$hash}", $encrypted);

        return redirect()->route('notes.anonymous.show', $hash);
    }

    public function show($hash)
    {
        if (!Session::has("anon_note_{$hash}")) {
            abort(404);
        }

        $note = Crypt::decryptString(Session::get("anon_note_{$hash}"));
        return view('notes.anonymous.show', compact('note'));
    }
}
