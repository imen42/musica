<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>💗 My Cute Laravel App</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #ffe0f0, #ffc1e3);
        }

        .navbar {
            background-color: #fff;
            border-radius: 1rem;
            padding: 1rem 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-girly {
            background-color: #e83e8c;
            color: white;
            border-radius: 1rem;
            font-weight: bold;
            padding: 0.5rem 1.5rem;
            transition: background-color 0.3s ease;
        }

        .btn-girly:hover {
            background-color: #d63384;
        }
    </style>
</head>
<body>

    <nav class="navbar d-flex justify-content-end gap-3 mx-5 mt-3">
        <a href="{{ route('Register.page') }}" class="btn btn-girly">Register</a>
        <a href="{{ route('Login.page') }}" class="btn btn-girly">Login</a>
        <form action="{{ route('logout') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-girly">Logout</button>
        </form>
            </nav>

    <main class="py-4">
        {{ $slot }}
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
