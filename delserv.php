<?php
  include 'functions/db.php';

  $sql = "SELECT * FROM deleted_subjectsserv";
  $result_select = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Service </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Import Excel File To MySql Database Using php">
    <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Bootstrap CSS !-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
      <!-- Font Awesome Icons !-->
      <script src="https://kit.fontawesome.com/46d08054cb.js" crossorigin="anonymous"></script>

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
            <a class="nav-link active" href="#">Delete History</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="service.php">Back</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="login.php">Log Out</a>
        </li>    

    </ul>
        </div>
      </div>
    </nav>
    <div id="wrap">
      <div class="container-fluid" style="background-image:linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('./img/bg.jpg');">
        <div class="row">
              <fieldset>
                <h1 class="text-center fst-italic">Delete History</h1>
              </fieldset>
      </div>

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

<?php while ($row = mysqli_fetch_assoc($result_select)): ?>
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
    <td>
      <a href="undoserv.php?UNIT_ID=<?php echo $row['UNIT_ID']; ?>"><i class="fas fa-undo"></i>
      </a>
    </td>
    <td>
      <a href="permadelserv.php?UNIT_ID=<?php echo $row['UNIT_ID']; ?>"><i class="fas fa-trash"></i>
      </a>
    </td>
  </tr>
<?php endwhile; ?>
</table>
</div>

</div>
</div>
</body>
</html>