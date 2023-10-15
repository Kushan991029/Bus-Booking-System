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
            <a href="contact.php" style="color: blue;">Contact</a>
            <a href="about.php">About</a>
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

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                    <h3><span>Contact Us</span></h3>
                    <p>Reach us for any of the following matters, we reply each and every calls, messages, emails, everything</p>
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="bx bx-map"></i>
                            <h3>Our Address</h3>
                            <p>A108 Adam Street, Word Place, Colombo</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-envelope"></i>
                            <h3>Email Us</h3>
                            <p>Bus@gmail.com</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box  mb-4">
                            <i class="bx bx-phone-call"></i>
                            <h3>Call Us</h3>
                            <p>+94 12-345-6789</p>
                        </div>
                    </div>

                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">

                    <div class="col-lg-6 ">
                        <iframe class="mb-4 mb-lg-0"
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621"
                            frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
                    </div>

                    <div class="col-lg-6">
                        <form action="../PHP/contact_save.php" method="post" role="form" class="php-email-form">
                            <div class="row">
                                <div class="col form-group">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Your Name" required>
                                </div>
                                <div class="col form-group">
                                    <input type="email" class="form-control" name="email" id="email"
                                        placeholder="Your Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Subject" required>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                    required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit" name='message_button'>Send Message</button></div>
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
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