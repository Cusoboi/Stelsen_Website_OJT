<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Upload Image</title>
		<!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <script src="js/nav.js"></script>
  <link rel="stylesheet" type="text/css" href="css/view.css">
</head>

<body>
	<!-- Navigation Bar -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #070A52;">
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
            <a class="nav-link active" aria-current="page" href="#">Upload Image</a>
          </li>
					<li class="nav-item">
						<a class="nav-link" href="view.php"> View Images </a>
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

	<!-- Body -->

	<div class="container-fluid" style="background-image:linear-gradient(to bottom, rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)), url('./img/bg.jpg'); display: flex; justify-content: center;">
  <div class="position-absolute top-50 start-50 translate-middle">
    <legend class="text-center fw-bold">UPLOAD IMAGE</legend>
    <form class="text-center" action="upload.php" method="post" enctype="multipart/form-data">
      <div class="control-group">
        <div class="control-label">
          <td><label for="serv">Service Number:</label></td>
        </div>
        <div class="controls">
          <input class="form-control" type="text" name="serv" id="serv" class="input-small" required>
        </div>
      </div>
      <?php if (isset($_GET['error'])): ?>
        <p><?php echo $_GET['error']; ?></p>
      <?php endif ?>
      <input class="form-control form-control-lg fw-light" type="file" name="my_image[]" style="width: 500px; margin-bottom: 10px;" multiple>
      <input class="btn btn-outline-primary btn-lg fw-bold button-loading" type="submit" name="submit" value="Upload">
    </form>
  </div>
</div>

</body>
</html>