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
				<h1 class="page-header">All Kategori</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel-body">
					<?php echo $this->session->flashdata('notif'); ?>
					<div class="bootstrap-table">
						<div class="fixed-table-toolbar">
							<a href="<?php echo base_url('home/addkategori'); ?>"><button class="btn btn-primary">Tambah</button></a>
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
										<th>
											No
										</th>
										<th style="">
											ID Kategori
										</th>
										<th style="">
											Kategori
										</th>
										<th colspan="2">
											Opsi
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
								$i =1;
								foreach ($value as $val) {
								?>
								<tr>
									<td><?php echo $i; ?></td>
									<td style=""><?php echo $val->id_kategori; ?></td>
									<td style=""><?php echo $val->nama_kategori; ?></td>
									
									 </td>
									<td><a href="<?php echo base_url('home/editkategori').'/'.$val->id_kategori; ?>" class="btn btn-xs btn-warning" >Edit</a>
									<a href="<?php echo base_url('home/delkategori').'/'.$val->id_kategori; ?>" 
										onclick="return confirm('Yakin akan menghapus  : <?php echo $val->nama_kategori;?> ?')" class="btn btn-xs btn-danger" >Delete</a>
									</td>
								
								</tr>
								<?php
								$i++;
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
			</div><!--/.row-->
		</div>