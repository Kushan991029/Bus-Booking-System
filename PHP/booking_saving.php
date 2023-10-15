<?php
session_start();

include "connection.php";

$bus_no = $_SESSION['search_rows']['bus_no'];
$bus_name = $_SESSION['search_rows']['bus_name'];
$trip_no = $_SESSION['search_rows']['trip_no'];
$from_val = $_SESSION['f_city'];
$to_val = $_SESSION['t_city'];
$date_val = $_SESSION['date_value'];
$seat_no = $bus_no."/".$trip_no."/".$date_val;
$fee = $_SESSION['total'];
$customer_name = $_SESSION['p_name'];
$mo_no = $_SESSION['m_number'];
$ema = $_SESSION['email'];
$book_seat = $_SESSION['s_no'];
$time = $_SESSION['dep_time'];

preg_match_all('!\d+!',$book_seat,$matches);
$coun = sizeof($matches[0]);

$sql1 = "INSERT INTO booked_seats(bus_no,bus_name,trip_no,from_val,to_val,date_val,depature,seat_no,seat_val,fee,customer_name,mobile_no,email)
VALUES('$bus_no', '$bus_name', '$trip_no', '$from_val', '$to_val', '$date_val','$time','$seat_no','$book_seat', '$fee', '$customer_name', '$mo_no', '$ema')";
$result1 = mysqli_query($conn, $sql1);

$a = 0;

while($a<$coun){
    $y = $matches[0][$a];

    $sql2 = "INSERT INTO seats VALUES('$seat_no', '$y')";
    $result2 = mysqli_query($conn, $sql2);

    $a++;
}

if (!$result1) {?>
    <script type="text/javascript">
        alert("Connection Error");
        window.location.href="../index.php";
    </script>;
<?php
} else {
?>
    <script type="text/javascript">
        alert("Booking Completed");
        window.location.href="../Pages/ticket.php";
    </script>
<?php
}
?>