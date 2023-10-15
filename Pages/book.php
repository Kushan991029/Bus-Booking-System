<?php 

session_start();

include "../PHP/connection.php";

$full_name =  $_SESSION['full_name'];
$p_email = $_SESSION['login_email'];

$b_no = $_SESSION['search_rows']['bus_no'];
$t_no = $_SESSION['search_rows']['trip_no'];
$price = $_SESSION['search_rows']['price'];
$d_value = $_SESSION['date_value'];


$sql = "SELECT seats.num FROM booked_seats join seats on booked_seats.seat_no = seats.seat_no WHERE bus_no='$b_no' AND trip_no='$t_no' AND date_val='$d_value'";
$booked_seats = mysqli_query($conn, $sql);

$seat_array = array();

while($rows_seat = mysqli_fetch_assoc($booked_seats)){
    array_push($seat_array,$rows_seat['num']);
}



?>

<!DOCTYPE html>

<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="HandheldFriendly" content="true" />

    <link rel="icon" type="image/png" href="/static/favicon.png" />

    <link rel="stylesheet" href="../assets-payment/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets-payment/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets-payment/css/intlTelInput.css" />
    <link rel="stylesheet" href="../assets-payment/css/jquery.seat-charts.css" />
    <link rel="stylesheet" href="../assets-payment/css/style.css" />
    <link rel="stylesheet" href="../assets-payment/css/selectize.bootstrap3.min.css" />

    <style>
        .navbar {
            margin-bottom: 0px;
        }

        /*Telephone number error sytle*/
        #error-msg {
            color: red;
        }

        #valid-msg {
            color: #00C900;
        }

        input.error {
            border: 1px solid #FF7C7C;
        }

        .hide {
            display: none;
        }
    </style>

    <script src="../assets-payment/js/jquery.min.js"></script>
    <script src="../assets-payment/js/jquery.validate.min.js"></script>
    <script src="../assets-payment/js/jquery.serializejson.js"></script>
    <script src="../assets-payment/js/intlTelInput.js"></script>
    <script src="../assets-payment/js/lodash.min.js"></script>
    <script src="../assets-payment/js/selectize.min.js"></script>
    <script src="../assets-payment/js/bootstrap.min.js"></script>
    <script src="../assets-payment/js/bootstrap-notify.js"></script>
    <script src="../assets-payment/js/jquery.seat-charts.min.js"></script>
</head>

