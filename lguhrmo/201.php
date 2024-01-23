<?php
session_start();
include('conn.php');


// Session for user restriction
if (isset($_SESSION['usertype'])) {
    if (session_status() === PHP_SESSION_ACTIVE) {
        $role = $_SESSION['usertype'];
        if ($role == "ADMIN") {
?>



<!doctype html>
<html lang="en">


<!-- Mirrored from www.bootstrap.gallery/demos/vivo-admin-theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Nov 2023 07:46:09 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/lgu.png">
    <!-- Meta -->


    <!-- Title -->
    <title>HRMO System</title>


    <!-- *************
			************ Common Css Files *************
		************ -->

    <!-- Animated css -->
    <link rel="stylesheet" href="assets/css/animate.css">

    <!-- Bootstrap font icons css -->
    <link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/main.min.css">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <!-- *************
			************ Vendor Css Files *************
		************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- Sidebar wrapper start -->
        <nav class="sidebar-wrapper">

            <!-- Sidebar brand starts -->
            <div class="sidebar-brand">
                <a class="logo">
                    <img src="img/lgu.png" style="width: 60px; height: 100px;" />
                </a>
                <div class="d-flex justify-content-center p-1">
                    <h6>LGU Carigara</h6>
                </div>
                <div class="d-flex justify-content-center p-1">
                    <h6>Admin Panel</h6>
                </div>
            </div>
            <!-- Sidebar brand starts -->

            <!-- Sidebar menu starts -->
            <div class="sidebar-menu">
                <div class="sidebarMenuScroll">
                    <ul>
                        <li class="sidebar ">
                            <a href="dashboard.php">
                                <i class="bi bi-house"></i>
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar">
                            <a href="201.php">
                                <i class="bi bi-columns-gap"></i>
                                <span class="menu-text">201 Files</span>
                            </a>
                        </li>
                        <li class="sidebar ">
                            <a href="index.php">
                                <i class="bi bi-stickies"></i>
                                <span class="menu-text">Accounts</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href="org.php">
                                <i class="bi bi-diagram-2"></i>
                                <span class="menu-text">Flowchart</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href="PESO.php">
                                <i class="bi bi-archive"></i>
                                <span class="menu-text">PESO Files</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href="imageview.php">
                                <i class="bi bi-card-image"></i>
                                <span class="menu-text">PESO Image Files</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Sidebar menu ends -->

        </nav>
        <!-- Sidebar wrapper end -->

        <!-- *************
				************ Main container start *************
			************* -->
        <div class="main-container">

            <!-- Page header starts -->
            <div class="page-header">

                <div class="toggle-sidebar" id="toggle-sidebar"><i class="bi bi-list"></i></div>

                <!-- Breadcrumb start -->
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <i class="bi bi-house"></i>
                        <a>201 files</a>
                    </li>
                </ol>
                <!-- Breadcrumb end -->

                <!-- Header actions ccontainer start -->
                <div class="header-actions-container">
                    <div class="container-fluid g-0">
                        <div class="row">
                            <div class="col-lg-12 p-0 ">
                                <div class="header_iner d-flex justify-content-between align-items-center">
                                    <div class="sidebar_icon d-lg-none">
                                        <i class="ti-menu"></i>
                                    </div>
                                    <div class="header_right d-flex justify-content-between align-items-center">
                                    </div>
                                    <div class="logout-container">
                                        <form action="php/logout.php" method="post">
                                            <button class="btn btn-danger">
                                                <div class="sign">
                                                </div>
                                                <div class="text">Logout</div>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php

                        // Check if the form is submitted
                        if (isset($_POST['submit'])) {
                            // Retrieve form data
                            $fam_name = $_POST['fam_name'];
                            $first_name = $_POST['first_name'];
                            $mid_name = $_POST['mid_name'];
                            $gender = $_POST['gender'];
                            $birth_date = $_POST['birth_date'];
                            $age = $_POST['age'];
                            $address = $_POST['address'];
                            $contact_no = $_POST['contact_no'];
                            $status = $_POST['status'];

                            // Create a prepared statement for inserting data
                            $insertSql = "INSERT INTO tbl_employee (fam_name, first_name, mid_name, gender, birth_date, age, address, contact_no, status)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";

                            // Prepare the statement
                            $stmt = mysqli_prepare($conn, $insertSql);

                            if ($stmt) {
                                // Bind parameters and execute the statement
                                mysqli_stmt_bind_param($stmt, "sssssssss", $fam_name, $first_name, $mid_name, $gender, $birth_date, $age, $address, $contact_no, $status);

                                if (mysqli_stmt_execute($stmt)) {

                                    // Add a JavaScript alert to notify the user
                                    echo '<script>swal("Data successfully added", "", "success");</script>';
                                    // echo "<script>window.location = '201.php';</script>";
                                } else {
                                    // Error occurred while inserting data
                                    echo "Error: " . mysqli_error($conn);
                                }

                                // Close the statement
                                mysqli_stmt_close($stmt);
                            } else {
                                // Handle the error if the prepared statement fails
                                echo "Error: " . mysqli_error($conn);
                            }
                        }
                        ?>


            <div class="container mt-2 mb-3">
                <div class="d-flex justify-content-start flex-wrap" style="margin: 10px;">
                    <button type="button" class="btn btn-primary mb-2 mx-2" data-bs-toggle="modal"
                        data-bs-target="#employeeModal">
                        Add Employee
                    </button>

                    <button type="button" class="btn btn-primary mb-2 mx-2" data-bs-toggle="modal"
                        data-bs-target="#customModal">
                        Add other information
                    </button>

                    <button type="button" class="btn btn-primary mb-2 mx-2" data-bs-toggle="modal"
                        data-bs-target="#customModal2">
                        Application for Promotion
                    </button>
                </div>

                <?php
                            $ret = "SELECT * FROM tbl_employee";
                            $query = mysqli_query($conn, $ret);
                            ?>




                <!--  Modal for add Employee form 1 -->
                <div class="modal fade" id="employeeModal" tabindex="-1" aria-labelledby="employeeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="employeeModalLabel">Employee Information</h5>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <form action="201.php" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="fam_name" class="form-label">Family Name<span
                                                            class="text-danger"> *</span></label>
                                                    <input type="text" class="form-control" id="fam_name"
                                                        name="fam_name" required placeholder="Smith">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="first_name" class="form-label">First Name<span
                                                            class="text-danger"> *</span></label>
                                                    <input type="text" class="form-control" id="first_name"
                                                        name="first_name" required placeholder="John">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="mid_name" class="form-label">Middle Name
                                                        (optional)</label>
                                                    <input type="text" class="form-control" id="mid_name"
                                                        name="mid_name">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="gender" class="form-label">Gender<span
                                                            class="text-danger">*</span></label>
                                                    <select class="form-select" id="gender" name="gender" required>
                                                        <option>Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="birth_date" class="form-label">Birthday<span
                                                            class="text-danger"> *</span></label>
                                                    <input type="date" id="birth_date" class="form-control"
                                                        name="birth_date" onchange="calculateAge()" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="age" class="form-label">Age<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" id="age" class="form-control" name="age" required
                                                        placeholder="Auto-calculated" readonly>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" id="address" name="address"
                                                        required placeholder="Brgy/Municipality/Province">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="contact_no" class="form-label">Contact Number</label>
                                                    <input type="text" class="form-control" id="contact_no"
                                                        name="contact_no" required placeholder="09********">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="dropdownMenu" class="form-label">Select employment
                                                    status</label>
                                                <select class="form-select" id="dropdownMenu" name="status" required>
                                                    <option>Select</option>
                                                    <option value="regular">Regular</option>
                                                    <option value="casual">Casual</option>
                                                    <option value="jo">Job Order</option>
                                                    <option value="contractual">Contractual</option>
                                                    <option value="co-terminous">Co-Terminous</option>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="d-flex justify-content-end ">
                                            <button type="button" class="btn btn-danger me-2"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" value="submit"
                                                class="btn btn-primary me-2">Submit</button>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Modal for add other information -->
                <div class="modal fade" id="customModal" tabindex="-1" aria-labelledby="customModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="customModalLabel">Add Other Information</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">

                                    <form action="php/add-dept.php" method="post">
                                        <div class="mb-3">
                                            <label for="employee_id" class="form-label">Select Employee</label>
                                            <select name="employee_id" id="employee_id" class="form-select">
                                                <option>Select</option>
                                                <?php
                                                            while ($row = $query->fetch_assoc()) {
                                                                echo "<option value='" . $row['id'] . "'>" . $row['first_name'] . "</option>";
                                                            }
                                                            ?>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="dept" class="form-label">Department</label>
                                                    <input name="dept" id="dept" type="text" class="form-control"
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="salary_grade" class="form-label">Salary Grade</label>
                                                    <input name="salary_grade" id="salary_grade" type="text"
                                                        class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="rate" class="form-label">Rate</label>
                                                    <input name="rate" id="rate" type="text" class="form-control"
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="position" class="form-label">Position</label>
                                                    <input name="position" id="position" type="text"
                                                        class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="ee_no" class="form-label">EE Number</label>
                                                    <input name="ee_no" id="ee_no" type="text" class="form-control"
                                                        required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="date_started" class="form-label">Date Started</label>
                                                    <input name="date_started" id="date_started" type="date"
                                                        class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="years_of_service" class="form-label">Years of
                                                        Service</label>
                                                    <input name="years_of_service" id="years_of_service" type="text"
                                                        class="form-control" placeholder="Auto-calculated" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label for="tin" class="form-label">TIN</label>
                                                    <input name="tin" id="tin" type="text" class="form-control"
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="gsis_no" class="form-label">GSIS No</label>
                                                    <input name="gsis_no" id="gsis_no" type="text" class="form-control"
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="phic" class="form-label">PHIC</label>
                                                    <input name="phic" id="phic" type="text" class="form-control"
                                                        required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="pag_ibig" class="form-label">Pagibig</label>
                                                    <input name="pag_ibig" id="pag_ibig" type="text"
                                                        class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="educ_attain" class="form-label">Educational
                                                        Attainment</label>
                                                    <input name="educ_attain" id="educ_attain" type="text"
                                                        class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="eligibility" class="form-label">Eligibility</label>
                                                    <input name="eligibility" id="eligibility" type="text"
                                                        class="form-control" required>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="masteral" class="form-label">Masteral</label>
                                                    <input name="masteral" id="masteral" type="text"
                                                        class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end ">
                                            <button type="button" class="btn btn-danger me-2"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" value="submit"
                                                class="btn btn-primary me-2">Submit</button>

                                        </div>



                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Modal for button 3 requirements -->
                <?php
                            $ret = "SELECT * FROM tbl_employee";
                            $query = mysqli_query($conn, $ret);

                            ?>
                <div class="modal fade" id="customModal2" tabindex="-1" aria-labelledby="customModalLabel2"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="customModalLabel2">Application for Promotion</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <form action="php/add-gov-info.php" method="post">
                                        <div class="mb-3">
                                            <label for="employee_id" class="form-label">Select Employee</label>
                                            <select name="employee_id" id="employee_id" class="form-select">
                                                <option>Select</option>
                                                <?php
                                                            while ($row = $query->fetch_assoc()) {
                                                                echo "<option value='" . $row['id'] . "'>" . $row['first_name'] . "</option>";
                                                            }
                                                            ?>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="requirement1" class="form-label">Requirement 1</label>
                                            <input type="text" name="requirement1" id="requirement1"
                                                class="form-control" placeholder="Enter Requirement">
                                        </div>

                                        <div class="mb-3">
                                            <label for="requirement2" class="form-label">Requirement 2</label>
                                            <input type="text" name="requirement2" id="requirement2"
                                                class="form-control" placeholder="Enter Requirement">
                                        </div>
                                        <div class="mb-3">
                                            <label for="requirement3" class="form-label">Requirement 3</label>
                                            <input type="text" name="requirement3" id="requirement3"
                                                class="form-control" placeholder="Enter Requirement">
                                        </div>
                                        <div class="mb-3">
                                            <label for="requirement4" class="form-label">Requirement 4</label>
                                            <input type="text" name="requirement4" id="requirement4"
                                                class="form-control" placeholder="Enter Requirement">
                                        </div>
                                        <div class="mb-3">
                                            <label for="requirement5" class="form-label">Requirement 5</label>
                                            <input type="text" name="requirement5" id="requirement5"
                                                class="form-control" placeholder="Enter Requirement">
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-danger me-2"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="submit" value="submit"
                                                class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
            chris {
                width: 80%;
                /* Adjust the width as needed */
                border-collapse: collapse;
                margin: 10px;
                /* Add some margin for spacing */
            }

            tr,
            th {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
                /* Add a border for better visibility */
            }
            </style>

            <div class="content-wrapper">
                <h2>Employee Data Table</h2>
                <table id="table" class="table custom-table">
                    <thead>
                        <tr>

                            <th>Last Name</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Gender</th>
                            <th>Birth Date</th>
                            <th>Age</th>
                            <th>Contact No</th>
                            <th>Employment</th>
                            <th>Last Update</th>
                            <th>Action</th> <!-- Move the Action heading here -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                    $sql = $conn->query("SELECT * FROM tbl_employee INNER JOIN tbl_pos ON tbl_pos.u_id = tbl_employee.pos_id 
                INNER JOIN tbl_requirements ON tbl_requirements.u_id = tbl_employee.req_id");
                                    while ($row = $sql->fetch_assoc()) :
                                    ?>
                        <tr>

                            <td><?php echo $row['fam_name'] ?></td>
                            <td><?php echo $row['first_name'] ?></td>
                            <td><?php echo $row['mid_name'] ?></td>
                            <td><?php echo $row['gender'] ?></td>
                            <td><?php echo $row['birth_date'] ?></td>
                            <td><?php echo $row['age'] ?></td>
                            <td><?php echo $row['contact_no'] ?></td>
                            <td><?php echo $row['status'] ?></td>
                            <td><?php echo $row['last_execution_date'] ?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <!-- Add your dropdown items here -->


                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#viewModal<?php echo $row['id'] ?>"
                                                style="font-size: 15px; font-weight: bold;"><i
                                                    class="bi bi-eye-fill"></i>
                                                View
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#editModal<?php echo $row['id'] ?>"
                                                style="font-size: 14px; font-weight: bold;"><i
                                                    class="bi bi-pencil-square"></i>
                                                Edit Employee
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#workingModal<?php echo $row['id'] ?>"
                                                style="font-size: 14px; font-weight: bold;"><i
                                                    class="bi bi-pencil-square"></i>
                                                Edit Other Information
                                            </button>
                                        </li>
                                        <li>
                                            <button class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#updateRequirementsModal<?php echo $row['id'] ?>"
                                                style="font-size: 14px; font-weight: bold;"><i
                                                    class="bi bi-pencil-square"></i>
                                                Update Requirements
                                            </button>
                                        </li>
                                    </ul>


                                </div>


                                <!-- Modal for View -->
                                <div class="modal fade" id="viewModal<?php echo $row['id'] ?>" tabindex="-1"
                                    aria-labelledby="viewModalLabel<?php echo $row['id'] ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="viewModalLabel<?php echo $row['id'] ?>">
                                                    Employee Details</h5>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container">
                                                    <div class="row">
                                                        <!-- Left Column -->
                                                        <div class="col-md-6">
                                                            <p><strong>Family Name:</strong>
                                                                <?php echo $row['fam_name'] ?></p>
                                                            <p><strong>First Name:</strong>
                                                                <?php echo $row['first_name'] ?></p>
                                                            <p><strong>Middle Name:</strong>
                                                                <?php echo $row['mid_name'] ?></p>
                                                            <p><strong>Gender:</strong> <?php echo $row['gender'] ?></p>
                                                            <p><strong>Birth Date:</strong>
                                                                <?php echo $row['birth_date'] ?></p>
                                                            <p><strong>Age:</strong> <?php echo $row['age']; ?></p>
                                                            <p><strong>Address:</strong> <?php echo $row['address']; ?>
                                                            </p>
                                                            <p><strong>Contact Number:</strong>
                                                                <?php echo $row['contact_no'] ?></p>
                                                            <p><strong>Department:</strong> <?php echo $row['dept'] ?>
                                                            </p>
                                                            <p><strong>Employment Status:</strong>
                                                                <?php echo $row['status'] ?></p>
                                                            <p><strong>Salary Grade:</strong>
                                                                <?php echo $row['salary_grade'] ?></p>
                                                            <p><strong>Rate:</strong> <?php echo $row['rate'] ?></p>
                                                            <p><strong>Position:</strong> <?php echo $row['position'] ?>
                                                            </p>
                                                            <p><strong>EE Number:</strong> <?php echo $row['ee_no'] ?>
                                                            </p>
                                                        </div>

                                                        <!-- Right Column -->
                                                        <div class="col-md-6">

                                                            <p><strong>Years of Service:</strong>
                                                                <?php echo $row['years_of_service'] ?></p>
                                                            <p><strong>Date Started:</strong>
                                                                <?php echo $row['date_started'] ?></p>
                                                            <p><strong>TIN:</strong> <?php echo $row['tin'] ?></p>
                                                            <p><strong>GSIS Number:</strong>
                                                                <?php echo $row['gsis_no'] ?></p>
                                                            <p><strong>PHIC:</strong> <?php echo $row['phic'] ?></p>
                                                            <p><strong>PAGIBIG:</strong> <?php echo $row['pag_ibig'] ?>
                                                            </p>
                                                            <p><strong>Educational Attainments:</strong>
                                                                <?php echo $row['educ_attain'] ?></p>
                                                            <p><strong>Eligibility:</strong>
                                                                <?php echo $row['eligibility'] ?></p>
                                                            <p><strong>Masteral:</strong> <?php echo $row['masteral'] ?>
                                                            </p>

                                                            <p><strong>Requirements for Application Promotion:</strong>
                                                            </p>
                                                            <ul>
                                                                <li>Requirement 1: <?php echo $row['requirement1'] ?>
                                                                </li>
                                                                <li>Requirement 2: <?php echo $row['requirement2'] ?>
                                                                </li>
                                                                <li>Requirement 3: <?php echo $row['requirement3'] ?>
                                                                </li>
                                                                <li>Requirement 4: <?php echo $row['requirement4'] ?>
                                                                </li>
                                                                <li>Requirement 5: <?php echo $row['requirement5'] ?>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>

                            </td>
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

                                                            if ($updateAge && $age >= 60 && $age <= 64) {
                                                                echo "<div class='d-flex justify-content-center align-items-center mt-3'>
                                                                <div class='toast show position-fixed top-0 end-0 custom-toast' role='alert' aria-live='assertive' aria-atomic='true'>
                                                                    <div class='toast-header'>
                                                                        EMPLOYEE IS READY FOR RETIREMENT
                                                                        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                                                                    </div>
                                                                    <div class='toast-body'>
                                                                        <strong>Employee $first_name is ready for Retirement</strong>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                                            
                                                            
                                                            // CSS (you can include this in your existing stylesheet or in a <style> tag in the HTML):
                                                            echo "<style>
                                                                .custom-toast {
                                                                    background-color: #2B2A4C;
                                                                    color: #ffffff;
                                                                }
                                                            </style>";
                                                            
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                <?php
                                                   
                                                    
                                                   if (isset($_SESSION['usertype'])) {
                                                       $role = $_SESSION['usertype'];
   
                                                       if ($role == "ADMIN") {
   
                                                           $first_name = $row['first_name'];
                                                           $fam_name = $row['fam_name'];
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
   
                                                               if ($updateAge && $age == 65) {
                                                                echo "<div class='d-flex justify-content-end'>
                                                                <div class='toast show position-fixed top-0 end-0 custom-toast' role='alert' aria-live='assertive' aria-atomic='true'>
                                                                    <div class='toast-header'>
                                                                        EMPLOYEE MUST RETIRE
                                                                        <button type='button' class='btn-close' data-bs-dismiss='toast' aria-label='Close'></button>
                                                                    </div>
                                                                    <div class='toast-body'>
                                                                        <strong>Employee $first_name must retire</strong>
                                                                    </div>
                                                                </div>
                                                            </div>";
                                                            
                                                            // CSS (you can include this in your existing stylesheet or in a <style> tag in the HTML):
                                                            echo "<style>
                                                                .custom-toast {
                                                                    background-color: #B31312;
                                                                    color: #ffffff;
                                                                }
                                                            </style>";
                                                            
                                                               }
                                                           }
                                                       }
                                                   }
                                                   ?>



                                <!-- Modal for Editing Employee THE ONE AT THE DATA TABLE -->
                            <div class="modal fade" id="editModal<?php echo $row['id'] ?>" tabindex="-1"
                                aria-labelledby="editModalLabel<?php echo $row['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel<?php echo $row['id'] ?>">Edit
                                                Employee
                                                Information</h5>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Add a form for updating employee information here -->
                                            <form action="php/update_employee.php" method="post">
                                                <input type="hidden" name="employee_id"
                                                    value="<?php echo $row['id'] ?>">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="fam_name" class="form-label">Family Name</label>
                                                            <input type="text" class="form-control" id="fam_name"
                                                                name="fam_name" value="<?php echo $row['fam_name'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="first_name" class="form-label">First
                                                                Name</label>
                                                            <input type="text" class="form-control" id="first_name"
                                                                name="first_name"
                                                                value="<?php echo $row['first_name'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="mid_name" class="form-label">Middle Name</label>
                                                            <input type="text" class="form-control" id="mid_name"
                                                                name="mid_name" value="<?php echo $row['mid_name'] ?>">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6">

                                                        <div class="mb-3">
                                                            <label for="address" class="form-label">Address</label>
                                                            <input type="text" class="form-control" id="address"
                                                                name="address" value="<?php echo $row['address'] ?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="contact_no" class="form-label">Contact
                                                                No</label>
                                                            <input type="text" class="form-control" id="contact_no"
                                                                name="contact_no"
                                                                value="<?php echo $row['contact_no'] ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="status" class="form-label">Employment
                                                                Status:</label>
                                                            <select class="form-select" id="status" name="status">
                                                               
                                                                <option value="regular"
                                                                    <?php echo ($row['status'] == 'regular') ? 'selected' : ''; ?>>
                                                                    Regular</option>
                                                                <option value="casual"
                                                                    <?php echo ($row['status'] == 'casual') ? 'selected' : ''; ?>>
                                                                    Casual</option>
                                                                <option value="jo"
                                                                    <?php echo ($row['status'] == 'jo') ? 'selected' : ''; ?>>
                                                                    Job Order</option>
                                                                <option value="contractual"
                                                                    <?php echo ($row['status'] == 'contractual') ? 'selected' : ''; ?>>
                                                                    Contractual</option>
                                                                <option value="co-terminous"
                                                                    <?php echo ($row['status'] == 'co-terminous') ? 'selected' : ''; ?>>
                                                                    Co-Terminous</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                    <!-- Add more form fields for editing employee information here -->

                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" class="btn btn-danger me-2"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="update"
                                                            class="btn btn-primary">Update</button>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>




                            <!-- Edit Other Information Modal -->
                            <div class="modal fade" id="workingModal<?php echo $row['id'] ?>" tabindex="-1"
                                role="dialog" aria-labelledby="workingModalLabel<?php echo $row['id'] ?>"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="workingModalLabel">Edit Other Information</h5>
                                        </div>
                                        <div class="modal-body">
                                            <form action="php/information.php" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input type="hidden" name="employee_id"
                                                            value="<?php echo $row['id']; ?>">

                                                        <div class="mb-3">
                                                            <label for="dept"
                                                                class="form-label"><strong>Department:</strong></label>
                                                            <input type="text" class="form-control" id="dept"
                                                                name="dept" value="<?php echo $row['dept']; ?>">
                                                        </div>


                                                        <div class="mb-3">
                                                            <label for="salary_grade" class="form-label"><strong>Salary
                                                                    Grade:</strong></label>
                                                            <input type="text" class="form-control" id="salary_grade"
                                                                name="salary_grade"
                                                                value="<?php echo $row['salary_grade']; ?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="rate"
                                                                class="form-label"><strong>Rate:</strong></label>
                                                            <input type="text" class="form-control" id="rate"
                                                                name="rate" value="<?php echo $row['rate']; ?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="position"
                                                                class="form-label"><strong>Position:</strong></label>
                                                            <input type="text" class="form-control" id="position"
                                                                name="position" value="<?php echo $row['position']; ?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="ee_no" class="form-label"><strong>EE
                                                                    Number:</strong></label>
                                                            <input type="text" class="form-control" id="ee_no"
                                                                name="ee_no" value="<?php echo $row['ee_no']; ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="date_started" class="form-label"><strong>Date
                                                                    Started:</strong></label>
                                                            <input type="date" class="form-control" id="date_started"
                                                                name="date_started"
                                                                value="<?php echo $row['date_started']; ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="years_of_service"
                                                                class="form-label"><strong>Years of
                                                                    Service:</strong></label>
                                                            <input type="text" class="form-control"
                                                                id="years_of_service" name="years_of_service"
                                                                value="<?php echo $row['years_of_service']; ?>">
                                                        </div>


                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="mb-3">
                                                            <label for="tin"
                                                                class="form-label"><strong>TIN:</strong></label>
                                                            <input type="text" class="form-control" id="tin" name="tin"
                                                                value="<?php echo $row['tin']; ?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="gsis_no" class="form-label"><strong>GSIS
                                                                    Number:</strong></label>
                                                            <input type="text" class="form-control" id="gsis_no"
                                                                name="gsis_no" value="<?php echo $row['gsis_no']; ?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="phic"
                                                                class="form-label"><strong>PHIC:</strong></label>
                                                            <input type="text" class="form-control" id="phic"
                                                                name="phic" value="<?php echo $row['phic']; ?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="pag_ibig"
                                                                class="form-label"><strong>PAGIBIG:</strong></label>
                                                            <input type="text" class="form-control" id="pag_ibig"
                                                                name="pag_ibig" value="<?php echo $row['pag_ibig']; ?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="educ_attain"
                                                                class="form-label"><strong>Educational
                                                                    Attainments:</strong></label>
                                                            <input type="text" class="form-control" id="educ_attain"
                                                                name="educ_attain"
                                                                value="<?php echo $row['educ_attain']; ?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="eligibility"
                                                                class="form-label"><strong>Eligibility:</strong></label>
                                                            <input type="text" class="form-control" id="eligibility"
                                                                name="eligibility"
                                                                value="<?php echo $row['eligibility']; ?>">
                                                        </div>

                                                        <div class="mb-3">
                                                            <label for="masteral"
                                                                class="form-label"><strong>Masteral:</strong></label>
                                                            <input type="text" class="form-control" id="masteral"
                                                                name="masteral" value="<?php echo $row['masteral']; ?>">
                                                        </div>
                                                        <div class="d-flex justify-content-end">
                                                            <button type="button" class="btn btn-danger me-2"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" name="update"
                                                                class="btn btn-primary">Update</button>

                                                        </div>
                                                    </div>
                                                </div>
                                            </form>

                                        </div>

                                    </div>
                                </div>
                            </div>



                            <!-- Update Requirements Modal -->
                            <div class="modal fade" id="updateRequirementsModal<?php echo $row['id'] ?>" tabindex="-1"
                                aria-labelledby="updateRequirementsModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="updateRequirementsModalLabel">Update
                                                Requirements</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- Your form for updating requirements goes here -->
                                            <form action="php/update_req.php" method="POST">
                                                <input type="hidden" name="employee_id"
                                                    value="<?php echo $row['id']; ?>">

                                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                <?php $requirementKey = 'requirement' . $i; ?>
                                                <div class="mb-3">
                                                    <label for="<?php echo $requirementKey ?>" class="form-label">
                                                        <?php echo ucfirst($requirementKey); ?>
                                                    </label>
                                                    <input type="text" name="<?php echo $requirementKey ?>"
                                                        id="<?php echo $requirementKey ?>" class="form-control"
                                                        value="<?php echo $row[$requirementKey]; ?>">
                                                </div>
                                                <?php endfor; ?>

                                                <div class="d-flex justify-content-end">
                                                    <button type="button" class="btn btn-danger me-2"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" name="submit" value="submit"
                                                        class="btn btn-primary">Update
                                                        Requirements</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </tr>
                        <?php endwhile; ?>

                    </tbody>
                </table>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

        <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
        new DataTable('#table');
        </script>

        <script>
        function calculateAge() {
            var birthDate = new Date(document.getElementById("birth_date").value);
            var currentDate = new Date();

            var age = currentDate.getFullYear() - birthDate.getFullYear();

            // Adjust age if the birthday hasn't occurred yet this year
            if (currentDate.getMonth() < birthDate.getMonth() ||
                (currentDate.getMonth() === birthDate.getMonth() && currentDate.getDate() < birthDate.getDate())) {
                age--;
            }

            document.getElementById("age").value = age;
        }
        </script>

        <script>
        $(document).ready(function() {
            // Update the 'Years of Service' when the 'Date Started' changes
            $('#date_started').on('change', function() {
                calculateYearsOfService();
            });

            // Initial calculation
            calculateYearsOfService();

            function calculateYearsOfService() {
                var dateStarted = new Date($('#date_started').val());
                var currentDate = new Date();

                var yearsDiff = currentDate.getFullYear() - dateStarted.getFullYear();

                // Adjust for cases where the anniversary hasn't occurred yet this year
                if (currentDate.getMonth() < dateStarted.getMonth() ||
                    (currentDate.getMonth() === dateStarted.getMonth() && currentDate.getDate() < dateStarted
                        .getDate())) {
                    yearsDiff--;
                }

                // Update the 'Years of Service' input
                $('#years_of_service').val(yearsDiff);
            }
        });
        </script>
        <!-- Page wrapper end -->

        <!-- *************
			************ Required JavaScript Files *************
		************* -->
        <!-- Required jQuery first, then Bootstrap Bundle JS -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/modernizr.js"></script>
        <script src="assets/js/moment.js"></script>

        <!-- *************
			************ Vendor Js Files *************
		************* -->

        <!-- Overlay Scroll JS -->
        <script src="assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js"></script>
        <script src="assets/vendor/overlay-scroll/custom-scrollbar.js"></script>

        <!-- Apex Charts -->
        <script src="assets/vendor/apex/apexcharts.min.js"></script>
        <script src="assets/vendor/apex/custom/analytics/byChannel.js"></script>
        <script src="assets/vendor/apex/custom/analytics/byCountry.js"></script>
        <script src="assets/vendor/apex/custom/analytics/byDevice.js"></script>
        <script src="assets/vendor/apex/custom/analytics/orders.js"></script>
        <script src="assets/vendor/apex/custom/analytics/results.js"></script>
        <script src="assets/vendor/apex/custom/analytics/visitors.js"></script>
        <script src="assets/vendor/apex/custom/analytics/demography.js"></script>
        <script src="assets/vendor/apex/custom/analytics/deals.js"></script>

        <!-- Vector Maps -->
        <script src="assets/vendor/jvectormap/jquery-jvectormap-2.0.5.min.js"></script>
        <script src="assets/vendor/jvectormap/world-mill-en.js"></script>
        <script src="assets/vendor/jvectormap/gdp-data.js"></script>
        <script src="assets/vendor/jvectormap/custom/world-map-markers.js"></script>

        <!-- Circleful -->
        <script src="assets/vendor/circliful/circliful.min.js"></script>
        <script src="assets/vendor/circliful/circliful.custom.js"></script>

        <!-- Main Js Required -->
        <script src="assets/js/main.js"></script>

</body>


<!-- Mirrored from www.bootstrap.gallery/demos/vivo-admin-theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Nov 2023 07:47:57 GMT -->

</html>
<?php
        }
    }
} else {
    echo '<script>alert("Please login first");</script>';
    echo '<script>window.location.href = "login.php";</script>';
}
?>