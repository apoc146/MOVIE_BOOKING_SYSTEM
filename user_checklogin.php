<?php
  
  session_start();

  $con=mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  
  $username = mysqli_real_escape_string($con,$_POST['username']);
  $password = mysqli_real_escape_string($con,$_POST['password']);
 // $ph_number = mysqli_real_escape_string($con,$_POST['ph_number']);
  // mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysqli_select_db($con,"first_db") or die("Cannot connect to database"); //Connect to database
  $query = mysqli_query($con,"SELECT * from users WHERE username='$username'"); //Query the users table if there are matching rows equal to $username
  $exists = mysqli_num_rows($query); //Checks if username exists
  $table_users = "";
  $table_password = "";
  if($exists > 0) //IF there are no returning rows or no existing username
  {
    while($row = mysqli_fetch_assoc($query)) //display all rows from query
    {
      $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
      $table_password = $row['password']; // the first password row is passed on to $table_users, and so on until the query is finished
      $table_ph_number = $row['ph_number'];
    }
    if(($username == $table_users) && ($password == $table_password)) // checks if there are any matching fields
    {
        if($password == $table_password)
        {
          $_SESSION['user_username'] = $username; //set the username in a session. This serves as a global variable
          $_SESSION['user_ph_number'] = $ph_number ;//fetching the phone number from data base
          


          Print "<script>alert('User Login Successfull!');</script>";
          //header("location: home.html"); // redirects the user to the authenticated home page
          Print '<script>window.location.assign("movie_view.php");</script>';

        }
        
    }
    else
    {
      Print '<script>alert("Incorrect Password!");</script>'; //Prompts the user
      Print '<script>window.location.assign("home.html");</script>'; // redirects to login.php
    }
  }
  else
  {
    Print '<script>alert("Incorrect Username!");</script>'; //Prompts the user
    Print '<script>window.location.assign("home.html");</script>'; // redirects to login.php
  }
?>
