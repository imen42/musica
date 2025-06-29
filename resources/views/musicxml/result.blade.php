<x-layout>
    <div class="container mt-5" style="max-width: 700px; margin: auto;">
      <div class="modern-card p-4">
        <h1 class="mb-4">MusicXML Analysis Result</h1>
  
        <ul class="list-group mb-4 modern-list">
          <li class="list-group-item"><strong>Title:</strong> {{ $title }}</li>
          <li class="list-group-item"><strong>Key Signature (Fifths):</strong> {{ $key }}</li>
          <li class="list-group-item"><strong>Tempo:</strong> {{ $tempo }}</li>
          <li class="list-group-item"><strong>Number of Notes:</strong> {{ $noteCount }}</li>
        </ul>
  
        <div id="osmdContainer" style="border-radius: 15px; box-shadow:
              6px 6px 12px #161622,
              -6px -6px 12px #29293f;
              background: #1e1e2f;
              padding: 20px;
              overflow-x: auto;
              min-height: 300px;">
          <!-- OpenSheetMusicDisplay will render here -->
        </div>
      </div>
    </div>
  
    <script src="https://unpkg.com/opensheetmusicdisplay/build/opensheetmusicdisplay.min.js"></script>
    <script>
      const osmd = new opensheetmusicdisplay.OpenSheetMusicDisplay("osmdContainer");
      fetch("{{ asset('storage/musicxml/' . $filename) }}")
        .then(response => response.text())
        .then(xml => {
          osmd.load(xml).then(() => osmd.render());
        });
    </script>
  
    <style>
      /* Reuse container font and card style */
      .container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: #f0f0f5;
      }
  
      .modern-card {
        background: #1e1e2f;
        border-radius: 15px;
        box-shadow:
          6px 6px 12px #161622,
          -6px -6px 12px #29293f;
        transition: box-shadow 0.3s ease;
        user-select: none;
      }
  
      .modern-card:hover {
        box-shadow:
          10px 10px 20px #14141a,
          -10px -10px 20px #313147;
      }
  
      .modern-list .list-group-item {
  background: #252538;
  margin-bottom: 10px;
  border-radius: 10px;
  padding: 15px 20px;
  border: none;
  font-size: 1rem;
  box-shadow:
    3px 3px 6px #1a1a2a,
    -3px -3px 6px #2d2d46;
  transition: background 0.3s ease;
  color: #00ffff; /* cyan color */
}

.modern-list .list-group-item strong {
  color: #00bcd4; /* label in slightly darker cyan */
}

.modern-list .list-group-item:hover {
  background: #2e2e4a;
}

      /* OSMD container scrollbar for overflow */
      #osmdContainer::-webkit-scrollbar {
        height: 8px;
      }
  
      #osmdContainer::-webkit-scrollbar-thumb {
        background: #555;
        border-radius: 4px;
      }
    </style>
  </x-layout>
  