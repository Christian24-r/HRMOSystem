<!-- delete.php -->

<?php
require 'conn.php';

function deleteImagesById($deleteId) {
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

        echo "
            <script>
                alert('Images deleted successfully');
                // window.location.href = 'imageview-user.php'; // Redirect back to the view page
            </script>
        ";
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
