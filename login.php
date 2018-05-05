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

//     $sql = "SELECT * FROM users WHERE user_name ='".$uname."' AND password='".$password."' limit 1";

     $result = mysqli_query($link,"SELECT * FROM users WHERE user_name = '$uname'");

     if ($result->num_rows == 0){
         echo "User with that user name does not exist!";
         exit();
     }

     else
         {
             $user = $result->fetch_assoc();
             //$passResult = mysqli_query($link, "SELECT 'password' FROM users WHERE user_name = '$uname' AND password = '$password'");

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
                 exit();
             }

         }


    }
    ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
         <title>Title</title>
    </head>
<body>
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