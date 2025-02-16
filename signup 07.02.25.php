<h1>User Data</h1>
<?php
$userid=$_POST['userid'];
$password=md5($_POST['password']);
$name=$_POST['name'];
$mobile=$_POST['mobile'];

// echo "$userid, $password, $name, $mobile";
$sql="insert into users values('$userid','$password','$name','$mobile')";
// echo $sql;

$cn=mysqli_connect("localhost","root","","demodb",3306); // establish connection
mysqli_query($cn,$sql); // execute sql statement
mysqli_close($cn); // close the connection

echo "User $name Registered Successfully";
?>
