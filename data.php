<!DOCTYPE html>
<?php
  include 'functions/db.php';
  ?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Data</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="js/nav.js"></script>
    <link rel="stylesheet" type="text/css" href="css/data.css"> 
</head>
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
            <a class="nav-link active" aria-current="page" href="#">Add Data</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">Back</a>
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
  <form action="add_data.php" method="post" name="add_data">
  <fieldset>
    <legend class="text-center fst-italic">Add Data</legend>
  <div style="display: flex; justify-content: center;">
  <div style="max-width: 800px;">
  <!-- Table -->
  <table>
    <tr>
      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_PS">Progress Status:</label>
        </div>
        <div class="controls">
          <input class="form-control" type="text" name="PM_PS" id="PM_PS" class="input-large" required></td>
        </div>
      </div>
      
      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_SRTYPE"> Sales Report Type:</label>
        </div>
        <div class="controls">
          <input class="form-control" type="date" name="PM_SRTYPE" id="PM_SRTYPE" class="input-large" required></td>
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_SRNUMBER">Sales Report Number:</label>
        </div>
        <div class="controls">
          <input class="form-control" type="text" name="PM_SRNUMBER" id="PM_SRNUMBER" class="input-large" required></td>
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_SRDATE">Sales Report Date:</label>
        </div>
        <div class="controls">
          <input class="form-control" type="date" name="PM_SRDATE" id="PM_SRDATE" class="input-large" required></td>  
        </div>
      </div>
    </tr>

    <tr>
      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_PA"> Project Amount: </label>
        </div>
        <div class="controls">
          <input class="form-control" type="text" name="PM_PA" id= "PM_PA" class= "input-large"required></td>
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_BN"> Building Name: </label>
        </div>
        <div class="controls">
          <input class="form-control" type="text" name="PM_BN" id ="PM_BN" class = "input-large" required></td>
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_UN"> Unit Name: </label>
        </div>
        <div class="controls">
          <input class="form-control" type="text" name="PM_UN" id= "PM_UN" class= "input-large"required></td>
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_CN"> Client Name: </label>
        </div>
        <div class="controls">
          <input class="form-control" type="text" name="PM_CN" id= "PM_CN" class= "input-large"required></td>
        </div>
      </div>
    </tr>

    <tr>
      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_PL"> Project Location: </label>
        </div>
        <div class="controls">
          <input class="form-control" type="text" name="PM_PL" id= "PM_PL" class= "input-large"required></td>
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
          <td><label for="MOP"> Mode of Payment:</label>
        </div>
        <div class="controls">
          <input class="form-control" type="text" name="PM_MOP" id="PM_MOP" class="input-large" required></td>
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
          <td><label for="CONTRACT"> Contract:</label>
        </div>
        <div class="controls">
          <input class="form-control" type="date" name="CONTRACT" id="CONTRACT" class="input-large" required></td>
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
          <td><label for="REMARKS"> Remarks:</label>
        </div>
        <div class="controls">
          <input class="form-control" type="text" name="REMARKS" id="REMARKS" class="input-large form-control" required></td>
        </div>
      </div>
    </tr>

    <tr>
      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_QUO"> Quotation:</label>
        </div>
        <div class="controls">
          <input type="text"  name="PM_QUO" id="PM_QUO" class="input-large form-control" ></td>
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_QD">Quotation Date:</label>
        </div>
        <div class="controls">
          <input type="date" name="PM_QD" id="PM_QD" class="input-large form-control" ></td>
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_PO">Purchase Order:</label>
        </div>
        <div class="controls">
          <input type="text" name="PM_PO" id="PM_PO" class="input-large form-control" ></td>
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_POD">Purchase Order Date:</label>
        </div>
        <div class="controls">
          <input type="date"  name="PM_POD" id="PM_POD" class="input-large form-control" ></td>
        </div>
      </div>
    </tr>

    <tr>
      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_DR"> Date Received:</label>
        </div>
        <div class="controls">
          <input type="date" name="PM_DR" id="PM_DR" class="input-large form-control" ></td>
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
          <td><label for="PM_JO">Job Order:</label>
        </div>
        <div class="controls">
          <input type="text" name="PM_JO" id="PM_JO" class="input-large form-control" ></td>
        </div>
      </div>

      <div class="control-group">
        <div class="control-label">
          <td><label for="UNIT_ID"> Unit Number:</label>
        </div>
        <div class="controls">
          <input type="text" name="UNIT_ID" id="UNIT_ID" class="input-large form-control" required></td>
        </div>
      </div>
    </tr>

    <tr>
      <td colspan="4">
      <label for="PM_PM">Preventive:</label>
      <div class="overflow-auto" style="height: 200px;">
        <div class="control-group form-control" id="PM_PM">
          <div class="control-label">
          </div>
          <div class="controls">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="FDAS" value="FDAS"/>
              <label class="form-check-label" for="FDAS">FDAS</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="CCTV" value="CCTV" />
              <label class="form-check-label" for="CCTV">CCTV</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="Intercom" value="Intercom" />
              <label class="form-check-label" for="Intercom">Intercom</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="A_C" value="A_C" />
              <label class="form-check-label" for="A_C">Access Control</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="C_R" value="C_R" />
              <label class="form-check-label" for="C_R">Car Ramp</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="PA/BGM" value="PA/BGM" />
              <label class="form-check-label" for="PA/BGM">PA/BGM</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="Time" value="Time" />
              <label class="form-check-label" for="Time">Time</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="T_S" value="T_S" />
              <label class="form-check-label" for="T_S">Thermal Scanner</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="WIFI" value="WIFI" />
              <label class="form-check-label" for="WIFI">WIFI</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="XRAY" value="XRAY" />
              <label class="form-check-label" for="XRAY">XRAY</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="Bollards" value="Bollards" />
              <label class="form-check-label" for="Bollards">Bollards</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="E_A" value="E_A" />
              <label class="form-check-label" for="E_A">Elevator Access</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="Turnstile" value="Turnstile" />
              <label class="form-check-label" for="Turnstile">Turnstile</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="Walkthrough" value="Walkthrough" />
              <label class="form-check-label" for="Walkthrough">Walkthrough</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="Barrier" value="Barrier" />
              <label class="form-check-label" for="Barrier">Barrier</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="CATV" value="CATV" />
              <label class="form-check-label" for="CATV">CATV</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="PM_PM[]" id="Structured" value="Structured" />
              <label class="form-check-label" for="Structured">Structured</label>
            </div>
          </div>
        </div>
      </div>
    </td>
  </tr>
  </table>
  </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <button type="submit" id="submit" name="add_data" class="btn btn-primary btn-outline-light button-loading position-absolute top-50 start-50 translate-middle-x fw-bold" data-loading-text="Loading...">Add Data</button>
      </div>
    </div>
  </fieldset>
</form>
</div>
  </body>
</html>