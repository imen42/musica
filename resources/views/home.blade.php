<x-layout>
    <div class="container mt-5 text-center">
        <h1 class="display-4 mb-4">Welcome to Mbizzica Paste</h1>
        <p class="lead text-muted">A fast, clean, and secure way to share code snippets, notes, or quick messages.</p>

        <div class="row mt-5">
            <div class="col-md-4">
                <h4>🔓 Anonymous Notes</h4>
                <p>No account? No problem. Create self-destructing notes in seconds.</p>
                <a href="{{ route('notes.anonymous.create') }}" class="btn btn-outline-success">Try it now</a>
            </div>

            <div class="col-md-4">
                <h4>🛡️ Protected Pastes</h4>
                <p>Protect your notes with a password, expiration, and privacy settings.</p>
                <a href="{{ route('pastes.create') }}" class="btn btn-outline-primary">Create a Paste</a>
            </div>

            <div class="col-md-4">
                <h4>📄 Easy Sharing</h4>
                <p>Get a link and share instantly. No hassle, no clutter.</p>
                @auth
                    <a href="{{ route('pastes.index') }}" class="btn btn-outline-secondary">View My Pastes</a>
                @else
                    <a href="{{ route('Login.page') }}" class="btn btn-outline-secondary">Login</a>
                @endauth
            </div>
        </div>
    </div>
</x-layout>
