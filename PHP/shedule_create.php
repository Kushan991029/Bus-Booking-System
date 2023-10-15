<?php 

if (isset($_POST['add_shedule'])) {
	include "connection.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$route_no = validate($_POST['s_route_no']);
	$bus_no = validate($_POST['s_bus_no']);
    $trip_no = validate($_POST['s_trip_no']);
    $direction = validate($_POST['s_direct']);
    $from_city = validate($_POST['s_from_city']);
    $to_city = validate($_POST['s_to_city']);
	$from_time = validate($_POST['s_dep_time']);
    $to_time = validate($_POST['s_arr_time']);


	if (empty($route_no)||empty($bus_no)||empty($trip_no)||empty($direction)||empty($from_city)||empty($to_city)||empty($from_time)||empty($to_time)) {
		header("Location: ../Pages/admin_shedules.php");
	}else {

       $sql = "INSERT INTO shedule(route_no,bus_no,trip_no,direction,from_city,to_city,from_time,to_time) VALUES('$route_no', '$bus_no','$trip_no','$direction','$from_city','$to_city','$from_time','$to_time')";
       $result = mysqli_query($conn, $sql);
       if (!$result) {
            echo '<script type="text/javascript">';
            echo 'alert("Data is not inserted")';
            echo '</script>';
            header("Location: ../Pages/admin_shedules.php");
       }else{
            header("Location: ../Pages/admin_shedules.php");
       }
	}

}