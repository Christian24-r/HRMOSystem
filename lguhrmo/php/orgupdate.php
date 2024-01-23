<?php
include_once('../conn.php');

if (isset($_POST['submit'])) {
    $office = $_POST['office'];
    $drawio = $_POST['drawio'];

    // Prevent SQL injection by using prepared statements
    $sql = "UPDATE INTO `tbl_flowchart` (office, drawio) VALUES (?, ?)";

    // Prepare the SQL statement
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind the parameters
        mysqli_stmt_bind_param($stmt, 'ss', $office, $drawio);

        // Execute the statement
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            // JavaScript code for displaying an alert and redirecting to org.php
            echo '<script>alert("Data inserted successfully.");</script>';
            echo '<script>window.location = "../org.php";</script>';
        } else {
            die(mysqli_error($conn));
        }

        // Close the statement
        mysqli_stmt_close($stmt);
    } else {
        die(mysqli_error($conn));
    }
}
?>
