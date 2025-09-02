<?php
include(__DIR__ . '/../includes/db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // secure integer casting

    $sql = "DELETE FROM contact_table WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Record deleted successfully!');
                window.location.href = 'admin_Contact.php';
              </script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No ID provided.";
}
?>
