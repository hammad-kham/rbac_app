<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h2>Login</h2>
            <form id="login-form">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
                
                <button type="submit">Login</button>
                <p id="error-message"></p>
                <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            </form>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('login-form');
        
        if (loginForm) {
            loginForm.addEventListener('submit', async function(event) {
                event.preventDefault();

                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                try {
                    const response = await fetch('http://localhost:8000/api/login', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ email, password })
                    });

                    const data = await response.json();

                    if (response.ok) {
                        localStorage.setItem('token', data.token);
                        const role = data.role;

                        switch (role) {
                            case 'admin':
                                window.location.href = '/admin_dashboard';
                                break;
                            case 'manager':
                                window.location.href = '/manager_dashboard';
                                break;
                            default:
                                window.location.href = '/user_dashboard';
                        }
                    } else {
                        document.getElementById('error-message').textContent = data.error;
                    }
                } catch (error) {
                    console.error('Error:', error);
                }
            });
        }
    });
    </script>
</body>
</html>
