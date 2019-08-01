<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard Admin</title>
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
				<a class="navbar-brand" ><span>[ Biger</span> Komp ]</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">ADMIN</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li class="parent"><a href="<?php echo base_url('home/admin') ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li class="parent"><a href="<?php echo base_url('home/orderan') ?>"><em class="fa fa-shopping-cart">&nbsp;</em> Order</a></li>
			<li class="parent"><a href="<?php echo base_url('home/allCs') ?>"><em class="fa fa-slack">&nbsp;</em> Customers</a></li>
			<li class="parent"><a href="<?php echo base_url('home/admInvoice') ?>"><em class="fa fa-slack">&nbsp;</em> Invoice</a></li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
				<em class="fa fa-cubes fa ">&nbsp;</em> Product List <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-2">
					<li><a class="" href="<?php echo base_url('home/addproduk') ?>">
						<span class="">&nbsp;</span> Add Product
					</a></li>
					<li><a class="" href="<?php echo base_url('home/showproduct') ?>">
						<span class="">&nbsp;</span> All product
					</a></li>
				</ul>
			</li>
			

			<li class="parent "><a data-toggle="collapse" href="#sub-item-4">
				<em class="fa fa-users">&nbsp;</em> Vendor List <span data-toggle="collapse" href="#sub-item-4" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-4">
					<li><a class="" href="<?php echo base_url('home/allvendor') ?>">
						<span class="">&nbsp;</span> All Vendor
					</a></li>
					<li><a class="" href="<?php echo base_url('home/addvendor') ?>">
						<span class="">&nbsp;</span> Add Vendor
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-5">
				<em class="fa fa-sitemap">&nbsp;</em> Categori List <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-5">
					<li><a class="" href="<?php echo base_url('home/showkategori') ?>">
						<span class="">&nbsp;</span> All Category
					</a></li>
					<li><a class="" href="<?php echo base_url('home/addkategori') ?>">
						<span class="">&nbsp;</span> Add Category
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-6">
				<em class="fa fa-slack">&nbsp;</em> Brand List <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-6">
					<li><a class="" href="<?php echo base_url('home/showbrand') ?>">
						<span class="">&nbsp;</span> All Brand
					</a></li>
					<li><a class="" href="<?php echo base_url('home/addbrand') ?>">
						<span class="">&nbsp;</span> Add Brand
					</a></li>
				</ul>
			</li>
			<li class="parent "><a data-toggle="collapse" href="#sub-item-7">
				<em class="fa fa-slack">&nbsp;</em> Transaksi List <span data-toggle="collapse" href="#sub-item-5" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-7">
					<li><a class="" href="<?php echo base_url('home/showtransaksi') ?>">
						<span class="">&nbsp;</span> All Transaksi
					</a></li>
					<li><a class="" href="<?php echo base_url('home/addtransaksi') ?>">
						<span class="">&nbsp;</span> Add Transaksi
					</a></li>
				</ul>
			</li>
			<li><a href="<?php echo base_url('home/logout') ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->