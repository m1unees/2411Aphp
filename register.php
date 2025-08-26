<?php
session_start();
include('includes/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $useremail = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Check if email exists
    $check = $conn->prepare("SELECT * FROM auth WHERE email = ?");
    $check->bind_param("s", $useremail);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email already exists!😏'); window.location='register.php';</script>";
        exit;
    }

    // Hash the password
    $hashedPassword = PASSWORD_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $sql = $conn->prepare("INSERT INTO auth(name, email, password, role) VALUES(?, ?, ?, ?)");
    $sql->bind_param("ssss", $name, $useremail, $hashedPassword, $role);

    if ($sql->execute()) {
        $_SESSION['email'] = $useremail;
        $_SESSION['role'] = $role;

        if ($role == 'admin') {
            header("Location: admin/dashboard.php");
        } else {
            header("Location: home.php");
        }
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <style>
        body {
            font-family: Arial;
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
        <label>Username</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <label>Role</label>
        <select name="role" required>
            <option value="">--Select Role--</option>
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>

        <button type="submit">Register</button>
    </form>

    
</div>

</body>
</html>
