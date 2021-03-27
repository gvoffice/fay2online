<?php
session_start();
include "../common/dbconnect.php";

$uname = $_POST['usr_name'];
$password = $_POST['usr_pwd'];

if ($uname != "" && $password != ""){

    $sql_query = "select count(*) as cntUser from user where usr_name='".$uname."' and usr_pwd='".$password."'";
    $result = $conn->query($sql_query);
    $row = $result->fetch_assoc();

    $count = $row['cntUser'];

    if($count > 0){
		setcookie("uname",$uname,time() + (86400 * 30),"/");
        $_SESSION['uname'] = $uname;
        echo 1;
    }else{
        echo 0;
    }

}