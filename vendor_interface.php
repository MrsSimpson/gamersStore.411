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
<h1>GAMER'S STORE VENDOR</h1>
<div class="vertical-menu">

    <a href="#" class="active">Please Select An Option</a>
    <a href="vendor_interface.php?button1=string">See all store's instock quantity count for Xbox products </a>
    <a href="vendor_interface.php?button2=string">See all store's instock quantity count for Playstation products </a>

</div>

</body>
</html>
<?php

// query to see items in stock for all stores for xbox brand items
if(isset($_GET['button1'])) {

    $query = "SELECT * FROM inventory
              WHERE upc = 'Cs-0001'OR upc = 'As-3333' OR upc = 'As-9898' OR upc = 'Gc-1111'";
    $response = mysqli_query($link, $query);


 if (mysqli_num_rows($response) > 0) {
     echo "<table align='center'
        cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>Store ID </b></td>
        <td align='left'><b>UPC</b></td>
        <td align='left'><b>Total In Stock</b></td>";

     while ($row = mysqli_fetch_array($response)) {
         echo "<tr>";
         echo "<td>" . $row['store_id'] . "</td>";
         echo "<td>" . $row['upc'] . "</td>";
         echo "<td>" . $row['total_instock'] . "</td>";
         echo "</tr>";
     }
     echo "</table>";
     mysqli_free_result($response);
 } else {
     echo "ERROR: Could not execute $query." . mysqli_error($link);
 }
 }
//$query1 = "SELECT COUNT(DISTINCT(store_id)) AS store_count
//              FROM purchase NATURAL JOIN purchase_item
//              WHERE upc = 'Cs-0001'";

//write query to see items instock for all stores for playstation
if(isset($_GET['button2'])) {

    $query = "SELECT * FROM inventory
              WHERE upc = 'Cs-0002'OR upc = 'As-4444' OR upc = 'As-8787' OR upc = 'Gc-2222'";
    $response = mysqli_query($link, $query);


    if (mysqli_num_rows($response) > 0) {
        echo "<table align='center'
        cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>Store ID </b></td>
        <td align='left'><b>UPC</b></td>
        <td align='left'><b>Total In Stock</b></td>";

        while ($row = mysqli_fetch_array($response)) {
            echo "<tr>";
            echo "<td>" . $row['store_id'] . "</td>";
            echo "<td>" . $row['upc'] . "</td>";
            echo "<td>" . $row['total_instock'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($response);
    } else {
        echo "ERROR: Could not execute $query." . mysqli_error($link);
    }
}
?>

</body>
</html>