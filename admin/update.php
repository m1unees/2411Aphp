<?php
include(__DIR__ . '/../includes/db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Step 1: Fetch record
    $sql = "SELECT * FROM contact_table WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Record not found.";
        exit;
    }
}

// Step 2: Handle update form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $message = $_POST['user_message'];

    $updateSql = "UPDATE contact_table 
                  SET user_name = '$name', user_email = '$email', user_message = '$message' 
                  WHERE id = $id";

    if ($conn->query($updateSql) === TRUE) {
        echo "<script>
                alert('Record updated successfully!');
                window.location.href = 'admin_Contact.php';
              </script>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0,0,0,0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 6px;
            color: #555;
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            outline: none;
            transition: 0.3s;
        }
        input:focus, textarea:focus {
            border-color: #007bff;
            box-shadow: 0px 0px 5px rgba(0,123,255,0.3);
        }
        button {
            width: 100%;
            background: #007bff;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Update Record</h2>
        <form method="post">
            <label>User Name:</label>
            <input type="text" name="user_name" value="<?php echo $row['user_name']; ?>" required>

            <label>User Email:</label>
            <input type="email" name="user_email" value="<?php echo $row['user_email']; ?>" required>

            <label>Message:</label>
            <textarea name="user_message" rows="4" required><?php echo $row['user_message']; ?></textarea>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
