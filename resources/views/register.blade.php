<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('assets/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="form-wrapper">
            <h2>Register</h2>
            <form id="signup-form">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required placeholder="Enter your name">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">

                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required placeholder="Confirm your password">
                
                <button type="submit">Register</button>
                <p id="error-message"></p>
                <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM fully loaded and parsed');
            
            const signupForm = document.getElementById('signup-form');
            if (signupForm) {
                console.log('Signup form found');
                signupForm.addEventListener('submit', async function(event) {
                    event.preventDefault();
                    
                    const name = document.getElementById('name').value;
                    const email = document.getElementById('email').value;
                    const password = document.getElementById('password').value;
                    const password_confirmation = document.getElementById('password_confirmation').value;
                    
                    if (password !== password_confirmation) {
                        document.getElementById('error-message').textContent = 'Passwords do not match.';
                        return;
                    }
                    
                    try {
                        const response = await fetch('http://localhost:8000/api/register', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ name, email, password, password_confirmation })
                        });
                        
                        const data = await response.json();
                        
                        if (response.ok) {
                            localStorage.setItem('token', data.token);
                            window.location.href = '/login';
                        } else {
                            document.getElementById('error-message').textContent = data.errors ? Object.values(data.errors).flat().join(', ') : 'An error occurred.';
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        document.getElementById('error-message').textContent = 'An unexpected error occurred.';
                    }
                });
            } else {
                console.error('Signup form not found');
            }
        });
    </script>
</body>
</html>
