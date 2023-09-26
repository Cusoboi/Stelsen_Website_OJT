<?php
  include 'functions/db.php';
  $UNIT_ID = $_GET['UNIT_ID'];
  $SQLSELECT = "SELECT * FROM servicetab where UNIT_ID='$UNIT_ID'";
  $result_set =  mysqli_query($conn, $SQLSELECT);
  while($row=mysqli_fetch_array($result_set)) {
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Data</title> 
    <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="js/nav.js"></script>
  <link rel="stylesheet" type="text/css" href="css/add.css">
</head>

<body>
  <!-- Navigation Bar -->
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
            <a class="nav-link active" aria-current="page" href="#">Edit Data</a>
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
  <!-- !Navigation bar! -->

  <div class="container-fluid" style="background-image:linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('./img/bg.jpg'); display: flex; justify-content: center;">
    <form class="form-horizontal well" action="update_dataserv.php" method="post" name="update_dataserv">
      <fieldset>
        <legend class="text-center fst-italic">Edit Data</legend>

        <div style="display: flex; justify-content: center;">
        <!-- Table -->
        <table>
          <tr>
            <div class="control-group">
              <div class="control-label">
                <td><label for="S_PS">Progress Status:</label>
              </div>
              <div class="controls">
                <input type="text" value="<?php echo $row['S_PS']; ?>" name="S_PS" id="S_PS" class="input-large form-control" ></td>
              </div>
            </div>

            <div class="control-group">
              <div class="control-label">
                <td><label for="S_SRTYPE"> Sales Report Type:</label>
              </div>
              <div class="controls">
                <input type="text" value="<?php echo $row['S_SRTYPE']; ?>" name="S_SRTYPE" id="S_SRTYPE" class="input-large form-control" ></td>
              </div>
            </div>

            </div>
            <div class="control-group">
              <div class="control-label">
                <td><label for="S_SRNUMBER">Sales Report Number:</label>
              </div>
              <div class="controls">
                <input type="text" value="<?php echo $row['S_SRNUMBER']; ?>" name="S_SRNUMBER" id="S_SRNUMBER" class="input-large form-control" ></td>
              </div>
            </div>

            <div class="control-group">
              <div class="control-label">
                <td><label for="S_SRDATE">Sales Report Date:</label>
              </div>
              <div class="controls">
                <input class="form-control" type="date" value="<?php echo  date('Y-m-d', strtotime( $row['S_SRDATE'])); ?>" name="S_SRDATE" id="S_SRDATE" class="input-large" ></td>
              </div>
            </div>
          </tr>

          <tr>
            <div class="control-group">
              <div class="control-label">
                <td><label for="S_PA"> Project Amount: </label>
              </div>
              <div class="controls">
                <input type="text" value="<?php echo $row['S_PA']; ?>" name="S_PA" id= "S_PA" class= "input-large form-control"></td>
              </div>
            </div>

            <div class="control-group">
              <div class="control-label">
                <td><label for="S_BN"> Building Name: </label>
              </div>
              <div class="controls">
                <input type="text" value="<?php echo $row['S_BN']; ?>" name="S_BN" id ="S_BN" class = "input-large form-control" ></td>
              </div>
            </div>

            <div class="control-group">
              <div class="control-label">
                <td><label for="S_UN"> Unit Name: </label>
              </div>
              <div class="controls">
                <input type="text" value="<?php echo $row['S_UN']; ?>" name="S_UN" id= "S_UN" class= "input-large form-control"></td>
              </div>
            </div>

            <div class="control-group">
            <div class="control-label">
              <td><label for="S_CN"> Client Name: </label>
            </div>
            <div class="controls">
              <input type="text" value="<?php echo $row['S_CN']; ?>" name="S_CN" id= "S_CN" class= "input-large form-control"></td>
            </div>
          </tr>

          <tr>
            <div class="control-group">
              <div class="control-label">
                <td><label for="S_PL">Project Location:</label>
              </div>
              <div class="controls">
                <input type="text" value="<?php echo $row['S_PL']; ?>" name="S_PL" id="S_PL" class="input-large form-control" ></td>
              </div>
            </div>

            <div class="control-group">
              <div class="control-label">
                <td><label for="S_QUO"> Quotation:</label>
              </div>
              <div class="controls">
                <input type="text" value="<?php echo $row['S_QUO']; ?>" name="S_QUO" id="S_QUO" class="input-large form-control" ></td>
              </div>
            </div>

            <div class="control-group">
              <div class="control-label">
                <td><label for="S_QD">Quotation Date:</label>
              </div>
              <div class="controls">
                <input type="date" value="<?php echo date('Y-m-d', strtotime($row['S_QD'])); ?>" name="S_QD" id="S_QD" class="input-large form-control" ></td>
              </div>
            </div>

            <div class="control-group">
              <div class="control-label">
                <td><label for="S_PO">Purchase Order:</label>
              </div>
              <div class="controls">
                <input type="text" value="<?php echo $row['S_PO']; ?>" name="S_PO" id="S_PO" class="input-large form-control" ></td>
              </div>
            </div>
          </tr>

          <tr>
            <div class="control-group">
              <div class="control-label">
                <td><label for="S_POD">Purchase Order Date:</label>
              </div>
              <div class="controls">
                <input type="date" value="<?php echo date('Y-m-d', strtotime($row['S_POD'])); ?>" name="S_POD" id="S_POD" class="input-large form-control" ></td>
              </div>
            </div>

            <div class="control-group">
              <div class="control-label">
                <td><label for="S_DR"> Date Received:</label>
              </div>
              <div class="controls">
                 <input type="date" value="<?php echo date('Y-m-d', strtotime($row['S_DR'])); ?>" name="S_DR" id="S_DR" class="input-large form-control" ></td>
              </div>
            </div>

            <div class="control-group">
              <div class="control-label">
                <td><label for="S_JO">Job Order:</label>
              </div>
              <div class="controls">
                <input type="text" value="<?php echo $row['S_JO']; ?>" name="S_JO" id="S_JO" class="input-large form-control" ></td>
              </div>
            </div>

            <div class="control-group">
              <div class="control-label">
                <td><label for="S_JOD">Job Order Date:</label>
              </div>
              <div class="controls">
                <input type="date" value="<?php echo date('Y-m-d', strtotime($row['S_JOD'])); ?>" name="S_JOD" id="S_JOD" class="input-large form-control" ></td>
              </div>
            </div>
          </tr>
          <tr>
            <td colspan="4">
            <label for="S_S">System:</label>
              <div class="overflow-auto" style="height: 200px;">
                <div class="control-group form-control" id="S_S">
                  <div class="control-label">
                  </div>
                  <div class="controls">
                  <?php
                    $systems = array("FDAS", "CCTV", "Intercom", "Access Control", "Car Ramp", "PA/BGM", "Time", "Thermal Scanner", "WiFi", "XRAY", "Bollards", "Elevator Access", "Turnstile", "Walkthrough", "Barrier", "CATV", "Structured");
                    foreach ($systems as $system) {
                      $checked = "";
                      if (in_array($system, explode(", ", $row['S_S']))) {
                        $checked = "checked";
                    }                    
                      echo '<div class="form-check">
                              <input class="form-check-input" type="checkbox" name="S_S[]" id="'.$system.'" value="'.$system.'" '.$checked.' />
                              <label class="form-check-label" for="'.$system.'"> '.$system.' </label>
                            </div>';
                    }
                  ?>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="FDAS" value="FDAS"/>
                      <label class="form-check-label" for="FDAS">FDAS</label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="CCTV" value="CCTV"/>
                      <label class="form-check-label" for="CCTV"> CCTV </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="Intercom" value="Intercom"/>
                      <label class="form-check-label" for="Intercom"> Intercom </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="Access Control" value="Access Control"/>
                      <label class="form-check-label" for="Access Control"> Access Control </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="Car Ramp" value="Car Ramp"/>
                      <label class="form-check-label" for="Car Ramp"> Car Ramp </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="PA/BGM" value="PA/BGM"/>
                      <label class="form-check-label" for="PA/BGM"> PA/BGM </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="Time" value="Time"/>
                      <label class="form-check-label" for="Time"> Time </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="Thermal Scanner" value="Thermal Scanner"/>
                      <label class="form-check-label" for="Thermal Scanner"> Thermal Scanner </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="WiFi" value="WiFi"/>
                      <label class="form-check-label" for="WiFi"> WiFi </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="XRAY" value="XRAY"/>
                      <label class="form-check-label" for="XRAY"> XRAY </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="Bollards" value="Bollards"/>
                      <label class="form-check-label" for="Bollards"> Bollards </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="Elevator Access" value="Elevator Access"/>
                      <label class="form-check-label" for="Elevator Access"> Elevator Access </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="Turnstile" value="Turnstile"/>
                      <label class="form-check-label" for="Turnstile"> Turnstile </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="Walkthrough" value="Walkthrough"/>
                      <label class="form-check-label" for="Walkthrough"> Walkthrough </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="Barrier" value="Barrier"/>
                      <label class="form-check-label" for="Barrier"> Barrier </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="CATV" value="CATV"/>
                      <label class="form-check-label" for="CATV"> CATV </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="Structured" value="Structured"/>
                      <label class="form-check-label" for="Structured"> Structured </label>
                    </div>

                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="S_S[]" id="TelData" value="TelData"/>
                      <label class="form-check-label" for="TelData"> TEL/DATA </label>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        </table>

          <div class="control-group">
            <div class="control-label">
              <td><label for="UNIT_ID">:</label>
            </div>
            <div class="controls">
              <input type="hidden" value="<?php echo $row['UNIT_ID']; ?>" name="UNIT_ID" id="UNIT_ID" class="input-large" ></td>
            </div>
          </div>
          
          <div class="control-group">
            <div class="controls">
              <button type="submit" id="submit" name="update_dataserv" class="btn btn-primary btn-outline-light button-loading position-absolute top-50 start-50 translate-middle-x fw-bold" data-loading-text="Loading...">Update Data</button>
            </div>
          </div>
        </fieldset>
      </form>
      </div>
  </body>
<?php
  } 
?>
</html>