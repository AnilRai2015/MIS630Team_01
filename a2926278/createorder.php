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
if(isset($_SESSION["currentuser"]))
{
   
   $userID=(int)$_SESSION["currentuser"];
   $garageID=$_SESSION["chosegarage"];
   $info= $_GET["problem"];
   $serviceNo = rand(0,1000000);
   $date =date('Y-m-d');

    $sql = "INSERT INTO mechanicservice(`ServiceNo`, `UserID`, `GarageID`, `Status`, `ProblemDescription`,`Date`) VALUES ($serviceNo,$userID,$garageID,'Waiting','$info','$date') ";
   $result = mysqli_query($conn, $sql);
    if($result)
    { echo "<h3>Waiting for response from the garage...<br></h3>";
      echo "<h3>Go to your orders to get update!</h3>";
      echo "<h3>Your SERVICE NUMBER: $serviceNo...<br></h3>"; 
      $_SESSION["serviceno"]=$serviceNo;
    }
   else {echo "Inserting Error!";}
}
else {
    echo "Error: Not getting Current User Information, login Again!";
}
mysqli_close($conn);
?>  

</body>
</html>	
