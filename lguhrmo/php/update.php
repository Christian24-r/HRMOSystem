<?php
include("../conn.php");  // Include your database connection code here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; // Get the user ID
    $username = $_POST['username'];
    $password = $_POST['password'];
    $usertype = $_POST['usertype'];

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE `tbl_user` SET username = ?, password = ?, usertype = ? WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Hash the password for security using MD5 (not recommended)
        $hashedPassword = md5($password);

        mysqli_stmt_bind_param($stmt, "sssi", $username, $hashedPassword, $usertype, $id);

        if (mysqli_stmt_execute($stmt)) {
            // Data Updated Successfully
            echo '<script>alert("Data Updated Successfully");</script>';
            // Redirect to register-account.php after displaying the alert
            echo '<script>window.location.href = "../index.php";</script>';
        } else {
            echo "Error executing statement: " . mysqli_stmt_error($stmt);
        }

        mysqli_stmt_close($stmt);
    } else {
        echo "Error preparing statement: " . mysqli_error($conn);
    }

    //mysqli_close($conn);
}
?>
