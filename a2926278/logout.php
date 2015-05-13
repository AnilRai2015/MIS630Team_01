<!DOCTYPE html>
<html>
<body>

<?php
session_start();
session_unset();
session_destroy();
header("location:index.html");
exit();
?>  

</body>
</html>	
