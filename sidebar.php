<?php
$userName = $_SESSION['Name'];
        $userEmail = $_SESSION['Email'];
        $userRole = $_SESSION['role'];
        
        ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link"> <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> <span class="brand-text font-weight-light"><?php echo $userRole ?> Login</span> </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image"> <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?php echo $userName; ?>
                </a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <!--Add Candidate-->
                <li class="nav-item has-treeview SIGNTESTERHIDE">
                    <a href="#" class="nav-link active"> <i class="nav-icon far fa-plus-square"></i>
                        <p> Add Candidate </p>
                    </a>
                </li>
                <!--/Add Candidate-->
                <!--Take Test-->
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link"> <i class="nav-icon fas fa-chart-pie"></i>
                        <p> Take Test <i class="right fas fa-angle-left"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p>Sign Test</p>
                            </a>
                        </li>
                        <li class="nav-item SIGNTESTERHIDE">
                            <a href="#" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p>Road Test</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ Take Test-->
                <!--Change Status-->
                <li class="nav-item has-treeview DEOHIDE SIGNTESTERHIDE">
                    <a href="#" class="nav-link"> <i class="nav-icon fas fa-tree"></i>
                        <p> Change Status <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/UI/general.html" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p>Fail to Pass</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/UI/icons.html" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p>Pass to Fail</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/ Change Status-->
                <!--Duplicate Token-->
                <li class="nav-item has-treeview SIGNTESTERHIDE">
                    <a href="#" class="nav-link"> <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p> Duplicate Token </p>
                    </a>
                </li>
                <!--/Duplicate Token-->
                <!--Reports-->
                <li class="nav-item has-treeview SIGNTESTERHIDE">
                    <a href="#" class="nav-link"> <i class="nav-icon fas fa-edit"></i>
                        <p> Reports <i class="fas fa-angle-left right"></i> </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/forms/general.html" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p>Today</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/advanced.html" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p>Weekly</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/editors.html" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p>Monthly</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/forms/validation.html" class="nav-link"> <i class="far fa-circle nav-icon"></i>
                                <p>Commercial / Non Commercial</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--/Reports-->
                <!--Print CNIC Data-->
                <li class="nav-item has-treeview SIGNTESTERHIDE">
                    <a href="#" class="nav-link"> <i class="nav-icon fas fa-print"></i>
                        <p> CNIC Data </p>
                    </a>
                </li>
                <!--/Print CNIC Data-->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
