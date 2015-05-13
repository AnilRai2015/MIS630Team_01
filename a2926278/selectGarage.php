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
$Area = $_GET["Area"];
$sql = "SELECT Area, GarageID,Time,Distance From coveringArea where Area='$Area' ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) { 
    echo '<div id="content_main">';
    echo "<table border=0>";
    echo "<tr> <th> Area </th> <th> GarageID </th><th> Time </th><th> Distance(miles) </th><th></th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
$_SESSION["chosegarage"]=$row["GarageID"];
        echo "<td>". $row["Area"]. "</td><td>" . $row["GarageID"]. "</td><td>" . $row["Time"]."</td><td>". $row["Distance"]."</td><td><form action='enter_info.html' target='content_main'><button>Choose<button></form></td>";
        echo "</tr>";
     }
   echo "</table>";
   echo "</div>";
}
else {
    echo "0 results";
}
mysqli_close($conn);
?>  

</body>
</html>			
