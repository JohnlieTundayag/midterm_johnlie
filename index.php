<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .is-invalid {
            border-color: #dc3545 !important;
        }
        .login-container {
            max-width: 400px;
            margin: auto;
            margin-top: 100px;
        }
        .alert {
            font-size: 0.9rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <!-- Error Message -->
            <div id="error-box" class="alert alert-danger d-none" role="alert">
                <strong>System Errors</strong>
                <button type="button" class="btn-close float-end" aria-label="Close" onclick="hideErrorBox()"></button>
                <ul id="error-list" class="mb-0"></ul>
            </div>

            <!-- Login Form -->
            <div class="card shadow-sm">
                <div class="card-body">
                    <h3 class="card-title text-center mb-4">Login</h3>
                    <form id="login-form">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('login-form');
        const errorBox = document.getElementById('error-box');
        const errorList = document.getElementById('error-list');

        form.addEventListener('submit', function (event) {
            event.preventDefault();

            // Reset previous errors
            errorList.innerHTML = '';
            errorBox.classList.add('d-none');

            const email = document.getElementById('email').value.trim();
            const password = document.getElementById('password').value.trim();

            let errors = [];

            if (!email) {
                errors.push("Email is required");
            } else if (!validateEmail(email)) {
                errors.push("Invalid email");
            }

            if (!password) {
                errors.push("Password is required");
            }

            if (errors.length > 0) {
                errors.forEach((error) => {
                    const li = document.createElement('li');
                    li.textContent = error;
                    errorList.appendChild(li);
                });
                errorBox.classList.remove('d-none');
            } else {
                alert('Login successful!'); // Replace with actual authentication logic
            }
        });

        function validateEmail(email) {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }

        function hideErrorBox() {
            errorBox.classList.add('d-none');
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
