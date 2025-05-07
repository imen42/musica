<x-layout>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card p-4 shadow" style="max-width: 400px; width: 100%; background-color: #fff0f5; border-radius: 1rem;">
            <h2 class="text-center mb-4" style="color: #d63384;">Welcome Back 💕</h2>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label" style="color: #c71585;">Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        required 
                        style="border-radius: 0.75rem;"
                    >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label" style="color: #c71585;">Password</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password" 
                        name="password" 
                        required 
                        style="border-radius: 0.75rem;"
                    >
                </div>
                <div class="mt-3 text-end">
                    <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: #e83e8c;">
                        Forgot your password?
                    </a>
                </div>
                
                <div class="d-grid mt-4">
                    <button 
                        type="submit" 
                        class="btn btn-primary" 
                        style="background-color: #ff69b4; border: none; border-radius: 0.75rem;">
                        💗 Login
                    </button>
                </div>
            </form>

            <p class="mt-4 text-center" style="color: #c71585;">
                Don't have an account? <a href="{{ route('Register.page') }}" style="color: #ff1493;">Sign up</a>
            </p>
        </div>
    </div>
</x-layout>
