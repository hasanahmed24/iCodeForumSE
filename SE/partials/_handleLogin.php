<?php

$is_invalid = false;

$showError = false;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $email = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    if (empty($email)) {
        die("Username is required");
    }
    if (empty($pass)) {
        die("password is required");
    }
    
    $Sql = "SELECT * FROM `users` WHERE user_email = '$email'";
    $result = mysqli_query($conn, $Sql);
    $numRows = mysqli_num_rows($result);
    if($numRows==1){
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_password'])){
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['sno'] = $row['sno'];
            $_SESSION['useremail'] = $email;
            // echo "logged in" .$email;
            header("Location: /SE/index.php");
        }
       
        else{
            $showError = "Password incorrect";
            header("Location: /SE/index.php?signupsuccess=false&error=$showError");
        }
    }
        
        // header("Location: /SE/index.php");  
        
    }
    



 ?>


