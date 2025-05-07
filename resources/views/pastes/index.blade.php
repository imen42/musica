<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <h1 class="mb-4 text-center">All Pastes</h1>

                        <ul class="list-group">
                            @foreach ($pastes as $paste)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h5 class="mb-1">{{ $paste->title ?? 'Untitled' }}</h5>
                                        <p class="mb-1">{{ Str::limit($paste->content, 100) }}</p>
                                    </div>
                                    <a href="{{ route('pastes.show', $paste->id) }}" class="btn btn-outline-info">View</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