<body>
    <div id="nav-bar">
        <!-- Navigaiont bar-->
    </div>

    <div class="alert alert-warning text-center" role="alert">
        <p>
            <?php 
            if (isset($_SESSION['search_rows']) && isset($_SESSION['search_rows'])) { 
                
                echo $_SESSION['search_rows']['from_city']."-".$_SESSION['search_rows']['to_city']." | ".$_SESSION['date_value']." | ".$_SESSION['search_rows']['bus_name'];
            }
             
            ?>
        </p>
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-2 col-xs-12">
            <h1><strong>Select seats &amp; fill form</strong></h1>
        </div>
    </div>
    <div class="container">
        <div class="top-center text-center"></div>
        <div class="col-lg-4 col-lg-offset-1 col-md-4 col-sm-6 col-xs-12" id="seat-map">
            <div class="front-indicator" data-placement="above">Front</div>
        </div>
        <div class="booking-details col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <form action="../PHP/book_save.php" method='POST'>
                <div class="well">
                    <div class="row">
                        <h4 class="text-center">Seat Details</h4>
                    </div>

                    <div class="row">
                        <p class="col-lg-3"><strong>Seats</strong></p>

                        <p class="col-lg-9" id="selected-seats-ids" style="color:#d34836;"></p>
                        <input type="text" id="input_s_no" name='s_no' hidden>
                    </div>
                    <div class="row">
                        <p class="col-lg-3"><strong>Total</strong></p>

                        <p class="col-lg-9"><span id="total" style="color: #d34836"></span>
                            <input type="text" id="total_input" name='total' hidden>
                            <input type="text" id="total_output" value="<?php echo $price ?>" hidden>
                        </p>
                    </div>
                    <input type="hidden" id="req-id" name="req-id" value="3f947e5a-aa50-40c3-921d-e26435d215b6" />

                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="passenger-name">Passenger Name</label>
                            <span><i class="fa fa-question-circle-o" data-container="body" data-toggle="popover"
                                    data-placement="top"
                                    data-content="Just fill a simple name to identify you. No need to                                   fill all the passengers names."></i></span>
                            <input type="text" required="required" class="form-control" id="passenger-name"
                                name="passenger_name" value='<?php echo $full_name ?>' placeholder="Enter passenger name"
                                maxlength="32" />
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="mobile">Mobile Number</label>
                            <span><i class="fa fa-question-circle-o" data-container="body" data-toggle="popover"
                                    data-placement="top"
                                    data-content="We do not send SMS to foreign numbers.                                  Valid mobile number is needed as sometimes bus operator may                                  contact you to find your location or to inform about any journey updates."></i></span>
                            <input type="tel" required="required" class="form-control" id="mobile" name="mobile" />
                            <!-- <span id="valid-msg" class="hide"></span>
                            <span id="error-msg" class="hide">✓ Valid</span>  -->
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <label for="passenger-email">Email <span class="text-muted">(Optional)</span></label>
                            <span><i class="fa fa-question-circle-o" data-container="body" data-toggle="popover"
                                    data-placement="top"
                                    data-content="Even though optional, we highly suggest you to fill this as we send more details                                   via email about your journey which cannot be accommodated via SMS."></i></span>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span> </div>
                                <input type="email" placeholder="user@domain.com" class="form-control"
                                    id="passenger-email" value='<?php echo $p_email ?>' name="passenger_email" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <button id="booking-btn" type="submit" name="pay_submit"
                                class="btn btn-primary btn-block btn-lg" style="margin-top: 20px;">
                                <strong>Continue to pay</strong></button>
                        </div>
                    </div>
            </form>
        </div>
        </form>

    </div>
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <div id="legend"></div>
    </div>

    <div id="gender" class="btn-group hidden" data-toggle="buttons">
        <button class="btn btn-success" name="male" id="male" onclick="onSelectMale()">M</button>
        <button class="btn btn-success" name="female" id="female" onclick="onSelectFemale()">F</button>
    </div>

    <div id="booking-confirmation-modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title text-center" id="myModalLabel">Confirmation of Booking</h3>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <h4>Are you sure to do this booking?</h4>
                        </div>
                        <div class="row">
                            <ul class="list-unstyled">

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="booking-no-button" class="btn btn-default">No</button>
                    <button id="booking-yes-button" class="btn btn-primary">Yes</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <?php 

    $row = 11;
    $column = 5;
    $url = "";
    $condition = "";
    $count = 1;

    $url = $url."[";

    for($a = 1;$a<=$row;$a++){

        $url = $url."[[";

        for($b=1;$b<=$column;$b++){

            $x = array_search(strval($count),$seat_array);

            if(is_numeric($x)){
                $condition = "SEAT_BOOKING_CONFIRMED";
            }else{
                $condition = "SEAT_AVAILABLE";
            }

            $url = $url."{-\"number-\":-\"$count\",-\"state-\":-\"$condition-\",-\"gender-\":-\"MALE-\",-\"row-\":$a,-\"group-\":1}";
            if($b<$column){
                $url = $url.",";   
            }

            $count++;
        }

        if($a<$row){
            $url = $url."]],";
        }else{
            $url = $url."]]";
        }

        
    }

    $url = $url."]";

    $url = str_replace("-","\\",$url);

