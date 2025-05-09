<x-layout>
    <div class="container mt-5">
        <h2 class="mb-4">Your Anonymous Note</h2>

        <div class="card p-3 bg-light">
            <pre class="mb-0">{{ $note }}</pre>
        </div>

        <div class="mt-4">
            <p>🔗 Share this note with others using this link:</p>
            <input type="text" class="form-control" readonly value="{{ $link }}">
        </div>
    </div>
</x-layout>
