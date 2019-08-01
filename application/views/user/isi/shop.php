<?php
$this->load->view('user/isi/nav_konten');
$ceksesi = $this->session->userdata('username');
$cekakses = $this->session->userdata('akses');
?>
<div class="container ">
		<?php
			if ($count<1) {
		?>	
	<div id="notfound">
		<div class="notfound">
			<div class="notfound-404">
				<h1>Oops!</h1>
				<h2>Maaf, produk Sedang Kosong</h2>
			</div>
			<a href="#">Go TO Homepage</a>
		</div>
	</div>
		<?php		
			} else {
		?>
		<div class="row">
		<?php
			foreach ($shop as $row) {
		?>
			<div class="col-lg-3 col-md-4 col-sm-6" id="shop_table">
				<div class="thumb-wrapper">
								
					<div class="img-box" align="center">
						<img src="<?php echo base_url()."/foto_produk/".$row->image; ?>" class="img-responsive img-fluid" alt="">
							</div>
							<div class="thumb-content">
							<h4><?php echo $row->nama_produk; ?></h4>
							<p class="item-price"><b><?php echo $row->harga_produk ?></b></p>
							<?php
							$link = "<a href=".site_url()."home/addcart/".$row->Id_produk." class='btn' style='background: #3F51B5; color: white;' >Add to Cart</a>";
							$linkb = "<p class='btn' style='background: #3F51B5; color: white;' >Add to Cart</p>";
							if (!empty($ceksesi)) {
									if ($cekakses == 1) {
										echo $link;
									} 
							} else {
								echo $linkb;
							}
							?>
							<a href="<?php echo base_url('home/viewdetail')?>/<?php echo $row->Id_produk; ?>" class="btn " style="background: #3F51B5; color: white;">View Detail</a>
						</div>						
					</div>
			</div>
		<?php
			}}
		?>
		
	</div>
	<div>
		<br>
			<?php echo $this->pagination->create_links();?>
		<br>
	</div>
</div>
<div id="myModalcart" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body table-responsive">
        <table  class="table table-striped">
        	<?php
        	$count = count($this->cart->contents());
        	if ($count <1) {
        	?>
        	<tr>
        		<td colspan="3" align="center"><i class="fa fa-shopping-cart fa-2x" style="color: #3F51B5"></i><p>Keranjang Kosong</p></td>
        	</tr>
        	<?php
        	} else {
        	?>
        	<tr>
        		<td>Id produk</td>
        		<td>Qty</td>
        		<td>Total harga</td>
        	</tr>
        	<?php
        	foreach ($this->cart->contents() as $val) {
        	?>
        	<tr>
        		<td><?php echo $val['id'] ?></td>
        		<td><?php echo $val['qty'] ?></td>
        		<td><?php echo number_format($this->cart->total())?></td>
        	</tr>
        	<?php
        	}}
        	?>
        </table>
      </div>
      <div class="modal-footer">
      	<a href="<?php if (count($this->cart->contents())<  1){echo""; }else {echo base_url('home/checkout');} ?>"><button type="button" class="btn btn-default" >Checkout</button>
      	<a href="<?php echo base_url('home/showcart') ?>"><button type="button" class="btn btn-default" >Lihat detail</button>
        <button type="button" class="btn btn-default" data-dismiss="modal" >close</button>
      </div>
    </div>
  </div>
</div>