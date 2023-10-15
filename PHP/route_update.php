<?php 

 if(isset($_POST['update_route'])){
    include "connection.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

    $id = validate($_POST['id']);
	$r_number = validate($_POST['route_num']);
	$f_city = validate($_POST['from_city']);
    $t_city = validate($_POST['to_city']);

	if (empty($r_number)) {
		header("Location: ../Pages/admin_route.php");
	}else if ($f_city=="Select A City") {
		header("Location: ../Pages/admin_route.php");
    }else if ($t_city=="Select A City") {
		header("Location: ../Pages/admin_route.php");
	}else {

       $sql = "UPDATE routes SET route_no='$r_number', from_city='$f_city',to_city='$t_city' WHERE id=$id ";
       $result = mysqli_query($conn, $sql);
       if (!$result) {
            echo '<script type="text/javascript">';
            echo 'alert("Data is not updated")';
            echo '</script>';
            header("Location: ../Pages/admin_route.php");
        }else{
            header("Location: ../Pages/admin_route.php");
        }
	}
}else {
	        echo '<script type="text/javascript">';
            echo 'alert("Data is not updated")';
            echo '</script>';
            header("Location: ../Pages/admin_route.php");
}

