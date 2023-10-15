<?php 

if (isset($_POST['message'])) {
	include "connection.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$name = validate($_POST['name']);
	$email = validate($_POST['email']);
    $subject = validate($_POST['subject']);
    $message = validate($_POST['message']);
    $date = date("Y-m-d");


	if (empty($name)||empty($email)||empty($subject)||empty($message)) {
		header("Location: ../Pages/contact.php");
	}else {

       $sql = "INSERT INTO message(name,email,subject,da_date,data) VALUES('$name', '$email','$subject','$date','$message')";
       $result = mysqli_query($conn, $sql);
       if (!$result) {
            echo '<script type="text/javascript">';
            echo 'alert("Data is not inserted")';
            echo '</script>';
            header("Location: ../Pages/contact.php");
       }else{
            header("Location: ../index.php");
       }
	}

}