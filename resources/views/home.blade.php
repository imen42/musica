<x-layout>
    @auth
    <div class="container mt-5">
        <h1 class="mb-4 text-center">🎶🎶🎶🎶🎶 Welcome to MusicForLife</h1>
       

        <div class="row mb-5 text-center">
            <div class="col-md-6 action-box">
                <h4>Build a Scale</h4>

            <a href="{{ route('scale.builder.form') }}" class=" btn-girly">🎼 Build a Scale</a>
        </div>

            <div class="col-md-6 action-box">
                <h4>📂 Analyze MusicXML</h4>
                <a href="{{ route('musicxml.upload') }}" class="btn-girly">Upload & Analyze</a>
            </div>
            <div class="col-md-6 action-box">
                <h4>🎲 Generate Melody</h4>
                <a href="{{ route('mozart.dice') }}" class=" btn-girly">🎲 Generate Mozart Dice Minuet</a>

                <a href="{{ route('melody.generate') }}" class="btn-girly">Generate Melody</a>
            </div>
        </div>

        <form action="{{ route('melody.compare') }}" method="POST" onsubmit="return validateDropdowns()">
            @csrf
            <h3 class="mb-3 text-center">Select 2 Melodies to Compare</h3>
        
            <div class="mb-3">
                <label for="melody1" class="form-label"></label>
                <select name="ids[]" id="melody1" class="form-select mb-3" required>
                    <option value="">-- Select First Melody --</option>
                    @foreach ($melodies as $melody)
                        <option value="{{ $melody->id }}">
                            {{ $melody->title }} ({{ $melody->created_at->format('M j, Y') }})
                        </option>
                    @endforeach
                </select>
        
                <label for="melody2" class="form-label"> </label>
                <select name="ids[]" id="melody2" class="form-select" required>
                    <option value="">-- Select Second Melody --</option>
                    @foreach ($melodies as $melody)
                        <option value="{{ $melody->id }}">
                            {{ $melody->title }} ({{ $melody->created_at->format('M j, Y') }})
                        </option>
                    @endforeach
                </select>
            </div>
        
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-girly">Compare Selected Melodies</button>
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

        h1, h3, h4 {
            color: #1db954;
            font-weight: 700;
            text-align: center;
            text-shadow: 0 0 8px #1db954bb;
        }

        .lead {
            color: #aaa;
            font-weight: 400;
            max-width: 600px;
            margin: 0 auto 3rem auto;
            text-align: center;
        }

        .container {
            max-width: 800px;
            background: rgba(28, 28, 28, 0.95);
            padding: 2.5rem;
            border-radius: 1rem;
            box-shadow:
                6px 6px 12px rgba(0, 0, 0, 0.7),
                -6px -6px 12px rgba(40, 40, 40, 0.9);
        }

        /* Action Boxes */
        .row > .action-box {
            background: #181818;
            border-radius: 1rem;
            padding: 2rem 1.5rem;
            margin-bottom: 2rem;
            box-shadow:
                6px 6px 12px rgba(0,0,0,0.7),
                -6px -6px 12px rgba(40,40,40,0.9);
            transition: box-shadow 0.3s ease, transform 0.2s ease;
        }

        .row > .action-box:hover {
            box-shadow:
                8px 8px 16px rgba(0,0,0,0.9),
                -8px -8px 16px rgba(40,40,40,1),
                0 0 12px #1db954aa;
            transform: translateY(-4px);
        }

        .row h4 {
            margin-bottom: 1rem;
        }

        /* Buttons */
        .btn-girly {
            background-color: #1db954;
            color: #fff;
            border-radius: 0.75rem;
            font-weight: 600;
            padding: 0.6rem 1.5rem;
            border: none;
            cursor: pointer;
            box-shadow: 0 0 12px #1db954cc;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            display: inline-block;
            text-align: center;
            user-select: none;
            text-decoration: none;
        }

        .btn-girly:hover {
            background-color: #17a94a;
            box-shadow: 0 0 18px #17a94aaa;
            color: #d0f5cc;
        }

        .btn-girly:active {
            background-color: #148230;
            box-shadow: inset 0 0 10px #0e601f;
        }

        /* Melody List */
        .melody-list {
            max-height: 350px;
            overflow-y: auto;
            background: rgba(40, 40, 40, 0.85);
            border-radius: 1rem;
            padding: 1rem;
            box-shadow: inset 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .melody-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 1rem 1.25rem;
            border-radius: 1rem;
            cursor: pointer;
            background-color: #181818;
            border: 1px solid #2a2a2a;
            margin-bottom: 1rem;
            box-shadow:
                3px 3px 6px rgba(0,0,0,0.6),
                -3px -3px 6px rgba(40,40,40,0.8);
            transition: background-color 0.2s ease, box-shadow 0.2s ease;
        }

        .melody-item:hover {
            background-color: #1f1f1f;
            box-shadow:
                4px 4px 10px rgba(0,0,0,0.9),
                -4px -4px 10px rgba(40,40,40,1),
                0 0 10px #1db954bb;
        }

        .melody-item input[type="checkbox"] {
            width: 22px;
            height: 22px;
            cursor: pointer;
            accent-color: #1db954;
            border-radius: 4px;
        }

        .melody-info {
            flex-grow: 1;
            font-size: 1rem;
            line-height: 1.3;
            color: #ccc;
        }

        .melody-info strong {
            color: #1db954;
            font-weight: 700;
            text-shadow: 0 0 6px #1db954bb;
        }

        .melody-info .text-muted {
            color: #666;
            font-weight: 400;
            margin-left: 8px;
        }

        .notes-preview {
            font-family: monospace;
            font-size: 0.9rem;
            color: #bbb;
            margin-top: 0.25rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* Compare Button */
        #compare-btn {
            background-color: #1db954;
            border: none;
            color: white;
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
            border-radius: 0.75rem;
            cursor: pointer;
            box-shadow: 0 0 12px #1db954cc;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            user-select: none;
        }

        #compare-btn:hover:enabled {
            background-color: #17a94a;
            box-shadow: 0 0 18px #17a94aaa;
            color: #d0f5cc;
        }

        #compare-btn:disabled {
            background-color: rgba(29, 185, 84, 0.4);
            cursor: not-allowed;
            box-shadow: none;
        }
        .form-select {
    background-color: #181818;
    color: #e0e0e0;
    border: 1px solid #2a2a2a;
    border-radius: 0.5rem;
    padding: 0.5rem 1rem;
}

.form-select:focus {
    border-color: #1db954;
    box-shadow: 0 0 0 0.2rem rgba(29, 185, 84, 0.25);
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

    </style>

    <script>
       
    function validateDropdowns() {
        const id1 = document.getElementById('melody1').value;
        const id2 = document.getElementById('melody2').value;

        if (!id1 || !id2) {
            alert('Please select both melodies.');
            return false;
        }

        if (id1 === id2) {
            alert('Please select two different melodies.');
            return false;
        }

        return true;
    }



        function updateCompareButton() {
            const checked = document.querySelectorAll('input[name="ids[]"]:checked').length;
            document.getElementById('compare-btn').disabled = (checked !== 2);
        }

        document.querySelectorAll('input[name="ids[]"]').forEach(el => {
            el.addEventListener('change', updateCompareButton);
        });

        // Initialize button state on load
        updateCompareButton();
    </script>

    @endauth
</x-layout>
