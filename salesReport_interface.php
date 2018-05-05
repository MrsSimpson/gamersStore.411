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
?>


