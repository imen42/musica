<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow rounded mb-4">
                    <div class="card-body">
                        <h1 class="mb-4">{{ $paste->title ?? 'Untitled' }}</h1>

                        <p>{{ $paste->content }}</p>

                        @if ($paste->attachment_path)
                            <div class="my-3">
                                <a href="{{ Storage::url($paste->attachment_path) }}" class="btn btn-girly" download>
                                    Download Attachment
                                </a>
                            </div>
                        @endif

                        @if ($paste->expires_at && now()->greaterThan($paste->expires_at))
                            <div class="alert alert-warning mt-4">
                                This paste has expired.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="card shadow-sm rounded mb-4">
                    <div class="card-body">
                        <h4 class="btn btn-girly">Comments</h4>

                        @forelse ($paste->comments as $comment)
                            <div class="mb-3 p-3 border rounded">
                                <strong>{{ $comment->user->name }}</strong>
                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                                <p class="mb-0 mt-2">{{ $comment->content }}</p>
                            </div>
                        @empty
                            <p class="text-muted">No comments yet.</p>
                        @endforelse
                    </div>
                </div>

                @auth
                    <div class="card shadow-sm rounded">
                        <div class="card-body">
                            <form action="{{ route('pastes.comment', $paste) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="content" class="form-label">Add a Comment</label>
                                    <textarea name="content" id="content" rows="3" class="form-control" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-girly">Post Comment</button>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="text-center text-muted mt-4">
                        <p>You must <a href="{{ route('Login.page') }}">log in</a> to comment.</p>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</x-layout>
