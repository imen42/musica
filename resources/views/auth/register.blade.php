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
            <h2 class="text-center mb-4" style="color: #1db954; font-weight: 700;">Create Account 💕</h2>

            @if ($errors->any())
                <div class="alert alert-danger" style="
                    background-color: #8b0000;
                    color: #fff;
                    border-radius: 0.5rem;
                    border: none;
                    padding: 0.75rem 1rem;
                    margin-bottom: 1rem;
                ">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label" style="color: #ccc; font-weight: 500;">Full Name</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="name" 
                        name="name" 
                        placeholder="Full Name" 
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
                    <label for="email" class="form-label" style="color: #ccc; font-weight: 500;">Email</label>
                    <input 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        name="email" 
                        placeholder="Email" 
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
                        placeholder="Password" 
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
                    <label for="password_confirmation" class="form-label" style="color: #ccc; font-weight: 500;">Confirm Password</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        id="password_confirmation" 
                        name="password_confirmation" 
                        placeholder="Confirm Password" 
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
                        💗 Register
                    </button>
                </div>
            </form>

            <p class="mt-4 text-center" style="color: #ccc;">
                Already have an account? 
                <a href="{{ route('Login.page') }}" style="color: #1db954;">Login here</a>
            </p>
        </div>
    </div>
</x-layout>
