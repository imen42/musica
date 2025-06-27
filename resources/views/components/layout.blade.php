<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>🎼 AlgoMuse</title>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #111, #222);
            color: #eee;
        }

        .navbar {
            background-color: #1c1c1c;
            border-radius: 1rem;
            padding: 1rem 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        }

        .btn-modern {
            background-color: #1db954;
            color: #fff;
            border-radius: 0.75rem;
            font-weight: 600;
            padding: 0.5rem 1.5rem;
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }

        .btn-modern:hover {
            background-color: #17a94a;
            box-shadow: 0 0 10px #1db954aa;
        }

        main {
            padding-top: 2rem;
            max-width: 900px;
            margin: 0 auto;
        }

        a, a:hover {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar d-flex justify-content-between align-items-center mx-4 mt-3">
        <h3 class="mb-0" style="color:#1db954;">🎼 AlgoMuse</h3>
        <div class="d-flex gap-3">
            <a href="{{ route('home') }}" class="btn btn-modern">Home</a>

            @auth
                <a href="{{ route('musicxml.upload') }}" class="btn btn-modern">Analyze MusicXML</a>
                <a href="{{ route('melody.generate') }}" class="btn btn-modern">Generate Melody</a>
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-modern">Logout</button>
                </form>
            @else
                <a href="{{ route('Register.page') }}" class="btn btn-modern">Register</a>
                <a href="{{ route('Login.page') }}" class="btn btn-modern">Login</a>
            @endauth
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
