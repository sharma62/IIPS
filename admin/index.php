<?php include_once 'top.php';
// fetch student information and pay final fee 
$addmission_no = "";
$name = "";
$father_name = "";
$mother_name = "";
$birth_date = "";
$total_amut = "";
$due_amut = "";
$std = "";

if (isset($_POST['submit'])) {

    // $res_2 = mysqli_query($con, "SELECT * FROM `class_1` INNER JOIN class_master ON class_1.class_code = class_master.class");

    // prx($res_2);
    $addmission_no = get_safe_value($_POST['addmission_no']);
    $sql = "SELECT * FROM class_1 WHERE addmission_no = '$addmission_no' ";
    $res   = mysqli_query($con, $sql);
    $res_fetch_assoc =   mysqli_fetch_assoc($res);
    $name = $res_fetch_assoc['name'];
    $father_name = $res_fetch_assoc['father_name'];
    $mother_name = $res_fetch_assoc['mother_name'];
    $birth_date = $res_fetch_assoc['birth_date'];
    $total_amut = $res_fetch_assoc['total_amut'];
    $due_amut = $res_fetch_assoc['due_amut'];

    // $res_2_fatch_assoc= mysqli_fetch_assoc($res_2);
    // $std = $res_2_fatch_assoc['']

}
?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3">Weclome Ideal International Public School </h1>
        <p class="lead">Get ready to go..</p>
        <hr class="my-2">
        <p>More info</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="Jumbo action link" role="button">Jumbo action name</a>
        </p>
    </div>
</div>
<div class="container">
    <h2 class="text-center">Pay Fee</h2>
    <div class="row my-4">
        <div class="col">
            <form action="" method="post">
                <label for="Admission_no">Addmission No.</label>
                <input type="text" class="form-control w-50" name="addmission_no" placeholder="Addmissoin No.">
                <button class="btn btn-primary mt-2" name="submit">Search</button>
            </form>
        </div>
        <div class="col-7">
            <h4 class="text-center py-3">Profile</h4>
            <table class="table ">

                <tr>
                    <th>Admission No. </th>
                    <td><?php echo $addmission_no ?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo $name ?> </td>

                </tr>
                <tr>
                    <th>Faher's Name</th>
                    <td><?php echo $father_name ?></td>
                </tr>

                <tr>
                    <th>Mother's Name</th>
                    <td><?php echo $mother_name ?></td>
                </tr>
                <tr>
                    <th>DoB</th>
                    <td><?php echo $birth_date ?></td>
                </tr>
                <tr>
                    <th>Total Ammount</th>
                    <td><?php echo $total_amut ?></td>
                </tr>
                <tr>
                    <th>Due</th>
                    <td><?php echo $due_amut ?></td>
                </tr>
            </table>
            <div class="btn btn-primary offset-8 mt-3" role="button"> Process To Pay </div>
        </div>
    </div>
</div>
<?php include_once 'bottom.php' ?>