<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Records</title>
    <style>
        table {
            margin: auto;
            border-collapse: collapse;
            width: 80%;
        }
        th, td {
            border: 1px solid #333;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #f4f4f4;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Contact Records</h2>
    <table>
        <tr>
            <th>user_id</th>
            <th>user_name</th>
            <th>user_email</th>
            <th>user_message</th>
            <th>action</th>
            <th>action</th>
        </tr>
        <?php
        include(__DIR__ . '/../includes/db.php');

        $sql = "SELECT * FROM contact_table";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row['id']."</td>
                        <td>".$row['user_name']."</td>
                        <td>".$row['user_email']."</td>
                        <td>".$row['user_message']."</td>
                   
                     <td><a href='update.php?id=" . $row['id'] . "'>Update</a> </td> 
                    <td><a href='delete.php?id=" . $row['id'] . "' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                  </td>
                      </tr>";
            }
        } 
        ?>
    </table>
</body>
</html>
