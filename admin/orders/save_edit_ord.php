<?php

$ord_ID  = $_POST['ord_ID'];
$ord_name  = $_POST['ord_name'];
$ord_phone  = $_POST['ord_phone'] ;
$ord_bldnno  = $_POST['ord_bldnno'] ;
$ord_way  = $_POST['ord_way'] ;
$ord_city  = $_POST['ord_city'] ;
$ord_payment  = $_POST['ord_payment'] ;
$ord_note  = $_POST['ord_note'] ;


include ("../../common/dbconnect.php");

$sql = "UPDATE ord SET ord_name = '$ord_name', ord_phone = '$ord_phone', ord_bldnno = '$ord_bldnno', ord_way = '$ord_way', ord_city = '$ord_city', ord_payment = '$ord_payment', ord_note = '$ord_note' WHERE ord_ID = '$ord_ID';";

$conn->query($sql);

echo "1";

$conn->close();

?>