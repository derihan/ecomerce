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
				<h1 class="page-header">Edit Product</h1>
			</div>
		</div><!--/.row-->

	<div class="panel">
		<div class="row">
			<div class="col-md-12">
					<div class="panel panel-container">
						<div class="panel-body">
							<form class="form-horizontal row-border" enctype="multipart/form-data" method="post" action="<?php echo base_url('home/editftpr') ?>">
								<div class="form-group">
									<label class="col-md-2 control-label">Foto Produk</label>
									<div class="col-md-10">
										<img src="<?php echo base_url('foto_produk')."/".$where->image ?>" style="width:200px;">
										<div><?php error_reporting(0); echo $error;  ?></div>
										<div><?php echo $this->session->flashdata('notif'); ?></div>
										<input class="" type="file" name="poto" value="">
										<input type="text" name="idk" hidden="" value="<?php echo $where->Id_produk ?>">
										<input type="text" name="nama" hidden="" value="<?php echo $where->nama_produk ?>">
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label"></label>
									<div class="col-md-10">
										<input  type="submit" name="ok" class="btn btn-primary" value="Upload">
										<a href="<?php echo base_url('home/showproduct') ?>"></a>
									</div>
								</div>
							</form>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-body">
							<form class="form-horizontal row-border" action="<?php echo base_url('home/editproses') ?>" enctype="multipart/form-data" method="POST">
								<div class="form-group">
									<label class="col-md-2 control-label">Nama Produk</label>
									<div class="col-md-10">
										<input type="text" name="seleksi" hidden="" value="produk"> 
										<input type="text" name="idk" hidden="" value="<?php echo $where->Id_produk ?>" required>
										<input type="text" name="nama" class="form-control" value="<?php echo $where->nama_produk ?>" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Harga Produk</label>
									<div class="col-md-10">
										<input class="form-control" type="number" name="harga" value="<?php echo $where->harga_produk ?>" required >
									</div>
								</div>
								<div class="form-group" style="height: 300px">
									<label class="col-md-2 control-label">Deskripsi</label>
									<div class="col-md-10">
										<textarea class="form-control" name="desk" style="height: 300px;"><?php echo $where->produk_desc ?></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label">Vendor</label>
									<div class="col-md-10">
										<input class="form-control" type="text" name="vendor" value="<?php echo $where->vendor ?>" required>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-2 control-label"></label>
									<div class="col-md-10">
										<div class="row">
											<div class="col-xs-3">
												<label>Kategori</label>
												<select class="form-control" style="height: 45px" name="kat" required="">
													<option value="<?php echo $where->id_kategori ?>"><?php echo $where->id_kategori ?></option>
													<?php 
													$data = $this->db->get('Kategori')->result();
													foreach ($data as $val) {
														echo "<option value=".$val->nama_kategori.">".$val->nama_kategori."</option>";
													}
													?>
												</select>
											</div>
											<div class="col-xs-5">
												<label>Masukan Jumlah</label>
												<input type="number" class="form-control" placeholder="Jumlah" min="1" name="jml" value="<?php echo $where->produk_qty ?>" required> 
											</div>
											<div class="col-xs-4">
												<label>Brand</label>
												<select class="form-control" style="height: 45px" name="merk">
													<option value="<?php echo $where->id_brand ?>"><?php echo $where->id_brand ?></option>
													<?php 
													$data = $this->db->get('brand')->result();
													foreach ($data as $val) {
														echo "<option value=".$val->nama_brand.">".$val->nama_brand."</option>";
													}
													?>
												</select>
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-md-2 control-label"></label>
									<div class="col-md-10">
										<input  type="submit" name="ok" class="btn btn-primary" value="Edit">
										<a href="<?php echo base_url('home/showproduct') ?>"><button class="btn btn-danger">Kembali</button></a>
									</div>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>