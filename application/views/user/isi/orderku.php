

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
	<ol class="breadcrumb">
		<li><a href="index.php">
				<em class="fa fa-home"></em>
			</a>
		</li>
		<li class="active">Order ku</li>
	</ol>
</div><!--/.row-->
<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">order</h1>
	</div>
</div>
<div class="row">
	<div class="col-md-12"> 
		<div class="panel panel-default">
			<div class="panel-heading">Data Order</div>
				<div class="panel-body">
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
											ID Order
										</th>
										<th style="">
											Id Produk
										</th>
										<th style="">
											Qty
										</th>
										<th style="">
											Total harga
										</th>
									
									</tr>
								</thead>
								<?php
								if ($ngitung < 1) {
								?>
								<tr>
									<td align="center" colspan="5">
										<div>
											<i class="fa fa-shopping-cart fa-4x" style="color: #4966b1"></i><br>
											<h5>Data Kosong</h5>
											<a href="<?php echo base_url('home/shop'); ?>">Pergi ke toko</a>
										</div>
									</td>
								</tr> 
								<?php
								} else {
								foreach ($orderku as $order) {
								?>
								<tbody>
									<tr >
										<td style=""><?php echo $order->id_order; ?></td>
										<td style=""><?php echo $order->id_produk; ?></td>
										<td style=""><?php echo $order->qty_order; ?></td>
										<td style=""><?php echo $order->price_order; ?></td>
										
									</tr>
								</tbody>
								<?php
								}}
								?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
