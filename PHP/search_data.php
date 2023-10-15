<?php  
session_start();

if (isset($_POST['search_value'])) {
    include "connection.php";
	function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

	$from_value = validate($_POST['from_value']);
	$to_value = validate($_POST['to_value']);
  $date_value = validate($_POST['date_value']);

  if (empty($_SESSION['login_email'])) {
    header("Location: ../Pages/login_page.php?id=1&ff_val=$from_value&tt_val=$to_value&dd_val=$date_value");
  }else{

    if ($from_value=="From") {
      echo '<script type="text/javascript">';
      echo 'alert("From field is empty")';
      echo '</script>';   
    }else if ($to_value=="To") {
      echo '<script type="text/javascript">';
      echo 'alert("To field is empty")';
      echo '</script>';  
    }else if (empty($date_value)) {
      echo '<script type="text/javascript">';
      echo 'alert("Date field is empty")';
      echo '</script>';  
    }else {
  
          $sql_one = "SELECT search_from.route_no FROM search_from join search_to on search_from.route_no = search_to.route_no
           WHERE from_city='$from_value' AND to_city='$to_value' AND f_value<t_value";
  
          $search_count = mysqli_query($conn, $sql_one);
  
          $direction = "Back";
  
         if(mysqli_num_rows($search_count)){
              $direction = "Front";
          
          } 
  
          header("Location: ../Pages/check.php?ff_value=$from_value&tt_value=$to_value&dat_value=$date_value&direct=$direction");
    }
  }
}

if (isset($_GET['id'])) {

  include "connection.php";
  
  $from_value = $_GET['ff_val'];
	$to_value = $_GET['tt_val'];
  $date_value = $_GET['dd_val'];

  if ($from_value=="From") {
    echo '<script type="text/javascript">';
    echo 'alert("From field is empty")';
    echo '</script>';   
	}else if ($to_value=="To") {
		echo '<script type="text/javascript">';
    echo 'alert("To field is empty")';
    echo '</script>';  
  }else if (empty($date_value)) {
		echo '<script type="text/javascript">';
    echo 'alert("Date field is empty")';
    echo '</script>';  
  }else {

        $sql_one = "SELECT search_from.route_no FROM search_from join search_to on search_from.route_no = search_to.route_no
         WHERE from_city='$from_value' AND to_city='$to_value' AND f_value<t_value";

        $search_count = mysqli_query($conn, $sql_one);

        $direction = "Back";

       if(mysqli_num_rows($search_count)){
            $direction = "Front";
        
        } 

        header("Location: ../Pages/check.php?ff_value=$from_value&tt_value=$to_value&dat_value=$date_value&direct=$direction");
}
}
?>