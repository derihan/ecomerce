<?php
$ceksesi = $this->session->userdata('username');
?>
<div style="height: 100px">
</div>
<div class="container " >
<?php
  if (empty($ceksesi)) {
?>
  <div class="row">
    <div class="panel" >
      <div class="alert alert-info"  align="">
        <h5>Silahkan Login terlebih dahulu untuk mulai belanja atau <a href="<?php echo base_url('home/register') ?>"><b> Daftar </b></a> jadi member kami</h5>
        <h5 style=" color: red;"><?php echo $this->session->flashdata('item'); ?></h5>
      </div>
       
    </div>
  </div>
<?php
}
?>
	<div class="row">
		<ul class="filter-nav">
		<li><a href="<?php echo base_url()?>home/shop" class="a-filt">All</a></li>
		<li><a href="<?php echo base_url()?>home/kategori/Processor">// Processor</a></li>
		<li><a href="<?php echo base_url()?>home/kategori/memori">// Memori</a></li>
		<li><a href="<?php echo base_url()?>home/kategori/aksesoris"> // Aksesoris </a></li>
		<li><a href="<?php echo base_url()?>home/kategori/laptop">// Laptop </a></li>
	</ul>
	<ul class="filt-list">
		<?php echo form_open('home/search')?>
		<li class="search-wrap">
			<input type="text" name="keyword" class="search-box" placeholder="Ketikan nama produk yang dicari" required>
		</li>
		<li class="search"> 
			<button type="submit" class="button-ok"><i class="fa fa-search"></i></button>
		<?php echo form_close()?>
		</li>
		<li class="filter">
			<i class="fa fa-sort fa-1x">  Filters</i>
		</li>
		<li class="my-cart" data-toggle="modal" data-target="#modalCart" >
			<a href="#" data-toggle="modal" data-target="#myModalcart"><i class="fa fa-shopping-cart" >Rp.<?php echo number_format($this->cart->total()) ?> </i></a>
		</li>
	</ul>
</div>
<br>
	<div class="row">
		<div class="slide-filt">
			 <div class="col-md-3 ">
                <h4 class="">Sort By</h4><br>
                <ul>
                  <li class="">
                    <i class="fa fa-circle-o-notch"></i><a href="#">
                    Default
                  </a></li>
                  <li>
                    <i class="fa fa-calendar" style="color: grey;" ></i><a href="#">
                    Last entries
                  </a></li>
                  <li>
                    <i class="fa fa-handshake-o" style="color: grey;"></i><a href="#">
                   Second
                  </a></li>
                   <li>
                    <i class="fa fa-calendar-o" style="color: grey;"></i><a href="#">
                    Baru
                  </a></li>
                  <li>
                    <i class="fa fa-tags" style="color: grey;" ></i><a href="#">
                    Alphabetically
                  </a></li>
              </ul>
         	</div>
		</div>
	</div>
</div>
