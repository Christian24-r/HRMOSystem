<?php
include '../conn.php'; // Adjust the path as needed

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM tbl_user WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $id);

        if (mysqli_stmt_execute($stmt)) {
            // Record deleted successfully
            header('Location: delete-user.php');
            exit();
        } else {
            echo "Error executing statement: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }
} else {
    // Redirect to register.php with an alert
    echo '<script>alert("Data Deleted");</script>';
    echo '<script>window.location.href = "../index.php";</script>';
    exit();
}

mysqli_close($conn);
?>