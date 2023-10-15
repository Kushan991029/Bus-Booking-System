<?php

session_start();

include '../PHP/message_read.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bus.lk</title>
    <!-- Custom CsS -->
    <link rel="stylesheet" href="../CSS/style.css">
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">

    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/demo/style.css">
</head>

<body>
    <script src="../assets/js/preloader.js"></script>
    <div class="body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        <aside class="mdc-drawer mdc-drawer--dismissible mdc-drawer--open">
            <div class="mdc-drawer__header">
                <a href="../../index.html" class="brand-logo">
                <h1 style='color:white;'>Bus.lk</h1>
                </a>
            </div>
            <div class="mdc-drawer__content">
                <div class="mdc-list-group">
                    <nav class="mdc-list mdc-drawer-menu">
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="admin_passenger.php">
                                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                                    aria-hidden="true">grid_on</i>
                                Passengers
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="admin_owner.php">
                                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                                    aria-hidden="true">pages</i>
                                Owners
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="admin_shedules.php">
                                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                                    aria-hidden="true">home</i>
                                Shedules
                            </a>
                        </div>
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="admin_route.php">
                                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                                    aria-hidden="true">pages</i>
                                    Routes
                            </a>
                        </div>

                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="admin_bus.php">
                                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                                    aria-hidden="true">pages</i>
                                    Buses
                            </a>
                        </div>
                        
                        <div class="mdc-list-item mdc-drawer-item">
                            <a class="mdc-drawer-link" href="feedback.php">
                                <i class="material-icons mdc-list-item__start-detail mdc-drawer-item-icon"
                                    aria-hidden="true">pages</i>
                                Feedback
                            </a>
                        </div>
                    </nav>
                </div>

            </div>
        </aside>

        <!-- partial -->
        <div class="main-wrapper mdc-drawer-app-content">
            <!-- partial:../../partials/_navbar.html -->
            <header class="mdc-top-app-bar">
                <div class="mdc-top-app-bar__row">
                    <div class="mdc-top-app-bar__section mdc-top-app-bar__section--align-start">
                        <button
                            class="material-icons mdc-top-app-bar__navigation-icon mdc-icon-button sidebar-toggler">menu</button>
                        <span class="mdc-top-app-bar__title">Online Tickets Reservation</span>
                        <div
                            class="mdc-text-field mdc-text-field--outlined mdc-text-field--with-leading-icon search-text-field d-none d-md-flex">
                            <i class="material-icons mdc-text-field__icon">search</i>
                            <input class="mdc-text-field__input" id="text-field-hero-input">
                            <div class="mdc-notched-outline">
                                <div class="mdc-notched-outline__leading"></div>
                                <div class="mdc-notched-outline__notch">
                                    <label for="text-field-hero-input" class="mdc-floating-label">Search..</label>
                                </div>
                                <div class="mdc-notched-outline__trailing"></div>
                            </div>
                        </div>
                    </div>
                    <div
                        class="mdc-top-app-bar__section mdc-top-app-bar__section--align-end mdc-top-app-bar__section-right">
                        <div class="menu-button-container menu-profile d-none d-md-block">
                            <button class="mdc-button mdc-menu-button">
                                <span class="d-flex align-items-center">
                                    <span class="figure">
                                        <img src="../assets/images/faces/face1.jpg" alt="user" class="user">
                                    </span>
                                    <span class="user-name">Admin</span>
                                </span>
                            </button>
                            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon-only">
                                            <i class="mdi mdi-account-edit-outline text-primary"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Edit profile</h6>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon-only">
                                            <i class="mdi mdi-settings-outline text-primary"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <a href="../PHP/logout.php" style="color: black;"><h6 class="item-subject font-weight-normal">Logout</h6></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="divider d-none d-md-block"></div>
                        <div class="menu-button-container d-none d-md-block">
                            <button class="mdc-button mdc-menu-button">
                                <i class="mdi mdi-settings"></i>
                            </button>
                            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon-only">
                                            <i class="mdi mdi-alert-circle-outline text-primary"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Settings</h6>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon-only">
                                            <i class="mdi mdi-progress-download text-primary"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Update</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="menu-button-container">
                            <button class="mdc-button mdc-menu-button">
                                <i class="mdi mdi-bell"></i>
                            </button>
                            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                                <h6 class="title"> <i class="mdi mdi-bell-outline mr-2 tx-16"></i> Notifications</h6>
                                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon">
                                            <i class="mdi mdi-email-outline"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">You received a new message</h6>
                                            <small class="text-muted"> 6 min ago </small>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon">
                                            <i class="mdi mdi-account-outline"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">New user registered</h6>
                                            <small class="text-muted"> 15 min ago </small>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon">
                                            <i class="mdi mdi-alert-circle-outline"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">System Alert</h6>
                                            <small class="text-muted"> 2 days ago </small>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon">
                                            <i class="mdi mdi-update"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">You have a new update</h6>
                                            <small class="text-muted"> 3 days ago </small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="menu-button-container">
                            <button class="mdc-button mdc-menu-button">
                                <i class="mdi mdi-email"></i>
                                <span class="count-indicator">
                                    <span class="count">3</span>
                                </span>
                            </button>
                            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                                <h6 class="title"><i class="mdi mdi-email-outline mr-2 tx-16"></i> Messages</h6>
                                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail">
                                            <img src="../assets/images/faces/face4.jpg" alt="user">
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Mark send you a message</h6>
                                            <small class="text-muted"> 1 Minutes ago </small>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail">
                                            <img src="../assets/images/faces/face2.jpg" alt="user">
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Cregh send you a message</h6>
                                            <small class="text-muted"> 15 Minutes ago </small>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail">
                                            <img src="../assets/images/faces/face3.jpg" alt="user">
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Profile picture updated</h6>
                                            <small class="text-muted"> 18 Minutes ago </small>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="menu-button-container d-none d-md-block">
                            <button class="mdc-button mdc-menu-button">
                                <i class="mdi mdi-arrow-down-bold-box"></i>
                            </button>
                            <div class="mdc-menu mdc-menu-surface" tabindex="-1">
                                <ul class="mdc-list" role="menu" aria-hidden="true" aria-orientation="vertical">
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon-only">
                                            <i class="mdi mdi-lock-outline text-primary"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Lock screen</h6>
                                        </div>
                                    </li>
                                    <li class="mdc-list-item" role="menuitem">
                                        <div class="item-thumbnail item-thumbnail-icon-only">
                                            <i class="mdi mdi-logout-variant text-primary"></i>
                                        </div>
                                        <div
                                            class="item-content d-flex align-items-start flex-column justify-content-center">
                                            <h6 class="item-subject font-weight-normal">Logout</h6>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- partial -->
            <div class="page-wrapper mdc-toolbar-fixed-adjust pad">
                <h2 class="dash-margin">Admin's Dashboard</h2>
                <div class="card">
                    <div class="card-header card-head" style="background-color: #004F92; color: white;">
                        <h3 class="card-title">All The Routes's Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <?php if (mysqli_num_rows($result)) { ?>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                <tr>
                                    <th style="font-size: 15px; text-align: left;font-weight: bold;color: black;">#</th>
                                    <th style="font-size: 15px; text-align: left;font-weight: bold;color: black;">Name
                                    </th>
                                    <th style="font-size: 15px; text-align: left;font-weight: bold;color: black;">Email
                                    </th>
                                    <th style="font-size: 15px; text-align: left;font-weight: bold;color: black;">Subject
                                    </th>
                                    <th style="font-size: 15px; text-align: left;font-weight: bold;color: black;">Date
                                    </th>
                                    <th style="font-size: 15px; text-align: left;font-weight: bold;color: black;">Message
                                    </th>
                                </tr>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $id = 1;
			  	                    while($rows = mysqli_fetch_assoc($result)){
                                        
			  	                ?>
                                <tr>
                                    <td style="text-align: left;color: black;">
                                        <?php echo $id;?>
                                    </td>
                                    <td style="text-align: left;color: black;">
                                        <?=$rows['name']?>
                                    </td>
                                    <td style="text-align: left;color: black;">
                                        <?=$rows['email']?>
                                    </td>
                                    <td style="text-align: left;color: black;">
                                        <?=$rows['subject']?>
                                    </td>
                                    <td style="text-align: left;color: black;">
                                        <?=$rows['da_date']?>
                                    </td>
                                    <td style="text-align: left;color: black;">
                                        <?=$rows['data']?>
                                    </td>
                                </tr>

                                <!-- Modal Update -->

                                <?php $id++; }  ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                    <!-- /.card-body -->
                </div>

                <!-- Modal Add -->
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog m-width">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="m-header">Add New Route</h5>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <form action="../PHP/shedule_create.php" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="s_route_no">Route Number</label>
                                        <input type="text" name='s_route_no' id="route_num"
                                            class="form-control" placeholder="Enter Route Number"
                                             required>
                                    </div>
                                    <div class="form-group">
                                        <label for="s_bus_no">Bus Number</label>
                                        <input type="text" name='s_bus_no' id="route_num"
                                            class="form-control" placeholder="Enter Bus Number"
                                             required>
                                    </div>
                                    <div class="form-group">
                                        <label for="sa_trip_no">Trip Number</label>
                                        <input type="text" name='s_trip_no' id="route_num"
                                            class="form-control" placeholder="Enter Trip Number"
                                             required>
                                    </div>
                                    <div class="form-group">
                                        <label for="s_direct">Direction</label>
                                        <select name="s_direct" id="from_city"
                                            class="form-control custom-select">
                                            <option selected>
                                                Front
                                            </option>
                                            <option>Front</option>
                                            <option>Back</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="s_from_city">From</label>
                                        <select name="s_from_city" id="from_city"
                                            class="form-control custom-select">
                                            <option selected>
                                                Select A City
                                            </option>
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
                                    <div class="form-group">
                                        <label for="s_to_city">To</label>
                                        <select name="s_to_city" id="to_city"
                                            class="form-control custom-select">
                                            <option selected>
                                                Select A City
                                            </option>
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
                                    <div class="form-group">
                                        <label for="s_dep_time">Time(Depature)</label>
                                        <input type="time" name='s_dep_time' id="route_num"
                                            class="form-control" placeholder="Depature Time"
                                             required>
                                    </div>
                                    <div class="form-group">
                                        <label for="s_arr_time">Time(Arrival)</label>
                                        <input type="time" name='s_arr_time' id="route_num"
                                            class="form-control" placeholder="Arrival Time"
                                             required>
                                    </div>
                                </div>
                                <div class="m-footer">
                                    <button type="submit" name="add_shedule"
                                        class="btn btn-primary">Add Shedule</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="../assets/js/material.js"></script>
    <script src="../assets/js/misc.js"></script>

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        });
    </script>

</body>

</html>