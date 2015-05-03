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

if(isset($_SESSION["currentuser"]) and isset($_SESSION["chosegarage"]))
{
   
   $userID=(int)$_SESSION["currentuser"];
   $garageID=(int)$_SESSION["chosegarage"];
   $info= $_GET["problem"];
   $serviceNo = rand(0,1000000);
   $date = date('Y-m-d');
   //echo " ".date('Y-m-d', strtotime($date)) ;
   //echo gettype($serviceNo), "\n";
   //echo gettype($_SESSION["currentuser"]), "\n";
   //echo gettype($_SESSION["chosegarage"]), "\n";
   //echo gettype($info), "\n";
   //echo gettype($date), "\n";
   

             //INSERT INTO MechanicService(`ServiceNo`, `UserID`, `GarageID`, `Status`, `ProblemDescription`,`Date`) VALUES (12231,10002,1,'Waiting','aaa',2015-05-02)
   $sql = "INSERT INTO MechanicService(`ServiceNo`, `UserID`, `GarageID`, `Status`, `ProblemDescription`,`Date`) VALUES ($serviceNo,$userID,$garageID,'Waiting',$info,$date) ";
 
   $result = mysqli_query($conn, $sql);
    echo "Waiting for response from the garage...";
    echo "Go to your orders to get update!";
    $_SESSION["serviceno"]=$serviceNo;


}
else {
    echo "Error!";
}
mysqli_close($conn);
?>  

</body>
</html>	