// document.addEventListener('DOMContentLoaded', function() {
//     console.log('DOM fully loaded and parsed');

//     // Handle Login Form
//     const loginForm = document.getElementById('login-form');
//     if (loginForm) {
//         console.log('Login form found');
//         loginForm.addEventListener('submit', async function(event) {
//             event.preventDefault();

//             const email = document.getElementById('email').value;
//             const password = document.getElementById('password').value;

//             try {
//                 const response = await fetch('http://localhost:8000/api/login', {
//                     method: 'POST',
//                     headers: {
//                         'Content-Type': 'application/json'
//                     },
//                     body: JSON.stringify({ email, password })
//                 });

//                 const data = await response.json();
                
//                 if (response.ok) {
//                     localStorage.setItem('token', data.token);
//                     const role = data.role;

//                     if (role === 'admin') {
//                         window.location.href = '/admin_dashboard';
//                     } else if (role === 'manager') {
//                         window.location.href = '/manager_dashboard';
//                     } else {
//                         window.location.href = '/user_dashboard';
//                     }
//                 } else {
//                     document.getElementById('error-message').textContent = data.error;
//                 }
//             } catch (error) {
//                 console.error('Error:', error);
//             }
//         });
//     } else {
//         console.error('Login form not found');
//     }

//     // Handle Signup Form
//     const signupForm = document.getElementById('signup-form');
//     if (signupForm) {
//         signupForm.addEventListener('submit', async function(event) {
//             event.preventDefault();

//             const name = document.getElementById('name').value;
//             const email = document.getElementById('email').value;
//             const password = document.getElementById('password').value;
//             const password_confirmation = document.getElementById('password_confirmation').value;

//             if (password !== password_confirmation) {
//                 document.getElementById('error-message').textContent = 'Passwords do not match.';
//                 return;
//             }

//             try {
//                 const response = await fetch('http://localhost:8000/api/register', {
//                     method: 'POST',
//                     headers: {
//                         'Content-Type': 'application/json'
//                     },
//                     body: JSON.stringify({ name, email, password, password_confirmation })
//                 });

//                 const data = await response.json();

//                 if (response.ok) {
//                     localStorage.setItem('token', data.token);
//                     window.location.href = '/login'; 
//                 } else {
//                     document.getElementById('error-message').textContent = data.errors ? Object.values(data.errors).flat().join(', ') : 'An error occurred.';
//                 }
//             } catch (error) {
//                 console.error('Error:', error);
//                 document.getElementById('error-message').textContent = 'An unexpected error occurred.';
//             }
//         });
//     } else {
//         console.error('Signup form not found');
//     }
// });
