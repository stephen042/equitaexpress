<?php
include 'db.php';
?>
<?php

if (isset($_GET['tracker']) && $_GET['tracker'] != '') {

    $tracker_num = htmlspecialchars($_GET['tracker'], ENT_QUOTES, 'UTF-8');


    $sql = "SELECT * FROM tracking_details WHERE tracking_number ='$tracker_num' LIMIT 1";

    $result = mysqli_query($con, $sql);

    $tracker = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {

        $sql_update = "SELECT * FROM tracking_update WHERE tracking_number ='$tracker_num' ORDER BY id DESC";
        $result_update = mysqli_query($con, $sql_update);
        $tracker_update = mysqli_fetch_assoc($result_update);

        $tracker_number = $tracker['tracking_number'];

        $sender_name = $tracker['sender_name'];

        $email = $tracker['email'];

        $receiver_name = $tracker['receiver_name'];

        $receiver_number = $tracker['receiver_number'];

        $parcel_name = $tracker['parcel_name'];

        $tracker_origin = $tracker['origin'];
        $tracker_destination = $tracker['destination'];
        // $tracker_pieces = $tracker['pieces'];
        $tracker_cubic = $tracker['cubic'];
        $tracker_weight = $tracker['weight'];
        // $tracker_transport = $tracker['transport_mode'];
        $tracker_delivery_date = $tracker['estimated_delivery'];
        $tracker_required_by = $tracker['delivery_required_by'];

        $tracker_update_time = $tracker_update['created_at'];
        $tracker_status = $tracker_update['status'];

        $color1 = "";
        if ($tracker_status == "Pending") {
            $color1 = "blue";
            $ustatus = "Pending";
        }
        if ($tracker_status == "Picked up") {
            $color1 = "grey";
            $ustatus = "Picked up";
        }

        if ($tracker_status == "Out for delivery") {
            $color1 = "lime";
            $ustatus = "Out for delivery";
        }
        if ($tracker_status == "In Transit") {
            $color1 = "purple";
            $ustatus = "In Transit";
        }
        if ($tracker_status == "Enroute") {
            $color1 = "teal";
            $ustatus = "Enroute";
        }

        if ($tracker_status == "Cancelled") {
            $color1 = "lightblue";
            $ustatus = "Cancelled";
        }

        if ($tracker_status == "Delivered") {
            $color1 = "pink";
            $ustatus = "Delivered";
        }

        if ($tracker_status == "Returned") {
            $color1 = "red";
            $ustatus = "Returned";
        }

        // if($tracker_status == "DELIVERED"){
        //     $color1 = "green";
        //     $ustatus = "DELIVERED";
        // }



    } else {
        echo "<script> alert('Tracker information invalid!') 
    window.location.href='index.html';
    </script>";
    }
} else {
    echo "<script>
     alert('Tracker information invalid!');
     window.location.href='index.html';
      </script>";
}

?>

<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from demo.zytheme.com/equita/service-air-freight.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Jul 2022 12:44:07 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Ayman Fikry" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <title>Tracking details - Equita Express Logistics </title>
    <link href="assets/images/favicon/favicon.png" rel="icon" />

    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&amp;family=Rubik:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet" />

    <link href="assets/css/vendor.min.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- Jivo Chat -->
    <script src="//code.jivosite.com/widget/BCeiE9ZK8H" async></script>
</head>

