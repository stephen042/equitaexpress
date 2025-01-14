<?php 
session_start();
include '../db.php';

    if (!isset($_SESSION['adminlogin']) && $_SESSION['adminlogin'] == "") {
        header('location: login.php');    
    }
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<!-- Mirrored from demo.zytheme.com/equita/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Jul 2022 12:42:44 GMT -->

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="Ayman Fikry" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <title>Home Main - Equita Logistics </title>
    <link href="assets/images/favicon/favicon.png" rel="icon" />

    <link rel="preconnect" href="https://fonts.gstatic.com/" />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,700;1,400;1,700&amp;family=Rubik:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet" />

    <link href="../assets/css/vendor.min.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
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
    </div> -->

    <div class="wrapper clearfix" id="wrapperParallax">

        <header class="header header-1" id="navbar-spy">
            <nav class="navbar navbar-expand-lg  navbar-bordered navbar-sticky" id="primary-menu">
                <div class="container"><a class="navbar-brand" href="index.php">
                    <img class="logo logo-light"
                            src="../assets/images/logo/logo-light.png" alt="Logo" /><img class="logo logo-dark"
                            src="../assets/images/logo/logo-dark.png" alt="Logo" /></a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                        aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                    <div class="collapse navbar-collapse" id="navbarContent">
                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item ">
                                <a href="../index.html"><span>Site Home</span></a>
                            </li>

                            <li class="nav-item">
                                <a href="changepassword.php"><span>Change Password</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="logout.php"><span></span>Logout</a>
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
                                <button type="button" onclick="{window.location.href = 'index.php' }" class="btn btn--primary" >Admin Home</button>
                            </div>

                            
                        </div>

                    </div>

                </div>

            </nav>
        </header>
        <section class="page-title page-title-8 bg-overlay bg-overlay-dark bg-parallax" id="page-title">
        <div class="bg-section"><img src="../assets/images/page-titles/13.jpg" alt="Background" /></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 offset-lg-3">
                        <div class="title">
                        <div class="title-heading">
                            <h1>Admin</h1>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        </section>