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

echo "<h1>Edit Employee Details</h1>";
echo "<form action='updateemployee.php' method='post'>";
echo "Employee ID : <input type='text' name='empid' value='".$row['empid']."' readonly><br>";
echo "Employee Name : <input type='text' name='name' value='".$row['name']."'><br>";
echo "Email : <input type='text' name='email' value='".$row['email']."'><br>";
echo "Mobile : <input type='text' name='mobile' value='".$row['mobile']."'><br>";
echo "Department : ".$row['deptname']."<br>";
echo "Designation : ".$row['designame']."<br>";
echo "Basic Salary : <input type='number' name='basic' value='".$row['basic']."'><br>";
echo "<input type='submit' value='Update' name='update'>";
echo "</form>";
mysqli_close($cn);
?>

<a href="javascript:history.back()">Back</a>