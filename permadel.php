<?php
  include 'functions/db.php';

  if (isset($_GET['USER_ID'])) {
    $USER_ID = $_GET['USER_ID'];
    $sql = "DELETE FROM deleted_subjects WHERE USER_ID = $USER_ID";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
      die('Error deleting data');
    } else {
      header('Location: permadel.php');
      exit();
    }
  }
?>