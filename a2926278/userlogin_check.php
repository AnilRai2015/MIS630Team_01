<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
$servername = "mysql2.000webhost.com";
$username = "a2185196_11";
$passwordDB = "team11";
$dbname = "a2185196_11";
// Create connection
$conn = mysqli_connect($servername, $username, $passwordDB, $dbname);
// Check connection
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
$id = $_GET["login"];
$passwordUser = $_GET["password"];
 if ($id){
	$_SESSION["currentuser"] = $id;
	$sql = "SELECT UserID,Password FROM Users where UserID=$id";
	$result = mysqli_query($conn, $sql);
	   if ($result){
		$row = mysqli_fetch_row($result);
		if (mysqli_num_rows($result) > 0)
		{
			//echo $row[1];
                        //echo $passwordUser ;
			if ($passwordUser == $row[1])
			{
				header("Location: user_home.html");
			}else{
                               echo "<h2>Password does Not MATCH!</h2>";
		               echo  "<ul><li class='menuitem'><a href='user_login.html'>Go back</a></li></ul>";
                              }
		}else{
                        echo "<h2>Doesn't exist!!</h2>";
                        echo  "<ul><li class='menuitem'><a href='user_login.html'>Go back</a></li></ul>";
		}
	    }else{
		echo "<h2>User Not Found!</h2>";
		echo  "<ul><li class='menuitem'><a href='user_login.html'>Go back</a></li></ul>";
	}
 }else{
echo "<h2>User_ID can't be blank!</h2>";
		echo  "<ul><li class='menuitem'><a href='user_login.html'>Go back</a></li></ul>";
      }
mysqli_close($conn);
?>

</body>
</html>		
