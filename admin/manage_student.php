<?php
include('top.php');

$sql = "";
$msg = "";
$class_code = $_GET['class_code'];

$addmission_no = '';
$row           = '';
$name          = '';
$dob           = '';
$roll          = '';
$mother_name   = '';
$father_name   = '';
$phone         = '';
$total_amut    = '';
$due_amut      = '';
try {
    //code...
    // fatch from database 
    if (isset($_GET['addmission_no']) && isset($_GET['addmission_no']) > 0) {
        $addmission_no   = get_safe_value($_GET['addmission_no']);
        $row             =   mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM class_1 WHERE addmission_no = '$addmission_no'"));
        $name            =   get_safe_value($row['name']);
        $dob             =   get_safe_value($row['birth_date']);
        $roll            =   get_safe_value($row['roll']);
        $mother_name     =   get_safe_value($row['mother_name']);
        $father_name     =   get_safe_value($row['father_name']);
        $phone           =   get_safe_value($row['phone']);
        $total_amut      =   get_safe_value($row['total_amut']);
        $due_amut        =   get_safe_value($row['due_amut']);
    }

    // fatch from front-end form
    if (isset($_POST['submit'])) {
        $name          = get_safe_value($_POST['name']);
        $dob           = get_safe_value($_POST['dob']);
        $roll          = get_safe_value($_POST['roll']);
        $mother_name   = get_safe_value($_POST['mother_name']);
        $father_name   = get_safe_value($_POST['father_name']);
        $phone         = get_safe_value($_POST['phone']);
        $total_amut    = get_safe_value($_POST['total_amut']);
        $due_amut      = get_safe_value($_POST['due_amut']);
        
        
        
        //if addmission_no not get from url then get addmission_no from form at front-end 
        if (isset($_GET['addmission_no']) == '') {
            
            $addmission_no = get_safe_value($_POST['addmission_no']);
            // and create sql query 
            $sql = "select * from class_1 where addmission_no = '$addmission_no'";
            
            // check duplicate with in table 
                    //if have same data then throw massage otherwise fire insert query
            if (mysqli_num_rows(mysqli_query($con, $sql)) > 0) {
                $msg = " * Addmission Number Already Registered";
            } else {
                
                $sql = "INSERT INTO `class_1` (`addmission_no`, `name`, `roll`, `mother_name`, `father_name`, `birth_date`, `phone`, `total_amut`, `due_amut`, `status`, `class_code`) 
                            VALUES ('$addmission_no', '$name', '$roll', '$mother_name', '$father_name', '$dob', '$phone', '$total_amut', '$due_amut', 1 , $class_code);";
                mysqli_query($con, $sql);
                // }
                ?><script>window.location.href = 'student.php?class_code=<?php echo $class_code ?>';</script><?php
            }
            
        }else{//else got the addmission_no from the database the fire update query 
            $sql = "UPDATE `class_1` SET `name` = '$name', `roll` = '$roll', `mother_name` = '$mother_name', `father_name` = '$father_name', `birth_date` = '$dob', `phone` = '$phone', `total_amut` = ' $total_amut', `due_amut` = '$due_amut', `status` = 1 , `class_code` =  '$class_code' WHERE `addmission_no` = '$addmission_no'";
           mysqli_query($con, $sql);
            // prx(mysqli_query($con, $sql));
            ?><script>window.location.href = 'student.php?class_code=<?php echo $class_code ?>';</script><?php

        }
    } 
}catch (Throwable $th) {
    $th->getCode();
    // $th->getMessage();
}

?>



<div class="row">
    <h1 class="card-title ml10">Student Details</h1>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms" method="POST">
                    <div class="row">
                        <div class="form-group col">
                            <label for="addmission_no">Admission No.</label>
                            <?php if (isset($_GET['addmission_no']) == '') { ?>
                                <input type="text" class="form-control" placeholder="Admission No." name="addmission_no" value="<?php echo $addmission_no ?>">
                            <?php } else { ?>
                                <input type="text" class="form-control" placeholder="Admission No." value="<?php echo $addmission_no ?>" disabled>

                            <?php } ?>
                        </div>
                        <div class="form-group col">
                            <label for="Date_of_Brith">DOB</label>
                            <input type="date" class="form-control" placeholder="Date of Brith" name="dob" value="<?php echo $dob ?>" required>
                        </div>

                        <div class="form-group col">
                            <label for="class">Roll</label>
                            <input type="text" class="form-control" placeholder="roll" name="roll" value="<?php echo $roll ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="studentName">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" value="<?php echo $name ?>" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="father_name">Father's Name</label>
                            <input type="text" class="form-control" placeholder="Father's name" name="father_name" value="<?php echo $father_name ?>" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="mother_name">Mother's Name</label>
                            <input type="text" class="form-control" placeholder="Mother's name" name="mother_name" value="<?php echo $mother_name ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="contactNo">Phone no.</label>
                            <input type="text" class="form-control" placeholder="Contact No." name="phone" value="<?php echo $phone ?>" required>
                        </div>

                        <div class="form-group col-4">
                            <label for="total_amut">Total Amount Rs</label>
                            <input type="text" class="form-control" placeholder="Total" name="total_amut" value="<?php echo $total_amut ?> " required>
                        </div>
                        <div class="form-group col-4">
                            <label for="Due_amount">Due_amount Rs</label>
                            <input type="text" class="form-control" placeholder="Due" name="due_amut" value="<?php echo $due_amut ?> " required>
                        </div>
                        <div class="form-group col-4 mt-4">

                            <!-- <button type="submit" class="btn btn-primary mr-2" name="submit" id="mybtn">Report card</button> -->
                            <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                        </div>

                    </div>
                    <p class="text-danger"><?php echo $msg; ?></p>

                </form>
            </div>
        </div>
    </div>

</div>


<?php include 'bottom.php'; ?>