<?php
include('top.php');

// prx(SERVER_FACULTY_IMG);

$id = "";
$sql = "";
$full_name = "";
$email     = "";
$base_sal  = "";
$phone     = "";
$gender    = "";
$address   = "";
$date      = "";
$qulification = "";
$exprience = "";
$designation = "";
$img_status = "required";
$img_massage="";

if (isset($_GET['id']) && isset($_GET['id']) > 0) {
    $id = get_safe_value($_GET['id']);
    $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM faculty WHERE id = '$id'"));
    $full_name =   get_safe_value($row['name']);
    $email     =   get_safe_value($row['email']);
    $base_sal  =   get_safe_value($row['base_sal']);
    $phone     =   get_safe_value($row['phone']);
    $gender      = get_safe_value($row['gender']);
    $address    =  get_safe_value($row['address']);
    $qulification    =  get_safe_value($row['qulification']);
    $exprience    =  get_safe_value($row['exprience']);
    $designation    =  get_safe_value($row['designation']);
    $img_status = "";
}

if (isset($_POST['submit'])) {

    $full_name = get_safe_value($_POST['full_name']);
    $email     = get_safe_value($_POST['email']);
    $base_sal  = get_safe_value($_POST['base_sal']);
    $phone     = get_safe_value($_POST['phone']);
    $address    = get_safe_value($_POST['address']);
    $gender      = get_safe_value($_POST['gender']);
    $qulification    =  get_safe_value($_POST['qulification']);
    $exprience    =  get_safe_value($_POST['exprience']);
    $designation    =  get_safe_value($_POST['designation']);
    $added_on  = date('Y-m-d h:i:s');
    //   prx((SERVER_FACULTY_IMG.$_FILES['image']['name']));

    if ($id == '') {
        // image upload
      
        $image = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], SERVER_FACULTY_IMG . $_FILES['image']['name']);

        $sql = "INSERT INTO `faculty`(`name`,`image`,`email`, `phone`, `base_sal`, `gender`,`address`,`qulification`,`exprience`,`designation`, `date_of_join`, `status`) 
                            VALUES ('$full_name','$image','$email','$phone','$base_sal','$gender','$address','$qulification','$exprience','$designation','$added_on',1)";
        mysqli_query($con, $sql);
    } else {
        $img_condition = '';
        if ($_FILES['image']['name'] != '') {

            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], SERVER_FACULTY_IMG . $_FILES['image']['name']);
            $img_condition = ", image='$image'";
        }
        $sql = "UPDATE `faculty` SET `name`='$full_name' $img_condition , `email`='$email',`phone`='$phone',`base_sal`='$base_sal',`gender`='$gender',`address`='$address',`qulification`='$qulification',`exprience`='$exprience',`designation`='$designation',`date_of_join`='$added_on',`status`= 1  WHERE id ='$id'";
        mysqli_query($con, $sql);
    }
    redirect('faculty.php');
}
?>

<div class="row">
    <h1 class="card-title ml10">Manage Faculty</h1>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control" name="full_name" placeholder="Name" value="<?php echo $full_name ?>" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail3">Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $email ?>" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-4">
                            <label for="exampleInputPassword4">Base Salary</label>
                            <input type="number" class="form-control" name="base_sal" placeholder="Base salary" value="<?php echo $base_sal ?>" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="Phone">Phone No.</label>
                            <input type="number" class="form-control" name="phone" placeholder="Phone Number" value="<?php echo $phone ?>" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="exampleSelectGender">Gender</label>
                            <select class="form-control" name="gender" value="<?php echo $gender ?>">
                                <option>Male</option>
                                <option>Female</option>
                                <option>Transgender</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group  col">
                            <label for="exampleInputPassword4">Qulification</label>
                            <input type="text" class="form-control" name="qulification" placeholder="Qulification" value="<?php echo $qulification ?>" required>
                        </div>
                        <div class="form-group  col">
                            <label for="exampleInputPassword4">Exprience</label>
                            <input type="number" class="form-control" name="exprience" placeholder="Exprience" value="<?php echo $exprience ?>" required>
                        </div>
                        <div class="form-group col">
                            <label>Image upload</label>
                            <input type="file" class="form-control file-upload-info" placeholder="Upload Image" name="image" <?php echo $img_status ?>>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Designation</label>
                        <input type="text" class="form-control" name="designation" placeholder="Designation" value="<?php echo $designation ?>" required>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="city">Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Location : Village , City , State , Country" value="<?php echo $address ?>" required>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    <a href="faculty.php" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include('bottom.php') ?>