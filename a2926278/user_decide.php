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
   $decision= $_GET["decision"];
   //$serviceNo=(int)$_SESSION["serviceno"];
   if($decision=='accept')
   {
      $sql = "UPDATE MechanicService set Status='Processing' where UserID=$userID and Status='Granted'";
 
      $result = mysqli_query($conn, $sql);
      if ($result)
      {
        echo "Your order is processing!";
        echo  "<ul><li class='menuitem'><a href='user_home.html'>Go bcak</a></li></ul>";
       }
       else{echo "Fail to accept!";}
    }
   else if($decision=='reject')
   {
      $sql = "UPDATE MechanicService set Status='Cancelled' where UserID=$userID and Status='Granted'";
 
      $result = mysqli_query($conn, $sql);
      if ($result)
      {
        echo "Your order is cancelled!";
        echo  "<ul><li class='menuitem'><a href='user_home.html'>Go bcak</a></li></ul>";
       }
       else{echo "Fail to reject!";}
    }
}
else {
    echo "Error!";
}
mysqli_close($conn);
?>  

</body>
</html>	