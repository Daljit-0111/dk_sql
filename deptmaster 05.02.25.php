<?php
$message="";
if(isset($_POST['save'])){
    $servername="localhost";
    $username="root";
    $password="123456";
    $database="abcindia";
    $port=3309;

    $deptid=$_POST['deptid'];
    $deptname=$_POST['deptname'];
    
    $cn=mysqli_connect($servername,$username,$password,$database,$port);
    $sql="insert into departments values('$deptid','$deptname')";
    mysqli_query($cn,$sql);
    mysqli_close($cn);
    $message="Department $deptname Saved Successfully";
}

?>
<h1>Department Master</h1>
<form action="deptmaster.php" method="post">
    <p>
        Department ID : <input type="text" name="deptid" required>
    </p>
    <p>
        Department Name : <input type="text" name="deptname" required>
    </p>
    <p>
        <input type="submit" value="Save" name="save">
    </p>
    <p>
        <?php echo $message; ?>
    </p>
</form>