<?php
  include 'functions/db.php';

  if (isset($_GET['USER_ID'])) {
    $USER_ID = $_GET['USER_ID'];
    $sql_select = "SELECT * FROM deleted_subjects WHERE USER_ID = $USER_ID";
    $result_select = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result_select);
    
    $PM_PS = $row['PM_PS'];
    $PM_SRTYPE = $row['PM_SRTYPE'];
    $PM_SRNUMBER = $row['PM_SRNUMBER'];
    $PM_SRDATE = $row['PM_SRDATE'];
    $PM_PA = $row['PM_PA'];
    $PM_BN = $row['PM_BN'];
    $PM_UN = $row['PM_UN'];
    $PM_CN = $row['PM_CN'];     
    $PM_PL = $row['PM_PL'];
    $PM_MOP = $row['PM_MOP'];
    $CONTRACT= $row['CONTRACT'];
    $REMARKS = $row['REMARKS'];
    $PM_QUO= $row['PM_QUO'];
    $PM_QD= $row['PM_QD'];
    $PM_PO= $row['PM_PO'];
    $PM_POD= $row['PM_POD'];
    $PM_DR= $row['PM_DR'];
    $PM_JO= $row['PM_JO'];
    $PM_PM = $row['PM_PM'];
    
    $sql_insert = "INSERT INTO subject (USER_ID, PM_PS, PM_SRTYPE, PM_SRNUMBER, PM_SRDATE, PM_PA, PM_BN, PM_UN, PM_CN, PM_PL, PM_MOP, CONTRACT, REMARKS, PM_QUO, PM_QD, PM_PO, PM_POD, PM_DR, PM_JO, PM_PM) VALUES ('$USER_ID', '$PM_PS', '$PM_SRTYPE', '$PM_SRNUMBER', '$PM_SRDATE', '$PM_PA', '$PM_BN', '$PM_UN', '$PM_CN', '$PM_PL', '$PM_MOP', '$CONTRACT', '$REMARKS', '$PM_QUO', '$PM_QD', '$PM_PO', '$PM_POD', '$PM_DR', '$PM_JO', '$PM_PM')";
    
    $result_insert = mysqli_query($conn, $sql_insert);
    
    $sql_delete = "DELETE FROM deleted_subjects WHERE USER_ID = $USER_ID";
    $result_delete = mysqli_query($conn, $sql_delete);
    
    if (!$result_delete) {
      die('Error deleting data');
    } else {
      header('Location: index.php');
      exit();
    }
  }
?>