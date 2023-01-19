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
        /* #footer{
            position: fixed;
            left: 0;
            bottom: 0;
            margin-top: 100px;
            width: 100%;
            background-color: red;
            color: white;
            text-align: center;
        } */
        #thread{
            border: solid 2px;
            background-color: lavenderblush;
            font-family: 'Roboto', sans-serif;
            font-weight: 500;
            font-size: 18px;

        }

        #cattitle{
            text-decoration: underline;
            font-weight: 400;
            font-size: 40px;

        }

        #catdesc{
            font-size: 20px;
        }
        
        #postby{
            text-decoration: underline;
        }

        #comments{
            border: solid 2px;
            background-color: lavenderblush;
            border-radius: 5px;
            min-height: 20vh;
        }
        #commentform{
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
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id=$id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $title = $row['thread_title'];
        $desc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        //Query to users table to find out original comment poster.
        $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $posted_by = $row2['user_email'];


    }
    ?>

<?php
    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST'){
        //Insert comments into Database
        $comment = $_POST['comment'];
        //Saving website from Potential XSS Attack.
        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);
        $sno = $_POST['sno'];
        
        $sql = "INSERT INTO `comment` (`comment_content`, `thread_id`, `comment by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        if($showAlert){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your comment has been posted.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    }
    ?>



    <!-- Category container start here -->

    <div class="container my-4" id="thread">
        <div class="jumbotron">
            <h1 class="display-4" id="cattitle"> <?php echo $title; ?></h1>
            <div class="container" id="contdesc"><p class="lead" id="catdesc"><?php echo $desc; ?> </p></div>
            
            
            <hr class="my-4">
            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed.
                Do not post copyright-infringing material. Do not post “offensive” posts, links or images.
                Do not cross post questions. Remain respectful of other members at all times.</p>
                <p>Posted by: <b><em> <?php echo $posted_by ; ?></em></b></p>
        </div>
    </div>



    <!-- Container for posting a comment -->
    <?php
    

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    echo'
    <div class="container" id="commentform">
        <h1>Post a Comment!!</h1>
        <form action="' .$_SERVER["REQUEST_URI"]. '" method="post">
           
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Type your comment.</label>
                <textarea class="form-control" id="comment" name="comment" rows="3" autocomplete="off" required></textarea>
                <input type="hidden" name="sno" value="'.$_SESSION["sno"].'">
            </div>
            <button type="submit" class="btn btn-success mb-2">Post Comment</button>
        </form>
    </div>';
}
else{
    echo '<div class="container">
        <h1>Post a Comment!!</h1>
        <p class="lead">You are not logged in. Please Login to post a comment.</p>
    </div>';
}

    ?>

<!-- container for fetching comments from db -->
    <div class="container" >
        <h1 class="py-2">Discussion!</h1>
        <?php
        $id = $_GET['threadid'];
        $sql = "SELECT * FROM `comment` WHERE thread_id=$id";
        $result = mysqli_query($conn, $sql);
        $noResult = true;
        while($row = mysqli_fetch_assoc($result)){
            $noResult = false;
            $id = $row['comment_id'];
            $content = $row['comment_content'];
            $comment_time = $row['comment_time'];

            //displaying the email of the user in comment
            $Comment_by = $row['comment by'];
            $sql2 = "SELECT user_email FROM `users` WHERE sno='$Comment_by'";
            $result2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            
            echo' <div class="media my-3 " id="comments">
            <img src="imgs/user.jpg" width="35px" class="mr-3" alt="...">
            <div class="media-body">
            <p class="fw-bold my-0" id="postby">'.$row2['user_email']. ' at '.$comment_time.'</p>
                '.$content.'
            </div>
        </div>';

        }
        if($noResult){
            echo'<div class="jumbotron jumbotron-fluid" id="comments">
            <div class="container" id="sd">
              <p class="display-4">No result found!</p>
              <p class="lead">No discussion is started yet, be the first person to start the discussion.</p>
            </div>
          </div>';
        }
        ?>
       


    

       

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