<?php  

include "connection.php";

$sql = "SELECT * FROM shedule ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

?>