<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Brand</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Brand</h1>
			</div>
		</div><!--/.row-->

	<div class="panel">
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix"></div>
						<div class="panel-body">
							<form class="form-horizontal row-border"  action="<?php echo base_url('home/addProses') ?>" enctype="multipart/form-data" method="POST">
								<div class="form-group">
									<input type="text" name="seleksi" hidden="" value="brand">
							
									<label class="col-md-2 control-label">Manufacture</label>
									<div class="col-md-10">
										<input type="text" name="mnfc" class="form-control" required="" value="" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Nama Brand</label>
									<div class="col-md-10">
										<input type="text" name="nama" class="form-control" required="" value="" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Alamat</label>
									<div class="col-md-10">
										<input type="text" name="alamat" class="form-control" required="" value="" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">email</label>
									<div class="col-md-10">
										<input type="text" name="email" class="form-control" required="" value="" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label"></label>
									<div class="col-md-10">
										<input  type="submit" name="ok" class="btn btn-primary" value="Tambah">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>