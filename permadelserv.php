<?php
  include 'functions/db.php';

  if (isset($_GET['UNIT_ID'])) {
    $UNIT_ID = $_GET['UNIT_ID'];
    $sql = "DELETE FROM deleted_subjectsserv WHERE UNIT_ID = $UNIT_ID";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      die('Error deleting data');
    } else {
      header('Location: delserv.php');
      exit();
    }
  }
?>