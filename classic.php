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

$userid = $_GET["login"];
$password = $_GET["password"];
//echo $password;

if($userid){
$sql = "SELECT UserID,Password FROM Users where UserID=$userid";
} 

$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);

//echo $row[0];
//echo $row[1];

if (mysqli_num_rows($result) > 0) 
   {
    // output data of each row
    if ($row[1] == $password)
       { header("Location: home.html");}
      else{echo "invalid password";}
    } 
else 
{
    echo "User doesn't exist";
}

mysqli_close($conn);
?>  

</body>
</html>	
