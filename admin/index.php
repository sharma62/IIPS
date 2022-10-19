<?php include_once 'top.php';
// fetch student information and pay final fee 
if (isset($_POST['submit'])) {
    $addmission_no = get_safe_value($_POST['addmission_no']);
    $sql = "SELECT * FROM class_1 WHERE addmission_no = '$addmission_no' ";
    $res   = mysqli_query($con, $sql);
    // prx(mysqli_fetch_assoc($res));
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
                <button class="btn btn-primary mt-2" name="submit">proceed</button>
            </form>
        </div>
        <div class="col-8">
            <h4 class="text-center py-3">Profile</h4>
            <table class="table ">

                <tr>
                    <th>Admission No. </th>
                    <td><?php  echo $_POST['addmission_no']?></td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><?php echo $_POST['name'];?></td>

                </tr>
                <tr>
                    <th>Faher's Name</th>
                    <td><?php # echo $_POST['father_name']?></td>
                </tr>
                <tr>
                    <th>Mother's Name</th>
                    <td><?php  #echo $_POST['mother_name']?></td>
                </tr>
                <tr>
                    <th>DoB</th>
                    <td><?php # echo $_POST['birth_date']?></td>
                </tr>
                <tr>
                    <th>Total Ammount</th>
                    <td><?php  #echo $_POST['total_amut']?></td>
                </tr>
                <tr>
                    <th>Due</th>
                    <td><?php  #echo $_POST['due_amut']?></td>
                </tr>

            </table>

        </div>
    </div>
</div>
<?php include_once 'bottom.php' ?>