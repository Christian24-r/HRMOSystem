<?php
session_start();
include('conn.php');

if (isset($_SESSION['usertype'])) {
    if (session_status() === PHP_SESSION_ACTIVE) {
        $role = $_SESSION['usertype'];
        if ($role == "PESO") {
            ?>

            <?php

            if (isset($_POST["submit"])) {
                $name = $_POST['name'];
                $totalFiles = count($_FILES['fileImg']['name']);
                $imagesArray = array();

                for ($i = 0; $i < $totalFiles; $i++) {
                    $imageName = $_FILES["fileImg"]["name"][$i];
                    $tmpName = $_FILES["fileImg"]["tmp_name"][$i];

                    $imageExtension = explode('.', $imageName);
                    $imageExtension = strtolower(end($imageExtension));

                    $newImageName = uniqid() . '.' . $imageExtension;

                    move_uploaded_file($tmpName, 'uploads/' . $newImageName);
                    $imagesArray[] = $newImageName;
                }

                $imagesArray = json_encode($imagesArray);
                $query = "INSERT INTO tb_images (name, image) VALUES ('$name', '$imagesArray')";
                mysqli_query($conn, $query);
                echo "<script>alert('Image successfully uploaded!');</script>";
                echo "<script>window.location = 'imageview-user.php';</script>";
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

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


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
                                <img src="img/lgu.png" style="width: 60px; height: 100px;" alt="Melon Admin Dashboard" />
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#uploadModal">
                                            Upload Image
                                        </button>
                                    </div>
                                </div>



                                <div class="table-container">


                                    <?php


                                    $i = 1;
                                    $rows = mysqli_query($conn, "SELECT * FROM tb_images");
                                    ?>
                                    <table id="example" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Images</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($rows as $row): ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $i++; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row["name"]; ?>
                                                    </td>
                                                    <td style="display: flex; align-items: center; gap: 10px;">
                                                        <?php foreach (json_decode($row["image"]) as $image): ?>
                                                            <img src="uploads/<?php echo $image; ?>"
                                                                style="max-width: 40px; max-height: 50px;" class="img-thumbnail">
                                                        <?php endforeach; ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <button class="dropdown-item"
                                                                    onClick="printImages('<?php echo $row['id']; ?>')">Print
                                                                    Images</button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>


                                    </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- Upload Image Modal -->
                    <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="uploadModalLabel">Upload Image</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="imageview-user.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name :</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fileImg" class="form-label">Image :</label>
                                            <input type="file" class="form-control" id="fileImg" name="fileImg[]"
                                                accept=".jpg, .jpeg, .png" required multiple>
                                        </div>
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>

                </div>
                <!-- Content wrapper scroll end -->

                </div>
                <!-- *************
                ************ Main container end *************
            ************* -->

                </div>
                <!-- Page wrapper end -->
                <script>
                    function confirmDelete() {
                        return confirm('Are you sure you want to delete this image?');
                    }
                </script>
                <!-- Bootstrap JS (optional, for certain features like dropdowns) -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

                <!-- Your additional scripts (if any) -->
                <script>
                    function printImages(imageId) {
                        var printWindow = window.open('', '_blank');
                        printWindow.document.write('<style>');
                        printWindow.document.write('body { font-family: Arial, sans-serif; }');
                        printWindow.document.write('.image-container { display: flex; flex-wrap: wrap; gap: 20px; }');
                        printWindow.document.write('.image-container img { max-width: 170; max-height: 150; }');
                        printWindow.document.write('</style></head><body>');

                    <?php foreach ($rows as $row): ?>
                        if ('<?php echo $row['id']; ?>' === imageId) {
                                printWindow.document.write('<h4><?php echo $row['name']; ?></h4>');
                                printWindow.document.write('<div class="image-container">');

                            <?php foreach (json_decode($row["image"]) as $image): ?>
                                        printWindow.document.write(
                                            '<img src="uploads/<?php echo $image; ?>" class="img-thumbnail">'
                                        );
                            <?php endforeach; ?>

                                    printWindow.document.write('</div>');
                            }
                    <?php endforeach; ?>

                            printWindow.document.write('</body></html>');
                        printWindow.document.close();
                        printWindow.print();
                    }
                </script>

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