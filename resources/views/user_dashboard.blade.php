<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    <div class="container">
        <h1>user Dashboard</h1>
        <p>Welcome, user!</p>
        <a href="{{ route('login') }}">Logout</a>
    </div>
</body>
</html>
