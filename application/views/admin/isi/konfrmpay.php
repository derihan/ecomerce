	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Invoice</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Konfirmasi </h1>
			</div>
		</div><!--/.row-->

		<div class="panel">
			<div class="row">
				<div class="col-lg-12">
					<div class="panel ">
						<div class="panel-heading">
							<div>Konfirmasi</div>
						</div>
						<div class="panel-body">
							<div class="col-lg-12">
								<br>
									No Transaksi	: <?php echo $idns->id_transaksi; ?><br>
									Id Invoice 		: <?php echo $idns->id_invoice; ?><br>
									Nama			: <?php echo $idns->nama; ?><br>
									Total bayar 	: <?php echo $idns->total_bayar; ?><br>
									No Rek			: <?php echo $idns->no_rekening; ?><br>
									<br>
									<button class="btn btn-primary" data-toggle="modal" data-target="#showtf">Cek bukti</button>
									<br>
								<hr>
							</div>
							<hr>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
	</div>
<div id="showtf" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      
        <img src="<?php echo base_url('bukti_tf')?>/<?php  echo  $idns->bukti_tf; ?>" width="100%" height="380px">
      </div>
      <div class="modal-footer">	
      	<form action="<?php echo base_url('home/setToComplete') ?>" method="POST">
      	<input type="test" name="id" hidden="" value="<?php echo $idns->id_invoice; ?>">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Konfirmasi</button>
   	 	</form>
      </div>
    </div>
  </div>
</div>
</div>