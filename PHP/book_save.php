<?php 

session_start();

if (isset($_POST['pay_submit'])) {

    $_SESSION['s_no'] = $_POST['s_no'];
    $_SESSION['total'] = $_POST['total'];
    $_SESSION['p_name'] = $_POST['passenger_name'];
    $_SESSION['m_number'] = $_POST['mobile'];
    $_SESSION['email'] = $_POST['passenger_email'];

    header("Location: ../Pages/pay.php");

}

?>
