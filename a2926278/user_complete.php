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
   $complete= $_GET["complete"];
   //$serviceNo=(int)$_SESSION["serviceno"];
   if($complete)
   {
      $sql = "UPDATE MechanicService set Status='Completed' where UserID=$userID and Status='Processing'";
 
      $result = mysqli_query($conn, $sql);
      if ($result)
      {
        echo "Your order is completed! Thank you!";
        echo  "<ul><li class='menuitem'><a href='user_home.html'>Go bcak</a></li></ul>";
       }
       else{echo "Fail to complete!";}
    }
  
}
else {
    echo "Error!";
}
mysqli_close($conn);
?>  

</body>
</html>	