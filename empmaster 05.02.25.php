<?php
 $servername="localhost";
 $username="root";
 $password="123456";
 $database="abcindia";
 $port=3309;


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