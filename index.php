<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@12.4.1/dist/sweetalert2.min.css">
</head>
<body>
<?php
include_once 'db_connection.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    // SQL query to retrieve user data based on the entered username
    $sql = "SELECT user_id, username, password FROM user WHERE username = '$enteredUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User exists, check password
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        if (password_verify($enteredPassword, $hashedPassword)) {
            // Successful login
            echo "<script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful',
                        text: 'Welcome back!',
                    }).then((result) => {
                        // You can redirect or perform other actions here
                    });
                 </script>";
        } else {
            // Wrong password
            echo "<script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Incorrect Password',
                        text: 'Please enter the correct password.',
                    });
                 </script>";
        }
    } else {
        // User does not exist
        echo "<script>
                Swal.fire({
                    icon: 'error',
                    title: 'User Not Found',
                    text: 'The entered username does not exist.',
                });
             </script>";
    }
}

$conn->close();
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Login
                </div>
                <div class="card-body">
                    <form action="index.php" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                    </form>
                </div>
                <div class="card-footer">
                    <p class="mb-0">Don't have an account? <a href="register.php">Register here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@12.4.1/dist/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>