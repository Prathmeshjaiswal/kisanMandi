<?php 
// include_once "session.php";
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "emandi";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if($conn->connect_error){
    die("Connection failed to database:".$conn->connect_error);
  }

  if(isset($_POST["loginbtn"])){
    $username = mysqli_real_escape_string($conn,$_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $seluser = mysqli_query($conn,"SELECT * FROM Buyers WHERE username = '$username' AND password = '$password' ");
    $checkuser  = mysqli_num_rows($seluser);

    if($seluser > 0){
        $_SESSION['username'] = $username;
        echo "<script> window.open('buyerprofile.php','_self') </script>";
    }
    else{
        echo "<style = 'color:red;> invalid username or password";
    }
  }
?>
















<!DOCTYPE html>
<html>
    <head>
        <title>E-Mandi</title>
        <link href="css/heroic-features.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <form method = "POST" style = "width:80%; margin:auto;">
    <h1 align="center">E-Mandi</h1>
    <h2 align="center"><strong>Buyer's Sign In</strong></h2>

    <div class="form">
        <input type="text" id="username" name="username" placeholder="UserName">
    </div>
    <div class="form">
        <input type="text" id="password" name="password" placeholder="Password">
    </div>
    <a class="link" href="register.link" style="float:left; padding-left:20px;">Register Here</a>
    <a class="link" href="forgot.php" style="float:right; padding-right:20px;">Lost My password ?</a>
</br>

    <div align="center">
        <button style="width: 45%" name="loginbtn" type="submit">Take me in</button>
</br>
</br>

    </form>

    <footer id="footer" class="container" style ="background: #fff; color:black; width:100% ">
    <hr style ="border-top: 1px solid ;">
    <br><br><br>
    <p align= "center"> Contact Us: prathmeshjaiswal550@gmail.com<br>pritijanorkar123@gmail.com<br>
        +91 9370359323<br>
    &copy; E-Mand!.All rights reserved</p>

     </footer>
    </body>
</html>