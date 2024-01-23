<?php
session_start();
include('conn.php');

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

                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
                    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                        echo "<script>
                                    swal({
                                        title: 'Image Successfully Uploaded!',
                                        icon: 'success',
                                    }).then((result) => {
                                        // Redirect to 201.php after the SweetAlert is closed
                                        if (result.isConfirmed || result.isDismissed) {
                                            window.location.href = 'imageview.php';
                                        }
                                    });
                                </script>";
                        //echo "<script>alert('Image successfully uploaded!');</script>";
                        //echo "<script>window.location = 'imageview.php';</script>";
                    }
                    ?>

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
                                    <a>PESO</a>
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
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadModal">
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

                                                <th>Name</th>
                                                <th>Images</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($rows as $row) : ?>
                                                <tr>
                                                    <!-- <td>
                                        <?php //echo $i++; 
                                        ?>
                                    </td> -->
                                                    <td>
                                                        <?php echo $row["name"]; ?>
                                                    </td>
                                                    <td style="display: flex; align-items: center; gap: 10px;">
                                                        <?php foreach (json_decode($row["image"]) as $image) : ?>
                                                            <img src="uploads/<?php echo $image; ?>" style="max-width: 40px; max-height: 50px;" class="img-thumbnail">
                                                        <?php endforeach; ?>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                Actions
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <button class="dropdown-item" onClick="printImages('<?php echo $row['id']; ?>')">Print
                                                                    Images</button>
                                                                <button class="dropdown-item" onClick="viewImages('<?php echo $row['id']; ?>')">View
                                                                    Images</button>
                                                                <button href="#" class="dropdown-item delete-link" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-delete-id="<?php echo $row['id']; ?>">
                                                                    Delete
                                                                </button>
                                                                <div class="dropdown-menu">

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
                                    <form action="imageview.php" method="post" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name :</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fileImg" class="form-label">Image :</label>
                                            <input type="file" class="form-control" id="fileImg" name="fileImg[]" accept=".jpg, .jpeg, .png" required multiple>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bootstrap modal for the delete confirmation -->
                    <div class="modal" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="confirmDeleteModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this record?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a href="#" class="btn btn-danger" id="confirmDeleteButton">Delete</a>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

                <script>
                    // JavaScript to handle the delete confirmation modal
                    document.addEventListener('DOMContentLoaded', function() {
                        var deleteLinks = document.querySelectorAll('.delete-link');

                        deleteLinks.forEach(function(link) {
                            link.addEventListener('click', function(event) {
                                event.preventDefault();
                                var deleteId = this.getAttribute('data-delete-id');

                                // Set the delete link dynamically based on the delete ID
                                var deleteLink = 'delete.php?delete_id=' + deleteId;

                                // Show the Bootstrap modal
                                var deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                                deleteModal.show();

                                // Set the delete action dynamically based on the delete ID
                                var confirmDeleteButton = document.getElementById('confirmDeleteButton');
                                confirmDeleteButton.setAttribute('href', deleteLink);

                                // Add a click event listener to trigger the delete action
                                confirmDeleteButton.addEventListener('click', function() {
                                    // Redirect to the delete link when the user confirms
                                    window.location.href = deleteLink;
                                });

                                // Add a click event listener to close the modal when "Cancel" is clicked
                                var cancelButton = document.querySelector('#confirmDeleteModal .btn-secondary');
                                cancelButton.addEventListener('click', function() {
                                    deleteModal.hide();
                                });
                            });
                        });
                    });
                </script>
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

                        <?php foreach ($rows as $row) : ?>
                            if ('<?php echo $row['id']; ?>' === imageId) {
                                printWindow.document.write('<h4><?php echo $row['name']; ?></h4>');
                                printWindow.document.write('<div class="image-container">');

                                <?php foreach (json_decode($row["image"]) as $image) : ?>
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
                <script>
                    function viewImages(imageId) {
                        var printWindow = window.open('', '_blank');
                        printWindow.document.write('<style>');
                        printWindow.document.write('body { font-family: Arial, sans-serif; }');
                        printWindow.document.write('.image-container { display: flex; flex-wrap: wrap; gap: 20px; }');
                        printWindow.document.write('.image-container img { max-width: 170; max-height: 150; }');
                        printWindow.document.write('</style></head><body>');

                        <?php foreach ($rows as $row) : ?>
                            if ('<?php echo $row['id']; ?>' === imageId) {
                                printWindow.document.write('<h4><?php echo $row['name']; ?></h4>');
                                printWindow.document.write('<div class="image-container">');

                                <?php foreach (json_decode($row["image"]) as $image) : ?>
                                    printWindow.document.write(
                                        '<img src="uploads/<?php echo $image; ?>" class="img-thumbnail">'
                                    );
                                <?php endforeach; ?>

                                printWindow.document.write('</div>');
                            }
                        <?php endforeach; ?>

                        printWindow.document.write('</body></html>');
                        printWindow.document.close();

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