<x-layout>
    <div class="container" style="max-width: 480px; margin: 60px auto;">
      <div class="modern-card p-4">
        <h1 class="mb-4" style="color: #89cff0;">Upload MusicXML</h1>
        <form action="{{ route('musicxml.analyze') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input 
            type="file" 
            name="musicxml" 
            class="form-control modern-input my-3" 
            accept=".xml,.musicxml" 
            required
          >
          <button type="submit" class="btn-modern">Analyze</button>
        </form>
      </div>
    </div>
  
    <style>
      .container {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
  
      /* Modern input */
      .modern-input {
        background: #252538;
        border: none;
        border-radius: 12px;
        padding: 10px 15px;
        color: #d4d4e1;
        font-size: 1rem;
        box-shadow:
          inset 4px 4px 8px #1a1a2a,
          inset -4px -4px 8px #32324b;
        transition: background 0.3s ease, box-shadow 0.3s ease;
        width: 100%;
        cursor: pointer;
      }
  
      .modern-input:hover,
      .modern-input:focus {
        background: #2e2e4a;
        outline: none;
        box-shadow:
          inset 6px 6px 12px #14141a,
          inset -6px -6px 12px #41415f;
      }
  
      /* Reuse modern button */
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
        user-select: none;
        display: inline-block;
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
  