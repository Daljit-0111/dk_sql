<?php
$servername="localhost";
$username="root";
$password="123456";
$database="abcindia";
$port=3309;

$empid=$_GET['empid'];
$cn=mysqli_connect($servername,$username,$password,$database,$port);
$sql="DELETE FROM employees WHERE empid='$empid'"; 
mysqli_query($cn,$sql);
mysqli_close($cn);
// transfer the control back to empmaster.php
header("Location:empmaster.php");
?>