<body>
    <!-- <div class="preloader">
        <div class="loader-spinner">
            <div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
 -->
    <div class="wrapper clearfix" id="wrapperParallax">

        <header class="header header-1 header-transparent" id="navbar-spy">
            <nav class="navbar navbar-expand-lg  navbar-bordered navbar-sticky" id="primary-menu">
                <div class="container"><a class="navbar-brand" href="index-2.html"><img class="logo logo-light"
                            src="assets/images/logo/logo-light.png" alt="Equita Logo" /><img class="logo logo-dark"
                            src="assets/images/logo/logo-dark.png" alt="Equita Logo" /></a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                        aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item ">
                                <a href="index.html"><span>Home</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="about.html"><span>About</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="services.html"><span>Services</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="contact.html"><span>Contact</span></a>
                            </li>


                        </ul>
                        <div class="module-container">

                            <div class="module module-search float-left">
                                <div class="module-icon search-icon"><i class="icon-search"></i><span
                                        class="title">search</span></div>
                                <div class="module-content module-fullscreen module-search-box">
                                    <div class="pos-vertical-center">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
                                                    <form class="form-search">
                                                        <input class="form-control" type="text"
                                                            placeholder="type words then enter" />
                                                        <button></button>
                                                    </form>

                                                </div>

                                            </div>

                                        </div>

                                    </div><a class="module-cancel" href="javascript:void(0)"><i
                                            class="fas fa-times"></i></a>
                                </div>
                            </div>


                            <div class="module-contact">
                                <!-- <a class="btn btn--primary" href="#track">Track & Trace</a> -->
                                <a href="#track" class="btn btn--primary">Track & Trace</a>
                            </div>


                        </div>

                    </div>

                </div>

            </nav>
        </header>

        <section class="page-title page-title-3 bg-overlay bg-overlay-dark bg-parallax" id="page-title">
            <div class="bg-section"><img src="assets/images/page-titles/16.jpg" alt="Background" /></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-10 offset-lg-1">
                        <div class="title text-center">
                            <div class="title-heading">
                                <h1> Tracking Details </h1>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                    </div>

                </div>

            </div>

        </section>
















        <link rel="stylesheet" href="logistico.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="main.css">
        <div id="document" class="container-fluid document">

            <div class="row">

                <div class="col-12 order-md-1">
                    <div id="mainContent">
                        <div id="trackContent">
                            <div class="track-bar  d-none d-md-block">
                                <h1 class="tracker-title">Truck Tracker</h1>
                            </div>
                            <div class="container" id="document">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="contentbox tracker-header">
                                            <div class="row tracker-header-details">
                                                <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-12 tracker-header-reference">
                                                    <h2><i class="fas fa-star favourite-star  popover-trigger" aria-hidden="true"></i> <?php echo $tracker_number; ?> </h2>
                                                    <div class="subheader"><?php echo $tracker_origin; ?> to <?php echo $tracker_destination; ?></div>
                                                    <div id="favouritePopover"></div>
                                                </div>
                                                <div class="col-xl-2 col-lg-1 col-md-0 col-sm-0 col-0"></div>
                                                <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 tracker-header-status">
                                                    <table class="status-hero-table">
                                                        <tbody>
                                                            <tr>
                                                                <td class="status-hero">

                                                                    <div class="status-hero-header <?php echo $color1; ?>">

                                                                        <?php echo @$ustatus; ?></div>
                                                                    <div class="status-hero-text "><span><?php echo date("D d F, Y; g:i A", strtotime($tracker_update_time)); ?></span></div>
                                                                    <div class="status-hero-text "><span><?php echo $tracker_destination; ?> local time</span></div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row tracker-header-worm">
                                                <div class="col-lg-12">
                                                    <ul class="worm ">
                                                        <!--                             <li class="blue three ">
                                <span class="content" style="color: white;">Pending</span>
                            </li>
                            <li class="grey three ">Picked up</span></li>
                            <li class="red three " style="background-color: lime;">Out for delivery</span></li>
                            <li class="red three " style="background-color: purple;">In Transit</span></li>
                            <li class="red three " style="background-color: orange;">Enroute</span></li>
                            <li class="red three " style="background-color: teal;">Cancelled</span></li>
                            <li class="red three " style="background-color: pink;">Delivered</span></li>
                            <li class="red three " style="background-color: red;">Returned</span></li> -->
                                                        <!-- <li class="green three ">Delivered</span></li> -->
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="contentbox tracker-timeline">
                                            <ul class="timeline ">
                                                <?php
                                                $sql = "SELECT * FROM tracking_update WHERE tracking_number = '$tracker_num' ORDER BY id DESC LIMIT 1";
                                                $result = mysqli_query($con, $sql);
                                                while ($tracking = mysqli_fetch_array($result)) {
                                                    $display = "";
                                                    $color = "";
                                                    if ($tracking['status'] == "Pending") {
                                                        $display = "blue";
                                                        $color = "blue";
                                                    }
                                                    if ($tracking['status'] == "Picked up") {
                                                        $display = "grey";
                                                        $color = "grey";
                                                    }
                                                    if ($tracking['status'] == "Out for delivery") {
                                                        $display = "lime";
                                                        $color = "lime";
                                                    }

                                                    if ($tracking['status'] == "In Transit") {
                                                        $display = "purple";
                                                        $color = "purple";
                                                    }
                                                    if ($tracking['status'] == "Enroute") {
                                                        $display = "orange";
                                                        $color = "orange";
                                                    }
                                                    if ($tracking['status'] == "Cancelled") {
                                                        $display = "teal";
                                                        $color = "teal";
                                                    }

                                                    if ($tracking['status'] == "Delivered") {
                                                        $display = "green";
                                                        $color = "green";
                                                    }
                                                    if ($tracking['status'] == "Returned") {
                                                        $display = "red";
                                                        $color = "red";
                                                    }



                                                    // if($tracking['status'] == "DELIVERED"){
                                                    //     $display = "bg-green";
                                                    //     $color = "green big";
                                                    // }

                                                ?>

                                                    <li class="timeline-item <?php echo $color; ?>">
                                                        <section>
                                                            <div>
                                                                <h3 class="timeline-item-heading " style="color: white;  background-color: <?php echo $display; ?>;"><?php echo $tracking['message']; ?></h3>
                                                                <div class="timeline-item-details "><?php echo date("g:i A", strtotime($tracking['created_at'])); ?></div>
                                                                <div class="timeline-item-details "><?php echo date("D d F, Y", strtotime($tracking['created_at'])); ?></div>
                                                            </div>
                                                        </section>
                                                    </li>

                                                <?php } ?>
                                            </ul>
                                        </div>
                                        <div class="contentbox tracker-details">
                                            <div class="row">
                                                <div class="col-xl-12">
                                                    <table class="table table-striped details">
                                                        <thead>
                                                            <tr>
                                                                <th colspan="2" style="color: black;">Details</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>HBL Number</td>
                                                                <td><?php echo $tracker_number; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sender name</td>
                                                                <td><?php echo $sender_name; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Receiver name</td>
                                                                <td><?php echo $receiver_name; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Receiver number</td>
                                                                <td><?php echo $receiver_number; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Email</td>
                                                                <td><?php echo $email; ?></td>
                                                            </tr>

                                                            <tr>
                                                                <td>Parcel</td>
                                                                <td><?php echo $parcel_name; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Origin Port</td>
                                                                <td><?php echo $tracker_origin; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Destination Port</td>
                                                                <td><?php echo $tracker_destination; ?></td>
                                                            </tr>
                                                            <!-- <tr>
                            <td>Transport Mode</td>
                            <td><?php echo $tracker_transport; ?></td>
                        </tr> -->
                                                            <!-- <tr>
                            <td>Pieces</td>
                            <td><?php echo $tracker_pieces; ?></td>
                        </tr> -->
                                                            <tr>
                                                                <td>Weight</td>
                                                                <td><?php echo $tracker_weight; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Cubic</td>
                                                                <td><?php echo $tracker_cubic; ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Delivery Required By</td>
                                                                <td><?php echo date("D d F, Y; g:i A", strtotime($tracker_required_by)); ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Estimated Delivery Date</td>
                                                                <td><?php echo date("D d F, Y; g:i A", strtotime($tracker_delivery_date)); ?></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <br />
                                                <div class="col-xl-12">
                                                    <center> <a href="invoice.php?id=<?php echo $tracker_number;  ?>" class="btn btn-primary" style="color: #fff;">Print</a> </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>































        <footer class="footer footer-1">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-3 col-xl-4">
                            <div class="footer-logo"><img class="footer-logo" src="assets/images/logo/logo-light.png"
                                    alt="logo" /></div>
                        </div>
                        <div class="col-12 col-lg-9 col-xl-8">
                            <div class="widget-newsletter">
                                <div class="widget-content">
                                    <p>Sign up for industry alerts,<br />insights from Equita Express.</p>
                                    <form class="form-newsletter mailchimp">
                                        <input class="form-control" type="email" name="email"
                                            placeholder="Your Email Address" />
                                        <input class="btn btn--primary" type="submit" value="sign up!" />
                                        <div class="subscribe-alert"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-center">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 footer-widget widget-about">
                            <div class="footer-widget-title">
                                <h5>about</h5>
                            </div>
                            <div class="widget-content">
                                <p>Equita Express is a representative logistics operator providing full range of service in the
                                    sphere of customs cargo and transportation worldwide.</p>

                                <div class="module module-social"><a class="share-facebook" href="javascript:void(0)"><i
                                            class="fab fa-facebook-f"> </i></a><a class="share-instagram"
                                        href="javascript:void(0)"><i class="fab fa-instagram"></i></a><a
                                        class="share-twitter" href="javascript:void(0)"><i
                                            class="fab fa-twitter"></i></a></div>

                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-2 offset-lg-2 footer-widget widget-links">
                            <div class="footer-widget-title">
                                <h5>services</h5>
                            </div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="javascript:void(0)">warehouse</a></li>
                                    <li><a href="javascript:void(0)">air freight</a></li>
                                    <li><a href="javascript:void(0)">ocean freight</a></li>
                                    <li><a href="javascript:void(0)">road freight</a></li>
                                    <li><a href="javascript:void(0)">supply chain</a></li>
                                    <li><a href="javascript:void(0)">packaging</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-2 footer-widget widget-links">
                            <div class="footer-widget-title">
                                <h5>industries</h5>
                            </div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="javascript:void(0)">retail & consumer</a></li>
                                    <li><a href="javascript:void(0)">sciences & healthcare</a></li>
                                    <li><a href="javascript:void(0)">industrial & chemical</a></li>
                                    <li><a href="javascript:void(0)">power generation</a></li>
                                    <li><a href="javascript:void(0)">food & peverage</a></li>
                                    <li><a href="javascript:void(0)">oil & gas</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6 col-lg-3 footer-widget widget-contact">
                            <div class="footer-widget-title">
                                <h5>quick contact</h5>
                            </div>
                            <div class="widget-content">
                                <p>If you have any questions or need help, feel free to contact with our team.</p>
                                <ul>
                                    <li class="phone"><a href="tel:+01061245741"><i class="fas fa-phone-alt"></i>
                                            01061245741</a></li>
                                    <li class="address"><a href="javascript:void(0)">2307 Beverley Rd Brooklyn, New York
                                            11226 United States.</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>

            </div>

            <div class="footer-bottom">
                <div class="row">
                    <div class="col-md-12 col-md-12 text--center footer-copyright">
                        <div class="copyright"><span>&copy; Equita Express, With Love by</span><a
                                href="https://1.envato.market/kP9BV"> Zytheme.com</a></div>
                    </div>
                </div>

            </div>

        </footer>
        <div class="backtop" id="back-to-top"><i class="fas fa-chevron-up"></i></div>
    </div>

    <script src="assets/js/vendor/jquery-3.4.1.min.js"></script>
    <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/functions.js"></script>
</body>

<!-- Mirrored from demo.zytheme.com/equita/service-air-freight.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Jul 2022 12:44:07 GMT -->

</html>