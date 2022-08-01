<?php
session_start();
$servername = "localhost";
$username = "root";
$password ="";
$db = "mywallet";

$con = mysqli_connect($servername, $username, $password,$db);

if (isset($_POST['username'])){

  $username=$_POST['username'];
  $password=$_POST['password'];

  $_SESSION['username'] = $username;

  
  $sql="select * from users where username='".$username."'AND password='".$password."' limit 1";

  $result=mysqli_query($con,$sql);

  if(mysqli_num_rows($result)==1){
    echo "<h1> you have successfully logged in </h1>";
    header('location:balance.php');
    exit();
  }
  else{
    echo "<h1>Incorrect username or password </h1>";
    exit();
  }
}
 
?>

<!DOCTYPE html>
<html>
<head>
  <title>LOGIN FORM</title>
  <link rel="stylesheet" type="text/css" href="Login.css">
</head>
<body>
<div class="login">
  <div class="login-triangle"></div>

  
  <h2 class="login-header">Log in</h2>

  <form action="#" method="post" class="login-container">
    <p><input type="UserName" placeholder="UserName" name="username"></p>
    <p><input type="password" placeholder="Password" name="password"></p>
    <p><input type="submit" value="Login"  name="send"></p>
     <p class="message">Not registered?<a href="register.php">Create account</p>
  </form>
</div>
</body>
</html>
