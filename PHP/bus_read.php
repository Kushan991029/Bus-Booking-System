<?php  

include "connection.php";

$sql = "SELECT * FROM buses ORDER BY id ASC";
$result_read = mysqli_query($conn, $sql);

?>