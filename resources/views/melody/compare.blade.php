<x-layout>
    <div class="container py-4">
        <h1 class="mb-4 text-center">Melody Similarity Comparison</h1>

        <div class="row">
            <div class="col-md-5 melody-box">
                <h2>{{ $melody1->title }}</h2>
                <p><strong>Created at:</strong> {{ $melody1->created_at->format('F j, Y, g:i a') }}</p>
                <p><strong>Notes:</strong></p>
                <div class="notes">{{ $melody1->notes }}</div>
            </div>

            <div class="col-md-2 d-flex flex-column justify-content-center align-items-center">
                <p class="score mb-0">Similarity Score</p>
                <p class="score">{{ number_format($score * 100, 2) }}%</p>
            </div>

            <div class="col-md-5 melody-box">
                <h2>{{ $melody2->title }}</h2>
                <p><strong>Created at:</strong> {{ $melody2->created_at->format('F j, Y, g:i a') }}</p>
                <p><strong>Notes:</strong></p>
                <div class="notes">{{ $melody2->notes }}</div>
            </div>
        </div>

        <div class="text-center mt-4">
            <a href="{{ url()->previous() }}" class="btn btn-girly">Back</a>
        </div>
    </div>

    <style>
        body {
            background: linear-gradient(135deg, #0f0f0f, #1c1c1c);
            color: #e0e0e0;
            font-family: 'Inter', sans-serif;
        }
    
        h1, h2 {
            color: #1db954;
            font-weight: 700;
        }
    
        .container {
            max-width: 1000px;
            background: rgba(28, 28, 28, 0.95);
            padding: 2rem;
            border-radius: 1rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.7);
        }
    
        .melody-box {
            background: #181818;
            border-radius: 0.75rem;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.4);
            padding: 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid #2a2a2a;
            transition: transform 0.2s ease;
        }
    
        .melody-box:hover {
            transform: translateY(-3px);
        }
    
        .score {
            font-size: 2rem;
            font-weight: 800;
            color: #1db954;
            text-align: center;
            margin: 0.5rem 0;
        }
    
        .notes {
            background: rgba(40, 40, 40, 0.85);
            border-radius: 0.5rem;
            padding: 1rem;
            font-family: monospace;
            font-size: 1.1rem;
            letter-spacing: 0.08rem;
            margin-top: 0.5rem;
            white-space: pre-wrap;
            word-wrap: break-word;
            color: #ccc;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.5);
        }
    
        .btn-girly {
            background-color: #1db954;
            color: #fff;
            border-radius: 0.5rem;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            border: none;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
    
        .btn-girly:hover {
            background-color: #17a94a;
            box-shadow: 0 0 10px #1db954aa;
            color: #fff;
        }
    
        .text-center.mt-4 {
            margin-top: 3rem !important;
        }
    </style>
    
</x-layout>
