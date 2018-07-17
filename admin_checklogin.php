<?php
  
  session_start();

  $con=mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  
  $username = mysqli_real_escape_string($con,$_POST['username']);
  $password = mysqli_real_escape_string($con,$_POST['password']);
  // mysqli_connect("localhost", "root","") or die(mysql_error()); //Connect to server
  mysqli_select_db($con,"first_db") or die("Cannot connect to database"); //Connect to database
  $query = mysqli_query($con,"SELECT * from admins WHERE admin_name='$username'"); //Query the users table if there are matching rows equal to $username
  $exists = mysqli_num_rows($query); //Checks if username exists
  $table_users = "";
  $table_password = "";
  if($exists > 0) //IF there are no returning rows or no existing username
  {
    while($row = mysqli_fetch_assoc($query)) //display all rows from query
    {
      $table_users = $row['admin_name']; // the first username row is passed on to $table_users, and so on until the query is finished
      $table_password = $row['admin_password']; // the first password row is passed on to $table_users, and so on until the query is finished
    }
    if(($username == $table_users) && ($password == $table_password)) // checks if there are any matching fields
    {
        if($password == $table_password)
        {
          $_SESSION['admin_username'] = $username; //set the username in a session. This serves as a global variable
          Print "<script>alert('Login Successfull!');</script>";
          //header("location: home.html"); // redirects the user to the authenticated home page
          Print '<script>window.location.assign("http://localhost/phpmyadmin/db_structure.php?server=1&db=first_db");</script>';

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
