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

if(isset($_SESSION["currentuser"]))
{
   
   $userID=(int)$_SESSION["currentuser"];
   $garageID=(int)$_GET["selection"];
   $info= $_GET["problem"];
   $serviceNo = rand(0,1000000);
   $date =date('Y-m-d');
   //echo " ".date('Y-m-d', strtotime($date)) ;
   //echo gettype($serviceNo), "\n";
   //echo gettype($_SESSION["currentuser"]), "\n";
   //echo gettype($_SESSION["chosegarage"]), "\n";
   //echo gettype($info), "\n";
   //echo gettype($date), "\n";
   //echo " ".date('Y-m-d', strtotime($date)) ;
   echo $serviceNo, "\n";
   echo $userID, "\n";
   echo $garageID, "\n";
   echo $info, "\n";
   echo $date, "\n";

   
                                                                                                                                                                                           //389303 10002 1 fff 2015-05-04
             //INSERT INTO MechanicService(`ServiceNo`, `UserID`, `GarageID`, `Status`, `ProblemDescription`,`Date`) VALUES (389303,10002,1,'Waiting','fff',2015-05-04)
    $sql = "INSERT INTO MechanicService(`ServiceNo`, `UserID`, `GarageID`, `Status`, `ProblemDescription`,`Date`) VALUES ($serviceNo,$userID,$garageID,'Waiting','$info','$date') ";
   $result = mysqli_query($conn, $sql);
    if($result)
    { echo "Waiting for response from the garage...";
      echo "Go to your orders to get update!";
      echo  "<ul><li class='menuitem'><a href='user_order.html'>My Order</a></li></ul>";
      $_SESSION["serviceno"]=$serviceNo;
    }
   else {echo "Inserting Error!";}


}
else {
    echo "Error!";
}
mysqli_close($conn);
?>  

</body>
</html>	