?>

    <script>
        /*<![CDATA[*/

        var trip = '2022-07-22 18:45:00';
        var searchJson = '{\"bus\":\"5975ad440cf2c571411da1a5\",\"trip\":\"2022-07-22 06:45:00\",\"numbers\":[]}';
        var scheduleJson = '{\"id\":\"62d7d81ae4b0aeb19260b763\",\"bus\":\"5975ad440cf2c571411da1a5\",\"bus-name\":null,\"bus-type\":\"SEMI_LUXURY\",\"fares\":{\"full\":{\"amount\":\"0.0\",\"currency\":\"LKR\"}},\"discount\":{\"amount\":\"0.0\",\"currency\":\"LKR\"},\"bus-number\":null,\"route\":\"56ccf1f044ae02bca721eb33\",\"direction\":{\"start\":\"Colombo\",\"interchange\":[],\"end\":\"Point Pedro\",\"mark\":\"DOWN\"},\"locations\":[{\"place\":\"Ramakrishna Mission Bus Park\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":0},{\"place\":\"Visa Pillaiyar Kovil IBC Rd\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":15},{\"place\":\"Wellawatta Railway Stn\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":16},{\"place\":\"Bampalapitty Railway Stn\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":20},{\"place\":\"Kollupitty Railway Stn\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":30},{\"place\":\"Galleface Bus Stop Opp Taj Hotel\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":35},{\"place\":\"Pettah Gold Center\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":45},{\"place\":\"Kochikadai Sivan Kovil Opp\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":50},{\"place\":\"Kotehena KEELS\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":60},{\"place\":\"Kotehena Roundabout\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":65},{\"place\":\"Kotehena Post Office\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":70},{\"place\":\"Armour Street Demo Company\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":80},{\"place\":\"Stadium Petrol Shed\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":85},{\"place\":\"Thotalanga Jn\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":87},{\"place\":\"Peliyakoda Jn\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":90},{\"place\":\"Oliyamulla Fish Market\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":95},{\"place\":\"Wattala HEMAS\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":100},{\"place\":\"Airport Bus Stop After Highway End\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":115},{\"place\":\"Negombo Hospital\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":120},{\"place\":\"Periyamulla Jn Opp Al Amara Hotel\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":135},{\"place\":\"Negombo Kochikadai People\'s Bank\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":140},{\"place\":\"Wennappuwa Police Stn Opp\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":150},{\"place\":\"Marawella Town\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":155},{\"place\":\"Chillaw Hospital\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":178},{\"place\":\"Chillaw Roundabout\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":179},{\"place\":\"Chillaw Railway Gate\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":180},{\"place\":\"Puttalam\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":275},{\"place\":\"Anuradhapura Bus Stand\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":360},{\"place\":\"Anuradhapura Bus Stand\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":360},{\"place\":\"Medawachchiya\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":390},{\"place\":\"Medawachchiya\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":390},{\"place\":\"Vavuniya Town\",\"action\":\"GET_IN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":420},{\"place\":\"Vavuniya Town\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":420},{\"place\":\"Puliyankulam\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":450},{\"place\":\"Kanakarayankulam\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":460},{\"place\":\"Maankulam\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":470},{\"place\":\"Kokkavil\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":475},{\"place\":\"Murukandi\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":480},{\"place\":\"Iranaimadu\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":500},{\"place\":\"Kilinochchi\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":500},{\"place\":\"Paranthan\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":510},{\"place\":\"Iyankachchi\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":520},{\"place\":\"Palai\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":525},{\"place\":\"Mukamaalai\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":525},{\"place\":\"Eluthumadduvaal\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":525},{\"place\":\"Kodikamam\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":530},{\"place\":\"Meesalai Putur Jn\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":540},{\"place\":\"Chavakacheri\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":540},{\"place\":\"Nunavil\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":540},{\"place\":\"Kaithady\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":545},{\"place\":\"Navatkuli\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":550},{\"place\":\"Kachcheri\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":555},{\"place\":\"Jaffna Town\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":555},{\"place\":\"Nallur\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":560},{\"place\":\"Kalviyankaadu\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":560},{\"place\":\"Irupaalai\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":565},{\"place\":\"Kopay\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":565},{\"place\":\"Neerveli\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":570},{\"place\":\"Siruppiddy\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":570},{\"place\":\"Puttur\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":570},{\"place\":\"Avarankal\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":570},{\"place\":\"Achchuvely\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":570},{\"place\":\"Puraporukki\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":585},{\"place\":\"Kuncharkadai\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":585},{\"place\":\"Mooththavinayakar Kovil\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":585},{\"place\":\"Navalar Madam\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":585},{\"place\":\"Nelliady\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":585},{\"place\":\"Maalusanthi\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":585},{\"place\":\"Thambasiddy\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":585},{\"place\":\"Manthikai\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":585},{\"place\":\"Silaiyady\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":585},{\"place\":\"Point Pedro\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":600},{\"place\":\"Vijapaarimoolai\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":600},{\"place\":\"Inparsiddy\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":615},{\"place\":\"Sakkoddai\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":615},{\"place\":\"Thiccam\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":615},{\"place\":\"Polikandy\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":615},{\"place\":\"Uoorani\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":615},{\"place\":\"Valvettithurai\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":630},{\"place\":\"Udupiddy\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":630},{\"place\":\"Thondaimanaru\",\"action\":\"GET_DOWN\",\"coordinates\":{\"lng\":0.0,\"lat\":0.0},\"estimated-arrival-time-in-minutes\":630}],\"trip\":\"2022-07-22 18:45:00\",\"booking-window-closing-time\":\"2022-07-22 18:30:00\",\"booking-window-status\":\"BOOKING_WINDOW_OPENED\",\"departure-time-in-minutes\":1125,\"arrival-time-in-minutes\":570,\"status\":\"SCHEDULE_COMPLETED\",\"visibility\":\"ALL_USERS\",\"delay-time-in-minutes\":0,\"hotline-numbers\":[\"0778212345\"],\"tracking\":null}';
        var busJson = '{\"id\":\"5975ad440cf2c571411da1a5\",\"name\":\"NORTH WEST (non-AC)\",\"number\":\"COL_PPD_42\",\"type\":\"SEMI_LUXURY\",\"bus-number\":null,\"route-number\":\"87/759\",\"number-of-seats\":42,\"number-of-provided-seats\":0,\"number-of-booked-seats\":0,\"number-of-available-seats\":0,\"number-of-removed-seats\":0,\"max-seats-allowed-per-booking\":6,\"facilities\":\"Adjustable Seats,WiFi,Rest Stops,Movie,Music,Emergency Exit\",\"fare\":{\"amount\":\"3000.0\",\"currency\":\"LKR\"},\"subtotal\":{\"amount\":\"3100.00\",\"currency\":\"LKR\"},\"total-fare\":{\"amount\":\"3100.00\",\"currency\":\"LKR\"},\"reservation\":{\"amount\":\"100.00\",\"currency\":\"LKR\"},\"discount\":{\"amount\":\"0.00\",\"currency\":\"LKR\"},\"premium\":{\"amount\":\"0.00\",\"currency\":\"LKR\"},\"premium-tax\":{\"amount\":\"0.00\",\"currency\":\"LKR\"},\"trip\":\"2022-07-22 18:45:00\",\"departure\":\"22 Jul, 6:45 PM\",\"arrival\":\"23 Jul, 4:15 AM\",\"boardings\":[\"Ramakrishna Mission Bus Park - 6:45 PM\",\"Visa Pillaiyar Kovil IBC Rd - 7:00 PM\",\"Wellawatta Railway Stn - 7:01 PM\",\"Bampalapitty Railway Stn - 7:05 PM\",\"Kollupitty Railway Stn - 7:15 PM\",\"Galleface Bus Stop Opp Taj Hotel - 7:20 PM\",\"Pettah Gold Center - 7:30 PM\",\"Kochikadai Sivan Kovil Opp - 7:35 PM\",\"Kotehena KEELS - 7:45 PM\",\"Kotehena Roundabout - 7:50 PM\",\"Kotehena Post Office - 7:55 PM\",\"Armour Street Demo Company - 8:05 PM\",\"Stadium Petrol Shed - 8:10 PM\",\"Thotalanga Jn - 8:12 PM\",\"Peliyakoda Jn - 8:15 PM\",\"Oliyamulla Fish Market - 8:20 PM\",\"Wattala HEMAS - 8:25 PM\",\"Airport Bus Stop After Highway End - 8:40 PM\",\"Negombo Hospital - 8:45 PM\",\"Periyamulla Jn Opp Al Amara Hotel - 9:00 PM\",\"Negombo Kochikadai People\'s Bank - 9:05 PM\",\"Wennappuwa Police Stn Opp - 9:15 PM\",\"Marawella Town - 9:20 PM\",\"Chillaw Hospital - 9:43 PM\",\"Chillaw Roundabout - 9:44 PM\",\"Chillaw Railway Gate - 9:45 PM\",\"Puttalam - 11:20 PM\",\"Anuradhapura Bus Stand - 12:45 AM\",\"Medawachchiya - 1:15 AM\",\"Vavuniya Town - 1:45 AM\"],\"destinations\":[\"Anuradhapura Bus Stand - 12:45 AM\",\"Medawachchiya - 1:15 AM\",\"Vavuniya Town - 1:45 AM\",\"Puliyankulam - 2:15 AM\",\"Kanakarayankulam - 2:25 AM\",\"Maankulam - 2:35 AM\",\"Kokkavil - 2:40 AM\",\"Murukandi - 2:45 AM\",\"Iranaimadu - 3:05 AM\",\"Kilinochchi - 3:05 AM\",\"Paranthan - 3:15 AM\",\"Iyankachchi - 3:25 AM\",\"Palai - 3:30 AM\",\"Mukamaalai - 3:30 AM\",\"Eluthumadduvaal - 3:30 AM\",\"Kodikamam - 3:35 AM\",\"Meesalai Putur Jn - 3:45 AM\",\"Chavakacheri - 3:45 AM\",\"Nunavil - 3:45 AM\",\"Kaithady - 3:50 AM\",\"Navatkuli - 3:55 AM\",\"Kachcheri - 4:00 AM\",\"Jaffna Town - 4:00 AM\",\"Nallur - 4:05 AM\",\"Kalviyankaadu - 4:05 AM\",\"Irupaalai - 4:10 AM\",\"Kopay - 4:10 AM\",\"Neerveli - 4:15 AM\",\"Siruppiddy - 4:15 AM\",\"Puttur - 4:15 AM\",\"Avarankal - 4:15 AM\",\"Achchuvely - 4:15 AM\",\"Puraporukki - 4:30 AM\",\"Kuncharkadai - 4:30 AM\",\"Mooththavinayakar Kovil - 4:30 AM\",\"Navalar Madam - 4:30 AM\",\"Nelliady - 4:30 AM\",\"Maalusanthi - 4:30 AM\",\"Thambasiddy - 4:30 AM\",\"Manthikai - 4:30 AM\",\"Silaiyady - 4:30 AM\",\"Point Pedro - 4:45 AM\",\"Vijapaarimoolai - 4:45 AM\",\"Inparsiddy - 5:00 AM\",\"Sakkoddai - 5:00 AM\",\"Thiccam - 5:00 AM\",\"Polikandy - 5:00 AM\",\"Uoorani - 5:00 AM\",\"Valvettithurai - 5:15 AM\",\"Udupiddy - 5:15 AM\",\"Thondaimanaru - 5:15 AM\"],\"status\":\"IN_SERVICE\",\"booking-window-status\":\"BOOKING_WINDOW_OPENED\",\"booking-window-closing-time\":\"22 Jul, 6:30 PM\",\"direction\":{\"start\":\"Colombo\",\"interchange\":[],\"end\":\"Point Pedro\",\"mark\":\"DOWN\"},\"journey\":[],\"path-html\":\"\"}';
        var seatsJson = '<?php echo $url ?>';
        var directionJson = '{\"start\":\"Colombo\",\"interchange\":[],\"end\":\"Point Pedro\",\"mark\":\"DOWN\"}';
        var mobileNumberPattern = /^(70([0-9]{7})|71([0-9]{7})|72([0-9]{7})|75([0-9]{7})|76([0-9]{7})|77([0-9]{7})|78([0-9]{7}))$/;
        var oldNICPattern = /^(([0-9]{2})(((([0-2]{1})|([5-7]{1}))([0-9]{2}))|((3|8)((([0-5]{1})([0-9]{1}))|((6)([0-6]{1})))))([0-9]{4})(V|v|X|x))$/;
        var newNICPattern = /^(([^0]{1})([0-9]{3})(((([0-2]{1})|([5-7]{1}))([0-9]{2}))|((3|8)((([0-5]{1})([0-9]{1}))|((6)([0-6]{1})))))([0-9]{5})(V|v|X|x))$/;
        var confirmation = false;

        var countryData = window.intlTelInputGlobals.getCountryData();
        for (var i = 0; i < countryData.length; i++) {
            var country = countryData[i];
            country.name = country.name.replace(/(.+)\(.+\)/, "$1");
        }

        var input = document.querySelector("#mobile"),
            errorMsg = document.querySelector("#error-msg"),
            validMsg = document.querySelector("#valid-msg");

        // here, the index maps to the error code returned from getValidationError - see readme
        var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

        var iti = window.intlTelInput(input, {
            // dropdownContainer: document.body,
            // formatOnDisplay: false,
            // geoIpLookup: function(callback) {
            //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
            //     var countryCode = (resp &amp;&amp; resp.country) ? resp.country : "";
            //     callback(countryCode);
            //   });
            // },
            hiddenInput: "passenger-mobile",
            initialCountry: "lk",
            preferredCountries: ['lk'],
            // separateDialCode: true,
            utilsScript: "../../static/intl-tel-input/js/utils.js",
        });

        var reset = function () {
            input.classList.remove("error");
            errorMsg.innerHTML = "";
            errorMsg.classList.add("hide");
            validMsg.classList.add("hide");
        };

        // on blur: validate
        input.addEventListener('blur', function () {
            reset();
            if (input.value.trim()) {
                if (iti.isValidNumber()) {
                    validMsg.classList.remove("hide");
                } else {
                    input.classList.add("error");
                    var errorCode = iti.getValidationError();
                    errorMsg.innerHTML = errorMap[errorCode];
                    errorMsg.classList.remove("hide");
                }
            }
        });

        // on keyup / change flag: reset
        input.addEventListener('change', reset);
        input.addEventListener('keyup', reset);

        /*]]>*/

        var bus = JSON.parse(busJson);
        var search = JSON.parse(searchJson);
        var schedule = JSON.parse(scheduleJson);
        var seats = JSON.parse(seatsJson);
        var direction = JSON.parse(directionJson);

        var boarding = $('#boarding');
        var destination = $('#destination');

        boarding.html("");
        destination.html("");

        boarding.selectize({
            placeholder: 'Select your boarding point',
            searchField: 'place',
            labelField: 'place-time',
            valueField: 'place',
            options: _.map(bus["boardings"], function (p) {
                var args = p.split("-");
                return { "place": args[0].trim(), "place-time": p }
            }),
            selectOnTab: true,
            create: false
        });

        destination.selectize({
            placeholder: 'Select your destination point',
            searchField: 'place',
            labelField: 'place-time',
            valueField: 'place',
            options: _.map(bus["destinations"], function (p) {
                var args = p.split("-");
                return { "place": args[0].trim(), "place-time": p }
            }),
            selectOnTab: true,
            create: false
        });

        var currentSeatId = "";
        var currentMaleFemale = "";

        var selectedSeats = [];

        var fare = getFare(bus);
        var amount = document.getElementById('total_output').value;

        function populateAgents() {
            var $referred = $("#referred-by");
            if ($referred != null) {
                $.ajax({
                    url: "/api/v1/user/allowed-booking-behalf-of",
                    type: "GET",
                    success: function (response) {
                        var jsonMsg = JSON.stringify(response);

                        if (response.code == "S-1000") {
                            _.forEach(response.result, function (name) {
                                $referred.append(
                                    $('<option></option>').html(name)
                                );
                            });
                        } else {
                            console.log("failed to load allowed-booking-behalf-of" + jsonMsg);
                        }
                    },
                    error: function (response) {
                        console.log("network error" + JSON.stringify(response));
                    }
                })
            }
        }

        function getFare(bus) {
            if (!_.isEmpty(bus)) {
                return bus["total-fare"];
            } else {
                return { "amount": 750, "currency": "LKR" };
            }
        }

        function seatDetailsFmt(seat) {
            return seat.number + "-" + seat.gender[0];
        }

        function getSeatElem(seat) {
            if (seat.number == "" || _.startsWith(seat.number, "!")) {
                return "_";
            } else {
                var label = "";

                if (seat.state == "SEAT_AVAILABLE") {
                    if (_.isNull(seat.gender)) {
                        label = "a";
                    } else {
                        label = seat.gender == "FEMALE" ? "l" : "a";
                    }
                } else if (seat.state == "SEAT_NOT_PROVIDED") {
                    label = "n";
                } else if (seat.state == "SEAT_BOOKING_PROGRESS") {
                    label = "p";
                } else {
                    label = "c";
                }

                return label + "[" + seat.number + "," + seat.number + "]"
            }
        }

        function getSeatChartColumnGroup(seatColumnGroup) {
            return _.map(seatColumnGroup, getSeatElem).join("")
        }

        function getSeatChartRow(seatRow) {
            return _.map(seatRow, getSeatChartColumnGroup).join("_")
        }

        function getSeatCharts(seatsArg) {
            if (!_.isEmpty(seatsArg)) {
                return _.map(seatsArg, getSeatChartRow);
            } else {
                return [
                    "n[1,1]n[2,2]_n[3,3]n[4,4]n[5,5]",
                    "n[10,10]n[9,9]_n[8,8]n[7,7]n[6,6]",
                    "n[11,11]n[12,12]_n[13,13]n[14,14]n[15,15]",
                    "n[20,20]n[19,19]_n[18,18]n[17,17]n[16,16]",
                    "n[21,21]n[22,22]_n[23,23]n[24,24]n[25,25]",
                    "a[30,30]a[29,29]_a[28,28]a[27,27]a[26,26]",
                    "n[31,31]n[32,32]_n[33,33]n[34,34]n[35,35]",
                    "a[40,40]a[39,39]_a[38,38]a[37,37]a[36,36]",
                    "n[41,41]n[42,42]_n[43,43]n[44,44]n[45,45]",
                    "___n[48,48]n[47,47]n[46,46]",
                    "n[54,54]n[53,53]n[52,52]n[51,51]n[50,50]n[49,49]"
                ]
            }
        }

        function reloadSeats(sc, search) {
            selectedSeats = [];

            currentSeatId = "";
            currentMaleFemale = "";


            var $total = $('#total');
            var $selected = $('#selected-seats-ids');

            $selected.text("Please select your seats");
            $total.text("0 LKR");

            $.ajax({
                url: "/api/v1/seat/find",
                type: "POST",
                contentType: "application/json",
                data: JSON.stringify(search),
                success: function (response) {
                    var jsonMsg = JSON.stringify(response);

                    if (response.code == "S-1000") {
                        if (response.result) {
                            console.log("reloading seats " + jsonMsg);

                            _.forEach(response.result, function (row) {
                                _.forEach(row, function (rowCell) {
                                    _.forEach(rowCell, function (seat) {
                                        if (!(seat.number == "" || _.startsWith(seat.number, "!"))) {
                                            if (seat.state == "SEAT_AVAILABLE") {

                                                sc.status(seat.number, "available");

                                                if (!_.isNull(seat.gender)) {
                                                    if (seat.gender == "FEMALE") {
                                                        $('#' + seat.number).css("ladies-only");
                                                    }
                                                }

                                                $('#' + seat.number).attr({
                                                    "data-container": "body",
                                                    "data-toggle": "popover",
                                                    "data-placement": "auto right",
                                                    "data-trigger": "click",
                                                    "title": "Gender"
                                                });

                                            } else {
                                                sc.status(seat.number, "unavailable");
                                                $('#' + seat.number).attr({ "data-toggle": "" });
                                            }

                                            if (seat.state == "SEAT_BOOKING_PROGRESS") {
                                                $('#' + seat.number).css("booking-in-progress");
                                            }
                                        }
                                    });
                                });
                            });

                        } else {
                            console.log("failed to load seats " + jsonMsg)
                        }
                    } else {
                        console.log("failed to load seats " + jsonMsg);
                    }
                },
                error: function (response) {
                    console.log("network error" + JSON.stringify(response));
                }
            })
        }

        function validateSeatSelection(bus, selectedSeats, currentSeat) {
            var message = "";
            var maximumSeats = bus["max-seats-allowed-per-booking"];

            if (selectedSeats.length + 1 > maximumSeats) {
                message = "You can only select maximum of " + maximumSeats + " seats in a booking request!";
            }

            if (_.isEmpty(message)) {
                return true;
            } else {
                $('.top-center').notify({
                    message: { text: message },
                    type: "danger",
                    fadeOut: { delay: 5000 }
                }).show();

                return false;
            }
        }

        function processSeats(seatsArg) {
            selectedSeats = [];

            currentSeatId = "";
            currentMaleFemale = "";

            var $total = $('#total');
            var $selected = $('#selected-seats-ids');

            $selected.text("Please select your seats");
            $total.text("0 LKR");

            var seatMap = getSeatCharts(seatsArg);

            var $seat = $('#seat-map');

            var sc = $seat.seatCharts({
                map: seatMap,
                seats: {
                    l: { classes: 'ladies-only' },
                    n: { classes: 'not-provided ' },
                    p: { classes: 'booking-in-progress' }
                },
                naming: {
                    top: false
                },
                legend: {
                    node: $('#legend'),
                    items: [
                        ['n', 'not-provided ', 'Not Provided'],
                        ['a', 'available', 'Available'],
                        ['c', 'unavailable', 'Already Booked']
                    ]
                },
                click: function () {
                    if (this.status() == 'available') {
                        currentSeatId = this.settings.id;
                        return 'available';
                    } else if (this.status() == 'selected') {
                        currentSeatId = this.settings.id;
                        var filter = function (seat) {
                            return seat.number != currentSeatId
                        };

                        selectedSeats = _.filter(selectedSeats, filter);
                        $selected.text(_.map(selectedSeats, seatDetailsFmt).join(","));
                        document.getElementById('input_s_no').value = document.getElementById('selected-seats-ids').innerHTML;

                        $total.text((amount * selectedSeats.length) + " " + fare.currency);
                        document.getElementById('total_input').value = (amount * selectedSeats.length);

                        return 'available';
                    } else if (this.status() == 'unavailable') {
                        //seat has been already booked
                        return 'unavailable';
                    } else {
                        return this.style();
                    }
                }
            });

            _.forEach(seatsArg, function (row) {
                _.forEach(row, function (rowCell) {
                    _.forEach(rowCell, function (seat) {
                        if (!(seat.number == "" || _.startsWith(seat.number, "!"))) {
                            if (seat.state == "SEAT_AVAILABLE") {
                                sc.status(seat.number, "available");
                                $('#' + seat.number).attr({
                                    "data-container": "body",
                                    "data-toggle": "popover",
                                    "data-placement": "auto right",
                                    "data-trigger": "click",
                                    "title": "Gender"
                                });
                            } else {
                                sc.status(seat.number, "unavailable");
                                $('#' + seat.number).attr({ "data-toggle": "" });
                            }
                        }
                    });
                });
            });


            $('[data-toggle=popover]').popover({
                html: true,
                content: function () {
                    return $('#gender').html();
                }
            });


            $('body').on('click', function (e) {
                $('[data-toggle=popover]').each(function () {
                    if (!$(this).is(e.target)) {
                        $(this).popover('hide');
                    }
                });
            });

            return sc;
        }

        function onSelectMale() {
            onSeatSelect("MALE");
        }

        function onSelectFemale() {
            onSeatSelect("FEMALE")
        }

        function onSeatSelect(gender) {
            var $total = $('#total');
            var $selected = $('#selected-seats-ids');

            var sc = $('#seat-map').seatCharts({});

            var currentSeat = { "number": currentSeatId, "gender": gender };

            if (validateSeatSelection(bus, selectedSeats, currentSeat)) {
                selectedSeats.push(currentSeat);

                $selected.text(_.map(selectedSeats, seatDetailsFmt).join(","));
                document.getElementById('input_s_no').value = document.getElementById('selected-seats-ids').innerHTML;

                $total.text((amount * selectedSeats.length) + " " + fare.currency);
                document.getElementById('total_input').value = (amount * selectedSeats.length);

                sc.status(currentSeatId, "selected");

                $('[data-toggle=popover]').popover("hide");
            }
        }

        $(document).ready(function () {

            var sc = processSeats(seats);

            $('#referred-by').on("click", populateAgents);

            $('#booking').submit(function (event) {
                event.preventDefault();

                //            $('#booking-btn').attr("disabled", true);

                var request = $(this).serializeJSON();

                request = _.omit(request, "mobile");

                if ($("#referred-by").val() == "") {
                    console.log("IF entered");
                    request = _.omit(request, "referred-by");
                }

                var boarding = request["boarding"];
                var destination = request["destination"];

                request = _.omit(request, "boarding", "destination");

                var passengerNIC = request["passenger-nic"] == undefined ? '000010000V' : request["passenger-nic"].trim();
                console.log(passengerNIC);

                if (!(oldNICPattern.test(passengerNIC) || newNICPattern.test(passengerNIC))) {
                    $('.top-center').notify({
                        message: { text: 'Invalid NIC Number ' + passengerNIC + ', Expected xxxxxxxxxV/X or 1xxxxxxxxxxxV/X  format.\nPlease correct the issue and try again!' },
                        type: "danger",
                        fadeOut: { delay: 5000 }
                    }).show();
                    return;
                }

                request["bookings"] = [{
                    "bus": bus.id,
                    "trip": trip,
                    "direction": direction,
                    "places": [boarding, destination],
                    "seats": selectedSeats
                }];

                console.log("Data modified" + request);

                if (selectedSeats.length == 0) {
                    $('.top-center').notify({
                        message: { text: 'Please select your seats!' },
                        type: "danger",
                        fadeOut: { delay: 5000 }
                    }).show();
                    return;
                }

                var yesButton = $('#booking-yes-button');
                var noButton = $('#booking-no-button');


                var booking_fn = function () {

                    var paymentMethodSelection = $('input[name="payment-method-selection"]:checked');

                    if (paymentMethodSelection !== undefined) {
                        request = _.merge(request, { "payment-method": paymentMethodSelection.val() })
                    }

                    var data = JSON.stringify(request);

                    console.log("Payment request " + data);

                    $.ajax({
                        url: "/api/v1/booking/create",
                        type: "POST",
                        contentType: "application/json",
                        data: data,
                        success: function (response) {
                            console.log("submit response is " + JSON.stringify(response));
                            if (response.code == "S-1000") {
                                var result = response.result;
                                var status = result.status;
                                var trxId = result["ref-id"];

                                if (status == "BOOKING_PAYMENT_METHOD_PENDING") {
                                    window.location = "/booking/" + trxId + "/select-method";
                                } else if (status == "BOOKING_SUCCESS") {
                                    window.location = "/booking/" + trxId + "/result";
                                } else if (status == "BOOKING_SEATS_NOT_AVAILABLE") {
                                    reloadSeats(sc, search);

                                    $('.top-center').notify({
                                        message: { text: 'Somebody has already selected your seats , Please select again!' },
                                        type: "danger",
                                        fadeOut: { delay: 5000 }
                                    }).show();

                                } else if (status == "BOOKING_VALIDATION_FAILED") {
                                    reloadSeats(sc, search);

                                    var validationErrorMsg = 'Seat rule validation failed, Please correct the issue and try again!';

                                    $('.top-center').notify({
                                        message: { text: validationErrorMsg },
                                        type: "danger",
                                        fadeOut: { delay: 5000 }
                                    }).show();

                                } else if (status == "BOOKING_SEAT_LIMIT_EXCEEDED") {
                                    reloadSeats(sc, search);

                                    var limitExceededErrorMsg = 'Your booking limit exceeded for the current request, Please contact busseat.lk support!';

                                    $('.top-center').notify({
                                        message: { text: limitExceededErrorMsg },
                                        type: "danger",
                                        fadeOut: { delay: 5000 }
                                    }).show();

                                } else if (status == "BOOKING_WINDOW_CLOSED" || status == "BOOKING_CREDIT_LIMIT_EXCEEDED"
                                    || status == "BOOKING_CREDIT_LIMIT_FAILED" || "BOOKING_INSUFFICIENT_BALANCE") {
                                    window.location = "/booking/" + trxId + "/result";
                                } else {
                                    $('.top-center').notify({
                                        message: { text: 'An internal error has occurred, please try again!' },
                                        type: "danger",
                                        fadeOut: { delay: 5000 }
                                    }).show();
                                }
                            } else {
                                console.log("submit error " + JSON.stringify(response));
                                $('.top-center').notify({
                                    message: { text: 'Unexpected error occurred, Please contact support!' },
                                    type: "danger",
                                    fadeOut: { delay: 5000 }
                                }).show();
                            }
                        },
                        error: function (response) {
                            console.log("network error" + JSON.stringify(response));
                            $('.top-center').notify({
                                message: { text: 'Network error, Please check your connection and try again!' },
                                type: "danger",
                                fadeOut: { delay: 5000 }
                            }).show();
                        }
                    });
                    yesButton.unbind("click");
                    noButton.unbind("click");
                    $('#booking-confirmation-modal').modal('hide');
                };

                var cancel_fn = function () {
                    yesButton.unbind("click");
                    noButton.unbind("click");
                    $('#booking-confirmation-modal').modal('hide');
                };

                if (confirmation) {
                    yesButton.bind("click", booking_fn);
                    noButton.bind("click", cancel_fn);
                    $('#booking-confirmation-modal').modal('show');
                } else {
                    booking_fn();
                }

            });

            $(function () {
                $('[data-toggle="popover"]').popover()
            })

        });

    </script>
    <div class="gap gap-small"></div>

</body>

</html>