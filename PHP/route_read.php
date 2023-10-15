<?php  

include "connection.php";

$sql = "SELECT * FROM routes ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

?>