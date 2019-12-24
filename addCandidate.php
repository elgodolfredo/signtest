<?php session_start();
require_once('connection.php');
require_once('sessionSet.php');
?>
<!-- Only Admin Can Add User-->
<?php
if ($_SESSION['role'] !== 'Admin') {
    ?>
<script>
    setTimeout(function() {
        window.location.href = 'index.php';
    });

</script>
<?php
    }
?>
<!-- PHP Code: add User -->
<?php
                        if(isset($_POST['submit']))
                        {
                            
                            $userEmail = CleanData($_POST['email']);
                            $userName = CleanData($_POST['username']);	
                            $userRole = CleanData($_POST['role']);
                            $userPassword = CleanData($_POST['password']);
                        
                            $regComplaintQ = "INSERT INTO users(username,email,password,role) VALUES('$userName','$userEmail','$userPassword','$userRole')";
                            $regComplaintQR = mysqli_query($con,$regComplaintQ);

                                if($regComplaintQR)
                                {       
                                    echo "<center><h3>User Added <span style='color: green;'>Successfully</h3></center>";
                                    ?>
<script>
    setTimeout(function() {
        window.location.href = 'viewUsers.php';
    }, 2000);

</script>
<?php
                                }
                                else
                                {
                                    echo mysqli_error($con);
                                    echo "<h3 class='text-center'>Try Again.</h3>";
                                }

                            }
                        ?>
<!--/ PHP Code: add User -->
<!DOCTYPE html>
<html>
<!--Head-->
<?php include('Head.php')?>
<!--/Head-->
<!--Body-->

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include('topNav.php') ?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <?php include ('sidebar.php')?>
        <!--/ Main Sidebar Container-->
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-12">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add Candidate Basic Details</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form class="needs-validation" role="form" method="post" action="addUsers.php" novalidate>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="InputCNIC">CNIC</label>
                                                <input type="number" class="form-control" id="InputCNIC" placeholder="13 Digits without dash" name="candidatecnic" required> <small id="passwordHelpBlock" class="text-muted">
                                                    CNIC should be 13 digits without dashes eg. 3310221557297
                                                </small>
                                                <div class="invalid-feedback"> Please Enter 13 digits CNIC without dashes </div>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="InputFullName">Full Name</label>
                                                <input type="text" class="form-control" id="InputFullName" placeholder="Candidate Full Name" name="candidatename" required>
                                                <div class="invalid-feedback"> Please Enter Candidate Name </div>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="InputFullName">Father Name</label>
                                                <input type="text" class="form-control" id="InputFatherName" placeholder="Candidate Father Name" name="candidatefathername" required>
                                                <div class="invalid-feedback"> Please Enter Candidate's Father Name </div>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="InputPassword">Email</label>
                                                <input type="email" class="form-control" id="InputEmail" placeholder="Candidate Email" name="candidateemail">
                                                <div class="invalid-feedback"> Please enter a valid Email Address </div>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="InputPhone">Contact No</label>
                                                <input type="number" class="form-control" id="InputPhone" placeholder="Candidate Phone" name="candidatephone" required><small id="passwordHelpBlock" class="text-muted">
                                                    Phone Number should be 11 digits starts with 0 eg. 03217654321
                                                </small>
                                                <div class="invalid-feedback"> Please Enter a Valid Phone Number </div>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="InputBlood">Blood Group</label>
                                                <select class="form-control" id="InputBlood" name="bloodgroup" required>
                                                    <option value="A+">A+</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="B+">B+</option>
                                                    <option value="O+">O+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="B-">B-</option>
                                                    <option value="O-">O-</option>
                                                </select>
                                                <div class="invalid-feedback"> Please choose blood group </div>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="InputPassword">Address</label>
                                                <input type="text" class="form-control" id="InputAddress" placeholder="Candidate Address" name="candidateaddress" required><small id="passwordHelpBlock" class="text-muted">
                                                    Maximum Strength for Address is 150 Characters
                                                </small>
                                                <div class="invalid-feedback"> Please Enter. </div>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-3">
                                                <label for="InputPassword">Learner Permit No.</label>
                                                <input type="text" class="form-control" id="InputLPno" placeholder="Learner Permit Number" name="candidatelpno" required> <small id="passwordHelpBlock" class="text-muted">
                                                    Enter first Learner No here in case of renewal
                                                </small>
                                                <div class="invalid-feedback">Please Enter Learner Permit No </div>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="InputPassword">Learner Permit Issue Date</label>
                                                <input type="text" class="form-control" id="InputLPdate" placeholder="Learner Permit Date" name="candidatelpdate" required> <small id="passwordHelpBlock" class="text-muted">
                                                    Enter first Learner's issue date in case of renewal
                                                </small>
                                                <div class="invalid-feedback"> Please Enter Learner Permit Issue Date </div>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="InputPassword">License Category</label>
                                                <select class="form-control" id="InputBlood" name="licensecategory" required>
                                                    <option value="M/Cycle">M/Cycle</option>
                                                    <option value="Car">Car</option>
                                                    <option value="M/Cycle+Car">M/Cycle+Car</option>
                                                    <option value="Tractor Agriculture">Tractor Agriculture</option>
                                                    <option value="M/Cycle+Car+Tractor Agriculture">M/Cycle+Car+Tractor Agriculture</option>
                                                    <option value="Tractor Commercial">Tractor Commercial</option>
                                                    <option value="LTV">LTV</option>
                                                    <option value="M/Cycle+LTV">M/Cycle+LTV</option>
                                                    <option value="M/Cycle+LTV+Tractor Commercial">M/Cycle+LTV+Tractor Commercial</option>
                                                    <option value="HTV">HTV</option>
                                                    <option value="HTV(Psv)">HTV(Psv)</option>
                                                    <option value="LTV(Psv)">LTV(Psv)</option>
                                                    <option value="Rikshaw">Rikshaw</option>
                                                    <option value="M/Cycle+Rikshaw">M/Cycle+Rikshaw</option>
                                                    <option value="Invalid Carriage">Invalid Carriage</option>
                                                </select>
                                                <div class="invalid-feedback"> Please choose License Category </div>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="InputTicketCost">Ticket Cost</label>
                                                <input type="text" class="form-control" id="InputTicketCost" placeholder="Tickets Cost" name="candidateticketcost" required>
                                                <div class="invalid-feedback"> Please Enter Tickets Cost </div>
                                                <div class="valid-feedback"> Looks good! </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                    </div>
                                    <!--/.card-footer-->
                                </form>
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!--custome validation-->
        <script>
            // Example starter JavaScript for disabling form submissions if there are invalid fields
            (function() {
                'use strict';
                window.addEventListener('load', function() {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.getElementsByClassName('needs-validation');
                    // Loop over them and prevent submission
                    var validation = Array.prototype.filter.call(forms, function(form) {
                        form.addEventListener('submit', function(event) {
                            if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                            }
                            form.classList.add('was-validated');
                        }, false);
                    });
                }, false);
            })();

        </script>
        <!--/validation-->
        <!--Footer Content-->
        <?php include ('footer.php')?>
        <!--/Footer Content-->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    <?php include ('footerPlugins.php')?>
</body>
<!--/Body-->

</html>
