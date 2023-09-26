<?php
include 'functions/db.php';

// Function to calculate the remaining time until the end of the contract
$contractEndDate = $row['CONTRACT'];
$currentDate = new DateTime();
$endDate = new DateTime($contractEndDate);
$timeRemaining = $currentDate->diff($endDate);
$daysRemaining = $timeRemaining->days;

if ($endDate < $currentDate) {
  $progressStatus = "Inactive";
  $row['PM_PS'] = $progressStatus;
} else if ($daysRemaining < 30) {
  $progressStatus = "Renewal";
  $row['PM_PS'] = $progressStatus;
} else {
  $progressStatus = "Active";
  $row['PM_PS'] = $progressStatus;
}

// Update PM_PS field in the database
$sql = "UPDATE subject SET PM_PS = '$progressStatus' WHERE USER_ID = " . $row['USER_ID'];
$conn->query($sql);

// Close database connection
$conn->close();
?>