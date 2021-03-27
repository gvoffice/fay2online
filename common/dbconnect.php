<?php
// database variables

$servername = "localhost";
$username = "alphaplu_fay";
$password = "F100raptor@1";
$dbname = "alphaplu_fay";

// Create connection
$conn = new MySQLi( $servername, $username, $password, $dbname );
// Check connection

if ( $conn->connect_error ) {
	die( "Connection failed: " . $conn->connect_error );
}
?>
