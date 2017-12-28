<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Panel</title>
	<meta name="keywords" content="Admin Panel"/>
	<meta name="description" content="Admin Panel"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?=ASSETS_IMAGE?>icon.png" type="image/x-icon" />

	<script type="text/javascript" src="<?=ASSETS_JS?>jquery-1.10.1.min.js"></script>
	<!-- <script type="text/javascript" src="<?=ASSETS_JS?>bootstrap.js"></script> -->
	<script type="text/javascript" src="<?=base_url()?>assets/plugins/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?=ASSETS_JS?>respond.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?=ASSETS_CSS?>bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?=ASSETS_CSS?>bootstrap-theme.css">
	<link rel="stylesheet" type="text/css" href="<?=ASSETS_CSS?>docs.min.css">
	<link rel="stylesheet" type="text/css" href="<?=ASSETS_CSS?>tree.css">

	<link rel="stylesheet" type="text/css" href="<?=ASSETS_OTHER?>src/css/jscal2.css" />
	<link rel="stylesheet" type="text/css" href="<?=ASSETS_OTHER?>src/css/border-radius.css" />
	 <link rel="stylesheet" type="text/css" href="<?=ASSETS_OTHER?>src/css/gold/gold.css" />

	  <!-- SB Admin CSS -->
	  <link href="<?=ASSETS_SBADMIN?>vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
	  <link href="<?=ASSETS_SBADMIN?>dist/css/sb-admin-2.css" rel="stylesheet">
	  <link href="<?=ASSETS_SBADMIN?>vendor/morrisjs/morris.css" rel="styleshet">
	  <link href="<?=ASSETS_SBADMIN?>vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

  </head>
  <body>	
   <div id="wrapper">
   	 <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php base_url();?>">Arfaknews</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right"> 
                <li class="view-website"><a href="<?php base_url();?>" target=_"blank" class="btn btn-success">View Website</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?=base_url()?>login/change_password"><i class="fa fa-gear fa-fw"></i> Ganti Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="#logout" data-toggle="modal"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <?php
	 $this->load->view('global/sidebar.php');
	?>

        </nav>