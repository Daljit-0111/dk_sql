<h1>Registered User Details</h1>
<?php
$servername="localhost"; 
$username="root"; 
$password="";
$database="demodb"; 
$port=3306;

// establish connection
$cn=mysqli_connect($servername,$username,$password,$database,$port); 

// create SQL statement
$sql="select userid,name,mobile from users";

// execute SQL statement
$result=mysqli_query($cn,$sql);
$count=mysqli_num_rows($result);

// display the result
if($count==0){
    echo "No Records Found";
}
else{
    echo "<h3>Record found : $count</h3>";
    echo "<table border='1' width='60%' align='center'>";
    echo "<tr><th>User ID</th><th>Name</th><th>Mobile</th></tr>";
    while($row=mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>".$row['userid']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['mobile']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// close the connection
mysqli_close($cn);
?>