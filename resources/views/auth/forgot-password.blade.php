<x-layout>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card p-4 shadow-lg" style="border-radius: 1rem; width: 100%; max-width: 500px;">
        <h2 class="text-center mb-4" style="color: #e83e8c;">Forgot Your Password?</h2>

        @if (session('status'))
            <div class="alert alert-success text-center">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" required autofocus>
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-girly">Send Reset Link</button>
            </div>
        </form>
    </div>
</div>
</x-layout>
