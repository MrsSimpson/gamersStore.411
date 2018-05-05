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
    <title>Sales Report</title>
</head>
<body>
<h1>GAMER'S STORE Sales Report</h1>
<div class="vertical-menu">

    <a href="#" class="active">Please Select An Option</a>
    <a href="salesReport_interface.php?button1=string&myothervar=myotherstring">See A List Of All Current Orders Pending</a>
    <a href="salesReport_interface.php?button2=string&myothervar=myotherstring">See A List Of All Complete Orders</a>
    <a href="salesReport_interface.php?button3=string&myothervar=myotherstring">Search A Specific Store For Pending Orders</a>


</div>

</body>
</html>

<?php

if(isset($_GET['button1']))
{
    $button = $_GET['button1'];
    $query = "SELECT * FROM gamers_store.purchase WHERE status = 'pending'";
    $response = mysqli_query($link, $query);

    if (mysqli_num_rows($response) > 0) {
        echo "<table align='center'
        cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>Order ID </b></td>
        <td align='left'><b>Customer</b></td>
        <td align='left'><b>Store ID</b></td>
        <td align='left'><b>Status</b></td>";

        while ($row = mysqli_fetch_array($response)) {
            echo "<tr>";
            echo "<td>" . $row['purchase_id'] . "</td>";
            echo "<td>" . $row['customer_email'] . "</td>";
            echo "<td>" . $row['store_id'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($response);
    } else {
        echo "ERROR: Could not execute $query." . mysqli_error($link);
    }
}


if(isset($_GET['button2']))
{
    $button = $_GET['button2'];
    $query = "SELECT * FROM gamers_store.purchase WHERE status = 'complete'";
    $response = mysqli_query($link, $query);

    if (mysqli_num_rows($response) > 0) {
        echo "<table align='center'
        cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>Order ID </b></td>
        <td align='left'><b>Customer</b></td>
        <td align='left'><b>Store ID</b></td>
        <td align='left'><b>Status</b></td>";

        while ($row = mysqli_fetch_array($response)) {
            echo "<tr>";
            echo "<td>" . $row['purchase_id'] . "</td>";
            echo "<td>" . $row['customer_email'] . "</td>";
            echo "<td>" . $row['store_id'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($response);
    } else {
        echo "ERROR: Could not execute $query." . mysqli_error($link);
    }
}

if(isset($_GET['button3'])) {

   include 'getStoreSelection.html';

if(isset($_POST['userInput'])) {

    $userInput = $_POST['userInput'];

        $query = "SELECT * FROM gamers_store.purchase WHERE purchase.store_id = $userInput";
        $response = mysqli_query($link, $query);

        if (mysqli_num_rows($response) > 0) {
            echo "<table align='center'
                 cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>Order ID </b></td>
            <td align='left'><b>Customer</b></td>
            <td align='left'><b>Store ID</b></td>
            <td align='left'><b>Status</b></td>";

            while ($row = mysqli_fetch_array($response)) {
                echo "<tr>";
                echo "<td>" . $row['purchase_id'] . "</td>";
                echo "<td>" . $row['customer_email'] . "</td>";
                echo "<td>" . $row['store_id'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($response);
        } else {
            echo "ERROR: Could not execute $query." . mysqli_error($link);
        }



}


}
?>


