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
$id = $_GET["login"];
$password = $_GET["password"];

if($id)
{

$_SESSION["currentgarage"]=$id;

$sql = "SELECT GarageID,Password FROM Garages where GarageID=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);

   if (mysqli_num_rows($result) > 0) 
   {
       echo $row[1];
       if ($row[1] == $password)
       {header("Location: garage_home.html");}
    }
   else 
   {
    echo "Doesn't exist!";
   }
} 


mysqli_close($conn);
?>  

</body>
</html>	