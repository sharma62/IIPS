<?php
include('top.php');

// prx($_GET);
$id = "";
$sql = "";
$name = "";
$username = "";
$email     = "";
$password = "";
$gender    = "";


if (isset($_GET['id']) && isset($_GET['id']) > 0) {
    $id = get_safe_value($_GET['id']);
    $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM admin WHERE id = '$id'"));
    $name =   get_safe_value($row['name']);
    $username  =   get_safe_value($row['username']);
    $email     =   get_safe_value($row['email']);
    $password     =   get_safe_value($row['password']);
    $gender      = get_safe_value($row['gender']);
}

if (isset($_POST['submit'])) {

    $name = get_safe_value($_POST['name']);
    $username  =   get_safe_value($_POST['username']);
    $email     = get_safe_value($_POST['email']);
    $password     = get_safe_value($_POST['password']);
    $gender      = get_safe_value($_POST['gender']);


    if ($id == '') {
        $sql = "INSERT INTO `admin`(`name`,`username`, `email`, `password`, `gender`, `status`) 
                          VALUES ('$name','$username','$email','$password','$gender',1)";
    } else {

        $sql = "UPDATE `admin` SET `name`='$name',`username`='$username',`email`='$email',`password`='$password',`gender`='$gender', `status`= 1 WHERE id ='$id'";
    }
    mysqli_query($con, $sql);
    redirect('admin.php');
}
?>

<div class="row">
    <h1 class="card-title ml10">Manage Admin</h1>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms" method="post">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="<?php echo $name ?>" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="exampleInputpassword4">User Name</label>
                            <input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $username ?>" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="Phone">password</label>
                            <input type="text" class="form-control" name="password" placeholder="password" value="<?php echo $password ?>" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="exampleSelectGender">Gender</label>
                            <select class="form-control" name="gender" value="<?php echo $gender ?>" required>
                                <option>Male</option>
                                <option>Female</option>
                                <option>Transgender</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="file-upload-default">
                        <div class="input-group col-xs-6">
                            <input type="file" class="form-control file-upload-info" placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                    </div> -->


                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    <a href="admin.php" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include('bottom.php') ?>