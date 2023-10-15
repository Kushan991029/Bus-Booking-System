<?php  

include "connection.php";

$sql = "SELECT * FROM users WHERE person='Owner' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

?>