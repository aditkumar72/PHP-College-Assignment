<?php

$host = "localhost";
$user = "root";
$password = "";
$db_name = "movieticketmanagement";

$con = mysqli_connect($host, $user, $password, $db_name);

if(mysqli_connect_error()){
    die("Failed to connect with database: ".mysqli_connect_error());
}

?>