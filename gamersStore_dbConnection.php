<?php

DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_USER', 'lacySimpson');
DEFINE ('DB_PASSWORD', '12345Abcd');
DEFINE ('DB_NAME', 'gamers_store');

//$link = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//
//
//if (!$link) {
//    die('Could not connect: ' . mysqli_connect_error());
//}
//else
//    echo 'Connected successfully';
//
//$query = "SELECT customer_name, customer_email, rewards_mem FROM gamers_store.customer";
//
//$response = mysqli_query($link, $query);
//
//if($response = mysqli_query($link, $query)) {
//
//    if (mysqli_num_rows($response) > 0) {
//        echo "<table align='left'
//        cellspacing='5' cellpadding='8'>
//        <tr><td align ='left'><b>Customer Name </b></td>
//        <td align='left'><b>Customer Email</b></td>
//        <td align='left'><b>Rewards Member</b></td>";
//
//        while ($row = mysqli_fetch_array($response)) {
//            echo "<tr>";
//            echo "<td>" . $row['customer_name'] . "</td>";
//            echo "<td>" . $row['customer_email'] . "</td>";
//            echo "<td>" . $row['rewards_mem'] . "</td>";
//            echo "</tr>";
//        }
//        echo "</table>";
//        mysqli_free_result($response);
//    } else {
//        echo "ERROR: Could not execute $query." . mysqli_error($link);
//    }
//}

//What are the top three types of products that customers buy in addition to games?
//
//$link = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//
//if (!$link) {
//    die('Could not connect: ' . mysqli_connect_error());
//}
//else
//    echo 'Connected successfully';
//
//$query = "SELECT DISTINCT(prod_type)
//FROM product NATURAL JOIN purchase_item NATURAL JOIN purchase
//WHERE prod_type <> 'game'
//LIMIT 3";
//
//$response = mysqli_query($link, $query);
//
//if($response = mysqli_query($link, $query)) {
//
//    if (mysqli_num_rows($response) > 0) {
//        echo "<table align='left'
//        cellspacing='5' cellpadding='8'>
//        <tr><td align ='left'><b>Top Selling Products Other Than Games</b></td> ";
//
//        while ($row = mysqli_fetch_array($response)) {
//            echo "<tr>";
//            echo "<td>" . $row['prod_type'] . "</td>";
//
//            echo "</tr>";
//        }
//        echo "</table>";
//        mysqli_free_result($response);
//    } else {
//        echo "ERROR: Could not execute $query." . mysqli_error($link);
//    }
//}




//In how many stores does Xbox outsell Playstation?



//What are the 5 stores with the most sales so far this year?
//$link = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
//
//if (!$link) {
//    die('Could not connect: ' . mysqli_connect_error());
//}
//else
//    echo 'Connected successfully';
//
//$query = "SELECT store_id, state, SUM(purchase_total) AS tot
//FROM store NATURAL JOIN purchase
//WHERE purchase_date >= '2018-1-1'
//GROUP BY store_id
//ORDER BY SUM(purchase_total)DESC
//LIMIT 5";
//
//$response = mysqli_query($link, $query);
//
//if($response = mysqli_query($link, $query)) {
//
//    if (mysqli_num_rows($response) > 0) {
//        echo "<table align='left'
//        cellspacing='5' cellpadding='8'>
//        <tr><td align ='left'><b>Store ID </b></td>
//        <td align='left'><b>State</b></td>
//        <td align='left'><b>Total Sales For 2018</b></td> ";
//
//        while ($row = mysqli_fetch_array($response)) {
//            echo "<tr>";
//            echo "<td>" . $row['store_id'] . "</td>";
//            echo "<td>" . $row['state'] . "</td>";
//            echo "<td>" . $row['tot'] . "</td>";
//            echo "</tr>";
//        }
//        echo "</table>";
//        mysqli_free_result($response);
//    } else {
//        echo "ERROR: Could not execute $query." . mysqli_error($link);
//    }
//}




//What are the 20 top-selling products in each state?
$link = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}
else
    echo 'Connected successfully';


//This query needs more work. Only displaying AL products
$query = "SELECT DISTINCT(state), prod_name, SUM(total_items) AS tot
FROM product NATURAL JOIN purchase_item NATURAL JOIN store
GROUP BY state, prod_name
ORDER BY state, SUM(total_items)DESC
LIMIT 20";

$response = mysqli_query($link, $query);

if($response = mysqli_query($link, $query)) {

    if (mysqli_num_rows($response) > 0) {
        echo "<table align='left'
        cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>State </b></td>
        <td align='left'><b>prod_name</b></td>
        <td align='left'><b>Total Item's Sold</b></td> ";

        while ($row = mysqli_fetch_array($response)) {
            echo "<tr>";
            echo "<td>" . $row['state'] . "</td>";
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




//What are the 20 top-selling products at each store?

$link = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$link) {
    die('Could not connect: ' . mysqli_connect_error());
}
else
    echo 'Connected successfully';

$query = "SELECT prod_name, SUM(total_items) AS tot
FROM product NATURAL JOIN purchase_item
GROUP BY prod_name
ORDER BY SUM(total_items)DESC
LIMIT 20";

$response = mysqli_query($link, $query);

if($response = mysqli_query($link, $query)) {

    if (mysqli_num_rows($response) > 0) {
        echo "<table align='left'
        cellspacing='5' cellpadding='8'>
        <tr><td align ='left'><b>Product Name </b></td>
        <td align='left'><b>Quantity</b></td> ";

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












//    while($row = mysqli_fetch_array($response)){
//
//        echo '<tr><td align="left">' .
//            $row[customer_name] . '</td><td align="left">' .
//            $row[customer_email] . '</td><td align= "left">';
//
//        echo '</tr>';
//    }
//
//    echo '</table>';
//} else {
//    echo "Couldn't issue database query";
//
//    echo mysqli_error($link);
//}
mysqli_close($link);
