<?php
include ('conn.php');

$id = $_GET['id'];
if ($id) :
    

    // for Viewing the PDF 
    // Query to retrieve the PDF content from the database
    $fetch_qry = $conn->query("SELECT * FROM tbl_document WHERE `id`='$id'");
    $name = $fetch_qry->fetch_assoc();
    
    // Assuming you have a database connection called $conn

    if ($name) :
        
        $pdf_file = $name['image'];  
?>
<embed type='application/pdf' src='pdf/<?php echo $pdf_file ?>' width='100%' height='100%'>
<?php
    exit();
    endif; endif;
    

?>


