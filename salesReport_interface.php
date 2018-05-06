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
    <title>Sales Report</title>
</head>
<body>
<h1>GAMER'S STORE SALES REPORT</h1>
<div class="vertical-menu">

    <a href="#" class="active">Please Select An Option</a>

    <a href="salesReport_interface.php?button1=string&myothervar=myotherstring">List three types of products that customers buy in addition to games</a>
    <a href="salesReport_interface.php?button2=string&myothervar=myotherstring">View in how many stores Xbox outsells Playstation</a>
    <a href="salesReport_interface.php?button3=string&myothervar=myotherstring">View the 5 stores with the most sales so far this year</a>
    <a href="salesReport_interface.php?button4=string&myothervar=myotherstring">View the 20 top-selling products in each state</a>
    <a href="salesReport_interface.php?button5=string&myothervar=myotherstring">View the 20 top-selling products at each store</a>


</div>

</body>
</html>

<?php

if(isset($_GET['button1']))
{
    $query = "SELECT DISTINCT(prod_type)
              FROM product NATURAL JOIN 
                    (SELECT purchase_id
                    FROM product NATURAL JOIN purchase_item NATURAL JOIN purchase
                    WHERE prod_type LIKE '%game%') AS includesGames
              WHERE prod_type <> 'game'
              LIMIT 3";

    $response = mysqli_query($link, $query);

    if($response = mysqli_query($link, $query)) {

    if (mysqli_num_rows($response) > 0) {
        echo "<table align='center'
        cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>Top Selling Products Other Than Games</b></td> ";

        while ($row = mysqli_fetch_array($response)) {
            echo "<tr>";
            echo "<td>" . $row['prod_type'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($response);
    } else {
        echo "ERROR: Could not execute $query." . mysqli_error($link);
    }
}


}

if(isset($_GET['button2']))
{

    //put this query on the vendor page. Not doing what i want it to do here
//    $query1 = "SELECT COUNT(DISTINCT(store_id)) AS store_count
//              FROM purchase NATURAL JOIN purchase_item
//              WHERE upc = 'Cs-0001'";
//
//
//    $response = mysqli_query($link, $query1);
//
//    if($response = mysqli_query($link, $query1)) {
//
//        if (mysqli_num_rows($response) > 0) {
//            echo "<table align='center'
//        cellspacing='5' cellpadding='8'>
//        <tr><td align ='left'><b>Stores that sell xbox</b></td> ";
//
//            while ($row = mysqli_fetch_array($response)) {
//                echo "<tr>";
//                echo "<td>" . $row['store_count'] . "</td>";
//                echo "</tr>";
//            }
//            echo "</table>";
//            mysqli_free_result($response);
//        } else {
//            echo "ERROR: Could not execute $query." . mysqli_error($link);
//        }
//    }


}
if(isset($_GET['button3'])) {

    $query = "SELECT store_id, state, SUM(purchase_total) AS tot
              FROM store NATURAL JOIN purchase
              WHERE purchase_date >= '2018-1-1'
              GROUP BY store_id
              ORDER BY SUM(purchase_total)DESC
              LIMIT 5";

    $response = mysqli_query($link, $query);

    if($response = mysqli_query($link, $query)) {

        if (mysqli_num_rows($response) > 0) {
            echo "<table align='center'
        cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>Store ID </b></td>
        <td align='left'><b>State</b></td>
        <td align='left'><b>Total Sales For 2018</b></td> ";

            while ($row = mysqli_fetch_array($response)) {
                echo "<tr>";
                echo "<td>" . $row['store_id'] . "</td>";
                echo "<td>" . $row['state'] . "</td>";
                echo "<td>" . $row['tot'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($response);
        } else {
            echo "ERROR: Could not execute $query." . mysqli_error($link);
        }
    }
}

if(isset($_GET['button4']))
{
    include 'getStateSelection.html';

    if(isset($_POST['userInput'])) {

        $userInput = $_POST['userInput'];
        $query = "SELECT prod_name, SUM(total_items) AS tot
                FROM product NATURAL JOIN purchase_item NATURAL JOIN store
                WHERE store.state = '$userInput'
                GROUP BY prod_name
                ORDER BY SUM(total_items)DESC
                LIMIT 20";

        $response = mysqli_query($link, $query);

        if($response = mysqli_query($link, $query)) {

            if (mysqli_num_rows($response) > 0) {
                echo "<table align='center'
                cellspacing='5' cellpadding='8'>       
                 <tr><b align='center'>State Selected was $userInput</b>
                 <td align='center'><b>Product Name</b></td>
                     <td align='left'><b>Total Item's Sold</b></td> ";

                while ($row = mysqli_fetch_array($response)) {
                    echo "<tr>";
                    echo "<td>" . $row['prod_name'] . "</td>";
                    echo "<td>" . $row['tot'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                mysqli_free_result($response);
            } else {
                echo "ERROR: Could not execute $query." . mysqli_error($link);
            }
        }

    }
}

if(isset($_GET['button5']))
{
    include 'getStoreSelection.html';

    if(isset($_POST['userInput'])) {

        $userInput = $_POST['userInput'];

        $query = "SELECT prod_name, SUM(total_items) AS tot
                  FROM product NATURAL JOIN purchase_item NATURAL JOIN store
                  WHERE store_id = '$userInput'
                  GROUP BY prod_name
                  ORDER BY SUM(total_items)DESC
                  LIMIT 20";
        $response = mysqli_query($link, $query);

        if (mysqli_num_rows($response) > 0) {
            echo "<table align='center'
                 cellspacing='5' cellpadding='8'>
        <tr>
        <b align='center'>State Selected was $userInput</b>
        <td align ='center'><b>Product Name </b></td>
            <td align='left'><b>Total Items Sold</b></td>";

            while ($row = mysqli_fetch_array($response)) {
                echo "<tr>";
                echo "<td>" . $row['prod_name'] . "</td>";
                echo "<td>" . $row['tot'] . "</td>";
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


