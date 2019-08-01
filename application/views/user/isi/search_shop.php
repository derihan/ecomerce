<?php
$this->load->view('user/isi/nav_konten');
?>
<br>
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
			<a href="<?php echo base_url('home/shop') ?>">Go TO Homepage</a>
		</div>
	</div>
		<?php		
			} else {
		?>
		<div class="row">
		<?php
			foreach ($search as $row) {
		?>
			<div class="col-lg-3 col-md-4 col-sm-6" id="shop_table">
				<div class="thumb-wrapper">
								<span class="wish-icon"><i class="fa fa-heart-o"></i></span>
								<div class="img-box" align="center">
									<img src="<?php echo base_url();?>assets/image/<?php echo $row->image; ?>" class="img-responsive img-fluid" alt="">
								</div>
								<div class="thumb-content">
									<h4><?php echo $row->nama_produk; ?></h4>
									<div class="star-rating">
										<ul class="list-inline">
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star"></i></li>
											<li class="list-inline-item"><i class="fa fa-star-o"></i></li>
										</ul>
									</div>
									<p class="item-price"><b><?php echo $row->harga; ?></b></p>
									<a href="#" class="btn btn-primary">Add to Cart</a>
									<a href="#" class="btn btn-primary">View Detail</a>
								</div>						
							</div>
			</div>
		<?php
			}}
		?>
		
	</div>
	<div>
		<br>
		<br>
	</div>
</div>
<div class="modal fade" id="modalCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Your cart</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <!--Body-->
      <div class="modal-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Product name</th>
              <th>qty</th>
              <th>Price</th>
              <th>Remove</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td><?php echo $row->nama_produk; ?></td>
              <td>1</td>
              <td><?php echo $row->harga; ?></td>
              <td><a><i class="fa fa-remove"></i></a></td>
            </tr>
          </tbody>
        </table>

      </div>
      <!--Footer-->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
        <button class="btn btn-primary">Checkout</button>
      </div>
    </div>
  </div>
</div>  