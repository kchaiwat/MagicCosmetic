<?php
include("../connect.inc");
session_start();

$User_ID =  $_SESSION['User_ID'];
$Product_ID = $_POST["Product_ID"];
$dttm = Date("Y-m-d G:i:s");

mysqli_query($conn, "BEGIN");
$sql1	= "insert into manage values('$User_ID', '$Product_ID', '$dttm')";
$query1	= mysqli_query($conn, $sql1);
?>
