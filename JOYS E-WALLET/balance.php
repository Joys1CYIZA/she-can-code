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
// if($con){
//     echo "<h1>Thank you for creating account</h1>";
// }
// else{
//     echo "not connected";
// }

?>

<!DOCTYPE html>
<html>
<head>
<title>XYZ|BALANCE</title>
<link rel="stylesheet" type="text/css" href="ol.css">
<style>
    h1{
        text-align:center;
    }
    nav{
        width: 100%;
        height: 50px;
        background-color: rgb(17, 131, 224);
        color:white;
    }
    nav>ul{
        list-style: upper-norwegian;
    /* text-align: center; */
    padding-top: 5px;
    padding-bottom: 5px;
    }
    nav>ul>li{
        display: inline;
    font-size: 18px;
    margin: 30px;
    font: none;-size: arial;
    }
    nav>ul>li>a{
        color:#fff;
        text-decoration:none;
    }
    .log{
        float : right;
        padding-left: 20px;
        margin-top:0;
    }
</style>
</head>
<body bgcolor="sky blue">

    <nav>
        <ul>
            <li> <a href="send.php">send</a></li>
            <li> <a href="#">receive</a> </li>
            <li> <a href="#">deposit</a></li>
            <li class="log" >hello <?php
     echo $_SESSION['username']
  ?></li>
                <li class="log" ><a href="logout.php">logout</a></li>
        </ul>
               

    </nav> 

<h1>YOUR BALANCE </h1><br>

<table border="1" width="200">
<thead>
    <th>Balance</th>
</thead>

<?php
$sql="SELECT * FROM users where username='".$_SESSION['username']."' limit 1";
$run=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($run)){
$a=$row['balance'];
?>
<tr>
  <td><?php echo $a;?></td>
  
</tr>
<?php } ?>
</table>
   </div>
</body>
<br>
    <head>
        <title>logout</title>
    </head>
    <body>
    </body>
</html>
