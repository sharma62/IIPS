<?php
session_start();
include('../database.inc.php');
include('../function.inc.php');
include ('../constant.inc.php');
// prx(SITE_FACULTY_IMG);

if (!isset($_SESSION['IS_LOGIN'])) {
  redirect('login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin </title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="./html/assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="./html/assets/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./html/assets/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="./html/assets/css/admin_costum_style.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="./html/assets/css/bootstrap-datepicker.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="./html/assets/css/style.css">
  <link rel="icon" href="../favicon.png" type="image/x-icon">

  <style>
    .hand_cursor {
      cursor: pointer;
      padding: 10px;
      border-radius: 10px;
    }

    .hand_cursor:hover {
      background-color: gray;

    }

    table tr:hover {
      background-color: lightgray;
      cursor: pointer;
    }

    .form-group label {
      text-transform: capitalize;
    }

    .d-inline-block {
      display: inline-block;
      width: 33%;
    }
  </style>
</head>

<body class="sidebar-light">
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper d-flex align-items-stretch justify-content-between">
        <ul class="navbar-nav mr-lg-2 d-none d-lg-flex">
          <li class="nav-item nav-toggler-item">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>

        </ul>
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php"><img src="../favicon.jpg" alt="Ideal International public School" />Ideal International public School</a>
          <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../favicon.jpg" alt="IIPS" />IIPS </a>
        </div>
        <ul class="navbar-nav navbar-nav-right">

          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <span class="nav-profile-name"><?php echo  strtoupper($_SESSION['ADMIN_USER']) ?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="<?php echo 'logout.php' ?>">
                <i class="mdi mdi-logout text-primary"></i>
                Logout
              </a>
            </div>
          </li>

          <li class="nav-item nav-toggler-item-right d-lg-none">
            <button class="navbar-toggler align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-menu"></span>
            </button>
          </li>
        </ul>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="mdi mdi-view-quilt menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.php">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Admin</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="faculty.php">
              <i class="mdi mdi-view-headline menu-icon"></i>
              <span class="menu-title">Faculty</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="class.php">
              <i class="mdi mdi-grid-large menu-icon"></i>
              <span class="menu-title">Class</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="banner.php">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Banner</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="notice.php">
              <i class="mdi mdi-airplay menu-icon"></i>
              <span class="menu-title">Notice Board</span>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">