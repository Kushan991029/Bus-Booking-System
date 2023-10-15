<?php 

session_start();
include 'connection.php';


if (isset($_POST['sign_up'])) {
	$firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
	$person = $_POST['person'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);

	if ($password == $cpassword) {
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($conn, $sql);
		if (!$result->num_rows > 0) {
			$sql = "INSERT INTO users (first,last, person, email, password)
					VALUES ('$firstname', '$lastname','$person', '$email', '$password')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
			    $_POST['password'] = "";
				$_POST['cpassword'] = "";
			    ?>
			     <script type="text/javascript">
                    alert("Wow! User Registration Completed.");
                    window.location.href="../index.php";
                </script>;
				<?php
			} else {
			    ?>
			     <script type="text/javascript">
                    alert("Woops! Something Wrong Went.");
                    window.location.href="../Pages/login_page.php";
                </script>;
				<?php
			}
		} else {
		    ?>
		    <script type="text/javascript">
                    alert("Woops! Email Already Exists.");
                    window.location.href="../Pages/login_page.php";
                </script>;
			<?php
		}
		
	} else {
	    ?>
		<script>alert('Password Not Matched.')</script>
		<?php
	}
}

?>