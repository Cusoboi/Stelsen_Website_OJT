<?php 
      include 'db.php';

      $query = "SELECT * FROM subject WHERE CONTRACT";
      $result = mysqli_query($conn, $query);

      $count = 0;

      if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
          $contractEndDate = $row['CONTRACT'];

          $currentDate  = new DateTime();
          $endDate = new DateTime($contractEndDate);

          $timeRemaining = $currentDate->diff($endDate);
          $timeRemainingInDays = $timeRemaining->format('%a'); 

          if ($timeRemainingInDays >= 1 && $timeRemainingInDays <= 31 && $endDate > $currentDate) {
            $count++; 
          }
        }
      }

      if ($count > 0) {
        echo '<span id="badge" span class="badge text-bg-danger">' . $count . '</span>';
      }
    ?>