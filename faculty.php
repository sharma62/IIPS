<?php include 'header.php';


$fac_res = mysqli_query($con, "select * from faculty where status = 1");

?>
<style>
    * {
        font-size: medium;
    }

    table img {
        width: 20%;
        border-radius: 50px;
    }

    td {
        width: 30%;
    }

    .flip-card {
        background-color: transparent;
        width: 300px;
        height: 300px;
        perspective: 1000px;
        
    }

    .flip-card-inner {
        position: relative;
        width: 100%;
        height: 100%;
        text-align: center;
        transition: transform 0.6s;
        transform-style: preserve-3d;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    }

    .flip-card:hover .flip-card-inner {
        transform: rotateY(180deg);
    }

    .flip-card-front,
    .flip-card-back {
        position: absolute;
        width: 100%;
        height: 100%;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
    }

    .flip-card-front {
        background-color: #bbb;
        color: black;
    }

    .flip-card-back {
        background-color: #2980b9;
        color: white;
        transform: rotateY(180deg);
    }

    .checked {
        color: orange;
    }
</style>
<h1 class="text-center ">Faculty Gallary</h1>
<hr>
<div class="container">
    <div class="row py-3">
        <?php if (mysqli_num_rows($fac_res) > 0) { ?>
            <?php while ($fac_row = mysqli_fetch_assoc($fac_res)) { ?>
                <div class="col-md-4 p-3">
                    <div class="flip-card"  style="cursor:pointer ;">
                        <div class="flip-card-inner">
                            <div class="flip-card-front ">
                                <img src="<?php echo SITE_FACULTY_IMG.$fac_row['image'];?>" alt="Avatar" style="width:100%;height:100%;">
                            </div>
                            <div class="flip-card-back">
                                <!-- name -->
                                <h1 class="py-2 " style="color: black;"><?php echo strtoupper($fac_row['name']); ?></h1>
                                <!-- qulification -->
                                <p><?php echo strtoupper($fac_row['qulification']); ?></p>
                                <!-- Exprience -->
                                <p>Exprience : <span>+<?php echo strtoupper($fac_row['exprience'])." Yr" ?></span></p>
                                <hr>
                                <!-- Rating -->
                                <p> Designation :<?php echo  strtoupper($fac_row['designation']); ?></p>
                                <p>Mail : <span><a href="mailto:" style="color: black;"><?php echo  ($fac_row['email']); ?></a></span></p>

                                <span>Rating : </span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>

                </div>
            <?php } ?>
        <?php } ?>


    </div>
</div>
<?php include 'footer.php' ?>
<!-- <div class="container team-list">
            <div class="row">
                <h3></h3>
                <div class="col-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">picture</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">view profile</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td><img src="img-2/mk-profile.JPG" alt="avatar"></td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td><input type="button" value="profile" class="btn btn-primary"></td>

                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><img src="img-2/mk-profile.JPG" alt="avatar"></td>
                                <td>Thornton</td>
                                <td>@fat</td>
                                <td><input type="button" value="profile" class="btn btn-primary"></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><img src="img-2/mk-profile.JPG" alt="avatar"></td>
                                <td>@twitter</td>
                                <td>@demo</td>
                                <td><input type="button" value="profile" class="btn btn-primary"></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><img src="img-2/mk-profile.JPG" alt="avatar"></td>
                                <td>@twitter</td>
                                <td>@demo</td>
                                <td><input type="button" value="profile" class="btn btn-primary"></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><img src="img-2/mk-profile.JPG" alt="avatar"></td>
                                <td>@twitter</td>
                                <td>@demo</td>
                                <td><input type="button" value="profile" class="btn btn-primary"></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><img src="img-2/mk-profile.JPG" alt="avatar"></td>
                                <td>@twitter</td>
                                <td>@demo</td>
                                <td><input type="button" value="profile" class="btn btn-primary"></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><img src="img-2/mk-profile.JPG" alt="avatar"></td>
                                <td>@twitter</td>
                                <td>@demo</td>
                                <td><input type="button" value="profile" class="btn btn-primary"></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><img src="img-2/mk-profile.JPG" alt="avatar"></td>
                                <td>@twitter</td>
                                <td>@demo</td>
                                <td><input type="button" value="profile" class="btn btn-primary"></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><img src="img-2/mk-profile.JPG" alt="avatar"></td>
                                <td>@twitter</td>
                                <td>@demo</td>
                                <td><input type="button" value="profile" class="btn btn-primary"></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><img src="img-2/mk-profile.JPG" alt="avatar"></td>
                                <td>@twitter</td>
                                <td>@demo</td>
                                <td><input type="button" value="profile" class="btn btn-primary"></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><img src="img-2/mk-profile.JPG" alt="avatar"></td>
                                <td>@twitter</td>
                                <td>@demo</td>
                                <td><input type="button" value="profile" class="btn btn-primary"></td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div> -->