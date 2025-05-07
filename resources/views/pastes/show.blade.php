<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <h1 class="mb-4">{{ $paste->title ?? 'Untitled' }}</h1>

                        <p>{{ $paste->content }}</p>

                        @if ($paste->attachment_path)
                            <div class="my-3">
                                <a href="{{ Storage::url($paste->attachment_path) }}" class="btn btn-primary" download>Download Attachment</a>
                            </div>
                        @endif

                        @if ($paste->expires_at && now()->greaterThan($paste->expires_at))
                            <div class="alert alert-warning mt-4">
                                This paste has expired.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
