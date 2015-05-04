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

$Area = $_GET["Area"];

$sql = "SELECT Area, GarageID,Time,Distance From CoveringArea where Area='$Area' ";

$sql2 = "SELECT Area, GarageID,Time,Distance From CoveringArea where Area='$Area' ";

$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0 and mysqli_num_rows($result2)) { 
    echo "<form action='createorder.php' target='content_main'>";
    echo "Choose One Garage:<br>";
    echo "<select name='selection'>";
    while($row2 = mysqli_fetch_assoc($result2)) 
    {
      $garageID=(string)$row2["GarageID"];
      echo "<option value=$garageID>".$row2["GarageID"]."</option>";
     }
    echo "</select>";
    echo "<br><br>";
    echo "ProblemDescription:<br>";
    echo "<input type='text' name='problem'>";
    echo "<input type='submit'>";
    echo "</form>";
    echo '<div id="content_main">';
    echo "<table border=0>";
    echo "<tr> <th> Area </th> <th> GarageID </th><th> Time </th><th> Distance(miles) </th><th></th></tr>";
    while($row = mysqli_fetch_assoc($result)) 
    {    
        echo "<tr>";
        echo "<td>". $row["Area"]. "</td><td>" . $row["GarageID"]. "</td><td>" . $row["Time"]."</td><td>". $row["Distance"]."</td>";
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