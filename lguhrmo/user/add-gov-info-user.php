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

            $latest_id = $conn->query("UPDATE tbl_employee SET req_id = $new_id WHERE id = $employee_id");
            if($latest_id){
                echo "<script>alert('Data inserted successfully!');</script>";

                // Redirect to 201.php
                echo "<script>window.location = '../201-user.php';</script>";
            }
            
        }
        else{
            echo "Error pag kuh ahan last ID ha tbl_pos";
        }
        
        }

?>