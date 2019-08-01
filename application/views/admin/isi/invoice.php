	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">invoice</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">invoice</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<div class="row">
				<div class="col-md-12"> 
		<div class="panel panel-default">
			<div class="panel-heading">Data Invoice</div>
				<div class="panel-body">
							<?php echo $this->session->flashdata('cek'); ?>
					<div class="bootstrap-table">
						<div class="fixed-table-toolbar">
							<div class="columns btn-group pull-right">
								<button class="btn btn-default" type="submit" name="search" title="search">
									<i class="glyphicon glyphicon-search icon-search"></i>
								</button>
								
							</div>
						<div class="pull-right search">
							<input class="form-control" type="text" placeholder="Search">
						</div>
					</div>
					<div class="fixed-table-container">
						<div class="fixed-table-header">
							<table>
								
							</table>
						</div>
					<div class="fixed-table-body">
					<div class="fixed-table-loading" style="top: 37px; display: none;">Loading, please wait…</div>
						<table  class="table table-hover">
								<thead>
									<tr>
										<th style="">
											ID Invoice
										</th>
										<th style="">
											Total bayar
										</th>
										<th style="">
											tgl order
										</th>
										<th style="">
											Status
										</th>
										<th class="">Opsi</th>
									</tr>
								</thead>
								<?php
								if ($count == 0) {
								?>
								<tr>
									<td align="center" colspan="6">
										<div>
											
											<h5>Data Kosong</h5>
											
										</div>
									</td>
								</tr> 
								<?php
								} else {
								foreach ($invoice as $val) {
								?>
								<tr>
									<td style=""><?php echo $val->Id_invoice; ?></td>
									<td style=""><?php echo $val->total_bayar; ?></td>
									<td style=""><?php echo $val->tgl_msk; ?></td>
									<td style=""><?php echo $val->status; ?> </td>
									<td style="">
										<?php
											$linkout = "<a href ='.base_url('home/admkonfirm').'/'.$val->Id_invoice.'konfirmasi lanjut</a>";
											if ($val->status == 'pending') {
													echo "<a href =".base_url('home/admkonfirm')."/".$val->Id_invoice.">Cek konfirmasi</a>";
												} elseif ($val->status == 'not') {
													echo "<a href =".base_url('home/admkonfirm')."/".$val->Id_invoice.">konfirmasi pembayaran</a>";
												} 
											}
										?>
									</td>
								</tr>
								<?php
								}
								?>
								
								<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
			</div><!--/.row-->
		</div>