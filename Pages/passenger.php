<?php 

include '../PHP/connection.php';

session_start();

$p_email = "";

if (isset($_SESSION['login_email'])) {
    $p_email = $_SESSION['login_email'];
}

$sql = "SELECT * FROM users WHERE email='$p_email'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
$full_name = $rows['first']." ".$rows['last'];
$_SESSION['full_name'] = $full_name;

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

    <title>BizLand Bootstrap Template - Index</title>
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
    </style>






</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center" style="display: flex;justify-content: space-around;">
        <h1 class="logo"><a href="passenger.php">BizLand<span>.</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt=""></a>-->

        <div style="width: 30%;"></div>

        <nav id="navbar" class="navbar" style="margin-top: 10px;">
            <ul>
                <li><a class="nav-link scrollto active" href="../index.php">Home</a></li>
                <li><a class="nav-link scrollto" href="<?php echo $page ?>">Tickets</a></li>
                <li><a class="nav-link scrollto" href="about.php">About</a></li>
                <li><a class="nav-link scrollto" href="contact.php">Contact</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <div class="h-flex">
            <a href="#" class="nav-item nav-link notifications po"><i class="fa fa-bell-o f-size"></i><span
                    class="badge">1</span></a>
            <div class="nav-item dropdown l-margin">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle user-action"><img
                        src="../Images/person.jpg" class="m-width" alt="Avatar">&emsp;
                    <?php echo $full_name ?>
                </a>
                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item"><i class="fa fa-user-o"></i>&emsp; Profile</a></a>
                    <div class="dropdown-divider"></div>
                    <a href="../PHP/logout.php" class="dropdown-item"><i class="fa fa-sign-out"></i>&emsp;
                        Logout</a></a>
                </div>
            </div>
        </div>



    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="#hero" style="padding-top: 0;">
        <div class="home-slider owl-carousel" style="height: 80vh;">
            <div class="slider-item" style="background-image:url(../assets-image-slider/images/slider-1.jpg);">
                <div class="overlay"></div>
            </div>
            <div class="slider-item js-fullheight"
                style="background-image:url(../assets-image-slider/images/slider-2.jpg);">
                <div class="overlay"></div>
            </div>
            <div class="slider-item js-fullheight"
                style="background-image:url(../assets-image-slider/images/slider-2.jpg);">
                <div class="overlay"></div>
            </div>
        </div>
    </section><!-- End Hero -->

    <!-- ======= Travel Menu Section ======= -->

    <div class="tagline visible-lg" id="tagline" style="position: absolute;top: 100px;left: 100px;">
        <span>Travel to</span>
        <ul>
            <li class="active">Jaffna</li>
            <li>Batticaloa</li>
            <li>Ampara</li>
            <li>Trincomalee</li>
            <li>Mannar</li>
            <li>Hatton</li>
            <li>Badulla</li>
            <li>Matara</li>
            <li>Anuradhapura</li>
            <li>Polannaruwa</li>
            <li>Hambantota</li>
            <li>Kilinochi</li>
            <li>Vavuniya</li>
            <li>Mullaiththivu</li>
            <li>Gampaha</li>
            <li>Kalutara</li>
            <li>Galle</li>
            <li>Matale</li>
            <li>Nuwara Eliya</li>
            <li>Moneragala</li>
            <li>Kegalle</li>
            <li>Ratnapura</li>
            <li>Kuruenegala</li>
            <li>Puttalam</li>
            <li>Colombo</li>
        </ul>
    </div>

    <!-- ======= Search Box Section ======= -->

    <div class="search-tabs search-tabs-bg search-tabs-bottom mb100"
        style="padding: 0 10%;position: absolute;top: 400px;">
        <div class="tabbable">
            <div class="tab-content">
                <div class="tab-pane fade in active" id="tab-2"
                    style="background-color: rgba(0,0,0,.5);color: white;border-radius: 30px;">
                    <h1 class="hidden-xs" style="color: #FFF;">The simplest way to book your bus tickets in Sri Lanka
                    </h1>

                    <form action="../PHP/search_data.php" method="POST">
                        <input type="hidden" name="_csrf" value="a1d6625e-1a27-4b6e-a3d3-be01f2bab6cc" />

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group form-group-lg">
                                    <label for="from">FROM</label>
                                    <select class="stations form-control" name="from_value" id="from"
                                        required="required" style="background-color: transparent;">
                                        <option selected>Select One</option>
                                        <option>Colombo</option>
                                        <option>Gampaha</option>
                                        <option>Kaluthara</option>
                                        <option>Kandy</option>
                                        <option>Matale</option>
                                        <option>Nuwara Eliya</option>
                                        <option>Galle</option>
                                        <option>Hambantota</option>
                                        <option>Jaffna</option>
                                        <option>Kilinochchi</option>
                                        <option>Mannar</option>
                                        <option>Vavuniya</option>
                                        <option>Mullaitivu</option>
                                        <option>Batticaloa</option>
                                        <option>Ampara</option>
                                        <option>Trincomalee</option>
                                        <option>Kurunegala</option>
                                        <option>Puttalam</option>
                                        <option>Anuradhapura</option>
                                        <option>Polonnaruwa</option>
                                        <option>Badulla</option>
                                        <option>Moneragala</option>
                                        <option>Ratnapura</option>
                                        <option>Kegalle</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-group-lg">
                                    <label for="to">TO</label>
                                    <select class="stations form-control" name="to_value" id="to" required="required"
                                        style="background-color: transparent;">
                                        <option selected>Select One</option>
                                        <option>Colombo</option>
                                        <option>Gampaha</option>
                                        <option>Kaluthara</option>
                                        <option>Kandy</option>
                                        <option>Matale</option>
                                        <option>Nuwara Eliya</option>
                                        <option>Galle</option>
                                        <option>Hambantota</option>
                                        <option>Jaffna</option>
                                        <option>Kilinochchi</option>
                                        <option>Mannar</option>
                                        <option>Vavuniya</option>
                                        <option>Mullaitivu</option>
                                        <option>Batticaloa</option>
                                        <option>Ampara</option>
                                        <option>Trincomalee</option>
                                        <option>Kurunegala</option>
                                        <option>Puttalam</option>
                                        <option>Anuradhapura</option>
                                        <option>Polonnaruwa</option>
                                        <option>Badulla</option>
                                        <option>Moneragala</option>
                                        <option>Ratnapura</option>
                                        <option>Kegalle</option>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group form-group-lg">
                                    <label for="dp1">JOURNEY DATE</label>
                                    <input id="dp1" name="date_value" type="date" required="required"
                                        placeholder="Select journey date" class="form-control date"
                                        style="background-color: transparent;color: #FFF;" />
                                    <script type="application/javascript">
                                        $(function () {
                                            $('#dp1').datepicker({
                                                format: "dd/mm/yyyy",
                                                todayHighlight: true,
                                                autoclose: true,
                                                todayBtn: "linked",
                                                orientation: "top right",
                                                startDate: "+0d",
                                                endDate: "+30d"
                                            });
                                        });
                                        $('#dp1').keydown(function (e) {
                                            e.preventDefault();
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Action</label>
                                    <button class="btn btn-primary btn-block btn-lg" type="submit" name="search_value">
                                        Find Buses
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="checkbox text-right">
                            <a href="#">Need help?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <main id="main">

        <!-- ======= About Section ======= -->
        <!-- <section id="about" class="about section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>About</h2>
                    <h3>Find Out More <span>About Us</span></h3>
                    <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas
                        atque vitae
                        autem.</p>
                </div>

                <div class="row">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="../assets-home/img/about.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content d-flex flex-column justify-content-center"
                        data-aos="fade-up" data-aos-delay="100">
                        <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et
                            dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li>
                                <i class="bx bx-store-alt"></i>
                                <div>
                                    <h5>Ullamco laboris nisi ut aliquip consequat</h5>
                                    <p>Magni facilis facilis repellendus cum excepturi quaerat praesentium libre trade
                                    </p>
                                </div>
                            </li>
                            <li>
                                <i class="bx bx-images"></i>
                                <div>
                                    <h5>Magnam soluta odio exercitationem reprehenderi</h5>
                                    <p>Quo totam dolorum at pariatur aut distinctio dolorum laudantium illo direna
                                        pasata redi</p>
                                </div>
                            </li>
                        </ul>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in
                            voluptate
                            velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                            proident, sunt in
                            culpa qui officia deserunt mollit anim id est laborum
                        </p>
                    </div>
                </div>

            </div>
        </section> -->
        <!-- End About Section -->



    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">

        <div class="footer-newsletter">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">

                        <h4>Top Bus Routes</h4>
                        <div class="row-one">
                            <div class="col-one">
                                <ul class="list-unstyled">
                                    <li><a href="#">Jaffna - Colombo</a></li>
                                    <li><a href="#">Point Pedro - Colombo</a></li>
                                    <li><a href="#">Kilinochchi - Colombo</a></li>
                                    <li><a href="#">Vavuniya - Colombo</a></li>
                                    <li><a href="#">Anuradhapura - Colombo</a></li>
                                </ul>
                            </div>
                            <div class="col-one">
                                <ul class="list-unstyled">
                                    <li><a href="#">Batticaloa - Colombo</a></li>
                                    <li><a href="#">Akkaraipattu - Colombo</a></li>
                                    <li><a href="#">Ampara - Colombo</a></li>
                                    <li><a href="#">Dambulla - Colombo</a></li>
                                    <li><a href="#">Polannaruwa - Colombo</a></li>
                                </ul>
                            </div>
                            <div class="col-one">
                                <ul class="list-unstyled">
                                    <li><a href="#">Hatton - Colombo</a></li>
                                    <li><a href="#">Matale - Colombo</a></li>
                                    <li><a href="#">Nuwara Eliya - Colombo</a></li>
                                    <li><a href="#">Welimada - Colombo</a></li>
                                    <li><a href="#">Kandy - Colombo</a></li>
                                </ul>
                            </div>
                            <div class="col-one">
                                <ul class="list-unstyled">
                                    <li><a href="#">Kataragama - Colombo</a></li>
                                    <li><a href="#">Matara - Colombo</a></li>
                                    <li><a href="#">Kamburupitiya - Colombo</a></li>
                                    <li><a href="#">Panandura - Matara</a></li>
                                    <li><a href="#">Badulla - Colombo</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>BizLand<span>.</span></h3>
                        <p>
                            A108 Adam Street <br>
                            New York, NY 535022<br>
                            United States <br><br>
                            <strong>Phone:</strong> +1 5589 55488 55<br>
                            <strong>Email:</strong> info@example.com<br>
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
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Social Networks</h4>
                        <p>Fllow our social media for more details</p>
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
                &copy; Copyright <strong><span>BizLand</span></strong>. All Rights Reserved
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

</body>

</html>