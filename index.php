<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom styling for invalid input fields */
        .is-invalid {
            border: 1px solid #dc3545 !important; /* Bootstrap's red danger color */
        }
        /* Centered container */
        .dashboard-container {
            max-width: 800px;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <!-- Login Form Section -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100" id="login-section">
        <div class="w-100" style="max-width: 400px;">
            <!-- Error Message -->
            <div id="error-box" class="alert alert-danger d-none" role="alert">
                <strong>System Errors</strong>
                <ul id="error-list" class="mb-0">
                    <!-- Error messages will be injected here -->
                </ul>
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

    <!-- Dashboard Section -->
    <div class="container dashboard-container d-none" id="dashboard-section">
        <div class="text-end mb-3">
            <button id="logout-btn" class="btn btn-danger">Logout</button>
        </div>
        <h2 class="text-center">Welcome to the System: <span id="user-email"></span></h2>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Add a Subject</div>
                    <div class="card-body">
                        <p>This section allows you to add a new subject in the system. Click the button below to proceed with the adding process.</p>
                        <button class="btn btn-primary w-100">Add Subject</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Register a Student</div>
                    <div class="card-body">
                        <p>This section allows you to register a new student in the system. Click the button below to proceed with the registration process.</p>
                        <button class="btn btn-primary w-100">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('login-form').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Clear any previous error messages and reset form fields
            const errorBox = document.getElementById('error-box');
            const errorList = document.getElementById('error-list');
            const emailInput = document.getElementById('email');
            const passwordInput = document.getElementById('password');
            errorList.innerHTML = '';
            errorBox.classList.add('d-none');
            emailInput.classList.remove('is-invalid');
            passwordInput.classList.remove('is-invalid');
            
            // Get input values
            const email = emailInput.value.trim();
            const password = passwordInput.value.trim();
            
            // Track errors
            let errors = [];
            
            // Validate fields
            if (!email) {
                errors.push("Email is required");
                emailInput.classList.add('is-invalid');
            } else if (!validateEmail(email)) {
                errors.push("Invalid email");
                emailInput.classList.add('is-invalid');
            }

            if (!password) {
                errors.push("Password is required");
                passwordInput.classList.add('is-invalid');
            }
            
            // Show errors if any
            if (errors.length > 0) {
                errors.forEach(error => {
                    const li = document.createElement('li');
                    li.textContent = error;
                    errorList.appendChild(li);
                });
                errorBox.classList.remove('d-none');
            } else {
                // Simulate successful login
                showDashboard(email);
            }
        });

        // Email validation function
        function validateEmail(email) {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailPattern.test(email);
        }

        // Show the dashboard and hide the login form
        function showDashboard(email) {
            document.getElementById('login-section').classList.add('d-none');
            document.getElementById('dashboard-section').classList.remove('d-none');
            document.getElementById('user-email').textContent = email;
        }

        // Logout button handler to reset forms and show login form
        document.getElementById('logout-btn').addEventListener('click', function() {
            document.getElementById('dashboard-section').classList.add('d-none');
            document.getElementById('login-section').classList.remove('d-none');
            document.getElementById('login-form').reset();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>