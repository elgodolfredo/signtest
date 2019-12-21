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
                                            <div class="col-12">
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
                <?php include ('footerPlugins.php')?>
            </body>
            <!--/Body-->

            </html>