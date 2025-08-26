<?php


session_start();
if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: home.php");
    }
    exit;
}




include('includes/db.php');

// Redirect if user is already logged in
if (isset($_SESSION['email']) && isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'admin') {
        header("Location: admin/dashboard.php");
    } else {
        header("Location: home.php");
    }
    exit;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $useremail = $_POST['email'];
    $userpassword = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM auth WHERE email = ?");
    $stmt->bind_param("s", $useremail);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows == 1) {
        $userrow = $result->fetch_assoc();

        if (password_verify($userpassword, $userrow['password'])) {
            $_SESSION['email'] = $useremail;
            $_SESSION['role'] = $userrow['role'];

            if ($userrow['role'] == 'admin') {
                header("Location: admin/dashboard.php");
            } else {
                header("Location: home.php");
            }
            exit;
        } else {
            echo "<script>alert('Invalid password!'); window.location='index.php';</script>";
        }
    } else {
        echo "<script>alert('Email not found!'); window.location='index.php';</script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
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
        input[type="email"],
        input[type="password"] {
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
        p {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Login</h2>
    <form method="post">
        <label>Email</label>
        <input type="email" name="email" required>

        <label>Password</label>
        <input type="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <p>
        Don't have an account?
        <a href="register.php">Register here</a>
    </p>
</div>

</body>
</html>
