<?php
session_start();
include('conn.php');

if (isset($_SESSION['usertype'])) {
    if (session_status() === PHP_SESSION_ACTIVE) {
        $role = $_SESSION['usertype'];
        if ($role == "ADMIN") {
            ?>
            <!DOCTYPE html>
            <html lang="en">

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            </head>

            <body>
            <?php
                                            if (isset($_SESSION['usertype'])) {
                                                $role = $_SESSION['usertype'];

                                                if ($role == "ADMIN") {
                                                    $fam_name = $row['fam_name'];
                                                    $date_started = $row["date_started"];
                                                    $currentDate = date('Y-m-d');
                                                    $employment_start_date = strtotime($row['employment_start_date']);

                                                    // Calculate years of service
                                                    $years_of_service = date('Y') - date('Y', $employment_start_date);
                                                    $service_anniversary = date('Y-m-d', strtotime("$date_started +$years_of_service years"));

                                                    // Check if it's the service anniversary and the last execution was not on the same day
                                                    if ($currentDate == $service_anniversary && date('Y-m-d', $employment_start_date) != $currentDate) {

                                                        // Update the years of service and last execution date in the database
                                                        $update_service = "UPDATE tbl_pos SET years_of_service = years_of_service + 1, employment_start_date = NOW() WHERE fam_name = '$fam_name'";
                                                        $result_update_service = $conn->query($update_service);

                                                        if ($result_update_service) {
                                                            echo "<script>alert('Employee $fam_name has completed $years_of_service years of service')</script>";

                                                            // Check if the employee has reached a milestone, e.g., 5 years, 10 years, 20 years, etc.
                                                            if (($years_of_service + 1) % 5 == 0) {
                                                                echo "<script>alert('Employee $fam_name has reached a milestone of $years_of_service years of service')</script>";
                                                            }

                                                            if (($years_of_service + 1) == 5) {
                                                                echo "<script>alert('Congratulations! Employee $fam_name has completed 5 years of service')</script>";
                                                            } elseif (($years_of_service + 1) == 10) {
                                                                echo "<script>alert('Congratulations! Employee $fam_name has completed 10 years of service')</script>";
                                                            } elseif (($years_of_service + 1) == 20) {
                                                                echo "<script>alert('Congratulations! Employee $fam_name has completed 20 years of service')</script>";
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                            ?>

            </body>
            <p>

<!--PRESCRIPTIVE INSIGHTS -->
<?php ?>
<p>
<?php

        if (isset($_SESSION['usertype'])) {
            $role = $_SESSION['usertype'];

            if ($role == "ADMIN") {
            
            $first_name = $row['first_name'];
            $id = $row['id'];
            $age = $row["age"];
            $currentDate = date('m-d');
            $birthDate = date('m-d', strtotime($row['birth_date']));
            $lastExecutionDate = strtotime($row['last_execution_date']);

            // Check if it's the employee's birthday and the last execution was not on the same day
            if ($currentDate == $birthDate && date('m-d', $lastExecutionDate) != $currentDate) {
                $age += 1;

                // Update the age and last execution date in the database
                $updateAgeQry = "UPDATE tbl_employee SET age = '$age', last_execution_date = NOW() WHERE id = '$id'";
                $updateAge = $conn->query($updateAgeQry);

                if ($updateAge) {
                    echo "<script>alert('Employee $first_name is ready for Retirement')</script>";
                    
                
                    // Check if the updated age is 65
                    if ($age == 65) {
                        echo "<script>alert('Employee $first_name must retire')</script>";
                    }
                }
            }
                
        }
    }
            ?>
            </html>
        <?php
        }
    }
} else {
    echo '<script>alert("Please login first");</script>';
    echo '<script>window.location.href = "login.php";</script>';
}
?>
