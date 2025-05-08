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

    public function index(Request $request)
{
    $query = Paste::query()
        ->where('visibility', 'public')
        ->where(function ($q) {
            $q->whereNull('expires_at')
              ->orWhere('expires_at', '>', now());
        });

    if ($request->filled('search')) {
        $search = $request->input('search');

        $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('content', 'like', "%{$search}%")
              ->orWhere('tags', 'like', "%{$search}%");
        });
    }

    if ($request->filled('created_at')) {
        $query->whereDate('created_at', $request->input('created_at'));
    }

    if ($request->filled('expires_at')) {
        $query->whereDate('expires_at', $request->input('expires_at'));
    }

    $pastes = $query->latest()->paginate(10);

    return view('pastes.index', compact('pastes'));
}
    
    public function show(Paste $paste)
{
    $user = auth()->user();

    if ($paste->visibility === 'private' && (!$user || $user->id !== $paste->user_id)) {
        abort(403, 'Unauthorized access to private paste.');
    }

    if ($paste->password && !session("paste_access_{$paste->id}")) {
        return view('pastes.password', compact('paste'));
    }
    return view('pastes.show', compact('paste'));
}
}
