<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User Home Page')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            transition: background-color 0.3s, color 0.3s;
        }
        body.dark-mode {
            background-color: #333;
            color: #f4f4f4;
        }
        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            padding: 10px 20px;
        }
        nav a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        .nav-links {
          .nav-links {
            display: flex;
            justify-content: center; /* Center the items horizontally */
            align-items: center; /* Center the items vertically */
            gap: 20px; /* Adjust as needed */
        }
        }
        .header-buttons {
            display: flex;
            gap: 10px;
        }
        .header-buttons button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 15px;
            cursor: pointer;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 5px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .header-buttons button:hover {
            background-color: #45a049;
        }
        main {
            padding: 20px;
        }
        footer {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            overflow: hidden;
            padding: 0 20px;
        }
        .card {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin: 20px 0;
            padding: 20px;
            transition: background-color 0.3s, color 0.3s;
        }
        .card.dark-mode {
            background-color: #444;
            color: #f4f4f4;
        }
    </style>
</head>
<body>
  <nav>
    <div class="container">
        <div class="nav-links">
            <a href="{{ route('account.dashboard') }}">Home</a> 
            <a href="{{ route('profile.index') }}">Profile</a>
            <a href="{{ route('my.cart') }}">My Cart</a>
            <a href="#contact">About Us</a>
        </div>
    </div>
    <div class="header-buttons">
        <button id="dark-mode-toggle">
            <i class="fas fa-moon"></i> Dark Mode
        </button>
        <button class="logout-btn" onclick="location.href='{{ route('account.logout') }}'">
    <i class="fas fa-sign-out-alt"></i> Logout
</button>

    </div>
</nav>


    <main class="container">
        @yield('content')
    </main>

    <footer>
        <p>&copy; 2024 Your Website. All Rights Reserved.</p>
    </footer>

    <script>
        document.getElementById('dark-mode-toggle').addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');
            document.querySelectorAll('.card').forEach(card => {
                card.classList.toggle('dark-mode');
            });
        });
    </script>
</body>
</html>
