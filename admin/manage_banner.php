<?php
include('top.php');

// prx(SERVER_FACULTY_IMG);

$id = "";
$sql = "";
$banner_name = "";
 $link     = ""; 
$img_status = "required";
$img_massage="";
$link_massage="";

if (isset($_GET['id']) && isset($_GET['id']) > 0) {
    $id = get_safe_value($_GET['id']);
    $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM banner WHERE id = '$id'"));
    $banner_name =   get_safe_value($row['banner_name']);
     $link  =   get_safe_value($row['link']);
    $img_status = "";
}

if (isset($_POST['submit'])) {
    // prx($_POST);
    
    $banner_name = get_safe_value($_POST['banner_name']);
     $link  = get_safe_value($_POST['link']);
    $added_on  = date('Y-m-d h:i:s');

    if ($id == '') {
        // image upload
      
        $banner_image = $_FILES['banner_image']['name'];
        move_uploaded_file($_FILES['banner_image']['tmp_name'], SERVER_BANNER_IMG. $_FILES['banner_image']['name']);

        $sql = "INSERT INTO `banner`(`banner_name`,`banner_image`,`link`,`status`) 
                            VALUES ('$banner_name','$banner_image','$link',1)";
        mysqli_query($con, $sql);

    } else {
        $img_condition = '';
        if ($_FILES['banner_image']['name'] != '') {

            $banner_image = $_FILES['banner_image']['name'];
            move_uploaded_file($_FILES['banner_image']['tmp_name'], SERVER_BANNER_IMG . $_FILES['banner_image']['name']);
            $img_condition = ", banner_image='$banner_image'";
        }
        $sql = "UPDATE `banner` SET `banner_name`='$banner_name' $img_condition , `banner_image`='$banner_image',`link`='$link',`status`= 1  WHERE id ='$id'";
        mysqli_query($con, $sql);
    }
    redirect('banner.php');
}
?>

<div class="row">
    <h1 class="card-title ml10">Manage Banner</h1>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputName1">Banner Name</label>
                            <input type="text" class="form-control" name="banner_name" placeholder="Banner Name" value="<?php echo $banner_name ?>" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail3">Banner Image</label>
                            <input type="file" class="form-control" name="banner_image" placeholder="Banner Image" value="<?php echo $banner_image ?>" required>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-4">
                            <label for="exampleInputPassword4">Link to Move </label>
                            <input type="text" class="form-control" name="link" placeholder="Link" value="<?php echo $link ?>" required>
                        </div>
                       
                    </div>
                    
                    

                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    <a href="banner.php" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include('bottom.php') ?>