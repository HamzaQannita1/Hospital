<?php
require 'layouts/head.html';
?>

<!--**********************************
            Nav header start
        ***********************************-->
<?php
require 'layouts/navbar.html';
?>
<!--**********************************
            Nav header end
        ***********************************-->

<!--**********************************
            Header start
        ***********************************-->
<?php
require 'layouts/header.html';
?>
<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

<!--**********************************
            Sidebar start
        ***********************************-->
<?php
require 'layouts/sidrbar.html';
?>
<!--**********************************
            Sidebar end
        ***********************************-->

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <br>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Doctor Table</h4>
                <div class="table-responsive">
                    <!-- Button to add a new doctor -->
                    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addDoctorModal">Add Doctor</button>

                    <!-- Table -->
                    <table id="doctorTable" class="table table-bordered table-striped verticle-middle">
                        <thead>
                            <tr>
                                <th scope="col">Task</th>
                                <th scope="col">Progress</th>
                                <th scope="col">Deadline</th>
                                <th scope="col">Label</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Air Conditioner</td>
                                <td>
                                    <div class="progress" style="height: 10px">
                                        <div class="progress-bar gradient-1" style="width: 70%;" role="progressbar">
                                            <span class="sr-only">70% Complete</span>
                                        </div>
                                    </div>
                                </td>
                                <td>Apr 20, 2018</td>
                                <td><span class="label gradient-1 btn-rounded">70%</span></td>
                                <td>
                                    <span>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil color-muted m-r-5"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="Close"><i class="fa fa-close color-danger"></i></a>
                                    </span>
                                </td>
                            </tr>
                            <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

  
    <!-- #/ container -->

</div>
<!--**********************************
            Content body end
        ***********************************-->

<!-- Modal for adding a doctor -->
<div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDoctorModalLabel">Add New Doctor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="database\doctorDB.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doctorName">Doctor Name</label>
                                <input type="text" class="form-control" id="doctorName" name="name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doctorEmail">Email</label>
                                <input type="email" class="form-control" id="doctorEmail" name="email" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="doctorPassword">Password</label>
                                <input type="password" class="form-control" id="doctorPassword" name="password" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="specialty">Specialty</label>
                                <input type="text" class="form-control" id="specialty" name="specialty" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add Doctor</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Alert for success -->
<?php
if (isset($_SESSION['status'])) {
    $alertType = ($_SESSION['status'] === 'success') ? 'alert-success' : 'alert-danger';
    echo '
    <div class="alert ' . $alertType . ' alert-dismissible fade show mt-3" role="alert">
        ' . $_SESSION['message'] . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
    // احذف الرسالة بعد عرضها
    unset($_SESSION['status']);
    unset($_SESSION['message']);
}
?>




<!--**********************************
            Footer start
        ***********************************-->
<?php
require 'layouts/footer.html';
?>
<!--**********************************
            Footer end
        ***********************************-->
</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<?php
require 'layouts/js.html';
?>
