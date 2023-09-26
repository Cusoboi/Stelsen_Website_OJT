<?php
include 'functions/db.php';
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the service number and image file from the form
  $serv = $_POST["serv"];
  $image = $_FILES["image"]["name"];
  }

  // Upload the image file
  if (!isset($error)) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if the file is an image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
      $error = "Please upload a valid image file.";
    }
    
    // Check if the file already exists
    if (file_exists($target_file)) {
      $error = "Sorry, the file already exists.";
    }
    
    // Check if the file size is too large
    if ($_FILES["image"]["size"] > 5000000) {
      $error = "Sorry, your file is too large.";
    }
    
    // Allow only certain file types
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif") {
      $error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
    
    // Upload the file
    if (!isset($error)) {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        // Insert the service number and image URL into the database
        $sql = "INSERT INTO images (serv, image_url) VALUES ('$serv', '$image')";
        if (mysqli_query($conn, $sql)) {
          $success = "Image uploaded successfully.";
        } else {
          $error = "Error uploading image: " . mysqli_error($conn);
        }
      } else {
        $error = "Error uploading image.";
      }
    }
  }


?>

<!-- Add Image Form -->
<div class="container">
  <h2>Add Image</h2>
  <?php if (isset($success)) { ?>
    <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
  <?php } ?>
  <?php if (isset($error)) { ?>
    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
  <?php } ?>
  <form method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="serv" class="form-label">Service Number:</label>
      <input type="text" class="form-control" id="serv" name="serv" required>
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Image:</label>
      <input type="file" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Upload Image</button>
  </form>
</div>
