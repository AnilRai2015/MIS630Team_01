<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
$servername = "mysql13.000webhost.com";
$username = "a2926278_mis630";
$password = "mis630";
$dbname = "a2926278_mis630";

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
   //$serviceNo=(int)$_SESSION["serviceno"];
   
   $sql = "UPDATE MechanicService set Price=$price, Status='Granted' where GarageID=$garageID and Status='Waiting'";
 
   $result = mysqli_query($conn, $sql);
   if ($result)
   {
     echo "Successfully price it!";
     echo  "<ul><li class='menuitem'><a href='garage_home.html'>Go bcak</a></li></ul>";
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