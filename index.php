<?php
ini_set('mysql.connect_timeout', 300);
ini_set('default_socket_timeout', 300);

$servername = "localhost";
$username = "root";
$password = "";
$dbaname = "emandi";

$conn = mysqli_connect($servername,$username,$password,$dbaname);

if($conn->connect_error){
    die("Connection failed:");
}
?>

<!DOCTYPE html>
<head>
    <title>E-mandi</title>
</head>

<body>
    <nav class ="navbar" role ="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="toggle" data-toggle="collapse">
                    <span class ="sr">Toggle navigation</span>
                    <span class ="icon-bar"></span>
                    <span class ="icon-bar"></span>
                    <span class ="icon-bar"></span>
                </button>
                <a class ="logo" href="index.php">E-mand!</a>
            </div>
            <ul class = "listnavbar">
                <li>
                    <a href = "login.php" >Login As Buyer</a>
                </li>
                <li>
                    <a href = "loginfarmers.php" >Login As Farmer</a>
                </li>
                <li>
                    <a href = "ourstory.php" >Our Story</a>
                </li>
                <li>
                    <a href = "contactus.php" >Contact us</a>
                </li>
                <li>
                    <a href = "working.php" >how it Works</a>
                </li>
            </ul>
        </div>
    </nav>

    <h1 align ="center" >Taking Agriculture to Another Level</h1>
    <p align ="cente">A commercial platoform to expand the customer scale for farmers and ease purchase for buyers online.</p>
    <div class="container">
        <form method="post" action = "searchresult.php">
            <input type = "text" name ="searchvalue"  Placeholder="what do you need tell me" maxlength="30">
            <input class="btn" type ="submit" name="search" value="search">
        </form>
    </div>
    <div class="container">
        <h1 align = "center">Explore our Marketplace</h1>
        <br><br>
        <?php
        $count = mysqli_query($conn,"SELECT * FROM products");
        $c = mysqli_num_rows($count);
        $rand = rand(9,$c) - 9;

        $runuser = mysqli_query($conn,"SELECT * FROM products WHERE 'id' > '$rand' LIMIT 9");
        $checkuser = mysqli_num_rows($runuser);

        if($checkuser> 0){
            while($orw = mysqli_fetch_array($runuser)){
                ?>
                <div class="thumbnail" align ="center">
                    <form method = "post" action ="cart.php?action=add&id=<?php echo $row["id"];?>">
                <a href = "categoryvalue.php?action=view&value=<?php echo $row["Category"];?>">
                <span class ="hint">Click to view</span>
                <img class = "imageres" <?php echo "<img src = 'data:image/jpeg;base64,".base64_encode($row['image'])."'>";
                $_SESSION['id'] = $row[0];
                ?>>
                </a>
                <h3 class = "textinfo"><?php echo $row["Category"];?></h3>
                <?php
                $_SESSION['id'] = $row[0];?>

                </form>
                </div>
                <?php
        
            }
        }
        ?>
    </div>
    <footer id="footer" class="container" style ="background: #fff; color:black; width:100% ">
    <hr style ="border-top: 1px solid ;">
    <br><br><br>
    <p align= "center"> Contact Us: prathmeshjaiswal550@gmail.com<br>pritijanorkar123@gmail.com<br>
        +91 9370359323<br>
    &copy; E-Mand!.All rights reserved</p>

     </footer>
</body>
