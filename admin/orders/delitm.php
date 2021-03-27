<?php


include ('../../common/dbconnect.php');

$sql = "DELETE from ordered_itms where itm_ID = '" . $_POST['itm_ID'] . "' AND ord_ID = '".$_POST['ord_ID']."'";
$conn->query($sql);

echo $sql;

$conn-->close();


?>