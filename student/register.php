<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register a New Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .breadcrumb {
            background-color: #f8f9fa;
        }
        .table td, .table th {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Breadcrumb Navigation -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Register Student</li>
            </ol>
        </nav>

        <!-- Page Title -->
        <h1 class="mb-4">Register a New Student</h1>

        <!-- Registration Form -->
        <div class="card mb-4">
            <div class="card-body">
                <form id="register-student-form">
                    <div class="mb-3">
                        <label for="student-id" class="form-label">Student ID</label>
                        <input type="text" class="form-control" id="student-id" placeholder="Enter Student ID" required>
                    </div>
                    <div class="mb-3">
                        <label for="first-name" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="first-name" placeholder="Enter First Name" required>
                    </div>
                    <div class="mb-3">
                        <label for="last-name" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="last-name" placeholder="Enter Last Name" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Student</button>
                </form>
            </div>
        </div>

        <!-- Student List -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Student List</h5>
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Student ID</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody id="student-list">
                        <!-- Dynamically generated rows will be added here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        const form = document.getElementById('register-student-form');
        const studentList = document.getElementById('student-list');

        // Add student to the list
        form.addEventListener('submit', function(event) {
            event.preventDefault();

            // Get form data
            const studentId = document.getElementById('student-id').value.trim();
            const firstName = document.getElementById('first-name').value.trim();
            const lastName = document.getElementById('last-name').value.trim();

            // Create a new row
            const row = document.createElement('tr');
            row.innerHTML = `
                <td>${studentId}</td>
                <td>${firstName}</td>
                <td>${lastName}</td>
                <td>
                    <button class="btn btn-warning btn-sm edit-btn">Edit</button>
                    <button class="btn btn-danger btn-sm delete-btn">Delete</button>
                    <button class="btn btn-secondary btn-sm attach-btn">Attach Subject</button>
                </td>
            `;

            // Append to table
            studentList.appendChild(row);

            // Clear the form
            form.reset();
        });

        // Handle actions (Edit, Delete, Attach)
        studentList.addEventListener('click', function(event) {
            const target = event.target;

            if (target.classList.contains('delete-btn')) {
                // Remove student row
                target.closest('tr').remove();
            } else if (target.classList.contains('edit-btn')) {
                // Edit student data
                const row = target.closest('tr');
                const studentId = row.children[0].textContent;
                const firstName = row.children[1].textContent;
                const lastName = row.children[2].textContent;

                // Populate the form with existing data
                document.getElementById('student-id').value = studentId;
                document.getElementById('first-name').value = firstName;
                document.getElementById('last-name').value = lastName;

                // Remove row after editing
                row.remove();
            } else if (target.classList.contains('attach-btn')) {
                // Attach Subject action
                alert('Attach Subject functionality can be implemented here.');
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
