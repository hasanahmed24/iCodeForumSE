<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="/js/validation.js" defer></script> -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSSfiles/stars.css">
    
    
    <style>
        /* body{
            background: black !important;
        } */
        
        /* #footer{
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: red;
            color: white;
            text-align: center;
            
        } */
    </style>

    <title>iDiscussion | Coding Forum</title>
</head>

<body>
    <?php include "partials/_dbconnect.php" ?>
    <?php include "partials/_header.php" ?>
    
    <!-- Slider start here -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imgs/slider_4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="imgs/slider_2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="imgs/slider_3.jpg" class="d-block w-100" alt="...">
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

    <section >
    
        <div class="star star1"></div>
        <div class="star star2"></div>
        <div class="star star3"></div>
        <div class="star star4"></div>
        <div class="star star5"></div>
        <div class="star star6"></div>
        <div class="star star7"></div>
        <div class="star star8"></div>


    
         <!-- Category container start here -->
    <div class="container my-4" id="catg">
    <h2 class="text-center" id="h2">iDiscussion - Browse Categories</h2>
        <div class="row my-4">
      <!-- Fetch all the categories from database  -->
       <!-- use a loop to iterate categories -->

    <?php
      $sql = "SELECT * FROM `categories`";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
        $id = $row['category_id'];
        $cat = $row['category_name'];
        $desc = $row['category_description'];
        echo'<div class="col-md-4 my-3">
        <div class="card" style="width: 18rem;">
            <img src="imgs/card-' .$id. '.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><a href="threadlist.php?catid=' .$id. '">'. $cat .'</a></h5>
                <p class="card-text">'. substr($desc,0,80) .'.....</p>
                <a href="threadlist.php?catid=' .$id. '" class="btn btn-primary">View Threads</a>
            </div>
        </div>
    </div>';
      }

    ?>
    
    </section>

    <?php include "footer.php" ?>

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
<script src="/js/validation3.js"  ></script>
<script src="js/validation2.js"  ></script>
<script src="js/validation.js" ></script>

</html>