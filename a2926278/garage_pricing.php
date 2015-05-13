<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
$servername = "mysql2.000webhost.com";
$username = "a2185196_11";
$password = "team11";
$dbname = "a2185196_11";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(isset($_SESSION["currentgarage"]))
{
   
   $garageID=(int)$_SESSION["currentgarage"];
   $price= $_GET["price"];
   $ServiceNo= $_GET["serviceNum"];
   //$serviceNo=(int)$_SESSION["serviceno"];
   
   $sql = "UPDATE mechanicservice set Price=$price, Status='Granted' where GarageID=$garageID and Status='Waiting' and ServiceNo=$ServiceNo";
 
   $result = mysqli_query($conn, $sql);
   if ($result)
   {
     echo "<h2>Successfully price it!<br></h2>";
echo "<h3>You priced to Service Number: $ServiceNo</h3>";
     echo  "<ul><li class='menuitem'><a href='garage_home.html'>Go back</a></li></ul>";
   }
   else{echo "Fail to price it!";}
}
else {
    echo "Error!";
}
mysqli_close($conn);
?>  

</body>
</html>	
