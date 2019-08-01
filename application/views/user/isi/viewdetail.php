
<div style="height: 140px;">
    
</div>
<div class="col-lg-12">
    <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-3">
             <img src="<?php echo base_url();?>foto_produk/<?php echo $set->image; ?>" alt="..." class="img-responsive" style="width: 230px"/>
        </div>
        <div class="col-md-3">
             <h1><span><?php echo $set->nama_produk; ?></span></h1>
                <h4>Product Id: <span><?php echo $set->Id_produk; ?></span></h4>
                <div><h6><?php echo $set->id_brand; ?></h6></div>
                 <h3 class="cost"><span class="glyphicon glyphicon-idr"></span> Rp.  <?php echo number_format($set->harga_produk); ?> </h3>
                 <a href="<?php echo base_url('home/addcart')?>/<?php echo $set->Id_produk; ?>"><button class="btn btn-primary">Add to cart</button></a>
        </div>
        <div class="col-md-3">
            
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            
        </div>
          <div class="col-lg-6">
            <hr>
            
            <p</p>
            <ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
  <li><a data-toggle="tab" href="#menu1">Deskripsi</a></li>
  <li><a data-toggle="tab" href="#menu2">Komentar</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>HOME</h3>
    <p>Some content.</p>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Deskripsi Barang :</h3>
    <p>><?php echo $set->produk_desc; ?></p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Komentar</h3>
    <p>Komentar Pelanggan</p>
  </div>
</div>
        </div>
          <div class="col-lg-3">
            
        </div>
    </div>
</div>