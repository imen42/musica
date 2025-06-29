<x-layout>
    <div class="container mt-5" style="max-width: 600px; margin: auto;">
      <div class="modern-card p-4">
        <h1 class="mb-4">Generated Melody</h1>
  
        <div class="melody-info mb-4">
          <h4>{{ $melody->title }}</h4>
          <p><strong>Notes:</strong><br>{{ $melody->notes }}</p>
          <p><small>Created at: {{ $melody->created_at->format('F j, Y, g:i a') }}</small></p>
        </div>
  
        <div class="button-group">
          <button onclick="playMelody()" class="btn-modern">▶️ Play Melody</button>
          <a href="{{ route('melody.export', $melody->id) }}" class="btn-modern" target="_blank" rel="noopener">
            Download as MusicXML
          </a>
        </div>
      </div>
    </div>
  
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
  
    <style>
      /* Container */
      .container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      }
  
      /* Modern Card with subtle 3D shadow */
      .modern-card {
        background: #1e1e2f;
        border-radius: 15px;
        box-shadow:
          6px 6px 12px #161622,
          -6px -6px 12px #29293f;
        color: #f0f0f5;
        transition: box-shadow 0.3s ease;
        user-select: none;
      }
  
      .modern-card:hover {
        box-shadow:
          10px 10px 20px #14141a,
          -10px -10px 20px #313147;
      }
  
      /* Melody info text styling */
      .melody-info h4 {
        margin-bottom: 0.5rem;
        color: #89cff0;
        font-weight: 600;
      }
  
      .melody-info p {
        line-height: 1.4;
        font-size: 0.95rem;
        color: #d4d4e1;
      }
  
      /* Buttons container */
      .button-group {
        display: flex;
        gap: 15px;
        justify-content: flex-start;
        flex-wrap: wrap;
      }
  
      /* Modern buttons */
      .btn-modern {
        background: linear-gradient(145deg, #2a2a3d, #1a1a2a);
        border: none;
        border-radius: 12px;
        box-shadow:
          4px 4px 8px #171724,
          -4px -4px 8px #32324b;
        color: #e0e0ff;
        padding: 12px 24px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.25s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        user-select: none;
      }
  
      .btn-modern:hover {
        box-shadow:
          inset 4px 4px 8px #171724,
          inset -4px -4px 8px #32324b;
        background: linear-gradient(145deg, #1a1a2a, #2a2a3d);
        color: #a8cfff;
      }
  
      .btn-modern:active {
        box-shadow:
          inset 2px 2px 4px #171724,
          inset -2px -2px 4px #32324b;
        background: linear-gradient(145deg, #161622, #252537);
      }
    </style>
  </x-layout>
  