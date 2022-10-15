<?php
include('top.php');

// prx($_GET);
$id = "";
$sql = "";
$notice = "";
$link     = "";


if (isset($_GET['id']) && isset($_GET['id']) > 0) {
    $id = get_safe_value($_GET['id']);
    $row = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM notice WHERE id = '$id'"));
    
    $notice =   get_safe_value($row['notice']);
    $link  =   get_safe_value($row['link']);
    $added_on     =   date("y-m-d h:i:s");
}

if (isset($_POST['submit'])) {

    $notice = get_safe_value($_POST['notice']);
    $link     = get_safe_value($_POST['link']);
    $added_on     =   date("y-m-d h:i:s");


    if ($id == '') {
        $sql = "INSERT INTO `notice`(`notice`,`link`, `added_on`) 
                          VALUES ('$notice','$link', '$added_on' )";
    } else {

        $sql = "UPDATE `notice` SET `notice`='$notice',`link`='$link',`added_on`='$added_on' WHERE id ='$id'";
    }
    mysqli_query($con, $sql);
    redirect('notice.php');
}
?>

<div class="row">
    <h1 class="card-title ml10">Manage Notice</h1>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms" method="post">
                          <div class="form-group col">
                            <label for="exampleInputName1">Notice</label>
                            <input type="text" class="form-control" name="notice" placeholder="Notice" value="<?php echo $notice ?>" required>
                        </div>
                        <div class="form-group col">
                            <label for="exampleInputEmail3">Info Link</label>
                            <input type="text" class="form-control" name="link" placeholder="link" value="<?php echo $link ?>">
                        </div>
                   
                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    <a href="notice.php" class="btn btn-light">Cancel</a>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include('bottom.php') ?>