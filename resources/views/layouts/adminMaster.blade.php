<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        /* Google Fonts - Poppins */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            min-height: 100vh;
            background: #e3f2fd;
            display: flex;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            height: 70px;
            width: 100%;
            display: flex;
            align-items: center;
            background: #fff;
            box-shadow: 0 0 1px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        nav .logo {
            display: flex;
            align-items: center;
            margin: 0 24px;
        }

        .logo .menu-icon {
            color: #333;
            font-size: 24px;
            margin-right: 14px;
            cursor: pointer;
        }

        .logo .logo-name {
            color: #333;
            font-size: 22px;
            font-weight: 500;
        }

        nav .sidebar {
            position: fixed;
            top: 0;
            left: -100%;
            height: 100%;
            width: 260px;
            padding: 20px 0;
            background-color: #fff;
            box-shadow: 0 5px 1px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            z-index: 1000;
        }

        nav.open .sidebar {
            left: 0;
        }

        .sidebar .sidebar-content {
            display: flex;
            height: 100%;
            flex-direction: column;
            justify-content: space-between;
            padding: 30px 16px;
        }

        .sidebar-content .list {
            list-style: none;
        }

        .list .nav-link {
            display: flex;
            align-items: center;
            margin: 8px 0;
            padding: 14px 12px;
            border-radius: 8px;
            text-decoration: none;
        }

        .lists .nav-link:hover {
            background-color: #4070f4;
        }

        .nav-link .icon {
            margin-right: 14px;
            font-size: 20px;
            color: #707070;
        }

        .nav-link .link {
            font-size: 16px;
            color: #707070;
            font-weight: 400;
        }

        .lists .nav-link:hover .icon,
        .lists .nav-link:hover .link {
            color: #fff;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: -100%;
            height: 100vh;
            width: 100%;
            opacity: 0;
            pointer-events: none;
            transition: all 0.4s ease;
            background: rgba(0, 0, 0, 0.3);
            z-index: 900;
        }

        nav.open ~ .overlay {
            opacity: 1;
            left: 0;
            pointer-events: auto;
        }

        main {
            flex-grow: 1;
            margin-left: 260px;
            padding: 20px;
            transition: margin-left 0.4s ease;
        }

        nav.open main {
            margin-left: 260px;
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <span class="logo-name">Import Export</span>
        </div>

        <div class="sidebar">
            <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <span class="logo-name">Import Export</span>
            </div>

            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="{{ route('dashboard.index') }}"   class="nav-link">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="link">Dashboard</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('categories.index') }}" class="nav-link">
                            <i class="bx bx-category icon"></i>
                            <span class="link">Category</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('products.index') }}" class="nav-link">
                            <i class="bx bx-box icon"></i>
                            <span class="link">Product</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('orders.index') }}"  class="nav-link">
                            <i class="bx bx-bar-chart-alt-2 icon"></i>
                            <span class="link">Order</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('admin.customers') }}" class="nav-link">
                            <i class="bx bx-user icon"></i>
                            <span class="link">Customer</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('account.logout') }}" class="nav-link">
                            <i class="bx bx-log-out icon"></i>
                            <span class="link">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="overlay"></section>
    <main>
        @yield('content')
    </main>

    <script>
        const navBar = document.querySelector("nav"),
            menuBtns = document.querySelectorAll(".menu-icon"),
            overlay = document.querySelector(".overlay");

        menuBtns.forEach((menuBtn) => {
            menuBtn.addEventListener("click", () => {
                navBar.classList.toggle("open");
            });
        });

        overlay.addEventListener("click", () => {
            navBar.classList.remove("open");
        });
    </script>
</body>
</html>
