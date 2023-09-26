<?php 
include 'functions/db.php'; 
include 'functions/search.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Preventive Maintenance </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Import Excel File To MySql Database Using php">
    <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Bootstrap CSS !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <!-- Font Awesome Icons !-->
    <script src="https://kit.fontawesome.com/46d08054cb.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/46d08054cb.js" crossorigin="anonymous"></script>
  </head>

  <body>
    <!-- Navigation Bar !-->
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark" style="background-color: #070A52;">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="img/Logobl.png" alt="" width="30" height="30" class="d-inline-block align-text-top">
          Stelsen Integrated System
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="home.php">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" href="index.php">Preventive Maintenance</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="data.php">Add Data</a>
            </li>

            <li class="nav-item">
  <button type="button" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Notification 
    <span id="badge" >
      <?php include 'functions/notification-count.php'; ?>
    </span>
  </button>
</li>


            <li class="nav-item">
        <a class="nav-link" href="del.php">Delete History</a>
            </li>


            <li class="nav-item">
              <a class="nav-link" href="login.php">Log Out</a>
            </li>    

          </ul>
        </div>
      </div>
    </nav>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Notifications</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body text-center">
            <?php
              include 'functions/db.php';

              $query = "SELECT * FROM subject WHERE CONTRACT";
              $result = mysqli_query($conn, $query);

              $count = 0;

              if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_assoc($result)) {
                  $contractEndDate = $row['CONTRACT'];
                  $pmSrType = $row['PM_SRTYPE'];

                  $currentDate  = new DateTime();
                  $endDate = new DateTime($contractEndDate);

                  $timeRemaining = $currentDate->diff($endDate);
                  $timeRemainingInDays = $timeRemaining->format('%a');

                  if ($timeRemainingInDays >= 1 && $timeRemainingInDays <= 31 && $endDate > $currentDate) {
                    echo '<div class="notification-bar">Contract for '.$pmSrType.' expires in '.$timeRemaining->format('%d days').'</div>';
                    $count++;
                 }                   
                }
              } else {
                echo '<div class="notification-bar">Contract information not found</div>';
              }
            ?>
          </div>

          <div class="modal-footer">
            <?php
            // Notification Counter
            echo '<div class="notification-bar">Total contracts expiring in a month: '.$count.'</div>';
            ?>
          </div>
        </div>
      </div>
    </div>
      
    <!-- Upper Part !-->
    <div id="wrap">
      <div class="container-fluid" style="background-image:linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('./img/bg.jpg');">
        <div class="row">
          <div id="form-login">
            <form class="text-center"action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
              <fieldset>

                <h1>Import CSV/Excel File</h1>
            
                <div class="control-group">
                  <label for="file" class="form-label fst-italic">CSV/Excel File:</label>
                  <input class="form-control form-control-lg fw-light" type="file" name="file" id="file" style="width: 500px; margin: 0 auto;">
                </div>
                  
                <div class="control-group">
                  <div class="controls">
                  <button type="submit" class="btn btn-outline-primary btn-lg fw-bold button-loading" id="submit" name="Import" data-loading-text="Loading...">Upload</button>
                  </div>
                </div>

              </fieldset>
            </form>
          </div>
      </div>
    <!-- Filter !-->
    <form action="index.php" method="post">
      <input type="text" name="valueToSearch" list="prog"  placeholder="Search"/>
        <datalist id="prog">
          <option>Active</option>
          <option>Inactive</option>
          <option>Renewal</option>
        </datalist>
      <input type="submit" name="search" value="Go"><br><br>   
      <!-- Analytics !-->  
      <?php
      $query = "SELECT PM_PS, SUM(REPLACE(PM_PA, ',', '')) as total_amount FROM subject WHERE PM_PS = 'Active' GROUP BY PM_PS";
      $result = mysqli_query($conn, $query);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='form-control' style='width: 300px; margin-bottom: 10px;'> Progress Status: " . $row["PM_PS"] . "<br>";
            echo "Total Project Amount: ₱ " . number_format($row["total_amount"]) . "<br> </div>";
        }
        }
      else {
        echo "No records found.";
        }
      mysqli_close($conn);
      ?>
    <!-- Table !-->
    <div class="overflow-x-auto">
      <table class="table table-striped table-bordered border-dark border-3 table-hover text-center">
        <tr class="align-middle">
          <th>Progress Status</th>
          <th>Sales Report Type</th>
          <th>Sales Report Number</th>
          <th>Sales Report Date</th>
          <th>Project Amount</th>
          <th>Building Name</th>
          <th>Unit Name</th>
          <th>Client Name</th>
          <th>Project Location</th>
          <th>Mode of Payment</th>
          <th>Contract</th>
          <th>Remarks</th>
          <th>System</th>
          <th>Contract Timer</th>
          <th>Quotation</th>
          <th>Quotation Date</th>
          <th>Purchase Order</th>
          <th>Purchase Order Date</th>
          <th>Date Received</th>
          <th>Job Order</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr> 
        <?php while($row = mysqli_fetch_array($search_result)):?>
        <tr class="align-middle">
          <td><?php 
          include 'functions/progstatus.php';
          echo $progressStatus;
          ?></td>
          <td><?php echo $row['PM_SRTYPE']; ?></td>
          <td><?php echo $row['PM_SRNUMBER']; ?></td>
          <td><?php echo $row['PM_SRDATE']; ?></td>
          <td><?php echo "₱" . $row['PM_PA']; ?></td>
          <td><?php echo $row['PM_BN']; ?></td>
          <td><?php echo $row['PM_UN']; ?></td>
          <td><?php echo $row['PM_CN']; ?></td>
          <td><?php echo $row['PM_PL']; ?></td>
          <td><?php echo $row['PM_MOP']; ?></td>
          <td><?php echo $row['CONTRACT']; ?></td>
          <td><?php echo $row['REMARKS']; ?></td>
          <td><?php echo $row['PM_PM']; ?></td>
          <td>
            <!-- Contract Timer -->
          <?php 
            include 'functions/contract-timer.php';            
          ?>
          <!-- !Contract Timer! -->
          </td>
          <td><?php echo $row['PM_QUO']; ?></td>
          <td><?php echo $row['PM_QD']; ?></td>
          <td><?php echo $row['PM_PO']; ?></td>
          <td><?php echo $row['PM_POD']; ?></td>
          <td><?php echo $row['PM_DR']; ?></td>
          <td><?php echo $row['PM_JO']; ?></td>
          <td><a href="edit.php?USER_ID=<?php echo $row['USER_ID']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
          <td><a href="delete_data.php?USER_ID=<?php echo $row['USER_ID']; ?>" onclick="return confirm('Are you sure you want to delete this data?')"><i class="fa-solid fa-trash"></i></a></td>
        </tr>
        <?php endwhile;?>
      </table>
    </div>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>