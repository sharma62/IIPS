<?php include 'header.php';

$banner_res = mysqli_query($con, "select * from banner where status = 1 ");
// prx(mysqli_fetch_assoc($banner_res));
?>


<!-- image slider -->
<section id="img-slider">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <?php if (mysqli_num_rows($banner_res) > 0) { ?>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./assets/img/sc-public.JPG" class="d-block w-100" alt="...">
                </div>
                <?php while ($banner_row = mysqli_fetch_assoc($banner_res)) { ?>
                    <div class="carousel-item ">
                        <img src="<?php echo SITE_BANNER_IMG . $banner_row['banner_image'] ?>" class="d-block w-100" alt="...">
                    </div>

            <?php }
            } ?>
            </div>
            <!-- <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button> -->
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
    </div>


</section>
<!-- jumbotron  -->
<section id="jumbotron">
    <div class="container jumbotron ">
        <h1 class="display-3" style="font-weight: revert;">Ideal Internationl Public School</h1>
        <p class="lead">Back to school</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <!-- <a class="btn btn-primary btn-lg" href="Registration.html" role="button">Registeration</a> -->
            <!-- <a class="btn btn-primary btn-lg" href="Login.html" role="button">Login</a> -->

            <marquee style=" font-weight: bold;font-size: 15px;" onmouseover="this.stop();" onmouseout="this.start();" behavior="alternate" direction="left">New : <a href="">Addmisson open 2022</a> <img src="assets/icon/new-icon-gif-2.jpg" alt="" width="40px"></marquee>
        </p>
    </div>
</section>
<!-- Registeration  -->
<section class=" container-fluid registeration my-5 py-3">
    <div class="container my-4">
        <div class="row">
            <div class="col-md-4 shadow py-4">
                <div class="text-center   ">
                    <i class="fa fa-pencil fa-stack h-75"></i>
                    <h1 class="t"> <a href="registeration.php">Online Registeration</a></h1>
                </div>
            </div>
            <div class="col-md-4 shadow py-4">
                <div class="text-center  ">
                    <i class="fa fa-pencil fa-stack h-75"></i>
                    <h1 class="t"><a href="Admission.html">Admission</a></h1>
                </div>
            </div>
            <div class="col-md-4 shadow py-4">
                <div class="text-center   ">
                    <i class="fa fa-phone fa-stack h-75"></i>
                    <h1 class="tel">
                        <a href="tel:1800-520-4444"> 1800-520-4444</a></h>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- about school & notice -->
<section id="about-school-notice">
    <div class="container my-4">
        <div class="row text-center ">
            <div class="col-md-8">
                <h2>About school</h2>
                <div class="col">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga provident ab corrupti id quisquam, est expedita dicta? Dolorum expedita neque atque, aliquid beatae, quisquam mollitia at, aliquam debitis repellat nobis nulla odio quam! Cumque possimus optio soluta fugiat quaerat! Distinctio dignissimos corrupti reiciendis laudantium consequuntur aliquam quaerat nam, maiores omnis, harum enim nulla minima quasi deserunt fugit. Asperiores distinctio incidunt assumenda quisquam illo in hic totam vero accusamus consequuntur exercitationem est, fugit accusantium quod numquam a cum? Voluptates qui veritatis quae, similique debitis vel fuga nam numquam delectus, quibusdam aliquam repellat omnis non praesentium impedit aut nobis facere perferendis ut!\</p>
                </div>
            </div>
            <div class="col-sm-4">
                <h2>Notice</h2>
                <div class="ml-5 px-5 h-75">
                    <marquee behavior="scroll " direction="up" onmouseover="this.stop(); " onmouseout="this.start(); " style="height:100%; font-weight: bold;font-size: 15px;">
                        <?php
                        $notice_res = mysqli_query($con, "select * from notice");
                        if (mysqli_num_rows($notice_res) > 0) {

                            while ($notice_row = mysqli_fetch_assoc($notice_res)) { ?>

                                <li><a href="<?php echo $notice_row['link'] ?>"><?php echo $notice_row['notice'] ?></a> <img src="assets/icon/new-icon-gif-2.jpg" alt="" width="40px"></li>
                        <?php }
                        }
                        ?>
                    </marquee>
                </div>

            </div>
        </div>

    </div>
</section>

<!-- service -->
<section id="service">
    <div class="container my-5 py-4 ">
        <div class="row sub_content ">
            <div class="col-md-12 col-lg-12 ">
                <div class="dividerHeading text-center">
                    <h4><span>Why IIPS</span></h4>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 card-hover ">
                <div class="serviceBox_2 green">
                    <div class="service-icon ">
                        <i class="fa fa-globe "></i>
                    </div>
                    <div class="service-content ">
                        <h3>Development</h3>
                        <p> sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura.</p>
                        <div class="read ">
                            <a href=" ">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 card-hover ">
                <div class="serviceBox_2 purple ">
                    <div class="service-icon ">
                        <i class="fa fa-rocket "></i>
                    </div>
                    <div class="service-content ">
                        <h3>Building</h3>
                        <p> sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura.</p>
                        <div class="read ">
                            <a href=" ">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 card-hover ">
                <div class="serviceBox_2 red ">
                    <div class="service-icon ">
                        <i class="fa fa-user-md "></i>
                    </div>
                    <div class="service-content ">
                        <h3>Hostels</h3>
                        <p> sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura.</p>
                        <div class="read ">
                            <a href=" ">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 card-hover ">
                <div class="serviceBox_2 blue ">
                    <div class="service-icon ">
                        <i class="fa fa-twitter "></i>
                    </div>
                    <div class="service-content ">
                        <h3>Clean & Clear Class-Room</h3>
                        <p> sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura.</p>
                        <div class="read ">
                            <a href=" ">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonials -->
<section id="Testimonials">
<div class="container my-5 py-4 ">
        <div class="row sub_content ">
            <div class="col-md-12 col-lg-12 ">
                <div class="dividerHeading text-center">
                    <h4><span>Testimonials</span></h4>
                </div>
            </div>
            <div class="col ">
                <div class="serviceBox_2 green">
                    <div class="service-icon ">
                       <img src="./img-2/img_avatar2.png" alt="" width="100%" style="border-radius:200px;">
                    </div>
                    <div class="service-content ">
                         <h4>" sit amet, consec tetuer adipis elit, aliquam eget nibh etlibura "</h4>
                        <div class="read ">
                            <a href=" ">Read more</a>
                        </div>
                    </div>
                </div>
            </div>
            
         
        </div>
    </div>
</section>




 
<?php include('footer.php') ?>


