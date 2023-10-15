<?php  

include "connection.php";

$sql = "SELECT * FROM users WHERE person='Passenger' ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

?>