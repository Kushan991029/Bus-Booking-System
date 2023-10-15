<?php 

session_start();


$name1 = "Login";
$name2 = "Sign Up";
$icon1 = "fa-sign-in-alt";
$icon2 = "fa-sign-in-alt";
$url1 = "login_page.php";
$url2 = "login_page.php";

if (isset($_SESSION['login_email'])) {
    $name1 = "Settings";
    $name2 = "Logout";
    $icon1 = "fa-cog";
    $icon2 = "fa-sign";
    $url1 = "#";
    $url2 = "../PHP/logout.php";
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


    <!-- Slider CSS Files -->
    <link rel="stylesheet" href="../assets-image-slider/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets-image-slider/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/4.5.6/css/ionicons.min.css">
    <link rel="stylesheet" href="../assets-image-slider/css/style.css">

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
            <a href="../index.php" class="active-bar" style="float: left;font-size: 30px;font-family: 'DynaPuff', cursive;">Bus.lk</a>
            <div class="dropdown1">
                <button class="dropbtn">
                    <i class="fa fa-user" aria-hidden="true"></i>
                    Profile
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content-menu">
                    <a href="<?php echo $url1 ?>"><i class="fas <?php echo $icon1 ?> fa-margin"></i><?php echo $name1 ?></a>
                    <a href="<?php echo $url2 ?>"><i class="fas <?php echo $icon2 ?> fa-margin"></i><?php echo $name2 ?></a>
                </div>
            </div>
            <a href="contact.php">Contact</a>
            <a href="about.php" style="color: blue;">About</a>
            <?php 
            if(isset($_SESSION['login_email'])){
            ?>
            <a href="ticket.php">Tickets</a>
            <?php 
      
            }
            ?>
            <a href="../index.php">Home</a>
            <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
        </div>
        </nav><!-- .navbar -->

    </header><!-- End Header -->

    <main>

        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About</h2>
                    <h3>Find Out More <span>About Us</span></h3>
                    <p>University Of Jaffna Second Year Student developed "Bus.lk" - an innovative online bus ticket booking platform, envisioning a hassle-free and enhanced public transportation system in Sri Lanka.</p>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="../assets-home/img/about.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center"
                        data-aos="fade-up" data-aos-delay="100">
                        <h3>We always try to provide best services for our daily customer.</h3>
                        <p class="fst-italic">
                            One of the benefits of online bus booking on Bus.lk is that cancellation and rescheduling of bus tickets is extremely convenient.
                             Bus.lk offers 100% refund on cancellation if it is attributable to either Bus.lk or the bus operator.
                        </p>
                        <ul>
                            <li>
                                <i class="bx bx-store-alt"></i>
                                <div>
                                    <h5>Our services to increase public transport</h5>
                                    <p>We have introduced our services to most of the district and historical places.
                                    </p>
                                </div>
                            </li>
                            <li>
                                <i class="bx bx-images"></i>
                                <div>
                                    <h5>Our services to build up tourism</h5>
                                    <p>A transport system is the main connecting bridge between two places. Therefore we directly help to improve tourism in Sri Lanka</p>
                                </div>
                            </li>
                        </ul>
                        <p>
                            Public transport, specifically travel by bus is a large growing business in Sri Lanka and other countries.
                            Innovatory mechanisms towards bus ticket booking systems is imperative to adequately provide a user-friendly interface for the passenger to reserve a seat on a journey.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

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

    <!-- Slider JS Files -->
    <script src="../assets-image-slider/js/jquery.min.js"></script>
    <script src="../assets-image-slider/js/popper.js"></script>
    <script src="../assets-image-slider/js/bootstrap.min.js"></script>
    <script src="../assets-image-slider/js/owl.carousel.min.js"></script>
    <script src="../assets-image-slider/js/main.js"></script>

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
