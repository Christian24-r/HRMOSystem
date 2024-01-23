<?php
session_start();

// Include connection file
include("../conn.php");

// Check if the form is submitted
if (isset($_POST['update'])) {
    // Retrieve values from the form
    $employee_id = isset($_POST['employee_id']) ? $_POST['employee_id'] : '';
    $fam_name = isset($_POST['fam_name']) ? $_POST['fam_name'] : '';
    $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $mid_name = isset($_POST['mid_name']) ? $_POST['mid_name'] : '';
    $birth_date = isset($_POST['birth_date']) ? $_POST['birth_date'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $contact_no = isset($_POST['contact_no']) ? $_POST['contact_no'] : '';
    $status = isset($_POST['status']) ? $_POST['status'] : '';

    // Using MySQLi to update the database
    $query = "UPDATE tbl_employee SET fam_name = ?, first_name = ?, mid_name = ?, birth_date = ?, age = ?, contact_no = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        // Bind parameters
        $stmt->bind_param("sssssssi", $fam_name, $first_name, $mid_name, $birth_date, $age, $contact_no, $status, $employee_id);

        // Execute the query
        if ($stmt->execute()) {
            // Query executed successfully
            // Display a JavaScript alert
            echo '<script>';
            echo 'alert("Record updated successfully.");';
            echo 'window.location = "../201.php";'; // Redirect to a success page
            echo '</script>';
            exit();
        } else {
            // Handle query execution error
            echo "Error executing the query: " . $stmt->error;
        }
    } else {
        // Handle prepare statement error
        echo "Error preparing the statement: " . $mysqli->error;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection (if not using persistent connections)
$mysqli->close();
?>
