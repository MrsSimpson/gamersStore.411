<?php
session_start();
include 'gamersStore_dbConnection.php';

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
<h1>GAMER'S STORE Employee</h1>
<div class="vertical-menu">

    <a href="#" class="active">Please Select An Option</a>
    <a href="admin_interface.php?button1=string&myothervar=myotherstring">See a list of current orders pending</a>


</div>

</body>
</html>

<?php

if(isset($_GET['button1']))
{
    $button = $_GET['button1'];
    $query = "SELECT * FROM gamers_store.purchase";
    $response = mysqli_query($link, $query);

    if (mysqli_num_rows($response) > 0) {
        echo "<table align='center'
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
?>