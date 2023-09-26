<?php
$contractEndDate = $row['CONTRACT'];
$currentDate = new DateTime();
$endDate = new DateTime($contractEndDate);
$timeRemaining = $currentDate->diff($endDate);
$timeRemainingInDays = $timeRemaining->days;

if ($timeRemaining->invert) {
  echo '<div class="notification-bar-expired">Contract expired</div>';
} else if ($timeRemainingInDays >= 1 && $timeRemainingInDays <= 30) {
  echo '<div class="notification-bar-renewal">Contract expires in '.$timeRemaining->format('%a days').'</div>';
} else if ($timeRemaining->y === 0 && $timeRemaining->m === 0 && $timeRemainingInDays === 0) {
  echo '<div class="notification-bar-expired">Contract expired</div>';
} else if ($timeRemaining->y === 0) {
  echo '<div class="notification-bar-active">Contract expires in '.$timeRemaining->format('%m months, %d days' ).'</div>';
} else {
  echo '<div class="notification-bar-active">Contract expires in '.$timeRemaining->format('%y years, %m months, %d days' ).'</div>';
}

?>
