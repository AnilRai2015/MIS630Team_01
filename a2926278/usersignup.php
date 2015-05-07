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

   
   $userID=(int)$_GET["UserID"];
   $fname=$_GET["fname"];
   $lname=$_GET["lname"];
   $password=$_GET["password"];
   $email=$_GET["email"];
   $phone=(int)$_GET["phone"];
   $gender=$_GET["gender"];

   $sql = "SELECT Password FROM Users where UserID=$userID";
   $result = mysqli_query($conn, $sql);

   if (mysqli_num_rows($result)>0) 
   { 
      echo "UserID exists.";
                                                                                                                                                                                      
  }
  else

  {
    $sql1 = "INSERT INTO Users(`UserID`, `FirstName`, `LastName`, `Password`, `Email`, `Mobile`, `Gender`) VALUES ($userID,'$fname','$lname','$password','$email',$phone,'$gender')";
    $result1 = mysqli_query($conn, $sql1);
    if($result1)
    { echo "Successfully registra";
      echo "Go to login!";
      echo  "<ul><li class='menuitem'><a href='user_login.html'>Login Now</a></li></ul>";
   }
}
mysqli_close($conn);
?>  

</body>
</html>	