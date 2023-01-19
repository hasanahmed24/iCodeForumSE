


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<!-- <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" ></script>
<script src="js/validation2.js" async ></script>
<script src="js/validation.js" async></script> -->

<style>
  #Navbar{
    /* background-color: #00008B !important; */
    font-family: 'Roboto', sans-serif;
    /* font-size: 18px; */
   
    
  }
  #button{
    background: #152238;
    display: inline-block;
    color: #fff;
    text-decoration: none;
    padding: 8px 16px;
    border: 3px solid #3c67e3;
    border-radius: 8px; 
  }
  #button:hover{
    animation: pulsate 1s ease-in-out;
  }
  @keyframes  pulsate{
    0%{
      box-shadow: 0 0 20px #5ddcff,
      0 0 30px #4e00c2;
    }
  }
  .navbar-brand{
    font-size: 18px;
  }
  #button1{
    font-size: 18px;
    background: #152238;
    display: inline-block;
    color: #fff;
    text-decoration: none;
    padding: 6px 12px;
    border: 0px solid #3c67e3;
    box-shadow: 0 0 8px #5ddcff;
    border-radius: 8px; 
    margin-right: 8px;
    
  }
  #button1:hover{
    animation: pulsate 1s ease-in-out;
  }
  @keyframes  pulsate{
    0%{
      box-shadow: 0 0 15px #5ddcff,
      0 0 20px #4e00c2;
    }
  }
  #navbarDropdown{
    font-size: 18px;
    background: #152238;
    display: inline-block;
    color: #fff;
    text-decoration: none;
    padding: 6px 12px;
    border: 0px solid #3c67e3;
    box-shadow: 0 0 8px #5ddcff;
    border-radius: 8px; 
    margin-right: 8px;
    
  }
  #navbarDropdown:hover{
    animation: pulsate 1s ease-in-out;
  }
  @keyframes  pulsate{
    0%{
      box-shadow: 0 0 15px #5ddcff,
      0 0 20px #4e00c2;
    }
  }

</style>

<?php
session_start();

echo'<nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="Navbar">
<div class="container-fluid">
  <a class="navbar-brand" href="/SE/index.php" id="button1">iDiscussion</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/SE/index.php" id="button1">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/SE/about.php" id="button1">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Top Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

        $sql = "SELECT category_name, category_id FROM `categories` LIMIT 3";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          echo'
          <li><a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">' .$row['category_name']. '</a></li>';

        }

         
      //     <li><a class="dropdown-item" href="#">Another action</a></li>
      //     <li><hr class="dropdown-divider"></li>
      //     <li><a class="dropdown-item" href="#">Something else here</a></li>
       echo'  </ul>
       </li>
      
      <li class="nav-item">
        <a class="nav-link " href="/SE/contact.php" id="button1">Contact</a>
      </li>
    </ul>
    <div class="mx-2">';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      echo'
      
      <a href="partials/_logout.php" button class="btn btn-outline-success" id="button" >Logout</button></a>
      
      </div>
      <p class="text-light my-0 mx-2">Welcome '.$_SESSION['useremail']. ' </p>
      <form class="d-flex" method="get" action="search.php">
      <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" id="button" type="submit">Search</button>
    </form>';
    }
    else{
      echo'
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#loginModal" id="button">Login</button>
        <button class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#signupModal" id="button" >Signup</button>
        </div>
      <form class="d-flex"method="get" action="search.php">
      <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-success" type="submit" id="button">Search</button>
    </form>';
    }

echo'   
  </div>
</div>
</nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
// include 'footer.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true"){
  echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> Your Account has been created and you can now Login.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

}
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error!</strong> Email already in use or password dont match. Kindly Check!
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

// if(isset($_GET['emailsubscribersuccess']) && $_GET['emailsubscribersuccess'] == "true"){
//   echo'<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
//   <strong>Success!</strong> Your Email Subscription has been subscribed.
//   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
// </div>';

// }

?>
