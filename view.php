<?php include "functions/db.php"; ?>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>View Image</title>
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
            <a class="nav-link" aria-current="page" href="imgup.php">Upload Image</a>
          </li>
					<li class="nav-item">
						<a class="nav-link active" href="#"> View Images </a>
					</li>
          <li class="nav-item">
            <a class="nav-link" href="imgup.php">Back</a>
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
  <div class="accordion" id="imageAccordion">
    <?php 
      $sql = "SELECT serv, GROUP_CONCAT(image_url) as image_urls FROM images GROUP BY serv ORDER BY id DESC";
      $res = mysqli_query($conn, $sql);
      if (mysqli_num_rows($res) > 0) {
        while ($images = mysqli_fetch_assoc($res)) {
          $image_urls = explode(',', $images['image_urls']); ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading<?php echo $images['serv']; ?>">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $images['serv']; ?>" aria-expanded="false" aria-controls="collapse<?php echo $images['serv']; ?>">
                Service Number: <?php echo $images['serv']; ?>
              </button>
            </h2>
            <div id="collapse<?php echo $images['serv']; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $images['serv']; ?>" data-bs-parent="#imageAccordion">
              <div class="accordion-body">
                <?php foreach ($image_urls as $image_url) { ?>
                  <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal<?php echo $images['serv']; ?>">
                    <img src="Service Images/<?php echo $image_url; ?>" width="300px" alt="Image">
                  </a>
                <?php } ?>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="imageModal<?php echo $images['serv']; ?>" tabindex="-1" aria-labelledby="imageModal<?php echo $images['serv']; ?>Label" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-body">
                  <?php foreach ($image_urls as $image_url) { ?>
                    <a href="#" data-bs-toggle="modal" data-bs-dismiss="modal">
                      <img src="Service Images/<?php echo $image_url; ?>" width="100%" alt="Image" data-bs-toggle="modal" data-bs-dismiss="modal">
                    </a>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        <?php }
      } else {
        echo "<div class='alert alert-warning' role='alert'>No images found.</div>";
      }
    ?>
  </div>
</div>



</body>
</html>