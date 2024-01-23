<?php
include '../conn.php'; // Adjust the path as needed

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
        // header('Location: ../admin-index.php');
        echo '<script>alert("Data Deleted ' . '' . '"); window.location.href = "../PESO.php"</script>';
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
