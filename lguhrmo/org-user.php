<?php
session_start();
include('conn.php');

if (isset($_SESSION['usertype'])) {
    if (session_status() === PHP_SESSION_ACTIVE) {
        $role = $_SESSION['usertype'];
        if ($role == "PESO") {
            ?>



<!doctype html>
<html lang="en">


<!-- Mirrored from www.bootstrap.gallery/demos/vivo-admin-theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Nov 2023 07:46:09 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Melon - Responsive Bootstrap 5 Dashboard Template">
    <meta name="author" content="Bootstrap Gallery" />
    <link rel="canonical" href="https://www.bootstrap.gallery/">
    <meta property="og:url" content="https://www.bootstrap.gallery/">
    <meta property="og:title" content="Admin Templates - Dashboard Templates | Bootstrap Gallery">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <meta property="og:site_name" content="Bootstrap Gallery">
    <link rel="shortcut icon" href="assets/images/favicon.svg">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="shortcut icon" href="img/lgu.png">

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


    <!-- *************
			************ Vendor Css Files *************
		************ -->

    <!-- Scrollbar CSS -->
    <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css">

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
                        <a href="dashboard.php">Flowchart</a>
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

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="d-flex">
                            <button class="btn btn-success rounded" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" type="button">
                                <div class="wrapper">
                                    <span>Add Flowchart</span>
                                </div>
                            </button>

                            <!-- Add some space using CSS margin -->
                            <div style="margin-right: 10px;"></div>
                            <a href="https://app.diagrams.net/#HOnlineEditor" target="_blank">
                                <button class="btn btn-primary rounded" data-bs-toggle="modal"
                                    data-bs-target="#secondModal" type="button">
                                    <div class="wrapper">
                                        <span>Open Draw io</span>
                                    </div>
                                </button>
                            </a>



                        </div>
                    </div>
                </div>
            </div>



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <!-- Added modal-lg to make the modal larger -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Iframe link</h5>
                            <p><em>Note: Draw.io Iframe link should be posted at the URL.</em></p>
                        </div>
                        <div class="modal-body">
                            <form action="user/insert-user.php" method="post">
                                <div class="mb-3">
                                    <label for="office" class="form-label">Org name:</label>
                                    <input type="text" id="office" name="office" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label for="drawio" class="form-label">Enter Draw.io Diagram URL:</label>
                                    <input type="text" id="drawio" name="drawio" class="form-control" required>
                                </div>
                                <br><br>
                                <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                                <!-- Added Bootstrap class for styling -->
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <style>
            .container {
                max-height: 500px;
                /* Set a max height for the container */
                overflow-y: auto;
                /* Add vertical scroll bar when content overflows */
            }
            </style>






            <div class="container">
                <form action="org-user.php" method="get">
                    <div class="form-group">
                        <label for="office" class="form-label">Select Org Name:</label>
                        <select class="form-control" id="office" name="office" aria-label="Default select example"
                            required>
                            <?php

                    // Fetch a list of organization names from the database
                    $sql = "SELECT office FROM `tbl_flowchart`";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<option value="' . $row['office'] . '">' . $row['office'] . '</option>';
                        }
                    }
                    ?>
                        </select>
                    </div>
                    <br>

                    <!-- Use a button element for better user experience -->
                    <button type="submit" class="btn btn-primary">Display</button>
                </form>
            </div>

            <?php
                        if (isset($_GET['office'])) {
                            $office = $_GET['office'];

                            // Fetch the data for the selected office
                            $sql = "SELECT * FROM `tbl_flowchart` WHERE office = ?";
                            $stmt = mysqli_prepare($conn, $sql);

                            if ($stmt) {
                                mysqli_stmt_bind_param($stmt, 's', $office);
                                mysqli_stmt_execute($stmt);

                                $result = mysqli_stmt_get_result($stmt);

                                // Check if a row was returned
                                if ($row = mysqli_fetch_assoc($result)) {
                                    echo "<h3>Flowchart ID: " . $row['id'] . "</h3>";
                                    echo "<h4>Office Name: " . $row['office'] . "</h4>";
                                    echo "<h4>Flowchart: " . $row['drawio'] . "</h4>";

                                    // Delete button with data attribute for office ID
                                   
                                } else {
                                    echo "<p>Record not found.</p>";
                                }

                                mysqli_stmt_close($stmt);
                            } else {
                                die(mysqli_error($conn));
                            }
                        }
                        ?>

        </div>

    </div>
    <!-- *************
				************ Main container end *************
			************* -->

    </div>
    
  

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
