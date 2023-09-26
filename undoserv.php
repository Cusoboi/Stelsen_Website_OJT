<?php
  include 'functions/db.php';

  if (isset($_GET['UNIT_ID'])) {
    $UNIT_ID = $_GET['UNIT_ID'];
    $sql_select = "SELECT * FROM deleted_subjectsserv WHERE UNIT_ID = $UNIT_ID";
    $result_select = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_assoc($result_select);
    
    $S_PS = $row['S_PS'];
    $S_SRTYPE = $row['S_SRTYPE'];
    $S_SRNUMBER = $row['S_SRNUMBER'];
    $S_SRDATE = $row['S_SRDATE'];
    $S_PA = $row['S_PA'];
    $S_BN = $row['S_BN'];
    $S_UN = $row['S_UN'];
    $S_CN = $row['S_CN'];     
    $S_PL = $row['S_PL'];
    $S_S = $row['S_S'];
    $S_QUO= $row['S_QUO'];
    $S_QD = $row['S_QD'];
    $S_PO= $row['S_PO'];
    $S_POD= $row['S_POD'];
    $S_DR= $row['S_DR'];
    $S_JO= $row['S_JO'];
    $S_JOD= $row['S_JOD'];
    
    $sql_insert = "INSERT INTO servicetab (UNIT_ID, S_PS, S_SRTYPE, S_SRNUMBER, S_SRDATE, S_PA, S_BN, S_UN, S_CN, S_PL, S_S, S_QUO, S_QD, S_PO, S_POD, S_DR, S_JO, S_JOD) VALUES ('$UNIT_ID', '$S_PS', '$S_SRTYPE', '$S_SRNUMBER', '$S_SRDATE', '$S_PA', '$S_BN', '$S_UN', '$S_CN', '$S_PL', '$S_S', '$S_QUO', '$S_QD', '$S_PO', '$S_POD', '$S_DR', '$S_JO', '$S_JOD')";
    
    $result_insert = mysqli_query($conn, $sql_insert);
    
    $sql_delete = "DELETE FROM deleted_subjectsserv WHERE UNIT_ID = $UNIT_ID";
    $result_delete = mysqli_query($conn, $sql_delete);
    
    if (!$result_delete) {
      die('Error deleting data');
    } else {
      header('Location: service.php');
      exit();
    }
  }
?>