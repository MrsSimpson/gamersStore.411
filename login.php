<?php
session_start();
$_SESSION['message'] = '';

DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_NAME', 'gamers_store');

$link = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);


if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}

if(isset($_POST['username'])){
     $uname = $_POST['username'];
     $password = $_POST['password'];


     $result = mysqli_query($link,"SELECT * FROM users WHERE user_name = '$uname'");

     if ($result->num_rows == 0){
         echo "User with that user name does not exist!";
         exit();
     }

     else
         {
             $user = $result->fetch_assoc();

             if ($_POST["password"] != $user['password']) {
                 echo "You Have Entered an Incorrect Password.";
                 exit();
             }
             else {


                 if ($user['user_type'] == 'admin')
                 {
                     header("location: admin_interface.php");
                     exit();
                 }
                 else if ($user['user_type'] == 'customer')
                 {
                     header("location: customer_interface.php");
                     exit();
                 }
                 else if ($user['user_type'] == 'vendor')
                 {
                     header("location: vendor_interface.php");
                     exit();
                 }
                 else if ($user['user_type'] == 'employee')
                 {
                     header("location: employee_interface.php");
                     exit();
                 }
                 else if ($user['user_type'] == 'report')
                 {
                     header("location: salesReport_interface.php");
                     exit();
                 }
                 exit();
             }

         }


    }
    ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="menuStyle.css">
        <meta charset="UTF-8">
         <title>Title</title>
    </head>
<body>
<h1>Welcome to the Gamer's Store</h1>
<h3>Please log in</h3>
<div class="container">
<form method="POST" action="#">
    <div class="form_input">
        <input type="text" name="username" placeholder="Enter Your User Name"/>
    </div>
    <div class="form_input">
        <input type="password" name="password" placeholder="Enter Your Password"/>
    </div>
    <input type="submit" name="submit" value="LOGIN" class="btn-login"/>
</form>
</div>

</body>
</html>