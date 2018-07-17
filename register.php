<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){
  
  Print '<script>alert("into the php file!!");</script>'; // Prompts the user

  $bool = true;
  $con = mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysqli_select_db($con,"first_db") or die("Cannot connect to database"); //Connect to database

  $username = mysqli_real_escape_string($con,$_POST['username']);
  $password = mysqli_real_escape_string($con,$_POST['password']);
  $ph_number    = mysqli_real_escape_string($con,$_POST['ph_number']);


  $query = mysqli_query($con,"Select * from users"); //Query the users table
  while($row = mysqli_fetch_array($query)) //display all rows from query
  {
    $table_users = $row['username']; // the first username row is passed on to $table_users, and so on until the query is finished
    if($username == $table_users) // checks if there are any matching fields
    {
      $bool = false; // sets bool to false
      Print '<script>alert("Username has been taken!");</script>'; //Prompts the user
      Print '<script>window.location.assign("register.php");</script>'; // redirects to register.php
    }
  }
  if($bool) // checks if bool is true
  {
    mysqli_query($con,"INSERT INTO users (ph_number,username, password) VALUES ('$ph_number','$username','$password')"); //Inserts the value to table users
    Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
    Print '<script>window.location.assign("home.html");</script>'; // redirects to register.php
  }

}

?>