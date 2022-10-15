<?php 
include('top.php');
 
$query=mysqli_query($con," select * from class_master ");
$query_row = mysqli_num_rows($query);
?>


<div class="card">
    <div class="card-body">
        <h1 class="card_title text-center">Class List</h1>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table id="order-listing" class="table text-center">
                        <thead>
                            <tr>
                                <th>S.NO</th>
                                <th>Class</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($query_row >0){
                                $i = 1;
                                while($query_data = mysqli_fetch_assoc($query)){?>
                            <tr>
                                <td><?php echo $i;?></td>
                                <td style="font-weight: bolder"><?php echo strtoupper($query_data['class']);?></td>
 
                                <td>
                                     <a href="student.php?class_code=<?php echo $query_data['class_code']?>&class_name=<?php echo $query_data['class']?>"><label class="badge badge-info hand_cursor ">List >></label></a>
                                 </td>

                            </tr>
                         <?php $i++; }
                         }
                         ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('bottom.php') ?>