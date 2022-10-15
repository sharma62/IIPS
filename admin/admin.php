<?php
include('top.php');
 

if (isset($_GET['id']) && isset($_GET['id']) > 0 && (isset($_GET['type']) && $_GET['type'] !== '')) {
    $id = get_safe_value($_GET['id']);
    $type = get_safe_value($_GET['type']);

    if ($type == 'delete') {
        mysqli_query($con, "DELETE FROM admin WHERE id = '$id' ");
        redirect('admin.php');
    }

    if ($type == 'active' || $type == 'deactive') {
        $status = 1;
        if ($type == 'deactive') {
            $status = 0;
        }
        mysqli_query($con, "UPDATE admin SET status = '$status' WHERE id = '$id'");
    }
}
$query  = mysqli_query($con, "select * from admin");
$query_rows =  mysqli_num_rows($query);



?>
<div class="card">
    <div class="card-body">
        <h1 class="card_title"><a href="manage_admin.php" class="add_link">Add Admin</a></h1>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive ">
                    <table id="order-listing" class="table text-center">
                        <thead>
                            <tr >
                                <th>S.No</th>
                                <th>Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>password</th>
                                 <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($query) > 0) {
                                $count = 1;
                                while ($data_row = mysqli_fetch_assoc($query)) { ?>
                                    <tr>
                                        <td style="width: 5%;"><?php echo $count ?></td>
                                        <td style="font-weight: bolder;"><?php echo strtoupper(($data_row['name'])) ?></td>
                                        <td><?php echo $data_row['username'] ?></td>
                                        <td><?php echo $data_row['email'] ?></td>
                                        <td><?php echo $data_row['password'] ?></td>
 
                                        <td>
                                            <?php if ($data_row['status']) { ?>
                                                <a href="?id=<?php echo $data_row['id'] ?>&type=deactive"><label class="badge badge-success hand_cursor ">Active</label></a>
                                            <?php } else { ?>
                                                <a href="?id=<?php echo $data_row['id'] ?>&type=active"><label class="badge badge-light hand_cursor ">Deactive</label></a>
                                            <?php } ?>
                                            <a href="?id=<?php echo $data_row['id'] ?>&type=delete"><label class="badge badge-danger hand_cursor ">Delete</label></a>
                                            <a href="manage_admin.php?id=<?php echo $data_row['id']?>"><label class="badge badge-info hand_cursor ">Edit</label></a>
                                        </td>
                                    </tr>
                            <?php $count++;
                                }
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
<?php include('bottom.php'); ?>