<x-layout>
    <div class="container">
        <h1>{{ $melody->title }}</h1>
        <p><strong>Notes:</strong> {{ $melody->notes }}</p>

        <a href="{{ route('melody.generate') }}" class="btn btn-primary">Generate Another Melody</a>
    </div>
</x-layout>
