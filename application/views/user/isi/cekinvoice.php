
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                 <?php error_reporting(0); echo $data ?></div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background: #3F51B5;">
                        Cek Invoice
                    </div>
                    <div class="panel-body">

                    <br>
                    <form class="form" action="<?php echo base_url('home/invc')?>" method="POST">
                        <div class="form-group">
                            <input type="text" class="form-control" name="invc" id="first_name" placeholder="NVC0xx" value="" required>
                        </div>
                        <div class="form-group pull-right">
                             <input type="submit" name="ok" class="btn" style="background: #3F51B5; color: white;" value="cek" >
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
