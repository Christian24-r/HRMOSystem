<?php
session_start();
include('conn.php');

if (isset($_SESSION['usertype'])) {
    if (session_status() === PHP_SESSION_ACTIVE) {
        $role = $_SESSION['usertype'];
        if ($role == "PESO") {
            ?>


<!-- Adding the PDF to the database -->
<?php
if (isset($_POST['btn_img'])) {

    $filename = $_FILES["choosefile"]["name"];
    $tempfile = $_FILES["choosefile"]["tmp_name"];
    $folder = "pdf/" . $filename;

    // Get the name from the input field
    $name = mysqli_real_escape_string($conn, $_POST['name']); // Sanitize input to prevent SQL injection

    $sql = "INSERT INTO `tbl_document`(`name`, `image`) VALUES ('$name', '$filename')";

    if ($filename == "") {
        echo "<div class='alert alert-danger' role='alert'>
                <h4 class='text-center'>Please choose a file to upload</h4>
            </div>";
    } else {
        $result = mysqli_query($conn, $sql);

        if ($result) {
            // Move the uploaded file to the "image" directory
            if (move_uploaded_file($tempfile, $folder)) {
                echo '<script>alert("Data Inserted Successfully");</script>';
                echo "<script>window.location = 'PESO-user.php';</script>";
            } else {
                echo '<script>alert("Data not inserted");</script>';
            }
        } else {
            echo '<script>alert("Error");</script>';
        }
    }
}
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



    <!-- Bootstrap font icons css -->
    <link rel="stylesheet" href="assets/fonts/bootstrap/bootstrap-icons.css">

    <!-- Main css -->
    <link rel="stylesheet" href="assets/css/main.min.css">


    <!-- *************
			************ Vendor Css Files *************
		************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">

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
                    <h6>User Panel</h6>
                </div>
            </div>
            <!-- Sidebar brand starts -->

            <!-- Sidebar menu starts -->
            <div class="sidebar-menu">
                <div class="sidebarMenuScroll">
                    <ul>
                        <li class="sidebar ">
                            <a href="dashboard-user.php">
                                <i class="bi bi-house"></i>
                                <span class="menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href="org-user.php">
                                <i class="bi bi-diagram-2-fill"></i>
                                <span class="menu-text">Flowchart</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href="PESO-user.php">
                                <i class="bi bi-archive-fill"></i>
                                <span class="menu-text">PESO Files</span>
                            </a>
                        </li>
                        <li class="sidebar">
                            <a href="imageview-user.php">
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
                        <a href="index.php">Account</a>
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


            <!-- Content wrapper scroll start -->
            <div class="content-wrapper">
                <div class="content-wrapper">

                    <!-- Row start -->

                    <!-- Button for Adding the data -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 justify-content-start">
                                <button class="btn btn-success rounded mb-2" data-bs-toggle="modal"
                                    data-bs-target="#imageUploadModal" type="button">
                                    <div class="wrapper">
                                        <span>Add PDF</span>
                                    </div>
                                </button>
                                <!-- <button class="btn btn-success rounded mb-2" data-bs-toggle="modal" data-bs-target="#pdfUploadModal"
                        type="button">
                        <div class="wrapper">
                            <span>Add Image</span>
                        </div>
                    </button> -->
                            </div>
                        </div>
                    </div>



                    <!-- FOR UPLOADING PDF -->
                    <!-- Modal -->
                    <div class="modal fade" id="imageUploadModal" tabindex="-1" aria-labelledby="imageUploadModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="imageUploadModalLabel">Upload Pdf</h5>

                                </div>
                                <div class="modal-body">
                                    <form action="PESO-user.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="choosefile" class="form-label">Choose Image</label>
                                            <input type="file" class="form-control" name="choosefile" id="choosefile">
                                        </div>
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name" id="name">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <button type="submit" name="btn_img"
                                                    class="btn btn-success">Submit</button>
                                            </div>
                                            <div>
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>







                    <!-- FOR UPLOADING IMAGE -->

                    <?php
                                include_once ("conn.php");
                            $ret = "SELECT * FROM tbl_document";
                            $query = mysqli_query($conn, $ret);

                        ?>


                    <!-- Modal -->
                    <div class="modal fade" id="pdfUploadModal" tabindex="-1" aria-labelledby="pdfUploadModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="pdfUploadModalLabel">Upload Image</h5>

                                    <p><em>Note: Add Images or documented photos.</em></p>

                                </div>

                                <div class="modal-body">
                                    <!-- Add your form elements for uploading PDF here -->
                                    <form action="uploads.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="pdfFile" class="form-label">Choose JPG Image</label>
                                            <input type="file" class="form-control" name="pdfFile" id="pdfFile">
                                        </div>
                                        <!-- This is an HTML form element -->
                                        <select class="form-select" aria-label="Default select example">
                                            <?php 
                                                    while ($row = $query->fetch_assoc()) {
                                                    ?>
                                            <option value="<?php echo $row['id']; ?>" style="color: black;">
                                                <?php echo $row['name']; ?>
                                            </option>
                                            <?php
                                                }
                                                ?>
                                        </select>
                                        <div class="modal-footer">
                                            <div class="d-flex justify-content-between">
                                                <div class="mr-2">
                                                    <!-- Add margin-right class -->
                                                    <button type="submit" name="btn_img"
                                                        class="btn btn-success">Submit</button>
                                                </div>
                                                <div>
                                                    <button type="button" class="btn btn-danger"
                                                        data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>



                    <!-- Data table of PDF uploaded -->

                    <style>
                    /* Add your custom styles here */
                    body {
                        font-family: Arial, sans-serif;
                    }

                    table {
                        border-collapse: collapse;
                        width: 100%;
                        margin-top: 20px;
                    }

                    th,
                    td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: left;
                    }

                    th {
                        background-color: #f2f2f2;
                    }

                    .btn {
                        text-decoration: none;
                        padding: 5px 10px;
                        margin: 2px;
                        border-radius: 3px;
                        cursor: pointer;
                    }

                    .btn-danger {
                        background-color: #dc3545;
                        color: white;
                    }

                    .btn-primary {
                        background-color: #007bff;
                        color: white;
                    }
                    </style>



                    <table id="example" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Event Name</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql2 = "SELECT * FROM `tbl_document` WHERE 1";
                            $result2 = mysqli_query($conn, $sql2);

                            while ($fetch = mysqli_fetch_assoc($result2)) {
                            ?>
                            <tr>
                                <td><?php echo $fetch['id'] ?></td>
                                <td><?php echo $fetch['name'] ?></td>
                                <td>
                                    <!-- <a href="php/delete-peso.php?id=<?php echo $fetch['id'] ?>" class="btn btn-danger">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </a> -->

                                    <a href="view-pdf.php?id=<?php echo $fetch['id']; ?>" class="btn btn-primary"
                                        target="_blank">
                                        <i class="fa-solid fa-eye"></i> View
                                    </a>
                                </td>
                            </tr>
                            <?php
            }
            ?>
                        </tbody>
                    </table>

                    <!-- Row end -->




                </div>

            </div>
            <!-- Content wrapper scroll end -->

        </div>
        <!-- *************
				************ Main container end *************
			************* -->

    </div>
    <!-- Page wrapper end -->

    <!-- *************
			************ Required JavaScript Files *************
		************* -->
    <!-- Required jQuery first, then Bootstrap Bundle JS -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
    new DataTable('#example');
    </script>

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
    echo '<script>window.location.href = "loginindex.php";</script>';
}
?>
