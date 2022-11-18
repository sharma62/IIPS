<!DOCTYPE html>
<html class="no-js" lang="en">
<?php
include('constant.inc.php ');
include('database.inc.php');
include('function.inc.php');
?>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php echo  'IIPS -' . strtolower($title[0]); ?></title>
    <meta name="description" content="">
    <!-- font awsome -->
    <script src="https://kit.fontawesome.com/43aded160e.js" crossorigin="anonymous"></script>

    <link rel="icon" href="favicon.png" type="image/x-icon">

    <!-- CSS FILES -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/iips_stylesheet.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen" data-name="skins">
    <link rel="stylesheet" href="css/layout/wide.css" data-name="layout">
    <link rel="stylesheet" href="css/new_style.css">

   
    <link rel="stylesheet" href="css/style-fraction.css" />
    <link rel="stylesheet" href="css/mediaQuery.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <style>
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
            text-align: center;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }




        

        
    </style>
</head>
<!-- navigation bar -->
<body class="home school animate-bottom">
<header id="header">
    <div id="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 top-info hidden-xs">
                    <span><i class="fa fa-phone"></i>Phone: (123) 456-7890</span>
                    <span><i class="fa fa-envelope"></i>Email: mail@example.com</span>
                </div>
                <div class="col-sm-4 top-info">
                    <ul>
                        <li><a href="" class="my-tweet"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="" class="my-facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="" class="my-skype"><i class="fa fa-skype"></i></a></li>
                        <li><a href="" class="my-pint"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="" class="my-rss"><i class="fa fa-rss"></i></a></li>
                        <li><a href="" class="my-google"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="container-fluid">
    <div class="row">
        <div class="col offset-2">
            <div id="mySidenav" class="sidenav">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <a href="<?php echo 'about.php' ?>">About</a>
                <a href="<?php echo 'registeration.php' ?>">Registeration</a>
                <a href="<?php echo 'imgGallary.php' ?>">Image Gallary</a>
                <a href="<?php echo 'faculty.php' ?>">Faculty</a>
                <a href="#">Student</a>
                <a href="#">Examnation</a>
                <a href="#">Contact</a>
            </div>
            <br>
            <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>

            <script>
                function openNav() {
                    document.getElementById("mySidenav").style.width = "360px";

                }

                function closeNav() {
                    document.getElementById("mySidenav").style.width = "0";
                }
            </script>

        </div>
        <div class="col-lg-5 col-md-4 hidden-sm hidden-xs">
            <img src="assets//img//azadi-logo.png" alt="" width="120px">
           <a target="_blank" href="https://www.digitalindia.gov.in/"><img src="assets//img//digital-india.png" alt="" width="120px"></a> 
            <a target="_blank" href="https://swachhbharat.mygov.in/"><img src="assets//img//swach-bharat.jpg" alt="" width="120px"></a>
        </div>
        
        <div class="col">
            <a href="index.php">
                <img src="iips_logo.jpg" alt="logo" width="35%" style="border-radius: 100px;" id="main-logo">
            </a>
        </div>
    </div>
</div>
<!-- <section class="container-fluid ">

    <div class="topnav" id="myTopnav">
        <a href="#home" class="active">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <a href="#about">About</a>
        <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
        </a>
    </div></section>



    <script> 
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }

    document.body.className="animate-bottom";
 </script>

</section> -->