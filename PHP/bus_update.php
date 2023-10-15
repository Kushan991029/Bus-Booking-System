<?php 

 if(isset($_POST['update_bus'])){
    include "connection.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

    $id = validate($_POST['input_id']);
	$no = validate($_POST['no_field']);
	$name = validate($_POST['name_field']);
    $owner = validate($_POST['owner_field']);
    $field = validate($_POST['select_field']);
    $seat = validate($_POST['seat_field']);

	if (empty($id) || empty($no) || empty($name) || empty($field) || empty($seat)|| empty($owner)) {
		header("Location: ../Pages/admin_bus.php");
	}else {

       $sql = "UPDATE buses SET bus_no='$no', bus_name='$name',owner_id='$owner',route_name='$field',seat_amount='$seat'  WHERE id=$id ";
       $result = mysqli_query($conn, $sql);
       if (!$result) {
            echo '<script type="text/javascript">';
            echo 'alert("Data is not updated")';
            echo '</script>';
            header("Location: ../Pages/admin_bus.php");
        }else{
            header("Location: ../Pages/admin_bus.php");
        }
	}
}else {
	        echo '<script type="text/javascript">';
            echo 'alert("Data is not updated")';
            echo '</script>';
            header("Location: ../Pages/admin_bus.php");
}

