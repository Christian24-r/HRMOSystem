<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
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

        echo '<script>
        swal({
            title: "Florchart Deleted",
            icon: "success",
        }).then((result) => {
            if (result) {
                window.location.href = "../org.php";
            }
        });
    </script>';
    
        exit();
    } else {
        die(mysqli_error($conn));
    }
}
?>
</body>

</html>