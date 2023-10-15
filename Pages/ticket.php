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
            <a href="<?php echo $page ?>" style="color: blue;">Tickets</a>
            <a href="../index.php">Home</a>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        </nav><!-- .navbar -->

    </header><!-- End Header -->

    <main id="main">

        <!-- ======= Ticket Section ======= -->
        <section id="tickets" class="about section-bg">
            <div class="container" data-aos="fade-up" style="width: 80%;">

                <div class="section-title">
                    <h2>Booking History</h2>
                    <h3>Find Out Your <span>Previous Reservations</span></h3>
                </div>

                <div class="main-ticket">

                <?php 

                $email = "i.h.rajakaruna09@gmail.com";

                if(isset($_SESSION['login_email'])){
                    $email = $_SESSION['login_email'];
                }

                $sql = "SELECT * FROM booked_seats where email='$email' ORDER BY id DESC";
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
                                    <div style="border: 2px solid <?php echo $color; ?>;width: 110px;border-radius: 20px;height: 30px;margin-bottom:20px;">
                                        <p style="color: <?php echo $color; ?>;padding:0 10px;"><i class="fa <?php echo $icon; ?>"></i> <?php echo $active_name; ?></p>
                                    </div>
                                    <div style="text-align: center;">
                                        <h2 class="r1"><?php echo $rows['from_val']; ?></h2>
                                        <i class="fa fa-bus" style="color: blue;font-size: 30px;"></i>
                                        <h2 class="r1"><?php echo $rows['to_val']; ?></h2>
                                    </div>
                                    <div class="details1">
                                        <div class="item1">
                                            <span>Passanger</span>
                                            <h3><?php echo $rows['customer_name']; ?></h3>
                                        </div>
                                        <div class="item1">
                                            <span>Seat No.</span>
                                            <h3><?php echo $rows['seat_val']; ?></h3>
                                        </div>
                                        <div class="item1">
                                            <span>Bus Name</span>
                                            <h3><?php echo $rows['bus_name']; ?></h3>
                                        </div>
                                        <div class="item1">
                                            <span>Bus No</span>
                                            <h3><?php echo $rows['bus_no']; ?></h3>
                                        </div>
                                        <div class="item1">
                                            <span>Departure Date</span>
                                            <h3><?php echo $rows['date_val']; ?></h3>
                                        </div>
                                        <div class="item1">
                                            <span>Departure Time</span>
                                            <h3><?php echo $rows['depature']; ?></h3>
                                        </div>
                                        <div class="item1">
                                            <span>Ticket No</span>
                                            <h3><?php echo "ACE-".$rows['id']; ?></h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="receipt1 qr-code1">
                                    <svg class="qr1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 29.938 29.938">
                                        <path
                                            d="M7.129 15.683h1.427v1.427h1.426v1.426H2.853V17.11h1.426v-2.853h2.853v1.426h-.003zm18.535 12.83h1.424v-1.426h-1.424v1.426zM8.555 15.683h1.426v-1.426H8.555v1.426zm19.957 12.83h1.427v-1.426h-1.427v1.426zm-17.104 1.425h2.85v-1.426h-2.85v1.426zm12.829 0v-1.426H22.81v1.426h1.427zm-5.702 0h1.426v-2.852h-1.426v2.852zM7.129 11.406v1.426h4.277v-1.426H7.129zm-1.424 1.425v-1.426H2.852v2.852h1.426v-1.426h1.427zm4.276-2.852H.002V.001h9.979v9.978zM8.555 1.427H1.426v7.127h7.129V1.427zm-5.703 25.66h4.276V22.81H2.852v4.277zm14.256-1.427v1.427h1.428V25.66h-1.428zM7.129 2.853H2.853v4.275h4.276V2.853zM29.938.001V9.98h-9.979V.001h9.979zm-1.426 1.426h-7.127v7.127h7.127V1.427zM0 19.957h9.98v9.979H0v-9.979zm1.427 8.556h7.129v-7.129H1.427v7.129zm0-17.107H0v7.129h1.427v-7.129zm18.532 7.127v1.424h1.426v-1.424h-1.426zm-4.277 5.703V22.81h-1.425v1.427h-2.85v2.853h2.85v1.426h1.425v-2.853h1.427v-1.426h-1.427v-.001zM11.408 5.704h2.85V4.276h-2.85v1.428zm11.403 11.405h2.854v1.426h1.425v-4.276h-1.425v-2.853h-1.428v4.277h-4.274v1.427h1.426v1.426h1.426V17.11h-.004zm1.426 4.275H22.81v-1.427h-1.426v2.853h-4.276v1.427h2.854v2.853h1.426v1.426h1.426v-2.853h5.701v-1.426h-4.276v-2.853h-.002zm0 0h1.428v-2.851h-1.428v2.851zm-11.405 0v-1.427h1.424v-1.424h1.425v-1.426h1.427v-2.853h4.276v-2.853h-1.426v1.426h-1.426V7.125h-1.426V4.272h1.426V0h-1.426v2.852H15.68V0h-4.276v2.852h1.426V1.426h1.424v2.85h1.426v4.277h1.426v1.426H15.68v2.852h-1.426V9.979H12.83V8.554h-1.426v2.852h1.426v1.426h-1.426v4.278h1.426v-2.853h1.424v2.853H12.83v1.426h-1.426v4.274h2.85v-1.426h-1.422zm15.68 1.426v-1.426h-2.85v1.426h2.85zM27.086 2.853h-4.275v4.275h4.275V2.853zM15.682 21.384h2.854v-1.427h-1.428v-1.424h-1.427v2.851zm2.853-2.851v-1.426h-1.428v1.426h1.428zm8.551-5.702h2.853v-1.426h-2.853v1.426zm1.426 11.405h1.427V22.81h-1.427v1.426zm0-8.553h1.427v-1.426h-1.427v1.426zm-12.83-7.129h-1.425V9.98h1.425V8.554z" />
                                    </svg>
                                    <div class="description1">
                                        <h2>Bus.lk</h2>
                                        <p>Scan QR-code with mobile app</p>
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
            </div>

            </div>
        </section><!-- End Ticket Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" style="margin-top: 80px;">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>Bus.lk</h3>
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