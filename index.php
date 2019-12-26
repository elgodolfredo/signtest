<?php session_start();
require_once('connection.php');
require_once('sessionSet.php');
?>
    <?php
if ($_SESSION['role'] == 'DEO') {
    ?>
        <script>
            function myFunction() {
                var x = document.getElementsByClassName("DEOHIDE");
                var i;
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
            }
        </script>
        <?php
    }
?>
            <?php
if ($_SESSION['role'] == 'Sign Tester') {
    ?>
                <script>
                    function myFunction() {
                        var x = document.getElementsByClassName("SIGNTESTERHIDE");
                        var i;
                        for (i = 0; i < x.length; i++) {
                            x[i].style.display = "none";
                        }
                    }
                </script>
                <?php
    }
?>
                    <!DOCTYPE html>
                    <html>
                    <!--Head-->
                    <?php include_once('Head.php')?>
                        <!--/Head-->
                        <!--Body-->

                        <body class="hold-transition sidebar-mini layout-fixed" onload="myFunction()">
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
                                                        <div class="col-lg-3 col-6">
                                                            <!-- small box -->
                                                            <div class="small-box bg-info">
                                                                <div class="inner">
                                                                    <h3>150</h3>
                                                                    <p>Today Passed</p>
                                                                </div>
                                                                <div class="icon"> <i class="ion ion-bag"></i> </div> <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> </div>
                                                        </div>
                                                        <!-- ./col -->
                                                        <div class="col-lg-3 col-6">
                                                            <!-- small box -->
                                                            <div class="small-box bg-success">
                                                                <div class="inner">
                                                                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                                                                    <p>Today Failed</p>
                                                                </div>
                                                                <div class="icon"> <i class="ion ion-stats-bars"></i> </div> <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> </div>
                                                        </div>
                                                        <!-- ./col -->
                                                        <div class="col-lg-3 col-6">
                                                            <!-- small box -->
                                                            <div class="small-box bg-warning">
                                                                <div class="inner">
                                                                    <h3>44</h3>
                                                                    <p>Absent</p>
                                                                </div>
                                                                <div class="icon"> <i class="ion ion-person-add"></i> </div> <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> </div>
                                                        </div>
                                                        <!-- ./col -->
                                                        <div class="col-lg-3 col-6">
                                                            <!-- small box -->
                                                            <div class="small-box bg-danger">
                                                                <div class="inner">
                                                                    <h3>65</h3>
                                                                    <p>Already Passed</p>
                                                                </div>
                                                                <div class="icon"> <i class="ion ion-pie-graph"></i> </div> <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> </div>
                                                        </div>
                                                        <!-- ./col -->
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