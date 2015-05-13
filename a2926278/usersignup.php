<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php  
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";
$fnameVerification=0;
$lnameVerification=0;
$phoneVerification=0;
$emailVerification=0;
$passwordVerification=0;
$genderVerification=0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["fname"])) {
     $fnameErr = "First Name is required";
   } else {
     $firstname = test_input($_POST["fname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
       $fnameErr = "Only letters and white space allowed"; 
     }else{$fnameVerification=1; }
   }

if (empty($_POST["lname"])) {
     $lnameErr = "Last Name is required";
   } else {
     $lastname = test_input($_POST["lname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
       $lnameErr = "Only letters and white space allowed in last name"; 
     }else{ $lnameVerification=1; }
   }
   
   if (empty($_POST["email"])) {
     $emailErr = "Email is required";
   } else {
     $email = test_input($_POST["email"]);
     // check if e-mail address is well-formed
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }else{ $emailVerification=1; }
   }
     
   if (empty($_POST["password"])) {
     $passwordErr = "Password is required";
   } else {
     $passworTemp= test_input($_POST["password"]);
     if(strlen($passworTemp) < 8) {
       $passwordErr = "Password should be at least 8 characters long"; 
     }else{ $passwordVerification=1; }
   }


   if (empty($_POST["phone"])) {
     $phoneErr = "Phone Number is required";
   } else {
     $phoneNumber= test_input($_POST["phone"]);
     if (preg_match("/^[0-9]{3}[0-9]{4}[0-9]{4}$/",$phoneNumber)) {
          $phoneVerification=1;     
     }else{ $phoneErr = "Phone should have only digits and length should be 11 digits"; }
   }

   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
     if (!preg_match("/^[a-zA-Z ]*$/",$gender)) {
       $genderErr = "Only letters and white space allowed in gender"; 
     }else{ $genderVerification=1; }
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>


<?php

if($fnameVerification==1 && $lnameVerification==1 && $phoneVerification==1 && $emailVerification==1 && $passwordVerification==1 && $genderVerification==1){

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

   $sql = "INSERT INTO Users(`FirstName`, `LastName`, `Password`, `Email`, `Mobile`, `Gender`) VALUES ('$firstname ','$lastname ','$passworTemp','$email',$phoneNumber,'$gender')";
    $result = mysqli_query($conn, $sql);
    if($result)
    { echo "<h1>Congratulations!!, USER is Successfully register<br></h1>";
      echo "<h3>Go to login!<br></h3>";
      $newUserIDSQL = "SELECT UserID FROM Users WHERE FirstName='$firstname'";
      $result1 = mysqli_query($conn, $newUserIDSQL);
        if ($result1){
                $row = mysqli_fetch_row($result1);
		if (mysqli_num_rows($result1) > 0)
		{
                echo  "<h3>PLEASE REMEMBER YOUR USER ID: $row[0] to LOGIN<br></h3>";

                }

         }
    echo  "<ul><li class='menuitem'><a href='user_login.html'>Login Now</a></li></ul>";
    }else { echo "FAIL"; }

mysqli_close($conn);

}else{
      echo "<h1>ERROR in Registering NEW USER</h1>";
      if($fnameVerification==0)
      echo "<h4>$fnameErr <br></h4>";
      if($lnameVerification==0)
      echo "<h4>$lnameErr<br></h4>";
      if($phoneVerification==0)
      echo "<h4>$phoneErr<br></h4>";
      if($emailVerification==0)
      echo "<h4>$emailErr<br></h4>";
      if($passwordVerification==0)
      echo "<h4>$passwordErr<br></h4>";
      if($genderVerification==0)
      echo "<h4>$genderErr<br></h4>";
      echo  "<ul><li class='menuitem'><a href='user_signup.html'>Go Back</a></li></ul>";
     }

?>

</body>
</html>			
