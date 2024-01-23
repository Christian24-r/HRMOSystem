<?php
session_start();
include("../conn.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if all required fields are set
    if (isset($_POST["requirement1"], $_POST["requirement2"], $_POST["requirement3"], $_POST["requirement4"], $_POST["requirement5"], $_POST["employee_id"])) {
        $requirement1 = $_POST["requirement1"];
        $requirement2 = $_POST["requirement2"];
        $requirement3 = $_POST["requirement3"];
        $requirement4 = $_POST["requirement4"];
        $requirement5 = $_POST["requirement5"];

        //ID han employee didto han dropdown
        $employee_id = $_POST["employee_id"];

        // Use prepared statement to prevent SQL injection
        $requirement = $conn->prepare("INSERT INTO tbl_requirements (requirement1, requirement2, requirement3, requirement4, requirement5, employee_id) VALUES (?, ?, ?, ?, ?, ?)");

        $requirement->bind_param("ssssss", $requirement1, $requirement2, $requirement3, $requirement4, $requirement5, $employee_id);

        if ($requirement->execute()) {
            // Get the last inserted ID
            $new_id = $requirement->insert_id;

            if ($new_id) {
                // Update req_id in tbl_employee table
                $update_employee = $conn->query("UPDATE tbl_employee SET req_id = $new_id WHERE id = $employee_id");

                if ($update_employee) {
                    echo "<script>alert('Data inserted successfully!');</script>";

                    // Redirect to 201.php
                    echo "<script>window.location = '../201.php';</script>";
                } else {
                    echo "Error updating req_id in tbl_employee";
                }
            } else {
                echo "Error getting last inserted ID";
            }
        } else {
            echo "Error inserting data into tbl_requirements";
        }

        // Close the prepared statement
        $requirement->close();
    } else {
        echo "All required fields are not set.";
    }
}
?>
