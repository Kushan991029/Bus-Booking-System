<?php  

if(isset($_POST['delete_shedule'])){
   include "connection.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$id = validate($_POST['del_id']);

	$sql = "DELETE FROM shedule WHERE id=$id";
   $result = mysqli_query($conn, $sql);
   if (!$result) {
        echo '<script type="text/javascript">';
        echo 'alert("Data is not deleted")';
        echo '</script>';
        header("Location: ../Pages/admin_shedules.php");
   }else {
        header("Location: ../Pages/admin_shedules.php");
   }

}else {
	echo '<script type="text/javascript">';
    echo 'alert("Connetino error occured")';
    echo '</script>';
    header("Location: ../Pages/admin_shedules.php");
}

?>