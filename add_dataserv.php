<!DOCTYPE html>
<?php
include 'functions/db.php';

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add_dataserv'])) {
    $UNIT_ID = $_POST['UNIT_ID'];
    $S_PS = $_POST['S_PS'];
    $S_SRTYPE = $_POST['S_SRTYPE'];
    $S_SRNUMBER = $_POST['S_SRNUMBER'];
    $S_SRDATE = $_POST['S_SRDATE'];
    $S_PA = $_POST['S_PA'];
    $S_BN = $_POST['S_BN'];
    $S_UN = $_POST['S_UN'];
    $S_CN = $_POST['S_CN'];
    $S_PL = $_POST['S_PL'];
    $S_QUO = $_POST['S_QUO'];
    $S_QD = $_POST['S_QD'];
    $S_PO = $_POST['S_PO'];
    $S_POD = $_POST['S_POD'];
    $S_DR = $_POST['S_DR'];
     $S_JO = $_POST['S_JO'];
    $S_JOD = $_POST['S_JOD'];

    $S_S=implode(", ", $_POST['S_S']);

    $sql = "INSERT INTO servicetab (UNIT_ID, S_PS, S_SRTYPE, S_SRNUMBER, S_SRDATE, S_PA, S_BN, S_UN, S_CN, S_PL, S_S, S_QUO, S_QD, S_PO, S_POD, S_DR, S_JO, S_JOD) VALUES ('$UNIT_ID', '$S_PS','$S_SRTYPE', '$S_SRNUMBER', '$S_SRDATE', '$S_PA', '$S_BN', '$S_UN', '$S_CN', '$S_PL', '$S_S', '$S_QUO', '$S_QD', '$S_PO', '$S_POD', '$S_DR', '$S_JO', '$S_JOD')";
    // add more fields to the query
    mysqli_query($conn, $sql);

    // redirect to the page with the table to display the newly added data
    header('Location: service.php');
}
?>
</html>
