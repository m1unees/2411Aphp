<?php

session_start();
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $useremail = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if email exists
    $check = $conn->query("SELECT * FROM auth WHERE email = '$useremail'");
    if ($check->num_rows > 0) {
        echo "<script>alert('Email already exists!😏')</script>";
        exit;
    }

    // Insert user
    $sql = "INSERT INTO auth(name, email, password, role) VALUES('$name', '$email', '$password', '$role')";

    if ($conn->query($sql)) {
        $_SESSION['email'] = $email;
        $_SESSION['role'] = $role;

        // Redirect based on role
        if ($role == 'admin') {
            header("Location: admin/dashboard.php");
            exit;
        } else {
            header("Location: home.php");
            exit;
        }
    } else {
        echo "Error: " . $conn->error;
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Form with Role</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .form-container {
            width: 350px;
            margin: 100px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #0288d1;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
        }
        button:hover {
            background-color: #0277bd;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Register</h2>

    <form action="register.php" method="post">
        <label for="name">Username</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label for="role">Select Role</label>
        <select id="role" name="role" required>
            <option value="">--Select Role--</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit">Register</button>
    </form>

    
</div>

</body>
</html>


