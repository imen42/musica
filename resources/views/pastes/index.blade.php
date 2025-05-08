<x-layout>
    <div class="container my-5">
        <form method="GET" action="{{ route('pastes.index') }}" class="row g-3 align-items-end mb-4">
            <div class="col-md-4">
                <label for="search" class="form-label">Search</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Title, content, or tags" value="{{ request('search') }}">
            </div>
        
            <div class="col-md-3">
                <label for="created_at" class="form-label">Created At</label>
                <input type="date" name="created_at" id="created_at" class="form-control" value="{{ request('created_at') }}">
            </div>
        
            <div class="col-md-3">
                <label for="expires_at" class="form-label">Expires At</label>
                <input type="date" name="expires_at" id="expires_at" class="form-control" value="{{ request('expires_at') }}">
            </div>
        
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </form>
        
        
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
