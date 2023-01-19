<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style > 
        
    /* #footer {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        background-color: red;
        color: white;
        text-align: center;

    } */
    #contact1{
      border: solid 2px;
      border-radius: 5px;
      background-color: lightblue;
      color: black;
      font-weight: 600;
      font-family: 'Roboto', sans-serif;
    }
    #name{
      border-radius: 20px;
    }
    #cb{
      border-radius: 20px;
    }
    #email{
      border-radius: 20px;
    }
    #comment{
      border-radius: 20px;
    }
    .btn1{
        background-color: blue;
        display: inline-block;
        text-decoration: none;
        padding: 8px 16px;
        border-radius: 8px;
        letter-spacing: 1px;
        font-weight: 600;
        font-family: 'Roboto', sans-serif;
    }
    
    </style>
    <title>iDiscussion | Coding Forum</title>
</head>

<body>
    <?php include "partials/_dbconnect.php" ?>
    <?php include "partials/_header.php" ?>

     <!-- STORING USER CONTACT SUBMISSION IN DATABASE -->

     <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      
      $full_name = $_POST['name'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];

    if (empty($_POST["name"])) {
        die("Full name is required");
    }
    if (empty($_POST["email"])) {
        die("Email is required");
    }
    if (empty($_POST["comment"])) {
        die("comment is required");
    }

      $sql = "INSERT INTO `contact` (`user_full_name`, `user_email`, `user_comment`)
              VALUES ('$full_name', '$email', '$comment')";
      $result = mysqli_query($conn, $sql);
      if($result){
        echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
        <strong>Success!</strong> Your Contact information has been submitted.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      }

    }
    ?>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imgs/slider_4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="imgs/sl_1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="imgs/slider_2.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

 

    <!-- CONTACT FORM -->
    <h1 class="text-center mt-3">Contact Us</h1>

    <div class="container mb-5" id="contact1">
        <form action="/SE/contact.php" method="post" id="contact">
            <div class="mb-3" >
                <label for="name" class="form-label">Full Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name">
            </div>
            <div class="mb-3 mt-3" id="cb">
                <label for="email" class="form-label">Email:</label>
                <!-- <input type="email" class="form-control" id="email" placeholder=" your@email.com" name="email"> -->
                <input class="form-control" id="email" type="email" name="email" placeholder=" your@email.com">
            </div>
            <div>
            <label for="comment">Comments:</label>
            <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
            </div>
            <div class="text-center mb-5">
                <button type="submit" class="btn1 btn-primary mt-3" id="cb">Submit</button>
            </div>
            <!-- <div class="text-center mb-5">
                <button type="submit" class="btn btn-primary mt-3" id="cb">Submit</button>
            </div> -->
            
        </form>
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