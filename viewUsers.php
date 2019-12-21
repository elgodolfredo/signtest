<?php session_start();
require_once('connection.php');
require_once('sessionSet.php');
?>
    <!-- Only Admin Can Add User-->
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
            setTimeout(function () {
                window.location.href = 'index.php';
            }, 50000);
        </script>
        <?php
                                    die();
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

            <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <title>Sign Test CTPF | Dashboard</title>
                <!-- Tell the browser to be responsive to screen width -->
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- Font Awesome -->
                <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
                <!-- Ionicons -->
                <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
                <!-- Tempusdominus Bbootstrap 4 -->
                <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
                <!-- iCheck -->
                <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
                <!-- JQVMap -->
                <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
                <!-- Theme style -->
                <link rel="stylesheet" href="dist/css/adminlte.min.css">
                <!-- overlayScrollbars -->
                <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
                <!-- Daterange picker -->
                <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
                <!-- summernote -->
                <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
                <!-- Google Font: Source Sans Pro -->
                <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> </head>
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
                                                <h1 class="m-0 text-dark">Dashboard</h1> </div>
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
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table id="example1" class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Sr No.</th>
                                                                    <th>Full Name</th>
                                                                    <th>Email</th>
                                                                    <th>Password</th>
                                                                    <th>Role</th>
                                                                    <th>Date Created</th>
                                                                    <th>Action</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                    $Serial=0;

                                                                    $GetStockQ = "SELECT * FROM users";

                                                                     $GetStockQR = mysqli_query($con,$GetStockQ);

                                                                     $GetStockNR = mysqli_num_rows($GetStockQR);

                                                                     if($GetStockNR>0)
                                                                     {
                                                                         while($GetStockRow = mysqli_fetch_assoc($GetStockQR))
                                                                         {

                                                                             $Serial++;
                                                                             $userID=$GetStockRow['id'];
                                                                             $userFullName=$GetStockRow['username'];
                                                                             $userEmail = $GetStockRow['email'];
                                                                             $userPassword = $GetStockRow['password'];
                                                                             $userRole = $GetStockRow['role'];
                                                                             $creationDate = $GetStockRow['date'];

                                                                ?>
                                                                    <tr>
                                                                        <td>
                                                                            <?php echo $Serial ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $userFullName ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $userEmail  ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $userPassword ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $userRole ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php echo $creationDate ?>
                                                                        </td>
                                                                        <td> <a class="btn btn-block btn-outline-primary" href="editUser.php?userID=<?php echo $userID; ?>"> Edit</a> </td>
                                                                        <td>
                                                                            <button class="btn btn-block btn-outline-danger" data-href="deleteUser.php?userID=<?php echo $userID; ?>" data-toggle="modal" data-target="#confirm-delete"> Delete</button>
                                                                        </td>
                                                                    </tr>
                                                                    <?php
                            }//while loop ends here
                     }//if ends here
                            ?>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <th>Sr No.</th>
                                                                    <th>Full Name</th>
                                                                    <th>Email</th>
                                                                    <th>Password</th>
                                                                    <th>Role</th>
                                                                    <th>Date Created</th>
                                                                    <th>Action</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                    <!-- /.card-body -->
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
                <!--Model for Delete User-->
                <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"> CTP Faisalabad </div>
                            <div class="modal-body"> want to delete ? </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> <a class="btn btn-danger btn-ok">Delete</a> </div>
                        </div>
                    </div>
                </div>
                <!--/ Model for Delete User-->
                <!--Model for Edit User-->
                <div class="modal fade" id="confirm-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header"> CTP Faisalabad </div>
                            <div class="modal-body">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit User</h3> </div>
                                    <!-- /.card-header -->
                                    <!--Fetch User Data-->
                                    <?php  
                                    if(isset($_GET['userID']))
                                    {
                                        $complaintID =  $_GET['userID'];
                                        $complaintDataQ = "select * from users where id='$complaintID'";
                                        $complaintDataQR = mysqli_query($con,$complaintDataQ);
                                        $complaintDataRow = mysqli_fetch_assoc($complaintDataQR);
                                        $userID=$complaintDataRow['id'];
                                        $userFullName=$complaintDataRow['username'];
                                        $userEmail = $complaintDataRow['email'];
                                        $userPassword = $complaintDataRow['password'];
                                        $userRole = $complaintDataRow['role'];
                                    }      

                                ?>
                                        <!-- form start -->
                                        <form role="form" method="post" action="addUsers.php">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label for="InputEmail">User Name</label>
                                                    <input type="text" class="form-control" id="InputEmail" placeholder="Enter User Name" name="email" value="<?php echo $userEmail; ?>"> </div>
                                                <div class="form-group">
                                                    <label for="InputFullName">Full Name</label>
                                                    <input type="text" class="form-control" id="InputFullName" placeholder="Enter email" name="username" value="<?php echo $userFullName; ?>"> </div>
                                                <div class="form-group">
                                                    <label for="InputPassword">Password</label>
                                                    <input type="text" class="form-control" id="InputPassword" placeholder="Password" name="password" value="<?php echo $userPassword; ?>"> </div>
                                                <div class="form-group">
                                                    <label for="InputRole">Role</label>
                                                    <select class="form-control" id="InputRole" name="role">
                                                        <option selected="selected" data-select2-id="1" value="DEO">Data Entry Operator</option>
                                                        <option data-select2-id="2" value="Sign Tester">Sign Tester</option>
                                                    </select>
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
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> <a class="btn btn-danger btn-ok">Delete</a> </div>
                        </div>
                    </div>
                </div>
                <!--/Model for Edit User-->
                <?php include ('footerPlugins.php')?>
                    <!-- DataTables -->
                    <script src="plugins/datatables/jquery.dataTables.js"></script>
                    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
                    <script>
                        $(function () {
                            $("#example1").DataTable();
                            $('#example2').DataTable({
                                "paging": true
                                , "lengthChange": false
                                , "searching": false
                                , "ordering": true
                                , "info": true
                                , "autoWidth": false
                            , });
                        });
                    </script>
                    <script>
                        $('#confirm-delete').on('show.bs.modal', function (e) {
                            $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
                        });
                    </script>
            </body>
            <!--/Body-->

            </html>