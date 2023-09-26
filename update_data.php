<!DOCTYPE html>
<?php
 include 'functions/db.php';
 if (!$conn) {
 die("Connection failed: " . mysqli_connect_error()); }

 if (isset($_POST['update_data'])) {
  $USER_ID = $_POST['USER_ID'];
  $PM_PS = $_POST['PM_PS'];
  $PM_SRTYPE = $_POST['PM_SRTYPE'];
  $PM_SRNUMBER = $_POST['PM_SRNUMBER'];
  $PM_SRDATE = $_POST['PM_SRDATE'];
  $PM_PA = $_POST['PM_PA'];
  $PM_BN = $_POST['PM_BN'];
  $PM_UN = $_POST['PM_UN'];
  $PM_CN = $_POST['PM_CN'];     
  $PM_PL = $_POST['PM_PL'];
  $PM_MOP = $_POST['PM_MOP'];
  $REMARKS = $_POST['REMARKS'];
  $CONTRACT= $_POST['CONTRACT'];
  $PM_QUO= $_POST['PM_QUO'];
  $PM_QD= $_POST['PM_QD'];
  $PM_PO= $_POST['PM_PO'];
  $PM_POD= $_POST['PM_POD'];
  $PM_DR= $_POST['PM_DR'];
  $PM_JO= $_POST['PM_JO'];

 if (isset($_POST['PM_PM']) && is_array($_POST['PM_PM'])) {
  $PM_PM = implode(", ", $_POST['PM_PM']);
    }

 $sql = "UPDATE subject SET PM_PS='$PM_PS',PM_SRTYPE='$PM_SRTYPE',PM_SRNUMBER='$PM_SRNUMBER',PM_SRDATE='$PM_SRDATE',PM_PA='$PM_PA',PM_BN='$PM_BN',PM_UN='$PM_UN',PM_CN='$PM_CN',PM_PL='$PM_PL',PM_MOP='$PM_MOP',CONTRACT='$CONTRACT',REMARKS='$REMARKS',PM_PM='$PM_PM' ,PM_QUO='$PM_QUO', PM_QD='$PM_QD', PM_PO='$PM_PO', PM_POD='$PM_POD', PM_DR='$PM_DR', PM_JO='$PM_JO' where USER_ID='$USER_ID'";

 $sql_run = mysqli_query($conn, $sql);
 
 header('Location: index.php');

  }
 ?>
</html>