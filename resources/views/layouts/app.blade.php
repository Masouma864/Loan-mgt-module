<!DOCTYPE html>
<html>
<head>
    <title>Loan Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f6f6f6;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            font-family: 'Times New Roman', serif;
            font-size: 36px;
        }

        nav {
            background-color: #f0f0f0;
            padding: 10px 0;
            text-align: center;
        }

        main {
            padding: 20px 0;
        }

        footer {
            background-color: #4CAF50;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            font-family: 'Times New Roman', serif;
        }

        .nav-link {
            color: #333;
            font-weight: bold;
            font-size: 18px;
        }

        .nav-link:hover {
            color: #4CAF50;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>Loan Management System</h1>
    </header>

    <nav>
        <ul class="nav justify-content-center">
        <li class="nav-item">
                <a class="nav-link" href="{{ route('products.index') }}">Product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('customers.index') }}">Customer</a>
            </li>
           
            <li class="nav-item">
                <a class="nav-link" href="{{ route('loans.index') }}">Loan</a>
            </li>
          
          
            <li class="nav-item">
                <a class="nav-link" href="{{ route('all.reports') }}">Report</a>
            </li>
        </ul>
    </nav>

    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Loan Management System</p>
    </footer>

    <!-- Include your JavaScript files and other necessary assets here -->
</body>
</html>
