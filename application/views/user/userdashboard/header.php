<?php 
$session = $this->session->userdata('username'); 
$datasesi = $this->produk_model->findCus($session)

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Dashboard</title>
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>[ Diger</span> Komp ]</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">



				<img src="<?php echo base_url('foto_profil/');echo $datasesi->image; ?>" class="img-responsive" alt="">
			




			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?php echo $datasesi->first_name ?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class=""><a href="<?php echo site_url('home/userdashboard')?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class=""><a href="<?php echo site_url('home/shop')?>"><em class="fa fa-cog">&nbsp;</em> shop</a></li>
			<li class=""><a href="<?php echo site_url('home/orderku') ?>"><em class="fa fa-shopping-cart">&nbsp;</em> Order Ku</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-dollar ">&nbsp;</em> My Invoice <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="<?php echo base_url('home/cekInvoice'); ?>">
						<span class="f">&nbsp;</span> Show Invoice
					</a></li>
					<li><a class="" href="<?php echo base_url('home/Invoice'); ?>">
						<span class="">&nbsp;</span> All Invoice
					</a></li>
				</ul>
			</li>
			<li class=""><a href="<?php echo site_url('home/userProfil')?>"><em class="fa fa-cog">&nbsp;</em> Setting</a></li>
			<li><a href="<?php echo base_url('home/logout') ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->