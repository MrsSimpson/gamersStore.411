<?php
session_start();
include '/Users/LacyD/PhpstormProjects/untitled/gamersStore_dbConnection.php';

?>


<!DOCTYPE html>
<html>
<html lang="en">
<head>
    <link rel="stylesheet" href="menuStyle.css">
    <meta charset="UTF-8">
    <title>Gamer's Store Admin</title>
</head>
<body>
<h1>GAMER'S STORE CUSTOMER</h1>
<div class="vertical-menu">

    <a href="#" class="active">Please Select An Option</a>
    <a href="customer_interface.php?button1=string">See a list of all products carried by the Gamer Store</a>
    <a href="customer_interface.php?button2=string">See a list of all Gamer's Stores</a>

</div>

</body>
</html>

<?php

if(isset($_GET['button1'])){

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

if(isset($_GET['button2'])){
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