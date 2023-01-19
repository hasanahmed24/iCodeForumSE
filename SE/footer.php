<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Foooter.css">
    
</head>
<body>

<?php include "partials/_dbconnect.php" ?>

<?php 

$showError="fasle";
error_reporting(0);
if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(isset($_POST['submit'])){
        echo'click';
    }
      
    $email = $_POST['subscribers'];
    // if (empty($email)) {
    //    $email_error = "enter email";
       
    // }
    // $existSql = "SELECT * FROM `newsletter` WHERE subscribers_email = '$email' ";
    // $result = mysqli_query($conn, $existSql);
    // $numRows = mysqli_num_rows($result);
    // if($numRows > 0){
    //     $showError = "Email already in use";
        
    // }
    // else{
    //     $sql = "INSERT INTO `newsletter` (`subscribers_email`, `datetime`)
    //         VALUES ('$email', current_timestamp())";
    //     $result = mysqli_query($conn, $sql);
    //     if($result){
    //         $showAlert = true;
    //         header("Location: /SE/index.php?emailsubscribersuccess=true");
    //         exit();
    //     }
    // }

    $sql = "INSERT INTO `newsletter` (`subscribers_email`, `datetime`)
            VALUES ('$email', current_timestamp())";
    $result = mysqli_query($conn, $sql);

}


?>
    
    <footer id="footer">
        <div id="websites">
            <div id="logo">
                <img id="website" src="imgs/idiscuss.png" alt="">
            </div>
            <div id="social">
                <img class="images" src="imgs/linkedin.png" alt="">
                <img class="images" src="imgs/insta.jpeg" alt="">
                <img class="images" src="imgs/Facebook.png" alt="">
                <img class="images" src="imgs/playstore.png" alt="">
                <img class="images" src="imgs/twitter.png" alt="">
            </div>
        </div>
        <div id="Categories">
            <ul id="list">
                <p class="together">Categories</p>
                <li class="linkss"> <a class="links" href="/SE/threadlist.php?catid=2">Javascript</a></li>
                <li class="linkss"><a class="links" href="/SE/threadlist.php?catid=1">Python</a></li>
                <li class="linkss"><a class="links" href="/SE/threadlist.php?catid=3">Django</a></li>
            </ul>
        </div>
        <div>
            <ul id="list">
                <p class="together">Support</p>
                <li class="linkss"> <a class="links" href="/SE/about.php">About Us</a></li>
                <li class="linkss"><a class="links" href="/SE/contact.php">Contact Us</a></li>
            </ul>
        </div>
        <div id="newsletter">
            <p class="together">Newsletter</p>
            <p id="subscribe">Subscribe to keep being updated on community's latest features.</p>
            <form class="formletter" action="/SE/index.php" method="post">
                <input id="email" type="email" name="subscribers" placeholder=" your@email.com" autocomplete="off" required>
                
                <input id="submit" type="submit" value="SUBSCRIBE">
            </form>
        </div>
        <div id="copyright">
           <p>COPYRIGHT © 2022 - ALL RIGHTS RESERVED.</p>
        </div>
    </footer>

</body>
</html>