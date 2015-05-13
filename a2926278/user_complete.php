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
   $complete= $_GET["complete"];
   $ServiceNo=$_GET["ServiceNo"];
   if($userID)
   {
      $sql = "UPDATE mechanicservice set Status='Completed' where UserID=$userID and Status='Processing' and ServiceNo=$ServiceNo";
 
      $result = mysqli_query($conn, $sql);
      if ($result)
      {
        echo "<h2>Your order is completed! Payment has been processed for Service Number: $ServiceNo<br></h2>";
        echo "<h2>Thank you!<br></h2>";
        echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>";
       }else{
          echo "<h2>Error: Fail to complete!, Problem with Update and DATA BASE. login Again!<br></h2>";
          echo  "<ul><li class='menuitem'><a href='logout.php'>LogOUT Now</a></li></ul>";
      }

    }else{
    echo "<h2>Error: Not getting Current User Information, login Again!<br></h2>";
    echo  "<ul><li class='menuitem'><a href='logout.php'>LogOUT Now</a></li></ul>";
      } 
  
}
else{
    echo "Error: Not getting Current User Information, login Again!";
    echo  "<ul><li class='menuitem'><a href='logout.php'>LogOUT Now</a></li></ul>";
      } 
mysqli_close($conn);
?>  

</body>
</html>			
