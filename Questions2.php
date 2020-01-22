<?php session_start();
require_once('connection.php');
require_once('sessionSet.php');
extract($_POST);
extract($_GET);
extract($_SESSION);
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
                                                <div class="card-header p-0 pt-1">
                                                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                                        <li class="nav-item"> <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">View All</a> </li>
                                                        <li class="nav-item"> <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Add New</a> </li>
                                                    </ul>
                                                </div>
                                                <!-- /.card-header -->
                                                <!-- Questions Div -->
                                                <div class="card-body">
                                                    <div class="tab-content" id="custom-tabs-one-tabContent">
                                                        <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="View All Questions">
                                                            <h3>Questions Place here</h3> </div>
                                                        <!--/tab-pane-->
                                                        <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="Add New Question">
                                                            <h3>Add New Question Place here</h3>
                                                            <div>
                                                                <link href="styles.css" rel="stylesheet" type="text/css" />
                                                                <!--Upload Question Form-->
                                                                <form action="upload.php" method="post" enctype="multipart/form-data"> Select image to upload:
                                                                    <input type="file" name="questionImg" id="questionImg">
                                                                    <input type="file" name="opt1" id="opt1">
                                                                    <input type="submit" value="Upload Image" name="submit"> </form>
                                                                <!--/ Upload Question Form-->
                                                            </div>
                                                        </div>
                                                        <!--/tab-pane-->
                                                    </div>
                                                    <!--/tab-content-->
                                                </div>
                                                <!-- /.card -->
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