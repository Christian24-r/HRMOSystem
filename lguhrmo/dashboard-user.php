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
                                    <a href="dashboard.php">Dashboard</a>
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
                        <div class="content-wrapper-scroll">
                            <div class="content-wrapper">

                                <!-- Row start -->
                                <div class="row ">
                                    <!-- Dashboard -->
                                    <div class="container row-3">
                                        <h3>Dashboard</h3>
                                        <div class="row centered-row">
                                            <div class="col-xl-4 col-md-6 centered-col">
                                                <div class="card bg-primary text-white card-with-margin">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Total User Accounts</h5>
                                                        <?php
                                                        $accountsQuery = "SELECT COUNT(*) as totalAccounts FROM tbl_user";

                                                        $result = mysqli_query($conn, $accountsQuery);

                                                        if ($result) {
                                                            $row = mysqli_fetch_assoc($result);
                                                            $totalAccounts = $row['totalAccounts'];

                                                            echo "<h1 class='mb-0'>$totalAccounts</h1>";
                                                        } else {
                                                            echo '<h4 class="mb-0">Data not found</h4>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                                        <div class="small text-white"></div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-xl-4 col-md-6 centered-col">
                                                <div class="card bg-success text-white card-with-margin">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Total Registered Employees</h5>
                                                        <?php
                                                        $accountsQuery = "SELECT COUNT(*) as totalAccounts FROM tbl_employee";

                                                        $result = mysqli_query($conn, $accountsQuery);

                                                        if ($result) {
                                                            $row = mysqli_fetch_assoc($result);
                                                            $totalAccounts = $row['totalAccounts'];

                                                            echo "<h1 class='mb-0'>$totalAccounts</h1>";
                                                        } else {
                                                            echo '<h4 class="mb-0">Data not found</h4>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                                        <div class="small text-white"></div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-xl-4 col-md-6 centered-col">
                                                <div class="card bg-info text-white card-with-margin">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Regular Employee</h5>
                                                        <?php
                                                        $regularQuery = "SELECT COUNT(*) as regularCount FROM tbl_employee WHERE status = 'regular'";

                                                        $result = mysqli_query($conn, $regularQuery);

                                                        if ($result) {
                                                            $row = mysqli_fetch_assoc($result);
                                                            $regularCount = $row['regularCount'];

                                                            echo "<h1 class='mb-0'>$regularCount</h1>";
                                                        } else {
                                                            echo '<h4 class="mb-0">Data not found</h4>';
                                                        }
                                                        ?>


                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                                        <a class="small text-white stretched-link"></a>
                                                        <div class="small text-white"></div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-4 col-md-6 centered-col">
                                                <div class="card bg-warning text-white card-with-margin">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Casual Employee</h5>
                                                        <?php
                                                        $regularQuery = "SELECT COUNT(*) as regularCount FROM tbl_employee WHERE status = 'casual'";

                                                        $result = mysqli_query($conn, $regularQuery);

                                                        if ($result) {
                                                            $row = mysqli_fetch_assoc($result);
                                                            $regularCount = $row['regularCount'];

                                                            echo "<h1 class='mb-0'>$regularCount</h1>";
                                                        } else {
                                                            echo '<h4 class="mb-0">Data not found</h4>';
                                                        }
                                                        ?>


                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                                        <a class="small text-white stretched-link"></a>
                                                        <div class="small text-white"></div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-xl-4 col-md-6 centered-col">
                                                <div class="card bg-danger text-white card-with-margin">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Job Order Employees</h5>
                                                        <?php
                                                        $joQuery = "SELECT COUNT(*) as joCount FROM tbl_employee WHERE status = 'jo'";

                                                        $joResult = mysqli_query($conn, $joQuery);

                                                        if ($joResult) {
                                                            $joRow = mysqli_fetch_assoc($joResult);
                                                            $joCount = $joRow['joCount'];

                                                            echo "<h1 class='mb-0'>$joCount</h1>";
                                                        } else {
                                                            echo '<h4 class="mb-0">Data not found</h4>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                                        <a class="small text-white stretched-link"></a>
                                                        <div class="small text-white"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 centered-col">
                                                <div class="card bg-secondary text-white card-with-margin">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Contract Employee</h5>
                                                        <?php
                                                        $contractualQuery = "SELECT COUNT(*) as joCount FROM tbl_employee WHERE status = 'contractual'";

                                                        $contractualResult = mysqli_query($conn, $contractualQuery);

                                                        if ($contractualResult) {
                                                            $contractualRow = mysqli_fetch_assoc($contractualResult);
                                                            $contractualCount = $contractualRow['joCount'];

                                                            echo "<h1 class='mb-0'>$contractualCount</h1>";
                                                        } else {
                                                            echo '<h4 class="mb-0">Data not found</h4>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                                        <a class="small text-white stretched-link"></a>
                                                        <div class="small text-white"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6 centered-col">
                                                <div class="card bg-secondary text-white card-with-margin">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Co-Terminous Employee</h5>
                                                        <?php
                                                        $coterminousQuery = "SELECT COUNT(*) as joCount FROM tbl_employee WHERE status = 'co-terminous'";

                                                        $contractualResult = mysqli_query($conn, $coterminousQuery);

                                                        if ($contractualResult) {
                                                            $contractualRow = mysqli_fetch_assoc($contractualResult);
                                                            $contractualCount = $contractualRow['joCount'];

                                                            echo "<h1 class='mb-0'>$contractualCount</h1>";
                                                        } else {
                                                            echo '<h4 class="mb-0">Data not found</h4>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                                        <a class="small text-white stretched-link"></a>
                                                        <div class="small text-white"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="container">
                                    <h3>Employee Data Visualization</h3>

                                    <div class="charts-container">
                                        <!-- BAR CHART for Gender Distribution -->
                                        <?php
                                        $chartQueryGender = $conn->query('SELECT gender, COUNT(*) as count FROM tbl_employee GROUP BY gender');

                                        // Fetch data and initialize arrays
                                        $labelsGender = [];
                                        $dataGender = [];

                                        foreach ($chartQueryGender as $row) {
                                            $gender = $row['gender'];
                                            $count = $row['count'];

                                            // Populate arrays for labels and data
                                            $labelsGender[] = $gender;
                                            $dataGender[] = $count;
                                        }
                                        ?>

                                        <div class="chart-container" style="width: 48%; float: left;">
                                            <canvas id="genderChart"></canvas>
                                        </div>

                                        <!-- BAR CHART for Employee Status Distribution -->
                                        <?php
                                        $chartQueryStatus = $conn->query('SELECT status, COUNT(*) as count FROM tbl_employee GROUP BY status');

                                        // Fetch data and initialize arrays
                                        $labelsStatus = [];
                                        $dataStatus = [];

                                        foreach ($chartQueryStatus as $row) {
                                            $status = $row['status'];
                                            $count = $row['count'];

                                            // Populate arrays for labels and data
                                            $labelsStatus[] = $status;
                                            $dataStatus[] = $count;
                                        }
                                        ?>

                                        <!-- Displaying the chart in JavaScript -->
                                        <div class="chart-container" style="width: 48%; float: right;">
                                            <canvas id="statusChart"></canvas>
                                        </div>
                                    </div>

                                    <script>
                                        // Gender bargraph
                                        const labelsGender = <?php echo json_encode($labelsGender); ?>;
                                        const dataGender = {
                                            labels: labelsGender,
                                            datasets: [{
                                                label: 'Gender Distribution',
                                                data: <?php echo json_encode($dataGender); ?>,
                                                backgroundColor: [
                                                    'rgba(0, 255, 0, 0.8)',
                                                    'rgba(255, 232, 0, 0.8)'
                                                ],
                                                borderColor: [
                                                    'rgba(0, 255, 0, 0.8)',
                                                    'rgba(255, 232, 0, 0.8)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        };
                                        const configGender = {
                                            type: 'bar',
                                            data: dataGender,
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            },
                                        };
                                        var genderChart = new Chart(
                                            document.getElementById('genderChart'),
                                            configGender
                                        );

                                        //Employee Status bar graph
                                        const labelsStatusChart = <?php echo json_encode($labelsStatus); ?>;
                                        const dataStatusChart = {
                                            labels: labelsStatusChart,
                                            datasets: [{
                                                label: 'Employee Status Distribution',
                                                data: <?php echo json_encode($dataStatus); ?>,
                                                backgroundColor: [
                                                    'rgba(255, 0, 28, 0.8)',
                                                    'rgba(0, 12, 255, 0.8)'
                                                ],
                                                borderColor: [
                                                    'rgb(255, 99, 132)',
                                                    'rgb(54, 162, 235)'
                                                ],
                                                borderWidth: 1
                                            }]
                                        };
                                        const configStatusChart = {
                                            type: 'bar',
                                            data: dataStatusChart,
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true
                                                    }
                                                }
                                            },
                                        };
                                        var statusChart = new Chart(
                                            document.getElementById('statusChart'),
                                            configStatusChart
                                        );
                                    </script>
                                </div>

                            </div>
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