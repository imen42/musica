<x-layout>
    <div class="container mt-5 d-flex justify-content-center" style="background: linear-gradient(135deg, #0f0f0f, #1c1c1c); min-height: 100vh;">
        <div class="card p-4 shadow" style="
            max-width: 400px;
            width: 100%;
            background-color: #181818;
            border-radius: 1rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.7);
            color: #e0e0e0;
        ">
            <h2 class="text-center mb-4" style="color: #1db954; font-weight: 700;">Welcome Back 🎵</h2>

            @if (session('error'))
                <div class="alert alert-danger" style="
                    background-color: #8b0000;
                    color: #fff;
                    border-radius: 0.5rem;
                    border: none;
                    padding: 0.75rem 1rem;
                    margin-bottom: 1rem;
                ">
                    {{ session('error') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label" style="color: #ccc; font-weight: 500;">Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        required 
                        style="
                            background-color: #121212;
                            border: 1px solid #333;
                            color: #e0e0e0;
                            border-radius: 0.75rem;
                            padding: 0.5rem 1rem;
                        "
                    >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label" style="color: #ccc; font-weight: 500;">Password</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password" 
                        name="password" 
                        required 
                        style="
                            background-color: #121212;
                            border: 1px solid #333;
                            color: #e0e0e0;
                            border-radius: 0.75rem;
                            padding: 0.5rem 1rem;
                        "
                    >
                </div>

                <div class="mt-3 text-end">
                    <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: #1db954;">
                        Forgot your password?
                    </a>
                </div>
                
                <div class="d-grid mt-4">
                    <button 
                        type="submit" 
                        class="btn" 
                        style="
                            background-color: #1db954;
                            color: #fff;
                            border: none;
                            border-radius: 0.75rem;
                            font-weight: 600;
                            padding: 0.6rem 1.5rem;
                            transition: background-color 0.3s ease;
                        "
                        onmouseover="this.style.backgroundColor='#17a94a';"
                        onmouseout="this.style.backgroundColor='#1db954';"
                    >
                        🎵 Login
                    </button>
                </div>
            </form>

            <p class="mt-4 text-center" style="color: #ccc;">
                Don't have an account? 
                <a href="{{ route('Register.page') }}" style="color: #1db954;">Sign up</a>
            </p>
        </div>
    </div>
</x-layout>
