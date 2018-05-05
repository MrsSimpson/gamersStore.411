<?php
session_start();
include_once 'login.php';
?>


<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <link rel="stylesheet" href="menuStyle.css">
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
echo "Welcome to the admin site for The Gamer's Store";

?>

<div class="vertical-menu">
    <a href="#" class="active">Please Select An Option</a>
    <a href="admin_interface.php?button1=string&myothervar=myotherstring">See a list of all registered users</a>
    <a href="admin_interface.php?button2=string&myothervar=myotherstring">See a list of all customers who have accounts with the Gamer Store</a>
    <a href="admin_interface.php?button3=string&myothervar=myotherstring">See a list of all products carried by the Gamer Store</a>
    <a href="admin_interface.php?button4=string&myothervar=myotherstring">See a list of all orders that have been placed with The Online Gamer's Store</a>
</div>

</body>
</html>

<?php

if(isset($_GET['button1']))
{
    $button = $_GET['button1'];
    $query = "SELECT * FROM gamers_store.users";
    $response = mysqli_query($link, $query);

    if (mysqli_num_rows($response) > 0) {
        echo "<table align='left'
        cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>User Name </b></td>
        <td align='left'><b>Password</b></td>
        <td align='left'><b>User Type</b></td>";

        while ($row = mysqli_fetch_array($response)) {
            echo "<tr>";
            echo "<td>" . $row['user_name'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['user_type'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($response);
    } else {
        echo "ERROR: Could not execute $query." . mysqli_error($link);
    }
}

if(isset($_GET['button2'])){
    $button = $_GET['button2'];
    echo "button2";
}

?>