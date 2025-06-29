<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>MusicForLife</title>

  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />

  <style>
    /* Reset & base */
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #0f0f0f, #1c1c1c);
      color: #e0e0e0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* Navbar */
    nav.navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 1rem 2rem;
      background: #181818;
      box-shadow:
        6px 6px 12px rgba(0, 0, 0, 0.7),
        -6px -6px 12px rgba(40, 40, 40, 0.9);
      border-radius: 1rem;
      margin: 1rem 2rem 2rem;
      user-select: none;
    }

    nav.navbar h3 {
      color: #1db954;
      font-weight: 700;
      font-size: 1.6rem;
      text-shadow: 0 0 8px #1db954bb;
    }

    nav.navbar .nav-links {
      display: flex;
      gap: 1rem;
    }

    nav.navbar .btn-modern {
      background-color: #1db954;
      color: #fff;
      padding: 0.5rem 1.5rem;
      font-weight: 600;
      font-size: 1rem;
      border: none;
      border-radius: 0.75rem;
      cursor: pointer;
      box-shadow: 0 0 12px #1db954cc;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      user-select: none;
    }

    nav.navbar .btn-modern:hover,
    nav.navbar .btn-modern:focus {
      background-color: #17a94a;
      box-shadow: 0 0 18px #17a94aaa;
      color: #d0f5cc;
      outline: none;
    }

    nav.navbar .btn-modern:active {
      background-color: #148230;
      box-shadow: inset 0 0 10px #0e601f;
    }

    nav.navbar form {
      margin: 0;
    }

    nav.navbar form button.btn-modern {
      border: none;
    }

    /* Main content container */
    main {
      flex-grow: 1;
      max-width: 900px;
      margin: 0 auto 3rem;
      padding: 1rem 2rem;
      background: rgba(28, 28, 28, 0.95);
      border-radius: 1rem;
      box-shadow:
        6px 6px 12px rgba(0, 0, 0, 0.7),
        -6px -6px 12px rgba(40, 40, 40, 0.9);
      min-height: 60vh;
    }

    /* Scrollbar for any overflow */
    main::-webkit-scrollbar {
      width: 8px;
    }
    main::-webkit-scrollbar-track {
      background: #111;
      border-radius: 4px;
    }
    main::-webkit-scrollbar-thumb {
      background: #1db954aa;
      border-radius: 4px;
    }

    a, a:hover, a:focus {
      text-decoration: none;
      color: inherit;
    }

    /* Responsive */
    @media (max-width: 600px) {
      nav.navbar {
        flex-direction: column;
        gap: 1rem;
      }
      main {
        margin: 0 1rem 2rem;
        padding: 1rem;
      }
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <h3> MusicForLife</h3>
    <div class="nav-links">
      <a href="{{ route('home') }}" class="btn-modern">Home</a>

      @auth
       
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
          @csrf
          <button type="submit" class="btn-modern">Logout</button>
        </form>
      @else
        <a href="{{ route('Register.page') }}" class="btn-modern">Register</a>
        <a href="{{ route('Login.page') }}" class="btn-modern">Login</a>
      @endauth
    </div>
  </nav>

  <main>
    {{ $slot }}
  </main>
</body>
</html>
