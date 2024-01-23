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

                <!-- Meta -->
                <link rel="shortcut icon" href="img/lgu.png">

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
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

                <!-- *************
            ************ Vendor Css Files *************
        ************ -->

                <!-- Scrollbar CSS -->
                <link rel="stylesheet" href="assets/vendor/overlay-scroll/OverlayScrollbars.min.css">

                <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

                        <?php
            // Include your database connection code here if necessary


            // Add Account
            // Check if the form has been submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data using $_POST
                $username = $_POST['username'];
                $password = $_POST['password'];
                $usertype = $_POST['usertype'];

                // Check if 'usertype' is set and not empty
                if (isset($usertype) && ($usertype)) {
                    // Use prepared statements to prevent SQL injection
                    $sql = "INSERT INTO `tbl_user` (username, password, usertype) VALUES (?, ?, ?)";
                    $stmt = mysqli_prepare($conn, $sql);

                    if ($stmt) {
                        // Hash the password for security
                        $hashedPassword = md5($password);

                        mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPassword, $usertype);

                        if (mysqli_stmt_execute($stmt)) {
                            // Data Inserted Successfully Message
                            echo '<script>swal("Data successfully added", "", "success");</script>';
                            // Redirect to register-account.php after displaying the alert
                            // echo '<script>window.location.href = "index.php";</script>';
                        } else {
                            echo "Error executing statement: " . mysqli_stmt_error($stmt);
                        }

                        mysqli_stmt_close($stmt);
                    } else {
                        echo "Error preparing statement: " . mysqli_error($conn);
                    }
                } else {
                    // Handle the case where 'usertype' is not set properly
                    //echo "Usertype is required. Please select a valid option.";
                }

                // Close the database connection when done
                // mysqli_close($conn);
            }
            ?>
                        <!-- Content wrapper scroll start -->
                        <div class="content-wrapper">
                            <div class="content-wrapper">

                                <!-- Row start -->
                                <div class="row">
                                    <!-- Register account modal -->
                                    <div class="container-fluid">

                                        <!-- Row start -->
                                        <div class="d-flex justify-content-start">
                                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                Register Account
                                            </button>
                                        </div>
                                        <div class="row align-items-center mb-3 ">
                                            <div class="col-12 col-xl-6 d-flex align-items-center">
                                                <i class="fa-regular fa-user fa-2x"></i>
                                                <h2 class="mb-0 ml-2" style="margin-left: 5px;">Account Registered</h2>
                                            </div>

                                            <div class="col-12 col-xl-6 justify-content-end">




                                                <!-- Modal -->
                                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="staticBackdropLabel">Register Account
                                                                </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">



                                                                <style>
                                                                    select.form-select option {
                                                                        color: #000;
                                                                        /* Set the color to dark (black) */
                                                                    }
                                                                </style>

                                                                <!-- REGISTER ACCOUNT -->
                                                                <form action="index.php" method="post">
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputEmail1" class="form-label">Username</label>
                                                                        <input type="text" class="form-control" placeholder="Enter Username" aria-describedby="emailHelp" name="username" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="exampleInputPassword1" class="form-label">Password</label>
                                                                        <input type="password" class="form-control" placeholder="Enter Password" name="password" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="dropdownMenu" class="form-label">Select an
                                                                            option</label>
                                                                        <select class="form-select" id="dropdownMenu" name="usertype" required>
                                                                            <option>Select</option>
                                                                            <option value="peso">PESO</option>
                                                                            <option value="admin">ADMIN</option>
                                                                        </select>
                                                                    </div>

                                                                    <div class="d-flex justify-content-end">
                                                                        <button type="button" class="btn btn-danger me-2" data-bs-dismiss="modal">Close</button>
                                                                        <input type="submit" class="btn btn-primary" value="Register" name="submit">

                                                                    </div>

                                                                </form>


                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <!-- Data Table for Registered Accounts -->
                                        <table id="data-table" class="table table-striped table-hover">
                                            <thead>
                                                <tr>

                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>User Type</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <!-- UPDATE -->
                                                <?php
                                                $sql = "SELECT * FROM tbl_user";
                                                $result = mysqli_query($conn, $sql);

                                                if ($result) {
                                                    if (mysqli_num_rows($result) > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            $id = $row['id'];
                                                            $username = $row['username'];
                                                            $password = $row['password'];
                                                            $usertype = $row['usertype'];

                                                            // Output the data as table rows
                                                            echo '<tr>';

                                                            echo '<td>' . $username . '</td>';
                                                            echo '<td>' . $password . '</td>';
                                                            echo '<td>' . $usertype . '</td>';


                                                            //Delete
                                                            echo '<td><a href="#" class="delete-link" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-id="<?= $id ?>">
                                                            <button class="btn btn-danger">
                                                                <i class="fa-solid fa-trash"></i> <span style="margin-right: 5px;"></span> Delete
                                                            </button>
                                                        </a>
                                                        </td>';

                                                            echo '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#updateModal' . $id . '">Update</button></td>';
                                                            echo '</tr>';

                                                            // Modal for update
                                                            echo '<div class="modal fade" id="updateModal' . $id . '" tabindex="-1"
                                        aria-labelledby="updateModalLabel' . $id . '" aria-hidden="true">';
                                                            echo '<div class="modal-dialog">';
                                                            echo '<div class="modal-content">';
                                                            echo '<div class="modal-header">';
                                                            echo '<h5 class="modal-title" id="updateModalLabel' . $id . '">
                                                        Update User</h5>';
                                                            echo '<button type="button" class="btn-close"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>';
                                                            echo '</div>';
                                                            echo '<div class="modal-body">';
                                                            echo '<form action="php/update.php" method="post">';
                                                            echo '<input type="hidden" name="id" value="' . $id . '">';
                                                            echo '<div class="mb-3">';
                                                            echo '<label for="updateUsername' . $id . '"
                                                                class="form-label">Username</label>';
                                                            echo '<input type="text" class="form-control"
                                                                id="updateUsername' . $id . '"
                                                                placeholder="Enter Username" name="username"
                                                                value="' . $username . '">';
                                                            echo '</div>';
                                                            echo '<div class="mb-3">';
                                                            echo '<label for="updatePassword' . $id . '"
                                                                class="form-label">Password</label>';
                                                            echo '<input type="password" class="form-control"
                                                                id="updatePassword' . $id . '"
                                                                placeholder="Enter Password" name="password">';
                                                            echo '</div>';
                                                            echo '<div class="mb-3">';
                                                            echo '<label for="updateUsertype' . $id . '"
                                                                class="form-label">Select an option</label>';
                                                            echo '<select class="form-select"
                                                                id="updateUsertype' . $id . '" name="usertype"
                                                                Required>';
                                                            echo '<option value="1">Select</option>';
                                                            echo '<option value="peso" ' . ($usertype == ' peso'
                                                                ? 'selected' : '') . '>PESO</option>';
                                                            echo '<option value="admin" ' . ($usertype == 'admin'
                                                                ? 'selected' : '') . '>ADMIN</option>';
                                                            echo '</select>';
                                                            echo '</div>';
                                                            echo '</div>';
                                                            echo '<div class="modal-footer">';
                                                            echo '<div class="text-start">';
                                                            echo '<input type="submit" class="btn btn-primary" value="Update" name="submit">';
                                                            echo '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
                                                            echo '</div>';
                                                            echo '</div>';
                                                            echo '</form>';
                                                            echo '</div>';
                                                            echo '</div>';
                                                            echo '</div>';
                                                        }
                                                    } else {
                                                        echo '<tr><td colspan="6">No data found</td></tr>';
                                                    }
                                                } // Close the database connection
                                                mysqli_close($conn); ?>


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
                                                                <a href="php/delete-user.php?id=<?= $id ?>" class="btn btn-danger">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </tbody>
                                        </table>


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

                <!-- Include Bootstrap JS and jQuery -->
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

                <!-- Your custom script goes here -->

                <script>
                    // JavaScript to handle the delete confirmation modal
                    document.addEventListener('DOMContentLoaded', function() {
                        var deleteLinks = document.querySelectorAll('.delete-link');

                        deleteLinks.forEach(function(link) {
                            link.addEventListener('click', function(event) {
                                event.preventDefault();
                                var userId = this.getAttribute('data-id');

                                // Set the delete link dynamically based on the user ID
                                var deleteLink = 'php/delete-user.php?id=' + userId;

                                // Show the Bootstrap modal
                                var deleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                                deleteModal.show();

                                // Set the delete action dynamically based on the user ID
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
                <!-- Bootstrap 5 JS and Popper.js scripts (required) -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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