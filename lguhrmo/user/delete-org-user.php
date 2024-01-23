<?php
// Delete record logic
include('../conn.php');
if (isset($_GET['office_id'])) {
    $officeId = $_GET['office_id'];

    // Use prepared statement to prevent SQL injection
    $sqlDelete = "DELETE FROM `tbl_flowchart` WHERE id = ?";
    $stmtDelete = mysqli_prepare($conn, $sqlDelete);

    if ($stmtDelete) {
        mysqli_stmt_bind_param($stmtDelete, 'i', $officeId);
        mysqli_stmt_execute($stmtDelete);

        // Close the statement
        mysqli_stmt_close($stmtDelete);

        echo '<script>alert("Data Deleted");</script>';
        echo '<script>window.location.href = "../org-user.php";</script>';
        exit();
    } else {
        die(mysqli_error($conn));
    }
}
?>