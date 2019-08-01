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
				<h1 class="page-header">Show Product</h1>
			</div>
		</div><!--/.row-->

	<div class="panel">
		<div class="row">
				<div class="col-lg-12">
					<div class="panel-body">
					<?php echo $this->session->flashdata('notif'); ?>
					<div class="bootstrap-table">
						<div class="fixed-table-toolbar">
							<a href="<?php echo base_url('home/addproduk'); ?>"><button class="btn btn-primary">Tambah</button></a>
							<div class="columns btn-group pull-right">
								<button class="btn btn-default" type="submit" name="search" title="search">
									<i class="glyphicon glyphicon-search icon-search"></i>
								</button>
								
							</div>
						<div class="pull-right search">
							<input class="form-control" type="text" placeholder="Search">
						</div>
					</div>
					<br>
					<div class="fixed-table-container">
					<div class="fixed-table-body">
						<table  class="table table-hover">
								<thead>
									<tr>
										<th style="">
											ID Produk
										</th>
										<th style="">
											Nama Produk
										</th>
										<th style="">
											Harga
										</th>
										<th style="">
											Kategori
										</th>
										<th class="">Brand</th>
										<th>
											qty
										</th>
										<th>
											Foto
										</th>
										<th colspan="2">
											opsi
										</th>
									</tr>
								</thead>
								<?php
								if ($count == 0) {
								?>
								<tr>
									<td align="center" colspan="8">
										<div>
											
											<h5>Data Kosong</h5>
											
										</div>
									</td>
								</tr> 
								<?php
								} else {
								foreach ($value as $val) {
								?>
								<tr>
									<td style=""><?php echo $val->Id_produk; ?></td>
									<td style=""><?php echo $val->nama_produk; ?></td>
									<td style=""><?php echo $val->harga_produk; ?></td>
									<td style=""><?php echo $val->id_kategori; ?> </td>
									<td style=""><?php echo $val->id_brand; ?> </td>
									<td style=""><?php echo $val->produk_qty; ?> </td>
									<td style=""><?php echo $val->image; ?> </td>
									<td><a href="<?php echo base_url('home/editproduk').'/'.$val->Id_produk; ?>"><button class="btn btn-xs btn-warning">Edit</button></a></td>
									<td><a href="<?php echo base_url('home/delproduk').'/'.$val->Id_produk; ?>" 
										onclick="return confirm('Yakin akan menghapus produk : <?php echo $val->nama_produk;?> ?')" class="btn btn-xs btn-danger" >Delete</a>
									</td>
								</tr>
								<?php
								}}
								?>
								<tbody>
							</tbody>
						</table>
					</div>
				</div>
				</div>
			</div><!--/.row-->
		</div>
	</div>
</div>
</div>