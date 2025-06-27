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
        .melody-box {
            background: white;
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            padding: 1.5rem;
            margin-bottom: 2rem;
        }
        .score {
            font-size: 1.5rem;
            font-weight: 700;
            color: #e83e8c;
        }
        .notes {
            font-family: monospace;
            font-size: 1.25rem;
            letter-spacing: 0.1rem;
            margin-top: 0.5rem;
            user-select: text;
            white-space: pre-wrap;
            word-wrap: break-word;
        }
        h1, h2 {
            color: #d63384;
        }
    </style>
</x-layout>
