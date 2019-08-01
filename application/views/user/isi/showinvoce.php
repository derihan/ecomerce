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

		<div class="panel">
		
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-primary">
					<div class="panel-heading" style="background: #3F51B5;">Invoice
						<span class="pull-right clickable panel-toggle"><em class="fa fa-toggle-up"></em></span>
					</div>
				<div class="panel-body">
				<hr>
				<div class="row">
					<div class="col-md-4 col-lg-2">
						<div class="text-center " style="padding: 10px;background: #3F51B5; ">
							<h4 class="text-white" style="color: white;">big-computer</h4>
						</div>
					</div>
					<div class="col-md-4 col-lg-3">
						<address>
							<?php echo $id->add_1; ?><br>
    						<?php echo $id->add_2; ?>
    						<?php echo $id->add_3; ?> 
    						<br>
    						<?php echo $id->add_4; ?>
    					</address>
					</div>
					<div class="col-md-4 col-lg-7">
						<h5><?php echo $id->Id_invoice; ?></h5>
						Tanggal Order :  <?php echo $id->tgl_order; ?>
					</div>
				</div>
				<br>
    			<div class="row">
    				<div class="col-xs-6">
    					<address>
    						<strong>Dibayar ke:</strong><br>
    						<?php echo $id->bill_to; ?><br>
    					</address>
                        <address>
                        <strong>Metode Pembayaran:</strong><br>
                        <?php echo $id->payment_method; ?><br>
                        
                    </address>
    				</div>
    				<div class="col-xs-6 text-right">
    					<address>
        					<strong>Dikirim ke:</strong><br>
    						<?php echo $id->kirim_ke; ?><br>
    						<?php echo $id->add_1; ?><br>
    						<?php echo $id->add_2; ?><br>
    						<?php echo $id->add_3.','; ?>
                            <?php echo $id->add_4; ?>
    					</address>
    				</div>
    			</div>
    			<br>
    			<div class="row">
    				<div class="col-md-12">
    					<div class="table-responsive">
    						<table class="table table-condensed" border="0">
    							<thead style="background: #3F51B5; color: white; ">
    								<tr>
                                    <td>No</td>    
    								<td>Item</td>
    								<td class="text-center"  >Harga</td>
    								<td class="text-center" >Qty</td>
    								<td class="text-right">Total Harga</td>
                                    
    								</tr>
    							</thead>
    							<tbody>
                                <?php
                                $i = 1;
                                $invc_det = $this->db->get_where('order',array('id_invoice'=> $id->Id_invoice))->result();
                                foreach ($invc_det as $val) {
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $val->id_produk; ?></td>
                                    <td class="text-center" ><?php $invcprice = $this->db->get_where('produk',array('Id_produk'=> $val->id_produk))->row(); echo $invcprice->harga_produk?></td>
                                    <td class="text-center"><?php echo $val->qty_order; ?></td>
                                    <td class="text-right"><?php echo $val->price_order; ?></td>
                                </tr>
                                <?php
                                $i++;
                                }
                                ?>
    							
    							<tr>
    								<td colspan="3" class="no-line" ></td>
    								<td class="text-center no-line">Sub Total</td>
    								<td class="text-right"><?php echo $vc->total_bayar ?></td>
    							</tr>
    							<tr>
    								<td colspan="3"></td>
    								<td class="no-line text-center ">Total</td>
    								<td class="no-line text-right"><?php echo $vc->total_bayar ?></td>
    							</tr>
    							</tbody>
    						</table>
    					</div>
    				</div>
    			</div>
    			<div class="clearfix"></div>
                <br>
                <br>
            	<div class="row">
                	<div class="col-xs-12">
                    	<a href="#" target="_blank" class="btn btn-success btn-md"><i class="fa fa-print"></i> &nbsp; Print </a>        
                    	<a href="<?php echo base_url('home/kporder'); echo '/'.$id->Id_invoice; ?>" class="btn btn-primary btn-md"><i class="fa fa-send"></i> &nbsp; Proceed to payment </a>        
               	 	</div>
            	</div>
                <br>
                <br>
                <div class="row">
                     <div class="col-xs-12">
                         <label> Note: </label><br>
                         - Dimohon untuk mencetak tagihan anda<br>
                         - Silahkan Lakukan pembayaran ke rekening yang sudah tertera
                    </div>
                </div>
			</div>
		</div>
	</div>
</div><!--/.row-->
</div>