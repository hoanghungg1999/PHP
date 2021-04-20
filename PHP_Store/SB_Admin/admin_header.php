<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="shortcut icon" href="../img\favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Fontawesome css -->
    <link rel="stylesheet" href="../css1\font-awesome.min.css">
    <!-- Ionicons css -->
    <link rel="stylesheet" href="../css1\ionicons.min.css">
    <!-- linearicons css -->
    <link rel="stylesheet" href="../css1\linearicons.css">
    <!-- Nice select css -->
    <link rel="stylesheet" href="../css1\nice-select.css">
    <!-- Jquery fancybox css -->
    <link rel="stylesheet" href="../css1\jquery.fancybox.css">
    <!-- Jquery ui price slider css -->
    <link rel="stylesheet" href="../css1\jquery-ui.min.css">
    <!-- Meanmenu css -->
    <link rel="stylesheet" href="../css1\meanmenu.min.css">
    <!-- Nivo slider css -->
    <link rel="stylesheet" href="../css1\nivo-slider.css">
    <!-- Owl carousel css -->
    <link rel="stylesheet" href="../css1\owl.carousel.min.css">
    <!-- Bootstrap css -->
    <link rel="stylesheet" href="../css1\bootstrap.min.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="../css1\default.css">
    <!-- Main css -->
    <link rel="stylesheet" href="../style.css">
    <!-- Responsive css -->
    <link rel="stylesheet" href="../css1\responsive.css">
    
    
    <title>The Car Company Dashboard</title>
    <link rel="stylesheet" href="../css1/bootstrap.min.css">
    <link rel="stylesheet" href="../css1/bootstrap.css">
    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="../css1/sb-admin-2.min.css" rel="stylesheet">
    <?php
        function messagebox($message) {
            echo "<script>alert('$message');</script>";
        }
        require_once('../models/login_class.php');
        if(isset($_GET['id'])){
            $id = substr($_GET['id'],-1);
            if($id==0){
                header('Location: ../index.php');
            }else{
                $data = Admin_Login::get_admin_info($id);
                foreach($data as $info){
                }
            }
        }else       
    ?>
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Welcome <sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php?id=<?php echo $id;?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin & Custommer
            </div>

            <li class="nav-item">
                <a class="nav-link" href="tables.php?id=permission<?php echo $id; ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Manage Permission</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php?id=customer<?php echo $id; ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Manage Customer</span></a>
            </li>

           <li class="nav-item">
                <a class="nav-link" href="tables.php?id=contact<?php echo $id; ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Manage Contact</span></a>
            </li>
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Website Data
            </div>

            <li class="nav-item">
                <a class="nav-link" href="tables.php?id=product<?php echo $id; ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Manage Product</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="tables.php?id=order<?php echo $id; ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Manage Order</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="tables.php?id=type<?php echo $id; ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Manage Type</span></a>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="tables.php?id=category<?php echo $id; ?>">
                <i class="fas fa-fw fa-table"></i>
                <span>Manage Category</span></a>
            </li>

            

            <!-- Nav Item - Tables -->
            

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $info['HoTen']; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
