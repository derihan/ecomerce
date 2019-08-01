<?php 
$session = $this->session->userdata('username'); 
$datasesi = $this->produk_model->findCus($session)

?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
<div class="row">
	<ol class="breadcrumb">
		<li><a href="index.php">
				<em class="fa fa-home"></em>
			</a>
		</li>
		<li class="active">Profil saya</li>
	</ol>
</div><!--/.row-->
<div class="row">
	<div class="col-md-12">
		<h1 class="page-header">Profil saya</h1>
	</div>
</div>
<div class="">
	<?php 
	error_reporting(0);
	echo $notif; ?>
</div>
<div class="row">
	<div class="col-md-12"> 
			<div class="snippet">
   				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">Upload Foto
								<span class="pull-right clickable panel-toggle">
									<em class="fa fa-toggle-up"></em>
								</span>
							</div>
							<div class="panel-body">
								<div id="Upload_image">
									
								</div>
								<?php 
								error_reporting(0);
								echo $error;
								echo $upload_data; 
								?>
								<form method="POST" id="Upload_form" align="center" enctype="multipart/form-data" action="<?php echo base_url('home/procupload') ?>">
									<input type="file" name="berkas" id="image_file"/>
									<br>
									<input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" /> 
								</form>
							</div>
						</div>
						<div class="panel panel-success">
							<div class="panel-heading">Edit Password
								<span class="pull-right clickable panel-toggle">
									<em class="fa fa-toggle-up"></em>
								</span>
							</div>
							<div class="panel-body">
							<form action="" name="modal_popup" enctype="multipart/form-data" method="POST">
                			<div class="form-group">
                   	 			<label for="Modal Name">Username</label>
                    			<input type="text" name="username"  value="<?php echo $datasesi->login_name ?>" style="height: 30px; visibility: hidden;" />
                    			<label class="form-control"><?php echo $datasesi->login_name ?></label>
                			</div>
							<div class="form-group" style="padding-bottom: 10px;">
                    			<label for="Description">Password Baru</label>
								<input type="password" name="password_new" id="pass" class="form-control" value="" style="height: 30px;" required="" />
                			</div>
                			<div class="form-group" style="padding-bottom: 10px;">
                    			<label for="Description">Konfirmasi Password Baru</label>
								<input type="password" name="password_com" id="confpass" class="form-control" value="" style="height: 30px;"/>
								<span class="error" style="color:red"></span><br />
                			</div>
							<div class="form-group" style="padding-bottom: 10px; ">
								<input class="btn btn-lg btn-success glyphicon glyphicon-ok-sign" type="submit" name="save" value="Simpan">
							</div>
           		 			</form>
					</div>
				</div>
			</div>
			<div class="col-md-6 ">
			 <div class="panel panel-primary">
			 	<div class="panel-heading">Edit Profil
					<span class="pull-right clickable panel-toggle">
						<em class="fa fa-toggle-up"></em>
					</span>
				</div>
				<div class="panel-body">

					<form class="form" action="<?php echo base_url('home/editprofil') ?>" method="post" id="registrationForm">
					<div class="form-group">		
						<label for="Modal Name">Nama depan</label>
                   		<input type="text" name="nama" value="<?php echo $datasesi->first_name ?>" class="form-control"/>
 
               		</div>
					<div class="form-grup"> 
                    	<label for="first_name"><h4> Nama belakang</h4></label>
                    	<input type="text" class="form-control" name="last_name" id="first_name" placeholder="last name" value="<?php echo $datasesi->last_name ?>">
                 	</div>
                 	<div class="form-group">    
                    	<label for="mobile"><h4>E-mail</h4></label>
                 		<input type="E-mail" class="form-control" name="email" id="mobile" placeholder="enter mobile number" value="<?php echo $datasesi->email_add ?>"> 
                	</div>
                	<div class="form-group">    
                    	<label for="mobile"><h4>No Telp</h4></label>
                 		<input type="text" class="form-control" name="mobile" id="mobile" placeholder="enter mobile number" value="<?php echo $datasesi->phone_number ?>"> 
                	</div>
                 	<div class="form-group">
                    	<label ><h4>Alamat 1</h4></label>
                    	<input  class="form-control" id="location" name="alamat1" placeholder="somewhere" value="<?php echo $datasesi->add_1 ?>">
                	</div>
                	<div class="form-group">
                    	<label ><h4>Alamat 2</h4></label>
                    	<input  class="form-control" id="location" name="alamat2" placeholder="somewhere" value="<?php echo $datasesi->add_2 ?>">
                	</div>
                	<div class="form-group">
                    	<label ><h4>Kota</h4></label>
                    	<input  class="form-control" id="location" name="alamat3" placeholder="somewhere" value="<?php echo $datasesi->add_3 ?>">
                	</div>
                	<div class="form-group">
                    	<label ><h4>Profinsi</h4></label>
                    	<input class="form-control" id="location" name="alamat4" placeholder="somewhere" value="<?php echo $datasesi->add_4 ?>">
                	</div>
                 	<div class="form-group">  
                     	<br>
                     <input class="btn btn-lg btn-success glyphicon glyphicon-ok-sign" type="submit" name="save" value="SAVE">
                 	</div>			
				</form>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>
</div><!--/tab-content-->
</div>
<script type="text/javascript">
	$(function(){
		$('#confpass').keyup(function(e){
			var pass = $('#pass').val();
			var confpass = $(this).val();

			if (pass == confpass) {
				$('.error').text('');
			} else {
				$('.error').text('password tidak sama');
			}
		})
	})
</script>