<?php
$message="";
if(isset($_POST['save'])){
    $servername="localhost";
    $username="root";
    $password="123456";
    $database="abcindia";
    $port=3309;

    $desigid=$_POST['desigid'];
    $designame=$_POST['designame'];
    
    $cn=mysqli_connect($servername,$username,$password,$database,$port);
    $sql="insert into designations values('$desigid','$designame')";
    mysqli_query($cn,$sql);
    mysqli_close($cn);
    $message="Designation $designame Saved Successfully";
}

?>
<h1>Designation Master</h1>
<form action="desigmaster.php" method="post">
    <p>
        Designation ID : <input type="text" name="desigid" required>
    </p>
    <p>
        Designation Name : <input type="text" name="designame" required>
    </p>
    <p>
        <input type="submit" value="Save" name="save">
    </p>
    <p>
        <?php echo $message; ?>
    </p>
</form>