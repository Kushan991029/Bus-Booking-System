<?php 

if (isset($_POST['add_bus'])) {
	include "connection.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$bus_no = validate($_POST['bus_no']);
	$bus_name = validate($_POST['bus_name']);
  $owner_id = validate($_POST['owner_id']);
  $route_name = validate($_POST['route_name']);
  $seat_amount = validate($_POST['seat_amount']);

	if (empty($bus_no)) {
		header("Location: ../Pages/admin_bus.php");
	}else if (empty($bus_name)) {
		header("Location: ../Pages/admin_bus.php");
    }else if ($route_name=="Select A Route") {
		header("Location: ../Pages/admin_bus.php");
    }else if (empty($seat_amount)) {
		header("Location: ../Pages/admin_bus.php");
	}else {

       $sql = "INSERT INTO buses(bus_no,bus_name,owner_id,route_name,seat_amount,cond) VALUES('$bus_no', '$bus_name','$owner_id','$route_name','$seat_amount','Semi Luxury')";
       $result = mysqli_query($conn, $sql);
       if (!$result) {
            echo '<script type="text/javascript">';
            echo 'alert("Data is not inserted")';
            echo '</script>';
            header("Location: ../Pages/admin_bus.php");
       }else{
            header("Location: ../Pages/admin_bus.php");
       }
	}

}