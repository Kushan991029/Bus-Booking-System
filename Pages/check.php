<?php 

session_start();

include '../PHP/connection.php';

?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/html">

<head>
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="HandheldFriendly" content="true" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="icon" type="image/png" href="/static/favicon.png" />

    <link rel="stylesheet" href="../assets-payment/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets-payment/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets-payment/css/style.css" />

    <style>
        .navbar {
            margin-bottom: 0px;
        }
    </style>
    <style>
        .modal-body {
            max-height: calc(100vh - 210px);
            overflow-y: auto;
        }
    </style>

</head>

<body>

    <div id="nav-bar">
         <!-- Navigaiont bar-->
    </div>








    <div class="alert alert-warning text-center" role="alert">
        <p>
            <?php 
            if (isset($_GET['ff_value']) && isset($_GET['ff_value']) && isset($_GET['dat_value'])) { 
                echo $_GET['ff_value']."-".$_GET['tt_value']." | ".$_GET['dat_value'];
            }
             
            ?>
        </p>
    </div>


    <div class="container">

        <div class="gap-small"></div>

        <?php 

            $from_value = $_GET['ff_value'];
            $to_value = $_GET['tt_value'];
            $date_value = $_GET['dat_value'];
            $direction = $_GET['direct'];

            $sql_two = "SELECT shedule.route_no,shedule.bus_no,buses.bus_name,shedule.trip_no,shedule.from_city,shedule.
            to_city,shedule.from_time,shedule.to_time,buses.seat_amount,buses.cond,payment.price 
            from shedule join buses on buses.bus_no = shedule.bus_no join payment on shedule.bus_no = payment.bus_no where 
            payment.from_city='$from_value' AND payment.to_city='$to_value' AND shedule.direction='$direction' AND shedule.route_no IN 
            (SELECT search_from.route_no FROM search_from join search_to on search_from.route_no = search_to.route_no WHERE 
            from_city='$from_value' AND to_city='$to_value')";

            $result_search = mysqli_query($conn, $sql_two);

            if (mysqli_num_rows($result_search)) { 
        
        ?>

        <ul class="list-unstyled booking-list">
            <?php

                while($search_rows = mysqli_fetch_assoc($result_search)){
             
            ?>
            <li>
                <div class="booking-item-container">
                    <div class="booking-item">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <h5>
                                    <?php echo $search_rows['bus_name'] ?>
                                </h5>

                                <!-- th:block rather than unneeded div -->
                                <p>
                                    <?php echo $search_rows['cond'] ?>
                                </p>

                                <p class="booking-item-flight-class">Bus number:
                                    <?php echo $search_rows['bus_no'] ?>
                                </p>

                                <p class="booking-item-flight-class">Route number:
                                    <?php echo $search_rows['route_no'] ?>
                                </p>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div>
                                    <div class="row bs-wizard" style="border-bottom:0;">

                                        <?php 
                                    
                                        if($from_value==$search_rows['from_city'] && $to_value==$search_rows['to_city']){

                                        
                                        ?>

                                        <div class="col-xs-3 bs-wizard-step complete">
                                            <div class="text-center bs-wizard-stepnum">
                                                <?php echo $search_rows['from_city'] ?>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <div class="bs-wizard-dot"></div>
                                            <div class="bs-wizard-time text-center">
                                                <?php echo $search_rows['from_time'] ?>
                                            </div>
                                        </div>

                                        <div class="col-xs-3 bs-wizard-step complete">
                                            <div class="text-center bs-wizard-stepnum">
                                                <?php echo $search_rows['to_city'] ?>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <div class="bs-wizard-dot"></div>
                                            <div class="bs-wizard-time text-center">
                                                <?php echo $search_rows['to_time'] ?>
                                            </div>
                                        </div>


                                        <?php 
                                    
                                        }else if($from_value==$search_rows['from_city'] && $to_value!=$search_rows['to_city']){

                                    
                                    ?>

                                        <div class="col-xs-3 bs-wizard-step complete">
                                            <div class="text-center bs-wizard-stepnum">
                                                <?php echo $search_rows['from_city'] ?>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <div class="bs-wizard-dot"></div>
                                            <div class="bs-wizard-time text-center">
                                                <?php echo $search_rows['from_time'] ?>
                                            </div>
                                        </div>

                                        <div class="col-xs-3 bs-wizard-step active">
                                            <div class="text-center bs-wizard-stepnum">
                                                <?php echo $to_value ?>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <div class="bs-wizard-dot"></div>
                                        </div>

                                        <div class="col-xs-3 bs-wizard-step disabled">
                                            <div class="text-center bs-wizard-stepnum">
                                                <?php echo $search_rows['to_city'] ?>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <div class="bs-wizard-dot"></div>
                                            <div class="bs-wizard-time text-center">
                                                <?php echo $search_rows['to_time'] ?>
                                            </div>
                                        </div>

                                        <?php 
                                    
                                        }else if($from_value!=$search_rows['from_city'] && $to_value==$search_rows['to_city']){

                                    
                                        ?>

                                        <div class="col-xs-3 bs-wizard-step disabled">
                                            <div class="text-center bs-wizard-stepnum">
                                                <?php echo $search_rows['from_city'] ?>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <div class="bs-wizard-dot"></div>
                                            <div class="bs-wizard-time text-center">
                                                <?php echo $search_rows['from_time'] ?>
                                            </div>
                                        </div>

                                        <div class="col-xs-3 bs-wizard-step second">
                                            <div class="text-center bs-wizard-stepnum">
                                                <?php echo $to_value ?>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <div class="bs-wizard-dot"></div>
                                        </div>

                                        <div class="col-xs-3 bs-wizard-step active">
                                            <div class="text-center bs-wizard-stepnum">
                                                <?php echo $search_rows['to_city'] ?>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <div class="bs-wizard-dot"></div>
                                            <div class="bs-wizard-time text-center">
                                                <?php echo $search_rows['to_time'] ?>
                                            </div>
                                        </div>

                                        <?php 
                
                                        }else{
                                    
                                        ?>

                                        <div class="col-xs-3 bs-wizard-step disabled">
                                            <div class="text-center bs-wizard-stepnum">
                                                <?php echo $search_rows['from_city'] ?>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <div class="bs-wizard-dot"></div>
                                            <div class="bs-wizard-time text-center">
                                                <?php echo $search_rows['from_time'] ?>
                                            </div>
                                        </div>

                                        <div class="col-xs-3 bs-wizard-step second">
                                            <div class="text-center bs-wizard-stepnum">
                                                <?php echo $from_value ?>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <div class="bs-wizard-dot"></div>
                                        </div>

                                        <div class="col-xs-3 bs-wizard-step active">
                                            <div class="text-center bs-wizard-stepnum">
                                                <?php echo $to_value ?>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <div class="bs-wizard-dot"></div>
                                        </div>

                                        <div class="col-xs-3 bs-wizard-step disabled">
                                            <div class="text-center bs-wizard-stepnum">
                                                <?php echo $search_rows['to_city'] ?>
                                            </div>
                                            <div class="progress">
                                                <div class="progress-bar"></div>
                                            </div>
                                            <div class="bs-wizard-dot"></div>
                                            <div class="bs-wizard-time text-center">
                                                <?php echo $search_rows['to_time'] ?>
                                            </div>
                                        </div>

                                        <?php 
                                    
                                        }

                                        ?>


                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                <p class="hidden-lg"><strong>Features</strong></p>

                                <ul class="list list-horizontal list-space">
                                    <li>
                                        <i class="fa fa-sliders box-icon-border box-icon-gray round center-block"
                                            data-toggle="tooltip" data-placement="top" title="Adjustable Seats"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-wifi box-icon-border box-icon-gray round center-block"
                                            data-toggle="tooltip" data-placement="top" title="WiFi"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-map-marker box-icon-border box-icon-gray round center-block"
                                            data-toggle="tooltip" data-placement="top" title="Rest Stops"></i>

                                    </li>
                                    <li>
                                        <i class="fa fa-film box-icon-border box-icon-gray round center-block"
                                            data-toggle="tooltip" data-placement="top" title="Movie"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-music box-icon-border box-icon-gray round center-block"
                                            data-toggle="tooltip" data-placement="top" title="Music"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-external-link-square box-icon-gray box-icon-border round center-block"
                                            data-toggle="tooltip" data-placement="top" title="Emergency Exit"></i>
                                    </li>
                                </ul>
                                <div class="gap-small"></div>
                                <a data-toggle="modal" data-target="#5975ad440cf2c571411da1a5"><strong>All the available features</strong></a>

                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">

                                <div>
                                    <p class="booking-item-price">LKR
                                        <?php echo $search_rows['price'] ?>
                                    </p>

                                </div>

                                <p class="booking-item-flight-class">Available seats: 18/
                                    <?php echo $search_rows['seat_amount'] ?>
                                </p>

                                <p class="booking-item-flight-class">Closing:
                                    <?php echo $date_value ?>,
                                    <?php echo $search_rows['from_time'] ?>
                                </p>

                                <div class="gap-small"></div>

                                <?php 

                                    $_SESSION['search_rows'] = $search_rows;
                                    $_SESSION['f_city'] = $from_value;
                                    $_SESSION['t_city'] = $to_value;
                                    $_SESSION['date_value'] = $date_value;

                                ?>

                                <a class="btn btn-primary btn-block btn-lg" href="book.php"><strong>View
                                        Seats</strong></a>
                            </div>
                        </div>
                    </div>
                </div>

            </li>

            <?php } ?>
        </ul>

        <?php } ?>

    </div>
    <div class="gap gap-small"></div>

    <script src="../assets-payment/static/jquery.min.js"></script>
    <script src="../assets-payment/static/jquery.serializejson.js"></script>
    <script src="../assets-payment/static/bootstrap.min.js"></script>



</body>

</html>