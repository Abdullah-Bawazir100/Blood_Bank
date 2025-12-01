<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Bank Management - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
        }

        .auth-container {
            max-width: 400px;
            margin: 6vh auto;
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.15);
            border-top: 5px solid #dc2626;
            /* medical red accent */
        }

        a {
            color: #dc2626;
        }

        a:hover {
            color: #b91c1c;
            text-decoration: none;
        }

        label {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <div class="auth-container">
        <h3 class="mb-4 text-center" style="color:#b91c1c;">Blood Bank Management</h3>
        @yield('content')
    </div>
</body>

</html>