<?php 

session_start();

$id = 0;
$ff_val = "";
$tt_val = "";
$dd_val = "";


if (isset($_GET['id'])) {
    $id = 1;
	$ff_val = $_GET['ff_val'];
	$tt_val = $_GET['tt_val'];
	$dd_val = $_GET['dd_val'];
}

if (isset($_SESSION['login_email'])) {
    header("Location: ../index.php");
}

?>


<html>
	<head>
		 <link rel="stylesheet" href="../assets-login/css/style.css">
	</head>
	
	<body>
		<script>
		function showSignIn() {
			document.querySelector("#signin_form").style.display = 'block';
			document.querySelector("#signup_form").style.display = 'none';
			
			document.querySelector("#signup_switch_button").classList.add('nonactive');
			document.querySelector("#signup_switch_button").classList.remove('active');

			document.querySelector("#signin_switch_button").classList.add('active');
			document.querySelector("#signin_switch_button").classList.remove('nonactive');
		}
		
		function showSignUp() {
			document.querySelector("#signin_form").style.display = 'none';
			document.querySelector("#signup_form").style.display = 'block';
			
			document.querySelector("#signup_switch_button").classList.add('active');
			document.querySelector("#signup_switch_button").classList.remove('nonactive');

			document.querySelector("#signin_switch_button").classList.add('nonactive');
			document.querySelector("#signin_switch_button").classList.remove('active');
		}
		</script>

		<div class="login">
		  <h2 class="active" id="signin_switch_button" onclick="showSignIn()" style="cursor: pointer"> sign in </h2>
		  <h2 class="nonactive" id="signup_switch_button" onclick="showSignUp()" style="cursor: pointer"> sign up </h2>
		  <form action='../PHP/login.php' method='POST' id="signin_form">
		   
		  	<input type="hidden" class="text" value="<?php echo $id?>" name="id">
			  <input type="hidden" class="text" value="<?php echo $ff_val?>" name="ff_val">
			  <input type="hidden" class="text" value="<?php echo $tt_val?>" name="tt_val">
			  <input type="hidden" class="text" value="<?php echo $dd_val?>" name="dd_val">
			<input type="email" class="text" name="email">
			 <span>email</span>

			<br>
			
			<br>

			<input type="password" class="text" name="password">
			<span>Password</span>
			<br>

			<input type="checkbox" id="checkbox-1-1" class="custom-checkbox" />
			<label for="checkbox-1-1">Keep me Signed in</label>
			
			<button trpe='submit' name='sign_in' class="signin">
			  Sign In
			</button>


			<hr>

			<a href="#" class="forgot_password">Forgot Password?</a>
		  </form>
		  
		  <form action='../PHP/register.php' method='POST' id="signup_form" style="display:none">
		   
			<input type="text" class="text" name="firstname">
			 <span>First name</span>

			<br>
			
			<br>
			
			<input type="text" class="text" name="lastname">
			 <span>Last name</span>

			<br>
			

			<input type="radio" id='pass' name="person" value="Passenger">
 			<label for="pass">Passenger</label>
  			<input type="radio" id='own' name="person" value="Owner">
 			<label for="own">Owner</label>

			<br>
			
			<br>
			
			<br>
			
			<input type="email" class="text" name="email">
			 <span>Email</span>
			 
			<br>
			
			<br>
			
			<input type="password" class="text" name="password">
			<span>Password</span>


			<br>
			
			<br>
			
			<input type="password" class="text" name="cpassword">
			<span>Confirm password</span>
			
			<br>
			<br>
			<br>
			
			<button type='submit' name='sign_up' class="signin">
			  Sign Up
			</button>


			<hr>
		  </form>

		</div>
	</body>
</html>