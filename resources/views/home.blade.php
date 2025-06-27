<x-layout>
    @auth
    <div class="container mt-5">
        <h1 class="display-4 text-center mb-4">🎶 Welcome to AlgoMuse</h1>
        <p class="lead text-center text-muted mb-5">
            Explore algorithmic composition with MusicXML tools and random melody generation.
        </p>

        <div class="row mb-5 text-center">
            <div class="col-md-6 mb-3">
                <h4>📂 Analyze MusicXML</h4>
                <p>Upload a MusicXML file to extract title, key, tempo, and more — automatically.</p>
                <a href="{{ route('musicxml.upload') }}" class="btn btn-girly">Upload & Analyze</a>
            </div>
            <div class="col-md-6 mb-3">
                <h4>🎲 Generate Melody</h4>
                <p>Generate a unique melody using algorithmic logic or Markov chains, and save or share it.</p>
                <a href="{{ route('melody.generate') }}" class="btn btn-girly">Generate Melody</a>
            </div>
        </div>

        <form action="{{ route('melody.compare') }}" method="POST" onsubmit="return validateSelection()" class="melody-list-form">
            @csrf
            <h3 class="mb-3 text-center text-white">Select Exactly 2 Melodies to Compare</h3>

            <div class="melody-list">
                @foreach ($melodies as $melody)
                <label class="melody-item" for="melody_{{ $melody->id }}">
                    <input type="checkbox" name="ids[]" value="{{ $melody->id }}" id="melody_{{ $melody->id }}">
                    <div class="melody-info">
                        <strong>{{ $melody->title }}</strong> 
                        <span class="text-muted">({{ $melody->created_at->format('M j, Y') }})</span>
                        <div class="notes-preview">{{ Str::limit($melody->notes, 40, '...') }}</div>
                    </div>
                </label>
                @endforeach
            </div>

            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary" id="compare-btn" disabled>Compare Selected Melodies</button>
            </div>
        </form>
    </div>

    <style>
        body {
            background: linear-gradient(135deg, #0f0f0f, #1c1c1c);
            color: #e0e0e0;
            font-family: 'Inter', sans-serif;
            min-height: 100vh;
        }
    
        h1.display-4 {
            color: #1db954;
            font-weight: 700;
        }
    
        .lead {
            color: #aaa;
        }
    
        .container {
            max-width: 800px;
            background: rgba(28, 28, 28, 0.95);
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.7);
        }
    
        .row > .col-md-6 {
            background: #121212;
            border-radius: 0.75rem;
            padding: 1.5rem;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.4);
            transition: transform 0.2s ease;
        }
    
        .row > .col-md-6:hover {
            transform: translateY(-4px);
        }
    
        .row h4 {
            color: #1db954;
            margin-bottom: 0.5rem;
        }
    
        .btn-girly {
            background-color: #1db954;
            color: #fff;
            border-radius: 0.5rem;
            font-weight: 600;
            padding: 0.5rem 1.2rem;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            border: none;
        }
    
        .btn-girly:hover {
            background-color: #17a94a;
            box-shadow: 0 0 10px #1db954aa;
            color: #fff;
        }
    
        .melody-list {
            max-height: 350px;
            overflow-y: auto;
            background: rgba(40, 40, 40, 0.85);
            border-radius: 0.5rem;
            padding: 1rem;
            box-shadow: inset 0 0 15px rgba(0, 0, 0, 0.5);
        }
    
        .melody-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 10px;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background-color 0.2s ease;
            background-color: #181818;
            border: 1px solid #2a2a2a;
            margin-bottom: 0.5rem;
        }
    
        .melody-item:hover {
            background-color: #1f1f1f;
        }
    
        .melody-item input[type="checkbox"] {
            width: 20px;
            height: 20px;
            cursor: pointer;
            accent-color: #1db954;
        }
    
        .melody-info {
            flex-grow: 1;
            font-size: 1rem;
            line-height: 1.3;
        }
    
        .notes-preview {
            font-family: monospace;
            font-size: 0.85rem;
            color: #ccc;
            margin-top: 3px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    
        #compare-btn {
            background-color: #1db954;
            border: none;
            color: white;
            padding: 0.6rem 1.5rem;
            font-size: 1.1rem;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
    
        #compare-btn:hover:enabled {
            background-color: #17a94a;
            box-shadow: 0 0 10px #1db954aa;
        }
    
        #compare-btn:disabled {
            background-color: rgba(29, 185, 84, 0.4);
            cursor: not-allowed;
        }
    </style>
    

    <script>
        function validateSelection() {
            const checked = document.querySelectorAll('input[name="ids[]"]:checked');
            if (checked.length !== 2) {
                alert('Please select exactly 2 melodies to compare.');
                return false;
            }
            return true;
        }

        function updateCompareButton() {
            const checkedCount = document.querySelectorAll('input[name="ids[]"]:checked').length;
            document.getElementById('compare-btn').disabled = (checkedCount !== 2);
        }

        document.querySelectorAll('input[name="ids[]"]').forEach(checkbox => {
            checkbox.addEventListener('change', updateCompareButton);
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', updateCompareButton);
    </script>

    @endauth
</x-layout>
