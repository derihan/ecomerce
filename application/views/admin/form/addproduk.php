<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Product</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Add Product</h1>
			</div>
		</div><!--/.row-->

	<div class="panel">
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading clearfix">Inputs</div>
						<div class="panel-body">
							<form class="form-horizontal row-border" action="<?php echo base_url('home/addProses') ?>" enctype="multipart/form-data" method="POST">
								<div class="form-group">
									<input type="text" name="seleksi" hidden="" value="produk">
									<label class="col-md-2 control-label">Nama Produk</label>
									<div class="col-md-10">
										<input type="text" name="nama" class="form-control" required="">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Harga Produk</label>
									<div class="col-md-10">
										<input class="form-control" type="number" name="harga" required="" min="0">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Deskripsi</label>
									<div class="col-md-10">
										<textarea class="form-control" name="desk" required=""></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Vendor</label>
									<div class="col-md-10">
										<input class="form-control" type="text" name="Vendor" required=""> 
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label"></label>
									<div class="col-md-10">
										<div class="row">
											<div class="col-xs-3">
												<label>Brand</label>
												<select class="form-control" style="height: 45px" name="merk">
													<option >-Pilih brand-</option>
													<?php 
													$data = $this->db->get('brand')->result();
													foreach ($data as $val) {
														echo "<option value=".$val->nama_brand.">".$val->nama_brand."</option>";
													}
													?>
												</select>
											</div>
											<div class="col-xs-5">
												<label>Masukan Jumlah</label>
												<input type="number" class="form-control" placeholder="Jumlah" min="1" name="jml" required=""> 
											</div>
											<div class="col-xs-4">
												<label>Kategori</label>
												<select class="form-control" style="height: 45px" name="kat" required="">
													<option >-Pilih Kategori-</option>
													<?php 
													$data = $this->db->get('Kategori')->result();
													foreach ($data as $val) {
														echo "<option value=".$val->nama_kategori.">".$val->nama_kategori."</option>";
													}
													?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Foto Produk</label>
									<div class="col-md-10">
										<?php 
										error_reporting(0);
										echo $error; ?>
										<input class="" type="file" name="poto" required="">
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