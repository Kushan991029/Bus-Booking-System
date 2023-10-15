<?php  

$sname = "localhost";
$uname = "id19448528_bus";
$password = "60LGk[9[3l\&VZ[y";
$db_name = "id19448528_bus_system";

$conn  = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
?>
	<script type="text/javascript">alert("Database Connection Failed");</script>
<?php
    
}

?>