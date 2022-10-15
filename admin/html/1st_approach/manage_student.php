<?php
session_start();
include('top.php');
include('../database.inc.php');
include('../function.inc.php');

$_SESSION['c_id'] = get_safe_value($_GET['c_id']);
$class_code = $_SESSION['c_id'];

 
if (isset($_POST['submit'])) {

    $addmission_no = rand(1, 99999) . bindec(random_bytes(999));
    $name = get_safe_value($_POST['name']);
    $dob = get_safe_value($_POST['dob']);
    $roll = get_safe_value($_POST['roll']);
    $father_name = get_safe_value($_POST['father_name']);
    $mother_name = get_safe_value($_POST['mother_name']);
    $phone = get_safe_value($_POST['phone']);
    $total_amut = get_safe_value($_POST['total']);
    $Due_amut = get_safe_value($_POST['due']);
    // echo $dob ;
    $sql = "INSERT INTO `class_1` (`addmission_no`, `name`, `roll`, `mother_name`, `father_name`, `birth_date`, `phone`, `total_amut`, `due_amut`, `status`, `class_code`) 
          VALUES ('$addmission_no', '$name', '$roll', '$mother_name', '$father_name', '$dob', '$phone', '$total_amut', '$Due_amut', 1 , $class_code);";
    mysqli_query($con, $sql);
    redirect("student_list.php");
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
                            <input type="text" class="form-control" placeholder="Admission No."  disabled>
                        </div>
                        <div class="form-group col">
                            <label for="Date_of_Brith">DOB</label>
                            <input type="date" class="form-control" placeholder="Date of Brith" name="dob" value="<?php $dob ?>" required>
                        </div>

                        <div class="form-group col">
                            <label for="class">Roll</label>
                            <input type="text" class="form-control" placeholder="roll" name="roll" value="<?php $roll ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="studentName">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="name" value="<?php $name ?>" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="father_name">Father's Name</label>
                            <input type="text" class="form-control" placeholder="Father's name" name="father_name" value="<?php $father_name ?>" required>
                        </div>
                        <div class="form-group col-4">
                            <label for="mother_name">Mother's Name</label>
                            <input type="text" class="form-control" placeholder="Mother's name" name="mother_name" value="<?php $mother_name ?>" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="contactNo">Phone no.</label>
                            <input type="text" class="form-control" placeholder="Contact No." name="phone" value="<?php $phone ?>" required>
                        </div>

                        <div class="form-group col-4">
                            <label for="total_amut">Total Amount Rs</label>
                            <input type="text" class="form-control" placeholder="Total" name="total" value="<?php $total ?> " required>
                        </div>
                        <div class="form-group col-4">
                            <label for="Due_amount">Due_amount Rs</label>
                            <input type="text" class="form-control" placeholder="Due" name="due" value="<?php ?> " required>
                        </div>
                        <div class="form-group col-4 mt-4">
                            <button type="submit" class="btn btn-primary mr-2" name="submit" id="mybtn">Report card</button>

                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>
<?php include('bottom.php'); ?>