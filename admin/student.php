<?php
include('top.php');

$query_arr = explode("=", $_SERVER["QUERY_STRING"]);
$queryLast_ele = explode("_", $query_arr[2]);
// prx($queryLast_ele[1]);

try {

    $class_code = $_GET['class_code'];
    if ((isset($_GET['type']) && $_GET['type'] !== '') && isset($_GET['addmission_no']) && isset($_GET['addmission_no']) > 0) {

        // $stu_addmission_no => fatch and use from URL
        $stu_addmission_no = get_safe_value($_GET['addmission_no']);
        $type = get_safe_value($_GET['type']);

        if ($type == 'delete') {
            mysqli_query($con, "DELETE FROM class_1 WHERE addmission_no ='$stu_addmission_no'");
        }

        if ($type == 'active' || $type == 'deactive') {
            $status = 1;
            if ($type == 'deactive') {
                $status = 0;
            }
            mysqli_query($con, "UPDATE class_1 SET status = '$status' WHERE addmission_no = '$stu_addmission_no'");
        }
    }

    $sql = "SELECT * FROM class_1 c1 INNER JOIN class_master cm ON c1.class_code = cm.class_code where cm.class_code = '$class_code'";
    $query = mysqli_query($con, $sql);
    $query_num_row = mysqli_num_rows($query);
} catch (Exception $e) {
    echo "Error code: " . $e->getCode();
}
?>

<div class="card">
    <div class="card-body">
        <a class="btn btn-dark" href="class.php">Back</a>
        <h1 class="text-center"> <span style="color:cadetblue">
                <?php
                if ($queryLast_ele[1] == 1) {
                    $class_sub_title = "<sup>st</sup>";
                } else if ($queryLast_ele[1] == 2) {
                    $class_sub_title = "<sup>nd</sup>";
                } else if ($queryLast_ele[1] == 3) {
                    $class_sub_title = "<sup>rd</sup>";
                } else {
                    $class_sub_title = "<sup>th</sup>";
                }
                // prx($class_sub_title);
                echo "Class " . $queryLast_ele[1] . $class_sub_title ?></span>
            <h4><?php  # echo strtolower($_GET['name']); 
                ?></h4>
        </h1>
        <hr>
        <div class="row py-4">
            <div class="col">
                <h1><a href="manage_student.php?class_code=<?php echo $class_code ?>">Add Student</a></h1>
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
                            <?php if ($query_num_row > 0) {
                                $s_no = 1;
                                while ($query_assoc_arr = mysqli_fetch_assoc($query)) {
                            ?>

                                    <tr>
                                        <td><?php echo $s_no; ?></td>
                                        <td><?php echo strtoupper($query_assoc_arr['father_name']); ?></td>
                                        <td><?php echo strtoupper($query_assoc_arr['name']); ?></td>
                                        <td><?php echo "IIPS" . strtoupper($query_assoc_arr['addmission_no']); ?></td>
                                        <td>
                                            <?php if ($query_assoc_arr['status']) { ?>
                                                <a href="?addmission_no=<?php echo $query_assoc_arr['addmission_no'] ?>&class_code=<?php echo $class_code ?>&type=deactive"><label class="badge badge-success hand_cursor ">Active</label></a>
                                            <?php } else { ?>
                                                <a href="?addmission_no=<?php echo $query_assoc_arr['addmission_no'] ?>&class_code=<?php echo $class_code ?>&type=active"><label class="badge badge-light hand_cursor ">Deactive</label></a>
                                            <?php } ?>

                                            <a href="?addmission_no=<?php echo $query_assoc_arr['addmission_no'] ?>&class_code=<?php echo $class_code ?>&type=delete"><label class="badge badge-danger hand_cursor ">Delete</label></a>
                                            <a href="manage_student.php?addmission_no=<?php echo $query_assoc_arr['addmission_no'] ?>&class_code=<?php echo $class_code ?>"><label class="badge badge-info hand_cursor ">Edit / view</label></a>

                                        </td>
                                    </tr>

                            <?php $s_no++;
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include('bottom.php') ?>