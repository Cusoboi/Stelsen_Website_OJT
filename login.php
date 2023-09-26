<?php
session_start();
require 'functions/db.php';

if(!empty($_SESSION["id"])){
  header("Location: home.php");
}

if(isset($_POST["submit"])){
  $username = $_POST["username"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: home.php");
    }
    else{
      echo "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo "<script> alert('User Not Registered'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" crossorigin="anonymous">
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <style>
      body{
        background: linear-gradient(rgba(0,0,0,0.2)50%, rgba(0,0,0,0.2)50%), url(img/bg.jpg);
        background-position: center;
        background-size: cover;
        height: 100vh;
      }
    </style>
  </head>
  <body>
    <div class="wrapper">
      <div class="logo">
        <img src="img/Logo.png" alt="">
      </div>
      <div class="text-center mt-4 name">
        Log In
      </div>
      <form class="p-3 mt-3" method="post" action="">
        <div class="form-field d-flex align-items-center">
          <span class="far fa-user"></span>
          <input type="text" name="username" placeholder="Username" required ="">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id = "password" placeholder="Password"required ="">
            </div>
            <button class="btn mt-3" type="submit" name="submit">Login</button>
        </form>
        <div class="text-center fs-6">
            <a href="registration.php">Sign up</a>
        </div>
    </div>
  </body>
</html>