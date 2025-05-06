
<x-layout>
    <div class="d-flex justify-content-center align-items-center vh-100" style="background: linear-gradient(to right, #ffe0f0, #ffc1e3);">
        <div class="p-5 shadow-lg" style="max-width: 420px; width: 100%; background-color: white; border-radius: 2rem;">
            <h2 class="text-center mb-4" style="color: #e83e8c; font-family: 'Poppins', sans-serif;">Create Account 💕</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required style="border-radius: 1rem;">
                    <label for="name">Full Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required style="border-radius: 1rem;">
                    <label for="email">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required style="border-radius: 1rem;">
                    <label for="password">Password</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" required style="border-radius: 1rem;">
                    <label for="password_confirmation">Confirm Password</label>
                </div>

                <div class="d-grid mt-4">
                    <button type="submit" class="btn" style="background: #e83e8c; color: white; border-radius: 1rem; font-weight: bold;">
                        💗 Register
                    </button>
                </div>
            </form>

            <p class="mt-4 text-center" style="color: #c71585;">
                Already have an account? <a href="{{ route('Login.page') }}" style="color: #e83e8c; font-weight: 500;">Login here</a>
            </p>
        </div>
    </div>
</x-layout>
