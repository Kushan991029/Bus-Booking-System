<?php  

include "connection.php";

$sql = "SELECT * FROM message ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

?>