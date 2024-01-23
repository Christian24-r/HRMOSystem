<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <?php
    include_once('../conn.php');

    if (isset($_POST['submit'])) {
        $office = $_POST['office'];
        $drawio = $_POST['drawio'];

        // Check if the office already exists
        $checkSql = "SELECT COUNT(*) FROM `tbl_flowchart` WHERE office = ?";
        $checkStmt = mysqli_prepare($conn, $checkSql);

        if ($checkStmt) {
            mysqli_stmt_bind_param($checkStmt, 's', $office);
            mysqli_stmt_execute($checkStmt);
            mysqli_stmt_bind_result($checkStmt, $existingRecords);
            mysqli_stmt_fetch($checkStmt);
            mysqli_stmt_close($checkStmt);

            if ($existingRecords > 0) {
                // Office already exists, show an alert
                echo '<script>
                swal({
                    title: "Office already exists",
                    text: "Please choose a different office name.",
                    icon: "warning",
                }).then((result) => {
                    if (result) {
                        window.location.href = "../org.php";
                    }
                });
            </script>';
            } else {
                // Office does not exist, proceed with the insertion
                $insertSql = "INSERT INTO `tbl_flowchart` (office, drawio) VALUES (?, ?)";
                $insertStmt = mysqli_prepare($conn, $insertSql);

                if ($insertStmt) {
                    mysqli_stmt_bind_param($insertStmt, 'ss', $office, $drawio);
                    $result = mysqli_stmt_execute($insertStmt);

                    if ($result) {
                        // Data inserted successfully, redirect to org.php
                        echo '<script>
    swal({
        title: "Organization successfully inserted.",
        icon: "success",
    }).then((result) => {
        if (result) {
            window.location.href = "../org.php";
        }
    });
</script>';
                    } else {
                        die(mysqli_error($conn));
                    }

                    mysqli_stmt_close($insertStmt);
                } else {
                    die(mysqli_error($conn));
                }
            }
        } else {
            die(mysqli_error($conn));
        }
    }
    ?>
</body>

</html>