<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Vendor</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Vendor</h1>
			</div>
		</div><!--/.row-->

	<div class="panel">
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">Inputs</div>
						<div class="panel-body">
							<form class="form-horizontal row-border" action="<?php echo base_url('home/editproses') ?>" enctype="multipart/form-data" method="POST">
								<div class="form-group">
									<input type="text" name="seleksi" hidden="" value="vendor">
									<input type="text" name="idk" hidden="" value="<?php echo $where->id_vendor ?>">
									<label class="col-md-2 control-label">Nama Vendor / PT</label>
									<div class="col-md-10">
										<input type="text" name="nama" class="form-control" required="" value="<?php echo $where->nama ?>" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">e-mail</label>
									<div class="col-md-10">
										<input class="form-control" type="e-mail" name="email" required="" value="<?php echo $where->email ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Alamat</label>
									<div class="col-md-10">
										<textarea class="form-control" name="alamat" required="" ><?php echo $where->alamat ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">No Telp</label>
									<div class="col-md-10">
										<input class="form-control" type="text" name="telp" required="" value="<?php echo $where->no_telp ?>"> 
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label"></label>
									<div class="col-md-10">
										<input  type="submit" name="ok" class="btn btn-primary" value="Edit">
										<a href="<?php echo base_url('home/allvendor') ?>"><button class="btn btn-success">Back</button></a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>