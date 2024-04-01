<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Management System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
        }
        h1 {
            color: #007bff;
            font-size: 36px;
            margin-bottom: 20px;
        }
        p {
            color: #6c757d;
            font-size: 18px;
            margin-bottom: 30px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            text-decoration: none;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .features {
            display: flex;
            justify-content: center;
            margin-top: 30px;
            flex-wrap: wrap;
        }
        .feature {
            flex: 0 0 calc(33.33% - 40px);
            margin: 0 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s ease;
        }
        .feature:hover {
            transform: translateY(-5px);
        }
        .feature h3 {
            color: #007bff;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .feature p {
            color: #6c757d;
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Loan Management System</h1>
        <p>Track and manage your loans efficiently with our easy-to-use platform.</p>
    </div>

    <div id="features" class="container features">
        <div class="feature">
            <h3><a href="{{ route('customers.index') }}">Track Customers</a></h3>
            <p>Record and track payments associated with loans. Stay on top of your finances.</p>
        </div>
        <div class="feature">
            <h3><a href="{{ route('loans.index') }}">Manage Loans</a></h3>
            <p>Track and manage your loans with ease. Create, edit, and view loan details.</p>
        </div>
        <div class="feature">
            <h3><a href="{{ route('products.index') }}">Manage Products</a></h3>
            <p>Manage your products efficiently. Add, edit, and delete product details.</p>
        </div>
     
        <div class="feature">
            <h3><a href="{{ route('all.reports') }}">Generate Reports</a></h3>
            <p>Generate insightful reports to analyze loan performance and payment trends.</p>
        </div>
    </div>
</body>
</html>
