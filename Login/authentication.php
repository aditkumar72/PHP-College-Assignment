<?php
session_start();
include('connection.php');

$username = $_POST['user'];
$password = $_POST['pass'];

$sql = "select * from  login where username = '$username' and password = '$password'"; 
$result = mysqli_query($con, $sql);
$count = mysqli_num_rows($result);


if($count > 0){
    $_SESSION["loggedin"] = true;
    $_SESSION["username"] = $username;
    header("Location: crud.php");
    exit();
}
else{ 
    header("Location: index.php");
    exit();
}
?>