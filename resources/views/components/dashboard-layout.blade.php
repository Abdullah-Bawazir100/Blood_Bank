<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Blood Bank Dashboard</title>

    <style>
        :root {
            --red: #c0392b;
            --red-dark: #922b21;
            --white: #ffffff;
            --gray-light: #f2f2f2;
            --gray-medium: #d0d0d0;
            --text-dark: #3d1a1a;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: "Segoe UI", sans-serif;
            background: var(--gray-light);
            color: var(--text-dark);
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: transparent;
            padding: 1.2rem 2rem;
            position: fixed;
            width: 100%;
            height: 110px;
            top: 0;
            z-index: 1000;
        }

        .navbar::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, #c0392b, #e74c3c);
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
            z-index: -1;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .logo-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #fff;
        }

        .logo {
            font-weight: 800;
            font-size: 2rem;
            color: #fff;
            text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.35);
            text-align: center;
            flex-grow: 1;
            position: relative;
        }

        .user-area {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-info {
            font-weight: 600;
            color: #fff;
        }

        .logout-btn {
            background: var(--white);
            color: #c0392b;
            border: 2px solid var(--white);
            padding: 0.5rem 1.2rem;
            border-radius: 8px;
            font-weight: 700;
            font-size: 1rem;
            transition: 0.25s;
        }

        .logout-btn:hover {
            background: transparent;
            color: #fff;
            cursor: pointer;
            border-color: #fff;
            transform: scale(1.05);
        }

        .layout {
            display: flex;
            margin-top: 110px;
        }

        .sidebar {
            position: fixed;
            top: 110px;
            left: 0;
            width: 260px;
            height: calc(100vh - 110px);
            background: var(--white);
            border-right: 1px solid var(--gray-medium);
            padding-top: 1rem;
            display: flex;
            flex-direction: column;
            justify-content: space-evenly;
            z-index: 900;
            border-radius: 30px;
            overflow: hidden;
        }

        .sidebar-item {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            margin-bottom: 40px;
            font-size: 1rem;
            border-radius: 10px;
            color: var(--text-dark);
            text-decoration: none;
            transition: 0.3s;
            border-bottom: 1px solid #eee;
        }

        .sidebar-item:hover {
            background: var(--gray-light);
            padding-left: 30px;
        }

        .sidebar-item.active {
            background: var(--red);
            color: var(--white);
        }

        .content {
            margin-left: 200px;
            padding-left: 35px;
            width: 100%;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="logo-container">
            <img src="/images/logo.jpg" class="logo-img">
        </div>

        <div class="logo">Blood Bank</div>

        <div class="user-area">
            <div class="user-info">{{ auth()->user()->name }}</div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <div class="layout">
        <aside class="sidebar">
            <nav>
                <a href="{{ route('dashboard.section', 'donors') }}"
                    class="sidebar-item {{ ($section ?? '') === 'donors' ? 'active' : '' }}">🩸 Donors</a>
                <a href="{{ route('dashboard.section', 'register') }}"
                    class="sidebar-item {{ ($section ?? '') === 'register' ? 'active' : '' }}">📝 Register Donor</a>
                <a href="{{ route('dashboard.section', 'about') }}"
                    class="sidebar-item {{ ($section ?? '') === 'about' ? 'active' : '' }}">ℹ️ About</a>
                <a href="{{ route('dashboard.section', 'contact') }}"
                    class="sidebar-item {{ ($section ?? '') === 'contact' ? 'active' : '' }}">📞 Contact</a>
            </nav>
        </aside>

        <main class="content">
            {{ $slot }}
        </main>
    </div>

</body>

</html>