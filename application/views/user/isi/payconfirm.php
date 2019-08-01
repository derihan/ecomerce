	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Konfirmasi</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Konfirmasi Pembayaran</h1>
			</div>
		</div><!--/.row-->

		<div class="panel panel-container">
			<div class="row">
				<div class="col-md-6">
					 <div class="panel panel-primary">
			 	<div class="panel-heading">Edit Profil
					<span class="pull-right clickable panel-toggle">
						<em class="fa fa-toggle-up"></em>
					</span>
				</div>
				<div class="panel-body">
				  <form class="form" action="<?php echo base_url('home/procbayar') ?>" method="post" id="registrationForm" enctype="multipart/form-data" >
                      
					<div class="form-group">		
						<label ><h4> NO Tagihan anda :</h4></label>
                         <input type="text" name="ivc" value="<?php echo $idvc->Id_invoice?>" class="form-control" style="visibility:;" readonly/>
               		</div>
					<div class="form-grup"> 
                    	<label for="first_name"><h4> Total bayar anda</h4></label>
                    	<input type="text" name="tobar" value="<?php echo $idvc->total_bayar?>" class="form-control" readonly/>
                 	</div>
                 	<div class="form-group">
                 	
                 	</div>
                 	<div class="row">
                 	<div class="col-lg-3">
                        <label> Bank saya</label> 
                 		<div class="form-group">   
                 			<select class="form-control" name="cekbank" required="">
                                <option>- Pilih bank tujuan -</option>
                 				<option value="BNI">BNI</option>
                 				<option value="MANDIRI">MANDIRI</option>
                 			</select>
                		</div>
                 	</div>
                 	<div class="col-lg-6">
                        <label>No rekening</label>  
                		<div class="form-group ">    
                 			<input type="text" name="norek" class="form-control" style="height: 34px;" placeholder="No Rekening" required="">
                		</div>
                	</div>
                	<div class="col-lg-3">
                        <label>Bank tujuan</label>                 		
                        <div class="form-group">   
                 			<select class="form-control" name="bankto">
                 				<option>- Pilih bank tujuan -</option>
                 				<option value="BNI">BNI</option>
                 				<option value="MANDIRI">MANDIRI</option>
                 			</select>
                		</div>
                 	</div>
                	</div>
                	<div class="form-group">
                		<label for="first_name"><h4> Nama Tabungan anda</h4></label>
                		<input type="text" name="nama_tab" class="form-control">
                	</div>
                	<div class="form-group">
                        <?php 
                        error_reporting(0);
                        echo $error; ?>
                        <label for="first_name"><h4> Foto bukti Transfer</h4></label>
                		<input type="file" name="files"  >
                	</div>
                 	<div class="form-group">  
                     	<br>
                     <input class="btn btn-lg btn-success glyphicon glyphicon-ok-sign" type="submit" name="konfirmasi" value="konfirmasi">
                 	</div>			
				    </form>
				</div>
			</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>