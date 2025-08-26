<?php
// Start session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
    $name     = $_POST['fullname'];
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // You should hash the password and validate inputs here
    // Example: password_hash($password, PASSWORD_BCRYPT)

    // Simulate saving to database (replace with actual DB code)
    // If registration is successful:
    $_SESSION['user'] = $name;

    // Redirect to home.php
    header("Location: home.php");
    exit();
}
?>

<!-- HTML Form -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6 bg-white p-4 rounded shadow-sm">
        <h3 class="text-center mb-4">Register</h3>
        <form method="POST" action="">
          <div class="mb-3">
            <label for="fullname" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="fullname" name="fullname" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
