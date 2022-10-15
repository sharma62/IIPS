<?php
include('top.php');
include('../database.inc.php');
include('../function.inc.php');
?>
<div class="row">
    <h1 class="card-title ml10">Student Details</h1>
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms">
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="studentName">Name</label>
                            <input type="text" class="form-control" placeholder="Name" value="jagdeep kr" disabled>
                        </div>
                        <div class="form-group col-4">
                            <label for="admission_no">Admission No.</label>
                            <input type="text" class="form-control" placeholder="Admission No." value="IIPSSTU0001" disabled>
                        </div>
                        <div class="form-group col-4">
                            <label for="class">Class</label>
                            <input type="text" class="form-control" placeholder="Class" value="class-1" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="Date_of_Brith">DOB</label>
                            <input type="text" class="form-control" placeholder="Date of Brith" value="11-jan-2000" disabled>
                        </div>
                        <div class="form-group col-4">
                            <label for="father_name">Father's Name</label>
                            <input type="text" class="form-control" placeholder="F_name" value="Sujeet Gupta" disabled>
                        </div>
                        <div class="form-group col-4">
                            <label for="mother_name">Mother's Name</label>
                            <input type="text" class="form-control" placeholder="M_name" value="Ana Gupta" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-4">
                            <label for="contactNo">contact no.</label>
                            <input type="text" class="form-control" placeholder="Date of Brith" value="9933665544" disabled>
                        </div>

                        <div class="form-group col-4">
                            <label for="Due_amount">Due_amount Rs</label>
                            <input type="text" class="form-control" placeholder="F_name" value="4522 /- " disabled>
                        </div>
                        <div class="form-group col-4 mt-4">
                            <!-- Trigger/Open The Modal -->
                            <button type="submit" class="btn btn-primary mr-2" name="submit" id="mybtn">Report card</button>
                            <!-- The Modal -->
                            <div id="myModal" class="modal">

                                <!-- Modal content -->
                                <div class="modal-content fade">
                                    <span class="close">&times;</span>
                                    <p>Some text in the Modal..</p>
                                </div>

                            </div>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary mr-2" name="submit">Submit</button>
                    <a class="btn btn-light" href="student_list.php">Cancel</a>
                </form>
            </div>
        </div>
    </div>

</div>
<?php include('bottom.php'); ?>