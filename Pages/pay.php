
<?php 

include '../PHP/search_data.php';
include '../PHP/connection.php';


$b_no = $_SESSION['search_rows']['bus_no'];
$t_no = $_SESSION['search_rows']['trip_no'];
$f_city = $_SESSION['f_city'];
$t_city = $_SESSION['t_city'];

$sql_begin = "SELECT time,place FROM stop WHERE bus_no='$b_no' AND trip_no='$t_no' AND city='$f_city'";
$sql_stop = "SELECT time,place FROM stop WHERE bus_no='$b_no' AND trip_no='$t_no' AND city='$t_city'";

$result_begin = mysqli_query($conn, $sql_begin);
$result_stop = mysqli_query($conn, $sql_stop);

$rows_begin = mysqli_fetch_assoc($result_begin);
$rows_stop = mysqli_fetch_assoc($result_stop);

$_SESSION['dep_time'] = $rows_begin['time'];

?>

<!DOCTYPE html>

<html>

<head>

    <title>Payments: BusSeat.lk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta name="HandheldFriendly" content="true" />

    <link rel="icon" type="image/png" href="/static/favicon.png" />

    <link rel="stylesheet" href="../assets-payment/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets-payment/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../assets-payment/css/style.css" />


    <style>

        .panel.with-nav-tabs .panel-heading {
            padding: 5px 5px 0 5px;
        }

        .panel.with-nav-tabs .nav-tabs {
            border-bottom: none;
        }

        .panel.with-nav-tabs .nav-justified {
            margin-bottom: -1px;
        }

        /********************************************************************/
        /*** PANEL DEFAULT ***/
        .with-nav-tabs.panel-default .nav-tabs > li > a,
        .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
            color: #777;
        }

        .with-nav-tabs.panel-default .nav-tabs > .open > a,
        .with-nav-tabs.panel-default .nav-tabs > .open > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > .open > a:focus,
        .with-nav-tabs.panel-default .nav-tabs > li > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li > a:focus {
            color: #777;
            background-color: #ddd;
            border-color: transparent;
        }

        .with-nav-tabs.panel-default .nav-tabs > li.active > a,
        .with-nav-tabs.panel-default .nav-tabs > li.active > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li.active > a:focus {
            color: #555;
            background-color: #fff;
            border-color: #ddd;
            border-bottom-color: transparent;
        }

        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu {
            background-color: #f5f5f5;
            border-color: #ddd;
        }

        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a {
            color: #777;
        }

        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > li > a:focus {
            background-color: #ddd;
        }

        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a,
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:hover,
        .with-nav-tabs.panel-default .nav-tabs > li.dropdown .dropdown-menu > .active > a:focus {
            color: #fff;
            background-color: #555;
        }

        /********************************************************************/
    </style>

    <script src="../assets-payment/static/jquery.min.js"></script>
    <script src="../assets-payment/static/jquery.serializejson.js"></script>
    <script src="../assets-payment/static/bootstrap.min.js"></script>


</head>

<body>


<div id="banner" role="alert"></div>

