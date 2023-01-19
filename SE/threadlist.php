<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
    /* #footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: red;
        color: white;
        text-align: center;

    } */
    #category{
        border: solid 2px;
        background-color: lavenderblush;
    }
    #categorythread{
        border: solid 2px;
        background-color: lavenderblush;
        border-radius: 5px;
    }

    #cattitle{
        font-family: 'Roboto', sans-serif;
        font-weight: 300;
        
    }

    #catdesc{
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        
    }

    #form{
        border: solid 2px;
        background-color: whitesmoke;
        border-radius: 5px;
    }
    </style>

    <title>iDiscussion|Coding Forum</title>
</head>

<body>
<?php include "partials/_dbconnect.php" ?>
    <?php include "partials/_header.php" ?>
    

    <?php
    $id = $_GET['catid'];
    $sql = "SELECT * FROM `categories` WHERE category_id=$id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $catname = $row['category_name'];
        $catdesc = $row['category_description'];
    }
    ?>

    <?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        //Insert thread  into Database
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];

        //Saving website from Potenial XSS Attack
        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);
        
        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);
        
        $sno = $_POST['sno'];
        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`)
         VALUES ('$th_title','$th_desc', '$id', '$sno', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your thread has been added! Please wait for community to respond.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>

    <!-- Category container start here -->

    <div class="container my-4" id="category">
        <div class="jumbotron">
            <h1 class="display-4" id="cattitle">Welcome to <?php echo $catname; ?> Forum!</h1>
            <p class="lead" id="catdesc"><?php echo $catdesc; ?> </p>
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed.
                Do not post copyright-infringing material. Do not post “offensive” posts, links or images.
                Do not cross post questions. Remain respectful of other members at all times.</p>

        </div>
    </div>

    <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo'
    <div class="container" id="form">
        <h1>Start the Discussion!!</h1>
        <form action="' .$_SERVER["REQUEST_URI"]. '" method="post">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Problem title</label>
                <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" autocomplete="off" required>
                <div id="emailHelp" class="form-text">Keep your title concise!</div>
            </div>
            <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Elaborate your concern.</label>
                <textarea class="form-control" id="desc" name="desc" rows="3" autocomplete="off" required></textarea>
            </div>
            <button type="submit" class="btn btn-success mb-2">Submit</button>
        </form>
    </div>';
    }
    else{
        echo '<div class="container">
        <h1>Start the Discussion!!</h1>
        <p class="lead">You are not logged in. Please Login to start a discussion.</p>
    </div>';
    }
    ?>
    

    

    <div class="container" >
        <h1 class="py-2">Browse Questions</h1>
        <?php
        $id = $_GET['catid'];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['thread_id'];
            $title = $row['thread_title'];
            $desc = $row['thread_desc'];
            $thread_time = $row['timestamp'];

            //sql query to display user email
            $thread_user_id = $row['thread_user_id'];
            $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            


            echo' <div class="media my-3" id="categorythread">
            <img src="imgs/user.jpg" width="35px" class="mr-3" alt="...">
            <div class="media-body mb-5">
            <p class="my-0">Asked by:<b> ' .$row2['user_email']. ' at '.$thread_time.'</b></p>
                <h5 class="mt-0"><a href="thread.php?threadid='.$id.'" class="text-dark">'.$title.'</a></h5>
                ' .$desc.'
            </div>
        </div>';

        }
        if($noResult){
            echo'<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <p class="display-4">No result found!</p>
              <p class="lead">No discussion is started yet, be the first person to start the discussion.</p>
            </div>
          </div>';
        }
        ?>
    </div>



        

        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" ></script>
<script src="js/validation3.js"  ></script>
<script src="js/validation2.js"  ></script>
<script src="js/validation.js" ></script>

</html>