<?php
 $servername="localhost";
 $username="root";
 $password="123456";
 $database="abcindia";
 $port=3309;

 if(isset($_POST['save'])){
    $empid=$_POST['empid'];
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $deptid=$_POST['deptid'];
    $desigid=$_POST['desigid'];
    $salary=$_POST['salary'];

    $cn=mysqli_connect($servername,$username,$password,$database,$port);
    $sql="insert into employees(empid,name,email,mobile,deptid,desigid,basic) values('$empid','$name','$email','$mobile','$deptid','$desigid',$salary)";
    mysqli_query($cn,$sql);
    mysqli_close($cn);
 }
?>
<form action="empmaster.php" method="post">
    <p>
        Employee ID : <input type="text" name="empid" required>
    </p>
    <p>
        Employee Name : <input type="text" name="name" required>
    </p>
    <p>
        Email : <input type="text" name="email" required>
    </p>
    <p>
        Mobile : <input type="text" name="mobile" required>
    </p>

    <?php
        $cn=mysqli_connect($servername,$username,$password,$database,$port);
        $sql="select deptid,deptname from departments";
        $result=mysqli_query($cn,$sql);
    ?>
    <p>
        Department : <select name="deptid">
            <?php while ($row=mysqli_fetch_array($result)){ ?>
                <option value="<?php echo $row['deptid']; ?>"><?php echo $row['deptname']; ?></option>
            <?php 
                } 
                mysqli_close($cn);
            ?>
            </select>
    </p>
    <?php
        $cn=mysqli_connect($servername,$username,$password,$database,$port);
        $sql="select desigid,designame from designations";
        $result=mysqli_query($cn,$sql);
    ?>
    <p>
        Designation : <select name="desigid">
        <?php while ($row=mysqli_fetch_array($result)){ ?>
                <option value="<?php echo $row['desigid']; ?>"><?php echo $row['designame']; ?></option>
            <?php 
                } 
                mysqli_close($cn);
            ?>
            </select>
            </select>
    </p>
    <p>
        Salary <input type="number" name="salary" required>
    </p>
    <p>
        <input type="submit" value="Save" name="save">
    </p>
</form>

<?php
    $cn=mysqli_connect($servername,$username,$password,$database,$port);
    $sql="select empid,name from employees";
    $result=mysqli_query($cn,$sql);
    echo "<table border=1>";
    echo "<tr><th>Employee ID</th><th>Employee Name</th><th></th></tr>";
    while ($row=mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$row['empid']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td><a href='viewemployee.php?empid=".$row['empid']."'><img src='view.png'></a> ";
        echo "<a href='editemployee.php?empid=".$row['empid']."'>Edit</a> ";
        echo "<a href='deleteemployee.php?empid=".$row['empid']."'>Delete</a></td>";
        echo "</tr>";
    }
    echo "</table>";
    mysqli_close($cn);
?>
