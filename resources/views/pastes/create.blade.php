<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow rounded">
                    <div class="card-body">
                        <h1 class="mb-4 text-center">Create a New Paste</h1>

                        <form action="{{ route('pastes.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                            </div>

                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5">{{ old('content') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="tags" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="tags" name="tags" value="{{ old('tags') }}">
                            </div>

                            <div class="mb-3">
                                <label for="visibility" class="form-label">Visibility</label>
                                <select class="form-select" id="visibility" name="visibility">
                                    <option value="public" {{ old('visibility') == 'public' ? 'selected' : '' }}>Public</option>
                                    <option value="private" {{ old('visibility') == 'private' ? 'selected' : '' }}>Private</option>
                                    <option value="unlisted" {{ old('visibility') == 'unlisted' ? 'selected' : '' }}>Unlisted</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Password (Optional)</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <div class="mb-3">
                                <label for="expires_at" class="form-label">Expiration Date (Optional)</label>
                                <input type="datetime-local" class="form-control" id="expires_at" name="expires_at" value="{{ old('expires_at') }}">
                            </div>

                            <div class="mb-3">
                                <label for="attachment" class="form-label">Attachment (Optional)</label>
                                <input type="file" class="form-control" id="attachment" name="attachment">
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Create Paste</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
