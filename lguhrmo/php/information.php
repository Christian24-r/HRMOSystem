<?php
include("../conn.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    // Get values from the form
    $employee_id = $_POST['employee_id'];
    $dept = $_POST['dept'];
    $salary_grade = $_POST['salary_grade'];
    $rate = $_POST['rate'];
    $position = $_POST['position'];
    $ee_no = $_POST['ee_no'];
    $years_of_service = $_POST['years_of_service'];
    $date_started = $_POST['date_started'];
    $tin = $_POST['tin'];
    $gsis_no = $_POST['gsis_no'];
    $phic = $_POST['phic'];
    $pag_ibig = $_POST['pag_ibig'];
    $educ_attain = $_POST['educ_attain'];
    $eligibility = $_POST['eligibility'];
    $masteral = $_POST['masteral'];

    // Prepare and bind the update statement
    $stmt = $conn->prepare("UPDATE tbl_pos SET
        dept = ?,
        salary_grade = ?,
        rate = ?,
        position = ?,
        ee_no = ?,
        years_of_service = ?,
        date_started = ?,
        tin = ?,
        gsis_no = ?,
        phic = ?,
        pag_ibig = ?,
        educ_attain = ?,
        eligibility = ?,
        masteral = ?
        WHERE employee_id = ?");

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("ssssssssssssssi", $dept, $salary_grade, $rate, $position, $ee_no, $years_of_service, $date_started, $tin, $gsis_no, $phic, $pag_ibig, $educ_attain, $eligibility, $masteral, $employee_id);

        if ($stmt->execute()) {
            echo '<script>alert("Record updated ' . '' . '"); 
            window.location.href = "../201.php"</script>';
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error preparing the update statement: " . $conn->error;
    }

    $conn->close();
}
?>