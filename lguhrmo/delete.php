<!-- delete.php -->

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
    require 'conn.php';

    function deleteImagesById($deleteId)
    {
        global $conn;

        // Retrieve the file names associated with the specified ID
        $query = "SELECT image FROM tb_images WHERE id = $deleteId";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $images = json_decode($row['image'], true);

            // Delete the physical files
            foreach ($images as $image) {
                $filePath = 'uploads/' . $image;
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }

            // Delete the record from the database
            $deleteQuery = "DELETE FROM tb_images WHERE id = $deleteId";
            mysqli_query($conn, $deleteQuery);
            echo "<script>
                    swal({
                        title: 'Images Deleted Successfully',
                        icon: 'success',
                    });

                    setTimeout(function() {
                        window.location.replace('imageview.php');
                    }, 2000);
                </script>";
            
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    // Check if the delete_id is set in the URL
    if (isset($_GET['delete_id'])) {
        $deleteId = $_GET['delete_id'];
        deleteImagesById($deleteId); // Call the function to delete images by ID
    }
    ?>
</body>

</html>