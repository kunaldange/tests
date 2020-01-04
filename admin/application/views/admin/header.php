<?php
$page_name=basename($_SERVER['PHP_SELF']);
 // echo $page_name; die;
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>House of Thought | Dashboard </title>

    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <!-- Sweet Alert -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <!-- FooTable -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/footable/footable.core.css" rel="stylesheet">
    <!-- Multiple select -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">


</head>

<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="<?php echo base_url(); ?>assets/img/profile_small.jpg"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"><?php echo $this->session->admin_session['name']; ?></span>
                            <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="<?php echo site_url('Admin/profile'); ?>">Profile</a></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('Admin/change_password'); ?>">Change Password</a></li>

                            <!-- <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                            <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li> -->
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo site_url('Admin/logout'); ?>">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        H.O.T.
                    </div>
                </li>
                <li class="<?php if($page_name == "Admin"){ echo "active";} else{ echo "";} ?>">
                    <a href=""><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo site_url('Admin'); ?>">Dashboard</a></li>
                        <!-- <li><a href="#">Dashboard v.2</a></li> -->

                    </ul>
                </li>
                <li class="<?php if($page_name == "show_all_crystal"){ echo "active";} else{ echo "";} ?>">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Crystals</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="<?php if($page_name == "show_all_crystal"){ echo "active";} else{ echo "";} ?>"><a href="<?php echo site_url('Admin/show_all_crystal'); ?>">Show Crystals Info</a></li>
                        <li class="<?php if($page_name == "add_crystal"){ echo "active";} else{ echo "";} ?>"><a href="<?php echo site_url('Admin/add_crystal'); ?>">Add New Crystal</a></li>
                        <!-- <li><a href="#">Crystals Info</a></li>
                        <li><a href="#">Crystals Info</a></li>
                        <li><a href="#">Crystals Info</a></li> -->
                    </ul>
                </li>

                <li class="<?php if($page_name == "showColors"){ echo "active";} elseif ($page_name == "showChakra") { echo "active"; } elseif ($page_name == "showVices") { echo "active"; } elseif ($page_name == "showAspect") { echo "active"; } else{ echo "";} ?>">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Manage elements</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class=""><a href="<?php echo site_url('Admin/showColors'); ?>">Colors</a></li>
                        <li class=""><a href="<?php echo site_url('Admin/showChakra'); ?>">Chakra</a></li>
                        <li class=""><a href="<?php echo site_url('Admin/showVices'); ?>">Vices</a></li>
                        <li class=""><a href="<?php echo site_url('Admin/showAspect'); ?>">Aspect of life</a></li>
                        <li class=""><a href="<?php echo site_url('Admin/showZodiac'); ?>">Zodiac</a></li>

                    </ul>
                </li>

                <li class="<?php if($page_name == "allCustomers"){ echo "active";} else{ echo "";}?>">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Customers</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo site_url("Admin/allCustomers"); ?>">Customer Info</a></li>
                        <li class=""><a href="#">Orders</a></li>

                    </ul>
                </li>
                <li class="<?php if($page_name == "addYoutube"){ echo "active";} elseif($page_name == "custom_video"){echo "active";}elseif($page_name == "show_video"){echo "active";}else{ echo "";} ?>">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Video</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="<?php echo site_url("Admin/show_video"); ?>">Show Videos</a></li>
                        <li><a href="<?php echo site_url("Admin/custom_video"); ?>">Add Custom Video</a></li>
                        <li class="<?php if($page_name == "addYoutube"){ echo "active";}?>"><a href="<?php echo site_url('Admin/addYoutube'); ?>">Add Youtube Video</a></li>

                    </ul>
                </li>

            </ul>

        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
      <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
          <!-- <form role="search" class="navbar-form-custom" action="search_results.html">
            <div class="form-group">
              <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
            </div>
          </form> -->
        </div>
        <ul class="nav navbar-top-links navbar-right">
          <li>
              <span class="m-r-sm text-muted welcome-message">Welcome to House of Thought.</span>
          </li>
          <li>
            <a href="<?php echo site_url('Admin/logout'); ?>">
              <i class="fa fa-sign-out"></i> Log out
            </a>
          </li>
        </ul>
      </nav>
    </div>
