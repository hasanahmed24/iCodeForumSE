<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSSfiles/stars.css">

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
    #about{
      border: solid 2px;
      border-radius: 5px;
      background-color: lavenderblush;
    }
    
    </style>
    <title>iDiscussion | Coding Forum</title>
</head>

<body>
    <?php include "partials/_dbconnect.php" ?>
    <?php include "partials/_header.php" ?>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="imgs/slider_4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="imgs/slider_1.jpg" class="d-block w-100" alt="...">
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
    <section>
    <div class="star star1"></div>
        <div class="star star2"></div>
        <div class="star star3"></div>
        <div class="star star4"></div>
        <div class="star star5"></div>
        <div class="star star6"></div>
        <div class="star star7"></div>
        <div class="star star8"></div>

    
    <div class="container my-4" id="catg">
    <h1 class="text-center" id="h2">About Us</h1>
    <div class="container mb-5" id="about">
    
        <p>
            <h2><b> Forum rules </b><br></h2>
            Thanks for participating in our community. To ensure the best possible experience for all members, we have
            established some basic guidelines for participation.

            By joining and using these forum, you agree that you have read and will follow the rules and guidelines set
            for these peer discussion groups. You also agree to reserve forum discussions for topics best suited to the
            medium. This is a great medium with which to solicit the advice of your peers, benefit from their
            experience, and participate in an ongoing conversation.

            Please take a moment to acquaint yourself with these important guidelines. To preserve a climate that
            encourages both civil and fruitful dialogue, EASSW reserves the right to suspend or terminate membership on
            all forum for members who violate these rules.<br>
            <br>
            <h3><b>THE RULES</b><br></h3>
            <ul>
            <li>Don’t challenge or attack others. The discussions on the forum are meant to stimulate conversation, not to
            create contention. Let others have their say, just as you may.</li>
            <li>Don’t post commercial messages. Contact people directly with product and service information if you believe
            it would help them.</li>
            <li>All defamatory, abusive, profane, threatening, offensive, or illegal materials are strictly prohibited. Do
            not post anything in a post message that you would not want the world to see or that you would not want
            anyone to know came from you.</li>
            <li>Please note carefully all items posted in the disclaimer and legal rules below, particularly regarding the
            copyright ownership of information posted to the topic.</li>
            <li>Remember that EASSW and other forum participants have the right to reproduce postings to this forum.
            Send your message only to the most appropriate topic(s). Do not spam several topics with the same message.
            Include a signature tag on all messages. Include your name, affiliation, location, and e-mail address.
            State concisely and clearly the topic of your comments in the subject line. This allows members to respond
            more appropriately to your posting and makes it easier for members to search the archives by subject.</li>
            <li>Include only the relevant portions of the original message in your reply. Delete any header information and
            put your response before the original posting.</li>
            <li>Only send a message to the entire forum when it contains information that can benefit everyone.
            Send messages such as “thanks for the information” or “me, too” to individuals – not to the entire forum.</li>
            <li>Use the Web interface to change your settings or to remove yourself from a topic. If you are changing e-mail
            addresses, you do not need to remove yourself from the forum and rejoin under your new e-mail address.
            Simply change your settings.</li>
            <li>Warn other topic subscribers of lengthy messages either in the subject line or at the beginning of the
            message body with a line that says “Long Message.”</li>
            </ul>
        </p>
    </div>
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
<script src="js/validation3.js"  ></script>
<script src="js/validation2.js"  ></script>
<script src="js/validation.js" ></script>


</html>