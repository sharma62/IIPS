<?php
 include('top.php');
include('../database.inc.php');
include('../function.inc.php'); 


$class_code = get_safe_value($_GET['c_code']);

if ((isset($_GET['type']) && $_GET['type'] !== '') && isset($_GET['id']) && isset($_GET['id']) > 0) {
    
    // $stu_addmission_no => fatch and use from URL
    $stu_addmission_no = get_safe_value($_GET['id']);
    $type = get_safe_value($_GET['type']);

    if ($type == 'delete') {
         mysqli_query($con, "DELETE FROM class_1 WHERE addmission_no ='$stu_addmission_no'");
         ?>
         <script>
         window.location.href='student.php?c_code=<?php echo $class_code?>';
         </script>
         <?php
      }

    if ($type == 'active' || $type == 'deactive') {
        $status = 1;
        if ($type == 'deactive') {
            $status = 0;
        }
        mysqli_query($con, "UPDATE class_1 SET status = '$status' WHERE addmission_no = '$stu_addmission_no'");
    }
}

// $sql = "select * from class_1 where addmaission_no = '$addmission_no'";
$resArr = mysqli_query($con, $sql);
$resData = mysqli_fetch_assoc($resArr);
// prx($resData);
?>
<div class="card">
    <a class="btn btn-light" href="class.php">Back</a>
    <div class="card-body">
        <h1 class="text-center">Students List <h4><?php echo strtoupper($resData['class']) ;?></h4>
        </h1>
        <hr>
        <div class="row py-4">
            <div class="col">
                <h1><a href="manage_student.php?c_code=<?php echo $class_code ?>">Add Student</a></h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table text-center">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Father Name</th>
                                <th>Student Name</th>
                                <th>Addmission No</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($resArr) > 0) {
                                $sl_no = 1;
                                while ($resData = mysqli_fetch_assoc($resArr)) {
                                    $addmission_no = $resData['addmission_no'];
                                    // $addmission_no =>send by a Query
                                    // $class =  $resData['class'];
                            ?>
                                    <tr>
                                        <td><?php echo $sl_no; ?></td>
                                        <td><?php echo strtoupper($resData['father_name']); ?></td>
                                        <td><?php echo strtoupper($resData['name']); ?></td>
                                        <td><?php echo  "IIPS" . "<b>" . $resData['addmission_no'] . "</b>"; ?></td>
                                        <td>
                                            <?php if ($resData['status']) { ?>
                                                <a href="?id=<?php echo $addmission_no ?>&c_code=<?php echo $class_code ?>&type=deactive"><label class="badge badge-success hand_cursor ">Active</label></a>
                                            <?php } else { ?>
                                                <a href="?id=<?php echo $addmission_no ?>&c_code=<?php echo $class_code ?>&type=active"><label class="badge badge-light hand_cursor ">Deactive</label></a>
                                            <?php } ?>
                                            <a href="?id=<?php echo $addmission_no ?>&c_code=<?php echo $class_code?>&type=delete"><label class="badge badge-danger hand_cursor ">Delete</label></a>
                                            <a href="manage_student.php?id=<?php echo $addmission_no ?>&c_code=<?php echo $class_code?>"><label class="badge badge-info hand_cursor ">Edit</label></a>

                                        </td>
                                    </tr>
                            <?php $sl_no++;
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('bottom.php'); ?>