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
<h1>GAMER'S STORE ADMIN</h1>
<div class="vertical-menu">

    <a href="#" class="active">Please Select An Option</a>
    <a href="admin_interface.php?button1=string&myothervar=myotherstring">See a list of all registered users</a>
    <a href="admin_interface.php?button2=string&myothervar=myotherstring">See a list of all customers who have accounts with the Gamer Store</a>
    <a href="admin_interface.php?button3=string&myothervar=myotherstring">See a list of all products carried by the Gamer Store</a>
    <a href="admin_interface.php?button4=string&myothervar=myotherstring">See a list of all orders that have been placed with The Online Gamer's Store</a>
    <a href="admin_interface.php?button5=string&myothervar=myotherstring">See a list of all Gamer's Stores</a>

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

else if(isset($_GET['button2'])){

    $button = $_GET['button2'];
    $query = "SELECT * FROM gamers_store.customer";
    $response = mysqli_query($link, $query);

    if (mysqli_num_rows($response) > 0) {
        echo "<table align='center'
        cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>Customer Email </b></td>
        <td align='left'><b>Customer Name</b></td>
        <td align='left'><b>Customer Password</b></td>
        <td align='left'><b>Rewards Member</b></td>";

        while ($row = mysqli_fetch_array($response)) {
            echo "<tr>";
            echo "<td>" . $row['customer_email'] . "</td>";
            echo "<td>" . $row['customer_name'] . "</td>";
            echo "<td>" . $row['customer_password'] . "</td>";
            echo "<td>" . $row['rewards_mem'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($response);
    } else {
        echo "ERROR: Could not execute $query." . mysqli_error($link);
    }

}

else if(isset($_GET['button3'])){

    $query = "SELECT * FROM gamers_store.product";
    $response = mysqli_query($link, $query);

    if (mysqli_num_rows($response) > 0) {
        echo "<table align='center'
        cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>Product UPC </b></td>
        <td align='left'><b>Product Name</b></td>
        <td align='left'><b>Price</b></td>
        <td align='left'><b>Type</b></td>";

        while ($row = mysqli_fetch_array($response)) {
            echo "<tr>";
            echo "<td>" . $row['upc'] . "</td>";
            echo "<td>" . $row['prod_name'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['prod_type'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($response);
    } else {
        echo "ERROR: Could not execute $query." . mysqli_error($link);
    }

}

else if(isset($_GET['button4'])){
    $query = "SELECT * FROM gamers_store.purchase";
    $response = mysqli_query($link, $query);

    if (mysqli_num_rows($response) > 0) {
        echo "<table align='center'
        cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>Order Number</b></td>
        <td align='left'><b>Customer Email</b></td>
        <td align='left'><b>Store ID</b></td>
        <td align='left'><b>Purchase Date</b></td>
        <td align='left'><b>Purchase Total</b></td>";

        while ($row = mysqli_fetch_array($response)) {
            echo "<tr>";
            echo "<td>" . $row['purchase_id'] . "</td>";
            echo "<td>" . $row['customer_email'] . "</td>";
            echo "<td>" . $row['store_id'] . "</td>";
            echo "<td>" . $row['purchase_date'] . "</td>";
            echo "<td>" . $row['purchase_total'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($response);
    } else {
        echo "ERROR: Could not execute $query." . mysqli_error($link);
    }

}

else if(isset($_GET['button5'])){
    $query = "SELECT * FROM gamers_store.store";
    $response = mysqli_query($link, $query);

    if (mysqli_num_rows($response) > 0) {
        echo "<table align='center'
        cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>Store ID</b></td>
        <td align='left'><b>State</b></td>
        <td align='left'><b>Phone Number</b></td>";

        while ($row = mysqli_fetch_array($response)) {
            echo "<tr>";
            echo "<td>" . $row['store_id'] . "</td>";
            echo "<td>" . $row['state'] . "</td>";
            echo "<td>" . $row['phone_num'] . "</td>";

            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($response);
    } else {
        echo "ERROR: Could not execute $query." . mysqli_error($link);
    }

}

?>