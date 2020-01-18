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
                            
                            $candidateToken = CleanData($_POST['tokenfortest']);
                            
                        
                            $fetchCandidateDataQ = "SELECT * FROM candidates WHERE token='$candidateToken' ORDER BY entrydate DESC";
                            $fetchCandidateDataQR = mysqli_query($con,$fetchCandidateDataQ);
	
	                       $fetchCandidateDataNum = mysqli_num_rows($fetchCandidateDataQR);
	
	                       if($fetchCandidateDataNum>0)
	                           {
		                          $candidateDataObject = mysqli_fetch_object($fetchCandidateDataQR);

                                    $_SESSION['candidateID'] = $candidateDataObject->id;
                                    $_SESSION['candidateName'] = $candidateDataObject->name;
                                    $_SESSION['candidateToken'] = $candidateDataObject->token;
                                    $_SESSION['candidateCNIC'] = $candidateDataObject->cnic;
                                    $_SESSION['candidateLearnerPermitNo'] = $candidateDataObject->lpdate;
                                    $_SESSION['candidateLicenseCategory'] = $candidateDataObject->liccat;
                                ?>
<script>
    window.location.href = 'takeExam.php';

</script>
<?php
		
	                           }
	                           else
	                           {
		                          ?>
<script>
    alert('Token Not Found');

</script>
<?php
                                }

                        }
                            
                        ?>
<!--/ PHP Code: Token Entery -->
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
                                    <h3 class="card-title">Enter Candidate Token #</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form class="needs-validation" role="form" method="post" action="tokenfortest.php" novalidate>
                                    <div class="card-body">
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <label for="InputCNIC">Token #</label>
                                                <input type="number" class="form-control" id="InputToken" placeholder="Token number of Candidate" name="tokenfortest" required> <small id="passwordHelpBlock" class="text-muted">
                                                    Token # should be in Numbers.
                                                </small>
                                                <div class="invalid-feedback"> Please Enter Valid Token Number </div>
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
