<?php
$sesiion = $sesi;
$datasesi = $this->produk_model->findCus($sesiion);
?>
<div class="col-sm-12 col-lg-12 main">
<div class="row">
</div><!--/.row-->
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Checkout Page</h1>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-4">
		<div class="panel panel-default">
			<div class="panel-heading">Checkout</div>
				<div class="panel-body">
							<form role="form" method="POST" action="<?php echo base_url('home/prosesCheck'); ?>">
								
								<div class="form-group" style="float: right; width: 50%; padding: 5px;">
									<label> Nama Belakang </label>
									<input class="form-control" placeholder="Placeholder" type="text" 
									value="<?php echo $datasesi->last_name;?>" name="lname">
								</div>
								<div class="form-group" style="width: 50%; padding: 5px;">
									<label> Nama Depan </label>
									<input class="form-control" placeholder="Placeholder" type="text" 
									value="<?php echo $datasesi->first_name;?>" name="fname">
								</div>
								<div class="form-group">
									<label> Email </label>
									<input class="form-control" placeholder="Placeholder" type="Email" 
									value="<?php echo $datasesi->email_add;?>" name="email" >
								</div>
								<div class="form-group">
									<label>Negara</label>
									<select class="form-control">
										<option>Indonesia</option>
									</select>
								</div>
								<div class="form-group">
										<label>Alamat </label>
									<input type="text" name="add_1" class="form-control" required="">
								</div>
								<div class="form-group">
									<label>Alamat 2</label>
									<input type="text" name="add_2" class="form-control" required="">
								</div>
								<div class="form-group">
									<label>Kota</label>
									<input type="text" name="add_3" class="form-control" required="">
								</div>
								<div class="form-group">
									<label>Profinsi</label>
									<input type="text" name="add_4" class="form-control" required="">
								</div>
							</div>
						</div>
					</div>
<div class="col-lg-4">
	<div class="panel panel-default">
		<div class="panel-heading"><h4>Metode Pembayaran</h4></div>
			<div class="panel-body">
				<div class="form-group">
					<input type="radio"  name="pay" value="Transfer" id="cek" onclick="func(this.value)" required=""> Transfer
					<h5>Silahkan pilih salah satu no Rekening dibawah :</h5>
				</div>
				<div class="form-group" style="padding:20px;">
					<ul type="1" > 
						
					<?php
						foreach($payment as $pay){
					?>
						<li><?php echo  $pay->nama_bank; ?> || <?php echo $pay->no_rek ?> || <?php echo $pay->atas_nama; ?> </li>				
						<?php
						}
					?>
					</ul>
					<label>Note : Catat No Rekening pembayaran</label>
				</div>
				<div class="form-group">
					<input type="radio" value="COD" name="pay" onclick="func(this.value)" required=""> Cash On Delivery
					<h5>Pengiriman Langsung kerumah bayar di tempat </h5>
					<input type="text" name="bayar" style="visibility:hidden; position: absolute;" 
								 id="bayar"  >
				</div>
			</div>
		</div>
	
	</div>
<div class="col-lg-4">
	<div class="panel panel-default">
		<div class="panel-heading">Review Order</div>
			<div class="panel-body">
				<div class="form-group" style="float: left; ">
					<label style="padding: 10px;">Nama barang</label>
				</div>
				<div class="form-group" style="float: left;" >
					<label style="padding: 10px;">Qty</label>
				</div>
				<div class="form-group">
					<label style="padding: 10px;">Total</label>
				</div>
				<hr>
				<?php
				$i=0;
				foreach ($order as $result) {
				?>
				<input type="text" name="idvoice[]" style="visibility:hidden; position: absolute;" 
								   value="<?php echo $generate_id ?>">
				
				<input type="text" name="id_cus[]" style="visibility: hidden; position: absolute;" 
								value="<?php echo $datasesi->Id_cus; ?>">
				<input type="text" name="date[]" style="visibility: hidden; position: absolute;" 
								value="<?php echo date('Y-m-d'); ?>">
				<input type="text" name="id_pro[]" style="visibility: hidden; position: absolute;" value="<?php echo $result['id'] ?>">
				<div class="form-group" style="float: left; ">
					<input name="nama[]"  value="<?php echo $result['name']; ?>" style="width: 120px; padding-left:10px; border:0px;" readonly>
				</div>
				<div class="form-group" style="float: left;" >
					<input name="qty[]"  value="<?php echo $result['qty']; ?>" style="width: 50px; border:0px;"  readonly>
				</div>
				<div class="form-group">
					<input name="total[]"  value="<?php echo $result['subtotal']; ?>" readonly style="border:0px;">
					
				</div>
				<?php
				$i++;
				}
				?>
				<hr>
				<div class="form-group" style="float: left;">
					<label style="padding: 10px;">Total Belanja :</label>
				</div>
				<div class="form-group">
					<label style="padding: 10px;"> Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></label>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-md btn-success">Order sekarang</button>
				</form>
				<form action="<?php echo base_url('home/cancel') ?>" method="POST" class="pull-right">
					<button type="submit" class="btn btn-md btn-danger">Batal Order</button>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">	
	function func(pay){
		document.getElementById('bayar').value= pay;
	}
</script>