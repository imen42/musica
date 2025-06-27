<x-layout>
    <div class="container mt-5">
        <h1>Generated Melody</h1>
    
        <div class="card p-3">
            <h4>{{ $melody->title }}</h4>
            <p><strong>Notes:</strong><br>{{ $melody->notes }}</p>
            <p><small>Created at: {{ $melody->created_at->format('F j, Y, g:i a') }}</small></p>
        </div>
    </div>
    
    <button onclick="playMelody()" class="btn btn-girly">▶️ Play Melody</button>
    <a href="{{ route('melody.export', $melody->id) }}" class="btn btn-girly" >
        Download as MusicXML
    </a>
    <script src="https://unpkg.com/tone/build/Tone.js"></script>
    <script>
        function playMelody() {
            const synth = new Tone.Synth().toDestination();
            const notes = "{{ $melody->notes }}".split(' ');
            let now = Tone.now();
            notes.forEach((note, index) => {
                synth.triggerAttackRelease(note + "4", "8n", now + index * 0.5);
            });
        }
    </script>
    
    
    </x-layout>
   