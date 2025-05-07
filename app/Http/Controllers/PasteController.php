<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paste;
use Illuminate\Support\Facades\Storage; 

class PasteController extends Controller
{
    public function create()
    {
        return view('pastes.create'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'title' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'visibility' => 'required|in:public,private,unlisted',
            'password' => 'nullable|string|min:6', 
            'expires_at' => 'nullable|date|after:now', 
            'attachment' => 'nullable|file', 
        ]);
    
        $filePath = null;
        if ($request->hasFile('attachment')) {
            $filePath = $request->file('attachment')->store('attachments');
        }
    
        $paste = Paste::create([
            'user_id' => auth()->id(), 
            'content' => $request->content,
            'title' => $request->title,
            'tags' => $request->tags,
            'visibility' => $request->visibility,
            'password' => bcrypt($request->password), 
            'expires_at' => $request->expires_at,
            'attachment_path' => $filePath,
        ]);
    
        return redirect()->route('pastes.index')->with('success', 'Paste created successfully!');
    }

    public function index()
    {
        $pastes = Paste::where('user_id', auth()->id())
                       ->latest()
                       ->get();
    
        return view('pastes.index', compact('pastes'));
    }
    public function show(Paste $paste)
{
    return view('pastes.show', compact('paste'));
}
}
