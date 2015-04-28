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
if($login) {
$sql = "SELECT Password FROM Users where userid=$login";
} 
//else {
//$sql = "SELECT  firstname, lastname FROM Users";
//}
//echo $sql;
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) 
   {
    // output data of each row
    if (){}
       else{}
    }
} else {
    echo "User doesn't exist";
}

mysqli_close($conn);
?>  

</body>
</html>	
