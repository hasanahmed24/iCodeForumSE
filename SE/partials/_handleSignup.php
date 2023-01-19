 
<?php

$showError = "false";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include '_dbconnect.php';
    $user_email = $_POST['signupEmail'];
    $pass = $_POST['signupPassword'];
    $cpass = $_POST['signupcPassword'];

    //Check Validations
    if (empty($user_email)) {
        die("Username is required");
    }
    if (strlen($pass) < 8) {
        die("Password must be at least 8 characters");
    }
    
    if ( ! preg_match("/[a-z]/i", $pass)) {
        die("Password must contain at least one letter");
    }
    
    if ( ! preg_match("/[0-9]/", $pass)) {
        die("Password must contain at least one number");
    }

    // if ($pass !== $cpass) {
    //     die("Passwords must match");
    // }


    //Check wheather this username exist or not
    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email' ";
    $result = mysqli_query($conn, $existSql);
    $numRows = mysqli_num_rows($result);
    if($numRows > 0){
        $showError = "Username already in use";
        
    }
    else{
        if($pass == $cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_email`, `user_password`, `timestamp`) VALUE
             ('$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            if($result){
                $showAlert = true;
                header("Location: /SE/index.php?signupsuccess=true");
                exit();
            }

        }
        else{
            $showError = "Passwords do not match";
        }
    }
    header("Location: /SE/index.php?signupsuccess=false&error=$showError");
    
}

?>