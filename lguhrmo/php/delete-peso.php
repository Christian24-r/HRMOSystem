<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRMO System</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <?php
    include '../conn.php';

    // Check if the 'id' parameter is set in the URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Prepare the SQL statement
        $stmt = $conn->prepare("DELETE FROM tbl_document WHERE id = ?");

        // Bind the parameter
        $stmt->bind_param("i", $id);

        // Execute the statement
        if ($stmt->execute()) {
            // Data deleted successfully
            echo "<script>
                    swal({
                        title: 'Data Deleted Successfully!',
                        icon: 'success',
                    });

                    // Redirect to PESO.php after a delay
                    setTimeout(function() {
                        window.location.replace('../PESO.php');
                    }, 2000);
                </script>";
        } else {
            echo '<script>alert("Error deleting data");</script>';
        }

        // Close the statement
        $stmt->close();
    } else {
        // 'id' parameter is not set in the URL, handle this case accordingly
        echo '<script>alert("ID not provided");</script>';
    }

    // Close the database connection
    $conn->close();
    ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
</body>

</html>