<?php
$servername="localhost";
$username="root";
$password="123456";
$database="abcindia";
$port=3309;

$empid=$_GET['empid'];
$cn=mysqli_connect($servername,$username,$password,$database,$port);
$sql="SELECT e.empid, e.name, e.email, e.mobile, d.deptname, dg.designame, e.basic 
FROM employees e
JOIN departments d ON e.deptid=d.deptid
JOIN designations dg ON e.desigid=dg.desigid
WHERE e.empid='$empid';
"; 
$result=mysqli_query($cn,$sql);
$row=mysqli_fetch_array($result);

echo "<h1>Employee Details</h1>";
echo "Employee ID : ".$row['empid']."<br>";
echo "Employee Name : ".$row['name']."<br>";
echo "Email : ".$row['email']."<br>";
echo "Mobile : ".$row['mobile']."<br>";
echo "Department : ".$row['deptname']."<br>";
echo "Designation : ".$row['designame']."<br>";
echo "Basic Salary : ".$row['basic']."<br>";
mysqli_close($cn);
?>

<a href="javascript:history.back()">Back</a>