<?php

Print '<script>alert("Into Movie View");</script>'; //Prompts the user

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Movie Booking Interface </title>
  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
  <script src="jquery-3.2.1.js" type="text/javascript" ></script>
  <script src="bootstrap.min.js" type="text/javascript" ></script>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php
   session_start(); //starts the session
   if($_SESSION['user_username']){ // checks if the user is logged in  
   }
   else{
      header("location: home.html"); // redirects if user is not logged in
   }
   $user = $_SESSION['user_username']; //assigns user value
   ?>

</head>
<body background='./movies-images/movie_booking_backgroung3.jpg'>


<div class="container-fluid">
  <div class="row">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="movies-images/1-JL.jpg" style="width: 50%; margin: auto;" alt="Chania">
      <div class="carousel-caption">
        <strong>
        <h2 style="color:white;">The Justice League</h2>
        <h3 style="color:white;">Movie Id - 1</h3>
        </strong>
      </div>
    </div>

    <div class="item">
      <img src="movies-images/2-TPH.jpg" style="width: 50%; margin: auto;" alt="Chicago">
      <div class="carousel-caption">
         <strong>
        <h2 style="color:white;">The Pursuit Of  Happyness</h2>
        <h3 style="color:white;">Movie Id - 2</h3>
        </strong>
      </div>
    </div>

    <div class="item">
      <img src="movies-images/3-TC3.jpg" style="width: 50%; margin: auto;" alt="New York">
      <div class="carousel-caption">
        <strong>
        <h2 style="color:white;">The Conjuring 3</h2>
        <h3 style="color:white;">Movie Id - 3</h3>
        </strong>
      </div>
    </div>
  </div>


  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


</div>
<div class="row">
  <div style="margin:20px auto;width:50%;"> 
    <span style="text-align:center; color:white;">
    <h2>Home Page</h2>
        <p>Hello <?php Print "$user"?>!</p> 

        <button class="btn btn-success btn-group-justified"><a href="logout.php"><p style="color:black;">LOGOUT</p></a></button><br/><br/>
    </span>
  </div>
</div>


<div class="row">

<div>
  <br>
  <br>
<form class="form-horizontal" action="book_ticket.php" method="POST">
<fieldset>
<br>
<br>
<!-- Form Name -->
<legend style="text-align:center;color:white;">Movie Booking</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="movie_id"  style="color:white;">Movie </label>  
  <div class="col-md-4">
  <input id="movie_id" name="movie_id" type="text" placeholder="Movie Id" class="form-control input-md" required="">
  
  <span class="help-block"></span>  
  </div>
</div>


<!--  Select Basic 




<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic" style="color:white;">Movie Time Slot</label>
  <div class="col-md-4">
    <select id="selectbasic" name="selectbasic" class="form-control">
      <option value="1">9-11 AM</option>
      <option value="2">12-2 PM</option>
      <option value="3">5-7 PM</option>

    </select>
  </div>
</div>

-->



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="submit_button"></label>
  <div class="col-md-4">
    <button id="submit_button" name="submit_button" type="submit" class="btn btn-info">Book Ticket</button>
    
    <?php

    Print "<script>alert('congratulation your ticket has been booked\n check your phone for confirmation)</script>"



    ?>
  </div>
  </div>

</fieldset>
</form>


</div>

</div>  
</body>
</html>

