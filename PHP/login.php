<?php 

include 'connection.php';

session_start();

if (isset($_SESSION['login_email'])) {
    header("Location: ../index.php");
}

if (isset($_POST['sign_in'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$id = $_POST['id'];
	$ff_val = $_POST['ff_val'];
	$tt_val = $_POST['tt_val'];
	$dd_val = $_POST['dd_val'];

	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['login_email'] = $row['email'];
		$_SESSION['person'] = $row['person'];
		$full_name = $row['first']." ".$row['last'];
		$_SESSION['full_name'] = $full_name;

		if($id==0){
			if($row['person']=="Admin"){
				header("Location: ../Pages/admin_passenger.php");
			}else if($row['person']=="Passenger"){
				header("Location: ../Pages/ticket.php");
			}else{
				header("Location: ../Pages/owner_ticket.php");
			}
		}else{
			header("Location: Search_data.php?id=$id&ff_val=$ff_val&tt_val=$tt_val&dd_val=$dd_val");
		}
		
		
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
        header("Location: ../Pages/login_page.php");
	}
}

?>