<div class="container">
    <div class="top-center text-center"></div>
    <div class="gap gap-small"></div>

    <div class="row">
        <div class="col-md-4 col-md-offset-1 col-md-push-6 col-xs-12">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-body">
                    <h3><strong><?php echo $_SESSION['f_city']." - ".$_SESSION['t_city']." on "."<br>".$_SESSION['date_value'] ?></strong></h3>
                    <h3><?php echo $_SESSION['search_rows']['bus_name'] ?></h3>
                    <hr class="mb10 mt10" />
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <p class="mb5">Boarding</p>
                        </div>
                        <div class="col-md-8 col-xs-6">
                            <p class="mb5"><?php echo $rows_begin['place']."<br>"."(".$rows_begin['time'].")"; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <p class="mb5">Destination</p>
                        </div>
                        <div class="col-md-8 col-xs-6">
                            <p class="mb5"><?php echo $rows_stop['place']."<br>"."(".$rows_stop['time'].")"; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <p class="mb5">Seats</p>
                        </div>
                        <div class="col-md-8 col-xs-6">
                            <p class="mb5"><?php echo $_SESSION['s_no'] ?></p>
                        </div>
                    </div>
                    <hr class="mb10 mt10" />
                    <p><?php echo $_SESSION['p_name'] ?></p>
                    <hr class="mb10 mt10" />
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <p class="mb5">Ticket fee</p>
                        </div>
                        <div class="col-md-8 col-xs-6">
                            <p class="text-right mb5">LKR <?php echo $_SESSION['total'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <p class="mb5">Service fee</p>
                        </div>
                        <div class="col-md-8 col-xs-6">
                            <p id="service-fee" class="text-right mb5">LKR 100</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <p class="mb5">Discounts</p>
                        </div>
                        <div class="col-md-8 col-xs-6">
                            <p id="" class="text-right mb5">LKR 10</p>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-md-4 col-xs-6">
                            <p>Total</p>
                        </div>
                        <div class="col-md-8 col-xs-6">
                            <p class="text-right text"><strong id="">LKR <?php $x = intval($_SESSION['total'] + 90) ; echo $x;?></strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-md-pull-4 col-xs-12">
            <h1><strong>Confirm and pay</strong></h1>
            <div class="row">
                <div class="col-md-10">
                    <ul class="list-inline">
                        <li><img class="img-responsive center-block" alt="Visa Card" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAQKSURBVGhD7ZhbaBRXGMfz5osv2nijCoWKhpJIC30RIvRBitAWwRYLLVrB3bRpqzVqqCn0EnuRVI0ptLHWEhCxpcYkppcUxHR2m4s1F3OPDbmYkJgmm6vZxDTZNF/nf/abydmcY/voUeYHf9j5zn/O/HfmO2dg4jw8PDw8PB4qlu0Jrov3BS6t8FsTK/wBMkPWRLzfKnwkxUrgmHoQ3jaP6CcxQD5rdLnPWstxVaJ3XnOiQYr3B/I5ror9B8K6k4ySz7rDcVW0JxgojquiM5sojquiM5sojquiM5sojquiM5sojquiM5sojqviGBL2FdPRnFS6UbiJmi4nUX1hIuV+/QqtSvnNnWTtm79TeHqOwExknhIOVlBJ3ZA4BtuO3RC+9e+UU05JDzX2hGl0MkLjUxGq656gI9+1u3NB8MtsSr8WMy6L46osNiann6NQ5XNEwSVCr2ZmuWOv5TbzpYiKqkKi1tY/xRWix/eX02Nvl8XUZHKv9LpzQZerQzwSZfdXzTHjsjiuis6ceamTqP9bmg8upS9y97r1guuDfCmiHScbaM3rQZqdmxfHA+MzwpN2rk0cg7I/x+j5rDp6JrOGPrzYQS/nNLpzJR6uFE9R5sTP3e74YnFcFZ156ye10RmHi6mz9FlRW2e3z+Tf0fa5FbpLK1MCtPn9KnEMEBa+jwu6uEJ05mpfzLyyTtphwejkLPUOT4vfpc0jWi/EcVV05tX2nR2z+xaEO7JFbc/phfZBSNR2fdnEFaI867ao4Y7LXG8fp+3H6925oUdTgzQ0MSvGz5b2UXFNtJWG7Zrsk8VxVXRm6FdncUbGaHPGFdHzAC3zxKFK4RGtxmR8v7BAPyvqosg/se2R/UuPO/5W3k2uknja8jxPvatfyBxXRWeGEMjB/00LTXH7/FQbXbzQhfK/RA28dKoh5vzkD6pidiiAtYAx7EigtW9SHL+Y3SCOAZ60PI8jjquiM0NbPqrmKYmae8P8i2intBDRHg5P3uPO/cjtAdBy8tbZNXhXtM/VphGuEJ2SnpQsjquiM0NYpE6fOvQMTdvvhQUP9niAdwOOEQ4LF3fxhc/r6I2zrdQdii5QePF+cFrxXlgto+78sjiuis7sqLBqYdsEn9q97YxtTKvgKomWQA3jOvAiw0KWt048vUPn21zVdN4RdexKzjVkcVwVndnRYXtiByzKpPTo4oXk3Sb/2oCo+c60iCC42wiK1sN2ueFAhRh3tk6Al6IzFyT/+aff+yNmDOK4KouNporjqujMJorjqujMJorjqujMJorjqujMJorjqjzwn1Xw+U57klGyfuC4Kvj2iM93+hNNkDXyn58Wgfi46w/k41HpJ7kP8gXGbV383/AeHh4eHh4PFnFx/wJ2DzNva3W7VQAAAABJRU5ErkJggg==" />
                        </li>
                        <li><img class="img-responsive center-block" alt="Master Card" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAMASURBVGhD7ZjPTxNBFMdLiFHjAW/+qlG4qDH+Cd1t7aYHSkK3GPXuxYsHY6TQFqgHj3g1khg9CYpRKIsxtJj4J5gYLnqhoSQeJIoiBxPHedu32M48BndqdDH7TT6hYd8rn9KZ3ZmJhAkTJkyYMP9VYv0vjxu289S059c5LCCsm5n5Z2a2fBo16YC8mXE+Em8QFNZM+0UUdeXgf55qDAxGxplGXTn84heqKVg4n1FXDt0QPFBXDlUsYmVmWSk9xBYtg9XiUbYZ2+dSjx9hC1bCvXbeLrf2XOA9uTxbnEiy2vMetlntcoHX1QnLvQY1zT0qUFcOVdzMaO+wK8piESWr5iGWT482egYLrF4+wdjrvUpWZk+ykcGi9DcpUFcOVQwk7Dk2lcqSsioqxSQpq2LqzkWWyM6RHh6oK4cqBnTk31w9Rwr+DpPjl0gPD9SVQxXDsKEEfXF/DymqonCzMQQpUFeOWAgTth4/TEv5we5g7BUtuh0wb5ID9MRGXTli4a3eHC2kYKn/FCmkwxi/AYhOAOrKEQurlklKqng7dJaU0WHhXqrFxwN15YiFtfgxUlILGEaEpIraTHeLjwfqyhELN4z9tIwOFoeQVLFROdji44G6csRCnQ/wzekiZXRo+wPoDKHVB1FSRgdYaohOAOrKEQsrVpyU1OJaJympou1JDAszUkaHu/4fZrCOEp0A1JUjFjYeZDsv3pr5bnSyDw+PkkJ+gMVd2w8yYCRdIEVVvOvrIaX8kL9Rklw8UFcOVQzoLOa2GPU/9h+NXyY9PFBXDlUMwHJ6MjVAC27Dj1gHW7pyhhRUAfJ/fDntUUgX2YrJxzch3AxsaK733W708FUljGdKthmoGVYMm2ZQVw5VLAITe4wvsWH7uIxbyq/GAfY+0e3ednPpkvuNtfTw7SIszOC2uDzza0sJr+F3cO2vbCmDAurK2f3HKnB8RzYFiseoKwfOHnnBmtAQHNxjT8XRIsQ93M040/BVkW/yD+A+n/jPJzvKhwkTJkyYMLsrkchP9fiVnbIpEC8AAAAASUVORK5CYII=" />
                        </li>
                        <li><img class="img-responsive center-block" alt="Amex Card" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAMDSURBVGhD7ZjPS1RRFMf9MxzNFhFYtLEgqEW0bNEyWrRqFS2CFtEbE6OfhkW4iFwkFBgKZf6AIMJwIYVg0i/e03GcNM2c1GwcdRxHHcc53XM87zEz91hBC6/xPvDlvbnve+77nnffm8Ut8vHx8fHx+a8oudBfFgg6bYGgnVBHMEN2ojhodwSqnD0cUwbDK+OsPMnWq9iy46VBewfH1VEm9eTlYmNkOa0cVydg2YtikVGyFziujlxgnjiujmQ2URxXRzKbKI6rI5lNFMfVkcwmiuPqSGYTxXF1JLOJ4rg6khl1tC4C2SwQj3pi3njHp7mNQcXJhlFvfPflAYgvZfgKeOOozcisZ+F041fylFY60P5xY+6GNz/z6lEcV6fQ6Kq5b5YamJpPQ3J1HcqvhmjcbUDdG7ojCc9f/fw7jbtNu+MoZCy2CvXdM3mKJdcglV6H4/Uj0NgbIx82UaKaya1HcVydQiNq3/VBWFYTv/68CBfbojTxjReTdM1toDO0QGFxpfDpYcCFVAbejibpeu58SN9YEo7dG/a0/1aYgmMDeC/klZpzZ1V/Xq0rjqsjmWs7p2nC8y0TUFETpmDRuTSUXer3Gjjx4AsdcaXONI3TOT7VrnCCznPnk7ivvHjtce8s/V5TS3qwNpxXlyuOq1NoxJAYVuJs87jXQPmVEPSMJOnpDU4uQzqThYqbg5s2gN5Dt4c87b0WgnNPvtEqTifWyPNhfAl2VQ/k1briuDqFRgyJPH0XB6s9SqrsiFJQJ5rKa+DUwzE6R3AlsH6zBoZnVqDm5ZSnuq4f1PREPA0H1OuEK4Lgq/lP38B79RRyP1pXGBBxVwcbwBtFplfogz5yN0K+v32FEPyID98ZIg/O5f4Lua9XrjiuTqHRVHFcHclsojiujmQ2URxXRzKbKI6rI5lNFMfVkcwmiuPqSGYTxXF1JLOJ4rg6235bhbbvxCKDZNktHFcH9x5x+04sNEC47fnbrUWENnctpxWXSppkS2Q58+r47I/hfXx8fHx8thdFRb8AnJBuSi0VWzUAAAAASUVORK5CYII=" />
                        </li>
                        <li><img class="img-responsive center-block" alt="eZ Cash Dialog Etisalat Hutch Airtel" src="data:image/png;base64,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" />
                        </li>
                    </ul>


                    <div class="panel with-nav-tabs panel-default">
                        <!-- Default panel contents -->
                        <div class="panel-heading">
                            <ul id="payment-methods" class="nav nav-tabs nav-justified">
                                <li role="presentation">
                                    <a href="#" data-processing="0.00" data-discount="0.00" id="CARD"><h4><strong>Genie/Card</strong></h4></a>
                                </li>
                                <li role="presentation">
                                    <a href="#" data-processing="0.00" data-discount="0.00" id="EZ_CASH"><h4><strong>eZ Cash</strong></h4></a>
                                </li>
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p>The payment details need to be completed within <strong>8 minutes</strong>, else the seats
                                will not be booked. For any help, call us on 076 676 4848</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>

            <div>
                <h4><strong>Cancellation Policy</strong></h4>
                <p>Service fees are refunded when cancellation happens due to bus breakdowns.</p>


                <p>I agree to the <a href="/terms-and-conditions">Terms and Conditions</a>. I also agree to pay the total amount shown, which includes Service Fees.</p>
                <div class="row">
                    <div class="col-md-2 col-xs-12">
                        <input type="button" class="btn btn-default btn-lg" value="Back" onclick="history.go(-1);" />
                    </div>
                    <div class="hidden-lg gap gap-small"></div>
                    <div class="col-md-10 col-xs-12">
                        <form action="../PHP/booking_saving.php" method="post">
                            <button type="submit" class="proceed-btn btn btn-primary btn-lg">
                                <strong>Confirm and pay</strong>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>

    /*<![CDATA[*/
    var trxId = '20220721.143649.845.001';
    var ticketFee = '3000.00';
    var reservationFee = '100.00';

    /*]]>*/

    var trxMethod;

    $(document).ready(function () {
        var paymentMethods = $('#payment-methods a');

        var $firstPaymentMethod = $(paymentMethods[0]);

        trxMethod = $firstPaymentMethod.attr("id");

        $firstPaymentMethod.addClass("active");
        $firstPaymentMethod.tab("show");

        var processingFeeAmount = $firstPaymentMethod.data("processing");
        var discountFeeAmount = $firstPaymentMethod.data("discount");

        var $serviceFee = $("#service-fee");
        var serviceFeeAmount = parseFloat(reservationFee) + parseFloat(processingFeeAmount);

        $("#discount-fee").text("LKR " + discountFeeAmount);
        $("#service-fee").text("LKR " + serviceFeeAmount.toFixed(2));

        var totalFee = parseFloat(ticketFee) + serviceFeeAmount - parseFloat(discountFeeAmount);
        console.log("totalFee " + totalFee);
        var $total = $("#total-fee");
        $total.text("LKR " + totalFee.toFixed(2));

        paymentMethods.click(function (e) {
            e.preventDefault();
            $(this).tab("show");
            trxMethod = $(this).attr("id");

            console.log("trxMethod " + trxMethod);

            var processingFeeAmount = $(this).data("processing");
            console.log("processingFee " + processingFeeAmount);
            var discountFeeAmount = $(this).data("discount");
            console.log("discountFee " + discountFeeAmount);

            var $serviceFeeText = $("#service-fee");
            var serviceFeeAmount = parseFloat(reservationFee) + parseFloat(processingFeeAmount);
            $serviceFeeText.text("LKR " + serviceFeeAmount.toFixed(2));

            $("#discount-fee").text("LKR " + discountFeeAmount);

            var totalFee = parseFloat(ticketFee) + serviceFeeAmount - parseFloat(discountFeeAmount);
            console.log("totalFee " + totalFee);
            var $total = $("#total-fee");
            $total.text("LKR " + totalFee.toFixed(2));
        });

        $('#payment-method').submit(function (event) {
            event.preventDefault();

            $(".proceed-btn").attr("disabled", true);

            var $banner = $("#banner");
            $banner.text('Your booking request is in progress, Please wait until the page redirects.');
            $banner.addClass("alert alert-info text-center");

            $.ajax({
                url: "/api/v1/booking/" + trxId + "/update/" + trxMethod,
                type: "GET",
                success: function (response) {
                    console.log("submit result " + JSON.stringify(response));
                    if (response.code == "S-1000") {
                        var result = response.result;
                        if (result.status == "BOOKING_PAYMENT_PENDING") {
                            var cmd = result["result-cmd"];
                            $.redirect(cmd.url, cmd.data, cmd.method);
                        } else {
                            var baseUrl = window.location.protocol + "//" + window.location.host;
                            $.redirect(baseUrl + "/booking/" + trxId + "/result", [], "GET");
                        }
                    } else {
                        console.log("Unexpected error " + JSON.stringify(response));
                        $('.top-center').notify({
                            message: {text: 'Unexpected error occurred, Please contact support!'},
                            type: "warning",
                            fadeOut: {delay: 5000}
                        }).show();
                    }
                },
                error: function (response) {
                    console.log("network error" + JSON.stringify(response));
                    $('.top-center').notify({
                        message: {text: 'Network error, Please check your connection and try again!'},
                        type: "danger",
                        fadeOut: {delay: 5000}
                    }).show();
                }
            });
        });

    });

</script>

<div class="gap gap-small"></div>
</body>

</html>