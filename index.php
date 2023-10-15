<?php 

session_start();


$name1 = "Login";
$name2 = "Sign Up";
$icon1 = "fa-sign-in-alt";
$icon2 = "fa-sign-in-alt";
$url1 = "Pages/login_page.php";
$url2 = "Pages/login_page.php";

if (isset($_SESSION['login_email'])) {
    $name1 = "Settings";
    $name2 = "Logout";
    $icon1 = "fa-cog";
    $icon2 = "fa-sign";
    $url1 = "#";
    $url2 = "PHP/logout.php";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets-main/css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Open Sans" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Bus.lk</title>



  <!-- Icon CSS File -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Favicons -->
  <link href="assets-home/img/favicon.png" rel="icon">
  <link href="assets-home/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Route section CSS File -->
  <link href="assets-route/css/style.css" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets-home/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets-home/css/style1.css" rel="stylesheet">

  <!-- Top Menu CSS File -->
  <link href="assets-home/css/style2.css" rel="stylesheet">

  <style>
    @import url('https://fonts.googleapis.com/css2?family=DynaPuff&display=swap');
  </style>

</head>

<style>
  .top-height {
    height: 80px;
  }

  .underline {
    text-decoration: none;
  }
</style>

<body>

  <div class="topnav" id="myTopnav">
    <a href="index.php" class="active-bar" style="float: left;font-size: 30px;font-family: 'DynaPuff', cursive;">Bus.lk</a>
    <div class="dropdown1">
      <button class="dropbtn">
        <i class="fa fa-user" aria-hidden="true"></i>
        Profile
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content-menu">
        <a href="<?php echo $url1 ?>"><i class="fas <?php echo $icon1 ?> fa-margin"></i>
          <?php echo $name1 ?>
        </a>
        <a href="<?php echo $url2 ?>"><i class="fas <?php echo $icon2 ?> fa-margin"></i>
          <?php echo $name2 ?>
        </a>
      </div>
    </div>
    <a href="Pages/contact.php">Contact</a>
    <a href="Pages/about.php">About</a>
    <?php 
      if(isset($_SESSION['login_email'])){
    ?>
    <a href="Pages/ticket.php">Tickets</a>
    <?php 
      
    }
    ?>
    <a href="index.php" style="color: blue;">Home</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
  </div>

  <div style="height: 40px;"></div>

  <div class="TopNext container-fluid" style="padding-top: 220px;">
    <div class="someTextHere">

    </div>
    <div class="container mt-10 pt-5">
      <form action="PHP/search_data.php" method="POST">
        <div class="form">
          <div class="row">
            <div class="col-4">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class='fas fa-home'
                    style='font-size:20px'></i></span>
                <select class="form-control" name="from_value" id="from" required="required">
                  <option selected>From</option>
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
            <div class="col-4">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" style="border-radius: 0px;"><i
                    class='fas fa-map-marker-alt' style='font-size:20px'></i></span>
                <select class="form-control" name="to_value" id="to" required="required">
                  <option selected>To</option>
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
            <div class="col-2">
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1" style="border-radius: 0px;"><i
                    class='far fa-calendar-alt' style="font-size:20px"></i></span>
                <input type="date" class="form-control" name="date_value" placeholder="SELECT DATE">
              </div>
            </div>
            <div class="col-2">
              <button type="submit" class="btn btn-outline-primary" name="search_value">Search</button>
            </div>
          </div>

        </div>
      </form>
    </div>
  </div>

  <div class="container offersHeader">
    <h2 class="c_H_1 text-center mt-2 mb-3">HELLO TRAVELLER !!</h2>
    <h4 class="c_H_2 text-center mt-2">Check Out These Awesome Offers.</h4>
  </div>


  <div class="Offers">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card" style="border-radius: 0px;">
            <div class="card-body" style="background: linear-gradient(to right,rgb(245, 178, 54),rgb(235, 235, 23));">
              <h5 class="card-title text-center"><a class="todayOffer" href="#"
                  style="text-decoration: none; color:black; font-family: Open Sans; font-weight: bold;">First Timer</a>
              </h5>

            </div>
            <img src="assets-main/images/c2.jpg" class="card-img-top" alt="Ticket" style="border-radius: 0px;">
            <div class="card-body" style="background: linear-gradient(to right,rgb(245, 178, 54),rgb(235, 235, 23));">
              <p class="card-text" style="font-family: Open Sans; color:black">Get Your First Ticket Discount</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card" style="border-radius: 0px;">
            <div class="card-body" style="background: linear-gradient(to right,rgb(245, 178, 54),rgb(235, 235, 23));">
              <h5 class="card-title text-center"><a class="todayOffer" href="#"
                  style="text-decoration: none; color:black; font-family: Open Sans; font-weight: bold;">Today
                  Offers</a></h5>

            </div>
            <img src="assets-main/images/offers.jpg" class="card-img-top" alt="Ticket" style="border-radius: 0px;">
            <div class="card-body" style="background: linear-gradient(to right,rgb(245, 178, 54),rgb(235, 235, 23));">
              <p class="card-text" style="font-family: Open Sans; color:black">Here's Today Deals</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card" style="border-radius: 0px;">
            <div class="card-body" style="background: linear-gradient(to right,rgb(245, 178, 54),rgb(235, 235, 23));">
              <h5 class="card-title text-center"><a class="bestDeals" href="#"
                  style="text-decoration: none; color:black; font-family: Open Sans; font-weight: bold;">Best Deals</a>
              </h5>

            </div>
            <img src="assets-main/images/c3.jpg" class="card-img-top" alt="Discount" style="border-radius: 0px;">
            <div class="card-body" style="background: linear-gradient(to right,rgb(245, 178, 54),rgb(235, 235, 23));">
              <p class="card-text" style="font-family: Open Sans; color:black">Offers By Bus Owners</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3">
          <div class="card" style="border-radius: 0px;">
            <div class="card-body" style="background: linear-gradient(to right,rgb(245, 178, 54),rgb(235, 235, 23));">
              <h5 class="card-title text-center"><a class="reawards" href="#"
                  style="text-decoration: none; color:black; font-family: Open Sans; font-weight: bold;">Your
                  Rewards</a></h5>

            </div>
            <img src="assets-main/images/reward.webp" class="card-img-top" alt="Ticket" style="border-radius: 0px;">
            <div class="card-body" style="background: linear-gradient(to right,rgb(245, 178, 54),rgb(235, 235, 23));">
              <p class="card-text" style="font-family: Open Sans; color:black">See Your Rewards</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
        aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="overlay-image">
          <img src="assets-main/images/slide1.1.1.jpg" class="w-100 h-100">
        </div>
        <!--<img src="..." class="d-block w-100" alt="...">-->
        <div class="carousel-caption d-none d-md-block">
          <h2 style="font-family: Open Sans; color:white; font-weight: bold;">There's Always A Seat For You</h2>
          <p><a href="#" style="text-decoration: none; font-family: Open Sans; color:aliceblue"> See Our Companions </a>
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <div class="overlay-image">
          <img src="assets-main/images/slide2.2.jpg" class="w-100 h-100">
        </div>
        <!--<img src="..." class="d-block w-100" alt="...">-->
        <div class="carousel-caption d-none d-md-block">
          <h2 style="font-family: Open Sans; color:white; font-weight: bold;"><a href="#"
              style="text-decoration: none; color: white;"> Watch Our Gallery</a></h2>
        </div>
      </div>
      <div class="carousel-item">
        <div class="overlay-image">
          <img src="assets-main/images/slide3.3.jpg" class="w-100 h-100">
        </div>
        <!--<img src="..." class="d-block w-100" alt="...">-->
        <div class="carousel-caption d-none d-md-block">
          <h2 style="font-family: Open Sans; color:white; font-weight: bold;">For Your Special Occations</h2>
          <p><a href="#" style="text-decoration: none; font-family: Open Sans; color:aliceblue">Make Your Travel
              Plans</a></p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="someHeader" style="font-family: Open Sans;">
    <h2 class="choose">Why Chose Us For Bus Booking</h2>
  </div>

  <div class="siteCards">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card">
            <img src="assets-main/images/c1.jpg" class="card-img-top" alt="call center">
            <div class="card-body">
              <h5 class="card-title">Best Customer Service</h5>
              <p class="card-text">We put our experience and relationships to good use and are available to solve your
                bus travel issues.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card">
            <img src="assets-main/images/c2.jpg" class="card-img-top" alt="Ticket">
            <div class="card-body">
              <h5 class="card-title">Same Price As Counter</h5>
              <p class="card-text">It's the same price as the tickets counter.We always give you the lowest price with
                the best partner offers.</p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card">
            <img src="assets-main/images/c3.jpg" class="card-img-top" alt="Discount">
            <div class="card-body">
              <h5 class="card-title">Best Offers</h5>
              <p class="card-text">We take care of your travel beyond ticketing by providing you with innovative and
                unique benefits.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="procedure">
    <div class="container">
      <div class="header1">
        <h2 class="hoToBook" style="font-family: Open Sans;font-weight: bold;">How To Book A Bus Online</h2>
      </div>
      <div class="bookingInstruction">
        <ol class="Instruction">
          <li>Enter the Source and Destination locations in the “From” and “To” tab respectively.</li>
          <li>Enter the “Date of Journey” and hit the “Search” button to check available bus tickets online.</li>
          <li>Select a bus of your choice from the list of buses that are displayed.</li>
          <li>Select a seat, boarding, and dropping points and hit “Proceed to Book” for final bus booking.</li>
          <li>Fill in the “Passenger Information” and “Contact Information”.</li>
          <li>You can even choose to insure your bus booking so that you will be covered in case of an accident or loss
            of luggage and then click “Proceed to Pay”.</li>
          <li>Enter the offer code (if applicable), select your mode of payment and complete the payment procedure for
            bus tickets online.</li>
          <li>Once this is done, you will receive an M-ticket on your mobile and an e-ticket on the email ID that was
            entered under “Contact Information.”</li>
        </ol>
      </div>
    </div>
  </div>

  <div class="article container">
    <h2 class="articleHeader1" style="text-align: center; font-family: Open Sans; font-weight: bold;">
      What's New
    </h2>
    <h3 class="articleHeader2">Book A Premium Bus Ticket</h3>
    <p class="articleContent1">
      Bus.lk has also launched <span class="specialContent"><a href="#" style="text-decoration: none;"> Premium </a>
      </span> bus services where passengers can enjoy travelling in high-rated buses with best-in-class services. While
      looking for bus tickets on a desired route, customers can check <span class="specialContent"><a href="#"
          style="text-decoration: none;"> Primium</a> </span>tag in order to choose this wonderful service. From hygiene
      standards to on-time service and comfort, there are many benefits of bus booking that passengers can get from
      Primo buses.
    </p>
    <h3 class="articleHeader3">Rent Cabs, Tempo Travellers & Buses</h3>
    <p class="articleContent2">
      Looking to book an outstation cab, hourly rental service for traveling within the city, or airport transfers? rYde
      is your one-stop solution! Bus.lk has introduced <a href="#" style="text-decoration: none;"> DropME </a> for
      travelers who are looking for intra and intercity cabs with professional drivers and great prices. <a href="#"
        style="text-decoration: none;"> DropME </a> also offers 24/7 customer support, safe and hygienic vehicles, GPS
      tracking , and travel safety kit. Passengers can choose from SUVs, Sedans, Hatchbacks, temp travellers, mini
      buses, and large buses.
    </p>
  </div>

  <div class="cancellation container">
    <h2 class="c_Header" style="text-align: center; font-family: Open Sans; font-weight: bold;">Free Cancellation and
      Rescheduling of Bus Tickets</h2>
    <p class="c_Content1">
      One of the benefits of online bus booking on Bus.lk is that cancellation and rescheduling of bus tickets is
      extremely convenient. Bus.lk offers 100% refund on cancellation if it is attributable to either Bus.lk or the bus
      operator. Cancellation of bus tickets can be done either thr ough the user’s login on the redBus’s website or
      mobile app, or by calling on the customer care number.</p> </br>


    <p class="c_Content2"> Any cancellation is subject to such cancellation charges as mentioned on the ticket. If
      instead of cancellation, one wants to postpone their journey, Bus.lk also offers an option to reschedule bus
      booking to a future date by simply paying the difference price, if applicable.
    </p>
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer" style="margin-top: 80px;">
    <div class="footer-top" style='padding-top: 60px;'>
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
  <!-- End of .container -->

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
    crossorigin="anonymous"></script>


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