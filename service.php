<?php 
include 'functions/db.php'; 
include 'functions/searchserv.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Import Excel File To MySql Database Using php">
    <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Bootstrap CSS !-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

      <!-- Font Awesome Icons !-->
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
              <a class="nav-link active" href="service.php">Service</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="dataserv.php">Add Data</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="imgup.php">Upload Image</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="delserv.php">Delete History</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="login.php">Log Out</a>
            </li>
          </ul>

        </div>
      </div>
    </nav>

    <!-- Upper Part !-->
    <div id="wrap">
      <div class="container-fluid" style="background-image:linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('./img/bg.jpg');">
        <div class="row">
            <div id="form-login">
              <form class="text-center"action="importserv.php" method="post" name="upload_excel" enctype="multipart/form-data">
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
    <form action="service.php" method="post">
      <input type="text" name="valueToSearch" list="prog"  placeholder="Search"/>
        <datalist id="prog">
          <option>Completed</option>
          <option>For Schedule</option>
          <option>Ops-Done</option>
        </datalist>
      <input type="submit" name="search" value="Go"><br><br>   
    <!-- Counter !--> 
      <div class="counter">
        <?php
          $searchValue = "";
          if(isset($_POST['search'])) {
            $searchValue = $_POST['valueToSearch'];
          }

          $query = "SELECT 
                      COUNT(CASE WHEN S_PS LIKE '%Completed%' THEN 1 END) AS Completed, 
                      COUNT(CASE WHEN S_PS LIKE '%For Schedule%' THEN 1 END) AS ForSchedule, 
                      COUNT(CASE WHEN S_PS LIKE '%Ops-Done%' THEN 1 END) AS OpsDone 
                    FROM servicetab";

          if(!empty($searchValue)) {
            $query .= " WHERE S_PS LIKE '%$searchValue%'";
          }

          $result = mysqli_query($conn, $query);

          if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "<div class='form-control fw-bold' style='width: 300px; margin-bottom: 10px;'>";

            if(empty($searchValue) || strpos($searchValue, 'Completed') !== false){
                echo "Completed: " . $row["Completed"] . "<br>";
            }
            if(empty($searchValue) || strpos($searchValue, 'For Schedule') !== false){
                echo "For Schedule: " . $row["ForSchedule"] . "<br>";
            }
            if(empty($searchValue) || strpos($searchValue, 'Ops-Done') !== false){
                echo "Ops-Done: " . $row["OpsDone"] . "<br>";
            }

            echo "</div>";
          }
          else {
            echo "No records found.";
          }
          mysqli_close($conn);
        ?>
      </div>
<!-- Analytics !-->
<div class="form-control"style="width: 300px;">
<!-- Analytics !-->
<form method="post">
    <label for="year">Select Year:</label>
    <!-- Year Dropdown List -->
    <select name="year">
        <?php
        $start_year = date('Y') - 10; // Starting year (current year - 10)
        $end_year = date('Y') + 10; // Ending year (current year + 10)

        for ($year = $start_year; $year <= $end_year; $year++) {
            echo '<option value="' . $year . '">' . $year . '</option>';
        }
        ?>
    </select>
    <button type="submit" name="submit">Submit</button>
</form>

<?php
if (isset($_POST['submit'])) {
    // Establish database connection
    $conn = mysqli_connect('localhost', 'root', '', 'stelsendb');
    if (!$conn) {
        die('Error: ' . mysqli_connect_error());
    }

    // Prepare and execute the query
    $query = "SELECT system, COUNT(*) AS system_count
              FROM (
                  SELECT SUBSTRING_INDEX(S_S, ',', n.n) system
                  FROM (
                      SELECT 1 n UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
                      UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8
                      UNION ALL SELECT 9 UNION ALL SELECT 10
                  ) n
                  JOIN servicetab ON LENGTH(S_S) - LENGTH(REPLACE(S_S, ',', '')) >= n.n - 1
                  WHERE YEAR(STR_TO_DATE(S_SRDATE, '%Y-%m-%d')) = ?
              ) t
              GROUP BY system
              HAVING system_count >= ALL (
                  SELECT COUNT(*) AS system_count
                  FROM (
                      SELECT SUBSTRING_INDEX(S_S, ',', n.n) system
                      FROM (
                          SELECT 1 n UNION ALL SELECT 2 UNION ALL SELECT 3 UNION ALL SELECT 4
                          UNION ALL SELECT 5 UNION ALL SELECT 6 UNION ALL SELECT 7 UNION ALL SELECT 8
                          UNION ALL SELECT 9 UNION ALL SELECT 10
                      ) n
                      JOIN servicetab ON LENGTH(S_S) - LENGTH(REPLACE(S_S, ',', '')) >= n.n - 1
                      WHERE YEAR(STR_TO_DATE(S_SRDATE, '%Y-%m-%d')) = ?
                  ) t
                  GROUP BY system
              )
              ORDER BY system_count DESC";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $_POST['year'], $_POST['year']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Check for errors and display results
    if (!$result) {
        die('Error: ' . mysqli_error($conn));
    } elseif (mysqli_num_rows($result) > 0) {
        echo '<div>';
        echo '<p>Most used system(s) in ' . $_POST['year'] . ' with more than one project:</p>';
        echo '<ul>';
        while ($row = mysqli_fetch_assoc($result)) {
            $most_used_system = $row['system'];
            $system_count = $row['system_count'];
            echo '<li>' . $most_used_system . ' (' . $system_count . ' project' . ($system_count != 1 ? 's' : '') . ')</li>';
        }
        echo '</ul>';
        echo '</div>';
    } else {
        echo "<p>No records found for the selected year.</p>";
    }

    // Close database connection
    mysqli_close($conn);
}

?>
</div>

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
          <th>System</th>
          <th>Quotation</th>
          <th>Quotation Date</th>
          <th>Purchase Order</th>
          <th>Purchase Order Date</th>
          <th>Date Received</th>
          <th>Job Order</th>
          <th>Job Order Date</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr> 
    <?php while($row = mysqli_fetch_array($search_result)):?>
        <tr class="align-middle">
          <td><?php echo $row['S_PS']; ?></td>
          <td><?php echo $row['S_SRTYPE']; ?></td>
          <td><?php echo $row['S_SRNUMBER']; ?></td>
          <td><?php echo $row['S_SRDATE']; ?></td>
          <td><?php echo $row['S_PA']; ?></td>
          <td><?php echo $row['S_BN']; ?></td>
          <td><?php echo $row['S_UN']; ?></td>
          <td><?php echo $row['S_CN']; ?></td>
          <td><?php echo $row['S_PL']; ?></td>
          <td><?php echo $row['S_S']; ?></td>
          <td><?php echo $row['S_QUO']; ?></td>
          <td><?php echo $row['S_QD']; ?></td>
          <td><?php echo $row['S_PO']; ?></td>
          <td><?php echo $row['S_POD']; ?></td>
          <td><?php echo $row['S_DR']; ?></td>
          <td><?php echo $row['S_JO']; ?></td>
          <td><?php echo $row['S_JOD']; ?></td>
          <td><a href="editserv.php?UNIT_ID=<?php echo $row['UNIT_ID']; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
          <td><a href="delete_dataserv.php?UNIT_ID=<?php echo $row['UNIT_ID']; ?>" onclick="return confirm('Are you sure you want to delete this data?')"><i class="fa-solid fa-trash"></i></a></td>
        </tr>
    <?php endwhile;?>
    </table>
      </div>
    </div>
    </div>
  </body>
</html>