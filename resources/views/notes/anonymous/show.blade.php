<x-layout>
    <div class="container mt-5">
        <h2>Your Anonymous Note</h2>

        <div class="card p-3 bg-light">
            <pre>{{ $note }}</pre>
            <div class="mt-4">
                <p>Your note has been created. You can share it with others using the link below:</p>
                <p>
                    <a href="{{ $link }}" target="_blank">{{ $link }}</a>
                </p>
            </div>
        </div>
    </div>
</x-layout>
