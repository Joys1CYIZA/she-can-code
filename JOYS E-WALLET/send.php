<?php

session_start();

if(!isset($_SESSION['username'])){
    echo "<script>alert('not logged in ...')</script>";
    header('location:signin.php');
  }else {
    //echo "logged in ...";
  }

$servername='localhost';
$username='root';
$password='';
$database='mywallet';
$con=mysqli_connect($servername,$username,$password,$database);
if($con){
   // echo "<h1>Thank you for creating account</h1>";
}
else{
    echo "not connected";
}

if (isset($_POST['send'])){

    $email=$_POST['email'];
    $amount=$_POST['amount'];
  


    $sql3="SELECT * FROM users where username='".$_SESSION['username']."' limit 1";
    
    $run=mysqli_query($con,$sql3);
    while($row2=mysqli_fetch_array($run)){
    $b=$row2['balance'];
    $d = $b + $amount;
    $sql4 = "UPDATE users SET balance=$d WHERE email='".$email."'";
    }
    $sql="select * from users where email='".$email."' limit 1";
    $runn=mysqli_query($con,$sql);
    while($row=mysqli_fetch_array($runn)){
    $a=$row['balance'];
    $c = $a + $amount;
    $sql2 = "UPDATE users SET balance=$c WHERE email='".$email."'";


    if ($con->query($sql2) === TRUE) {
       // echo "money sent successfully";
       
        header('location:balance.php');
        //}
        
      } else {
        echo "Error : " . $conn->error;
      }

    }


    

  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>send money</h1>
    <form action="" method="post">
        <input type="text" name="email" id="" placeholder="enter receive email">
        <input type="number" name="amount" id="" placeholder="enter amount">
        <input type="submit" value="send" name="send">
    </form>
</body>
</html>

