<x-layout>
    <div class="container mt-5">
        <h1>Generated Scale</h1>
        <p><strong>Root Note:</strong> {{ $root }}</p>
        <p><strong>Scale Type:</strong> {{ $scaleType }}</p>
        <p><strong>Notes:</strong> {{ implode(', ', $notes) }}</p>
        <a href="{{ route('scale.builder.form') }}" class="btn btn-primary mt-3">Build Another Scale</a>
    </div>
</x-layout>
