<?php
session_start();
include('../database.inc.php');
include('../function.inc.php');
 
if (isset($_SESSION['IS_LOGIN'])) {
    redirect('index.php');
  }
$msg = "";
if (isset($_POST['submit'])) {
    $username = get_safe_value($_POST['username']);
    $password = get_safe_value($_POST['password']);
 
    $sql = "select * from admin where username='$username' and password='$password'";
    $res = mysqli_query($con, $sql);
    if (mysqli_num_rows($res) > 0) {
         $row = mysqli_fetch_assoc($res);
        $_SESSION['IS_LOGIN'] = 'yes';
        $_SESSION['ADMIN_USER'] = $row['name'];
 // prx($_SESSION);
        redirect('index.php');
    } else {
        $msg = " * Please enter valid login details";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IIPS Admin Login </title>
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
 

    </style>
</head>

<body class="sidebar-light">
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper " >
            <div class="content-wrapper d-flex align-items-center auth">
                <div class="row w-100">
                    <div class="col-lg-4 mx-auto shadow">
                        <div class="auth-form-light text-left p-5">
                            <div class="brand-logo text-center">
                                <h6 class="py-4"><?php echo strtoupper('Ideal international public school') ?></h6>
                                <img src="../iips_logo.jpg" alt="IIPS LOGO" style="width: 40%;border-radius: 95px">
                            </div>
                            <h6 class="font-weight-light">Sign in to continue.</h6>
                            <form class="pt-3" method="post">
                                <div class="form-group">
                                    <input type="textbox" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" required>
                                </div>
                                <div class="mt-3">
                                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" value="SIGN IN" name="submit" />
                                </div>

                            </form>
                            <br>
                            <div class="login_msg " style="color: red;"><?php echo $msg ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>


</body>

</html>