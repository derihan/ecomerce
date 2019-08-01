	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Customers</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Show Customers</h1>
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
										<th>
											No
										</th>
										<th style="">
											ID 
										</th>
										<th style="">
											Nama 
										</th>
										<th style="">
											Username
										</th>
										<th style="">
											Gender
										</th>
										<th class="">Email</th>
										<th>
											No Telp
										</th>
										<th>
											alamat
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
									<td style=""><?php echo $val->Id_cus; ?></td>
									<td style=""><?php echo $val->first_name."  ".$val->last_name; ?></td>
									<td style=""><?php echo $val->login_name; ?></td>
									<td style=""><?php echo $val->gender; ?> </td>
									<td style=""><?php echo $val->email_add; ?> </td>
									<td style=""><?php echo $val->phone_number; ?> </td>
									<td style=""><?php echo $val->add_1 ." ";echo $val->add_2." <br> ";  echo $val->add_3." "; echo $val->add_4." "; ?> </td>
									
								
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
	</div>
</div>
</div>