<?php

session_start();

include "../PHP/connection.php";

$page = "ticket.php";

if($_SESSION['person']=="Owner"){
    $page = "owner_ticket.php";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Bus.lk</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Icon CSS File -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Favicons -->
    <link href="../assets-home/img/favicon.png" rel="icon">
    <link href="../assets-home/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Route section CSS File -->
    <link href="../assets-route/css/style.css" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets-home/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets-home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets-home/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets-home/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets-home/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets-home/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="../assets-home/css/style.css" rel="stylesheet">

    <!-- Search Box CSS Files -->
    <link rel="stylesheet" href="../assets-travelbox/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets-travelbox/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets-travelbox/css/style.css" />
    <link rel="stylesheet" href="../assets-travelbox/css/selectize.bootstrap3.css" />
    <link rel="stylesheet" href="../assets-travelbox/css/bootstrap-datepicker.min.css" />

    <!-- Table CSS Files -->
    <link rel="stylesheet" href="../assets-table/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../assets-table/font-awesome.min.css">


    <link href="../assets-home/css/style2.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets-ticket/css/style.css">

    <style>
        .h-flex {
            display: flex;
            justify-content: center;
            align-content: center;
            align-items: center;
        }

        .m-width {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }

        .po {
            position: relative;
        }

        .badge {
            background-color: red;
            position: absolute;
            top: 0;
            right: -3px;
        }

        .f-size {
            font-size: 20px;
        }

        .l-margin {
            margin-left: 5px;
        }

        @import url('https://fonts.googleapis.com/css2?family=DynaPuff&display=swap');
    </style>

</head>

<body>

    <header id="header">
        <div class="topnav" id="myTopnav">
            <a href="../index.php" class="active-bar"
                style="float: left;font-size: 30px;font-family: 'DynaPuff', cursive;">Bus.lk</a>
            <div class="dropdown1">
                <button class="dropbtn">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Profile
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content-menu">
                    <a href="#"><i class="fas fa-cog fa-margin"></i>Settings</a>
                    <a href="../PHP/logout.php"><i class="fas fa-sign fa-margin"></i>Logout</a>
                </div>
            </div>
            <a href="contact.php">Contact</a>
            <a href="about.php">About</a>
            <a href="owner_ticket.php" style="color: blue;">Tickets</a>
            <a href="../index.php">Home</a>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        </nav><!-- .navbar -->

    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Ticket Section ======= -->
        <section id="tickets" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Booking History</h2>
                    <h3>Find Out Your <span>Previous Reservations</span></h3>
                </div>

                <?php 

                $email = "owner@gmail.com";

                if(isset($_SESSION['login_email'])){
                    $email = $_SESSION['login_email'];
                }

                $sql = "SELECT booked_seats.id,booked_seats.bus_no,booked_seats.from_val,to_val,
                booked_seats.date_val,booked_seats.customer_name,booked_seats.mobile_no,booked_seats.seat FROM booked_seats
                join buses on booked_seats.bus_no = buses.bus_no where owner_id='$email'";
                $result_read = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result_read)) {
                
                ?>

                <?php 
                                        
                    while($rows = mysqli_fetch_assoc($result_read)){    
                       
                        $active_name = "Disabled";
                        $color = "red";
                        $icon = "fa-times";
                       
                        if(($rows['date_val']>date("Y-m-d")) || ($rows['date_val']==date("Y-m-d"))){
                            $active_name = "Active";
                            $color = "#3ce736";
                            $icon = "fa-check";
                        }
                                                               
                    ?>
                <main class="ticket-system1">
                    <div class="receipts-wrapper1" style="margin-bottom: 20px;">
                        <div class="receipts1">
                            <div class="receipt1">
                                <div
                                    style="border: 2px solid <?php echo $color; ?>;width: 110px;border-radius: 20px;height: 30px;">
                                    <p style="color: <?php echo $color; ?>;padding:0 10px;"><i
                                            class="fa <?php echo $icon; ?>"></i>
                                        <?php echo $active_name; ?>
                                    </p>
                                </div>
                                <div style="text-align: center;">
                                    <h2 class="r1">
                                        <?php echo $rows['from_val']; ?>
                                    </h2>
                                    <i class="fa fa-bus" style="color: blue;font-size: 30px;"></i>
                                    <h2 class="r1">
                                        <?php echo $rows['to_val']; ?>
                                    </h2>
                                </div>
                                <div class="details1">
                                    <div class="item1">
                                        <span>Passanger</span>
                                        <h3>
                                            <?php echo $rows['customer_name']; ?>
                                        </h3>
                                    </div>
                                    <div class="item1">
                                        <span>Seat No.</span>
                                        <h3>
                                            <?php echo $rows['seat_val']; ?>
                                        </h3>
                                    </div>
                                    <div class="item1">
                                        <span>Mobile Number</span>
                                        <h3>
                                            <?php echo $rows['mobile_no']; ?>
                                        </h3>
                                    </div>
                                    <div class="item1">
                                        <span>Bus No</span>
                                        <h3>
                                            <?php echo $rows['bus_no']; ?>
                                        </h3>
                                    </div>
                                    <div class="item1">
                                        <span>Departure Date</span>
                                        <h3>
                                            <?php echo $rows['date_val']; ?>
                                        </h3>
                                    </div>
                                    <div class="item1">
                                        <span>Trip No</span>
                                        <h3>
                                            <?php echo $rows['trip_no']; ?>
                                        </h3>
                                    </div>
                                    <div class="item1">
                                        <span>Ticket No</span>
                                        <h3>
                                            <?php echo $rows['id']."ACE"; ?>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

                <?php } ?>

                <?php }else{ ?>
                <div class="section-title">
                    <div class="alert alert-danger">
                        <strong>Warning!</strong> Currently your booking details are not available.
                    </div>
                </div>
                <?php } ?>

            </div>
        </section><!-- End Ticket Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" style="margin-top: 80px;">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>BizLand<span>.</span></h3>
                        <p>
                            A108 Adam Street <br>
                            Word Place<br>
                            Colombo <br><br>
                            <strong>Phone:</strong>+94 12-345-6789<br>
                            <strong>Email:</strong> Businfo@gmail.com<br>
                        </p>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Safe Travel</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Online Reservation</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Travel Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Contact Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Others</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>You can follow our services with social media</p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="container py-4">
            <div class="copyright">
                &copy; Copyright <strong><span>Bus.lk</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bizland-bootstrap-business-template/ -->
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>


    <!-- Travel menu JS Files -->
    <script type="application/javascript">
        var tid = setInterval(tagline_vertical_slide, 2500);

        // vertical slide
        function tagline_vertical_slide() {
            var curr = $("#tagline ul li.active");
            curr.removeClass("active").addClass("vs-out");
            setTimeout(function () {
                curr.removeClass("vs-out");
            }, 500);

            var nextTag = curr.next('li');
            if (!nextTag.length) {
                nextTag = $("#tagline ul li").first();
            }
            nextTag.addClass("active");
        }
    </script>

    <!-- Vendor JS Files -->
    <script src="../assets-home/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets-home/vendor/aos/aos.js"></script>
    <script src="../assets-home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets-home/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets-home/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets-home/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets-home/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="../assets-home/vendor/php-email-form/validate.js"></script>

    <!--  Main JS File -->
    <script src="../assets-home/js/main.js"></script>

    <!-- Table JS Files -->
    <script src="../assets-table/bootstrap.bundle.min.js"></script>
    <script src="../assets-table/dataTables.bootstrap4.min.js"></script>
    <script src="../assets-table/jquery-3.3.1.slim.min.js"></script>
    <script src="../assets-table/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(function () {
            $(document).ready(function () {
                $('#example').DataTable({
                    'paging': true,
                    'lengthChange': true,
                    'searching': true,
                    'ordering': true,
                    'info': true,
                    'autoWidth': false
                });
            });
        });
    </script>

    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>


</body>

</html>