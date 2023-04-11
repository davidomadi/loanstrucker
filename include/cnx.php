<?php
$username = "root";
$password = ""; //T;MT)eyBGTqM
$hostname = "localhost"; 
$dbname = "loanstracker";
$site_url = "http://handball.leagues256.com/"; //handball256.phixelhosting.com

$conn = new mysqli($hostname, $username, $password, $dbname);
$conn->set_charset("utf8");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 /*
$con=mysqli_connect("$hostname","$username","$password") or die(mysql_error());
mysqli_set_charset("utf8", $con);
mysqli_select_db("$dbname",$con); .*/
 
?>