<!-- Include SweetAlert CSS and JS from CDN -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

</head>

<body>
    <?php
  session_start();
    include_once('../conn.php');
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Check if the POST values exist and are not empty
        
            // Retrieve data from the form
            $dept = $_POST["dept"];
            $salaryGrade = $_POST["salary_grade"];
            $rate = $_POST["rate"];
            $position = $_POST["position"];
            $eeNo = $_POST["ee_no"];
            $yearsOfService = $_POST["years_of_service"];
            $dateStarted = $_POST["date_started"];
            $tin = $_POST['tin'];
            $gsis_no = $_POST['gsis_no'];
            $phic = $_POST['phic'];
            $pag_ibig = $_POST['pag_ibig'];
            $educ_attain = $_POST['educ_attain'];
            $eligibility = $_POST['eligibility'];
            $masteral = $_POST['masteral'];
      
            // ID of chosen employee
            $employee_id = $_POST["employee_id"];
    
         // Create a prepared statement
$stmt = $conn->prepare("INSERT INTO tbl_pos (dept, salary_grade, rate, position, ee_no, years_of_service, date_started, tin, gsis_no, phic, pag_ibig, educ_attain, eligibility, masteral, employee_id) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

    
            // Bind the parameters
            $stmt->bind_param("sssssssssssssss", $dept, $salaryGrade, $rate, $position, $eeNo, $yearsOfService, $dateStarted, $tin, $gsis_no, $phic, $pag_ibig, $educ_attain, $eligibility, $masteral, $employee_id);

    
            if ($stmt->execute()) {
                // Kuhaon an ID hab last row nga na add ha tbl_pos para ig update ha tbl_employee.pos_id
                $getLastIdQuery = $conn->query("SELECT * FROM tbl_pos ORDER BY u_id DESC LIMIT 1");
                $getLastId = $getLastIdQuery->fetch_assoc();
                $lastId = $getLastId['u_id'];

                if($lastId){
                    // echo $employee_id;
                    // echo $lastId;
                    
                    // Ig a update an employee data butangan h  in value an pos_id  
                    $update_qry = $conn->query("UPDATE tbl_employee SET pos_id = '$lastId' WHERE id = '$employee_id'");

                    
                    // Display a JavaScript alert if data is inserted successfully
                    if($update_qry){
                        echo "<script>
                        swal.fire({
                            title: 'Good job!',
                            text: 'You clicked the button!',
                            icon: 'success',
                        }).then((result) => {
                            // Redirect to 201.php after the SweetAlert is closed
                            if (result.isConfirmed || result.isDismissed) {
                                window.location.href = '../201.php';
                            }
                        });
                    </script>";
                    }
                    
                }
                else{
                    echo "Error pag kuh ahan last ID ha tbl_pos";
                }
                
                
               
            } else {
                // Display a JavaScript alert for an error
                echo "<script>alert('Error: " . $stmt->error . "');</script>";
            }
    
        
        
    } else {
        // If the form is accessed directly without submission, you can redirect or handle it as needed
        echo "<script>alert('Access denied!');</script>";
    }
?>

</body>

</html>