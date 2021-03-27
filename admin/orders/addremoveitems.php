<?php

$itm_ID = $_POST['itm_ID'];
$ord_ID = $_POST['ord_ID'];
$qty = $_POST['qty'];



include ("../../common/dbconnect.php");



$sql ="Select itm_price from product where itm_ID = $itm_ID";
//echo "$sql  <BR>";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$price = $row['itm_price'];
$new_price = $qty * $price;

$sql = "UPDATE ordered_itms SET qty = $qty , price = $new_price WHERE ord_ID = '$ord_ID' AND itm_ID = $itm_ID";
$conn->query($sql);

echo $new_price;
$conn->close();
?>