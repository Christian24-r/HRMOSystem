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
    include("../conn.php");
    if ($_SERVER["REQUEST_METHOD"]=== "POST"){

    }

    $requirement1 = $_POST["requirement1"];
    $requirement2 = $_POST["requirement2"];
    $requirement3 = $_POST["requirement3"];
    $requirement4 = $_POST["requirement4"];
    $requirement5 = $_POST["requirement5"];


    //ID han employee didto han dropdown
    $employee_id = $_POST["employee_id"];

    $requirement = $conn->prepare("INSERT into tbl_requirements (requirement1,requirement2,requirement3,requirement4,requirement5,employee_id) VAlUES (?,?,?,?,?,?)");


    $requirement->bind_param("ssssss", $requirement1, $requirement2, $requirement3,   $requirement4, $requirement5 ,$employee_id);

    if($requirement->execute()){
        $update_query = $conn->prepare("SELECT * FROM tbl_requirements ORDER BY u_id DESC LIMIT 1");
        $update_query->execute();  // Add this line to execute the prepared statement
        $getEmpID = $update_query->get_result()->fetch_assoc();
        $new_id = $getEmpID["u_id"];
        
        
        
        if($new_id){

            $latest_id_query = $conn->prepare("UPDATE tbl_employee SET req_id = ? WHERE id = ?");
            $latest_id_query->bind_param("ii", $new_id, $employee_id);
            
            if ($latest_id_query->execute()) {
                echo "<script>
                    swal.fire({
                        title: 'Requirements Added!',
                        icon: 'success',
                    }).then((result) => {
                        // Redirect to 201.php after the SweetAlert is closed
                        if (result) {
                            window.location.href = '../201.php';
                        }
                    });
                </script>";
            } else {
                echo "Error updating req_id in tbl_employee: " . $latest_id_query->error;
            }
            
            $latest_id_query->close(); // Close the prepared statement
        }}            

?>
</body>

</html>