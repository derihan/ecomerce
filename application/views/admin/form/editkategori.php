<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Kategori</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Edit Kategori</h1>
			</div>
		</div><!--/.row-->

	<div class="panel">
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix"></div>
						<div class="panel-body">
							<form class="form-horizontal row-border" action="<?php echo base_url('home/editproses') ?>" enctype="multipart/form-data" method="POST">
								<div class="form-group">
									<input type="text" name="seleksi" hidden="" value="kategori">
									<input type="text" name="idk" hidden="" value="<?php echo $where->id_kategori ?>">
									<label class="col-md-2 control-label">Kategori</label>
									<div class="col-md-10">
										<input type="text" name="nama" class="form-control" required="" value="<?php echo $where->nama_kategori ?>" >
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label"></label>
									<div class="col-md-10">
										<input  type="submit" name="ok" class="btn btn-primary" value="Update">
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>