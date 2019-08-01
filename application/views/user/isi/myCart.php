<?php $i = 1; ?>
<div class="container page-top ">
         <table id="cart" class="table table-hover table-condensed">
            <thead>
              <tr>
                <th style="width:50%">Product</th>
                <th style="width:10%">Price</th>
                <th style="width:8%">Quantity</th>
                <th style="width:22%" class="text-center">Subtotal</th>
                <th style="width:10%"></th>
              </tr>
             </thead>
             <tbody>
                 <?php foreach ($this->cart->contents() as $items): ?>
                 <?php $data = $this->produk_model->findId($items['id']); ?>
                <tr>
                   <td data-th="Product">
                        <div class="row">
                        <div class="col-sm-2 hidden-xs">
                        <img src="<?php echo base_url();?>foto_produk/<?php echo $data->image; ?>" alt="..." class="img-responsive"/></div>
                        <div class="col-sm-10">
                        <h4 class="nomargin">
                        <?php echo $data->nama_produk; ?>
                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>
                                <p>
                                    <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>
                                        <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
                                    <?php endforeach; ?>
                                </p>
                        <?php endif; ?>
                        </h4>
                        <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                        </div>
                        </div>
                    </td>
                    <td data-th="Price">$<?php echo $this->cart->format_number($items['price']); ?></td>
                    <td data-th="Quantity">
                        <form method="POST" action="<?php echo base_url('home/update')?>">
                        <?php echo form_hidden('rowid'.$i, $items['rowid']); ?>
                        <input type="number" class="form-control text-center" value="<?php echo $items['qty'] ?>" name="<?php echo 'qty'.$i ?>" min="1">
                    </td>
                    <td data-th="Subtotal" class="text-center">IDR.<?php echo $this->cart->format_number($items['subtotal']); ?></td>
                    <td class="actions" data-th="">
                        <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
                        </form>
                        <a href="<?php echo base_url();?>home/delete/<?php echo $items['rowid'];?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
                        </a>                                                            
                    </td>
                </tr>
                 <?php $i++; ?>
                 <?php endforeach; ?>
             </tbody>
             <tfoot>
                <tr class="visible-xs">
                    <td class="text-center"><strong>Total $<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
                </tr>
                <tr>
                    <td><a href="<?php echo base_url('home/shop') ?>" class="btn" style="background: #3F51B5; color: white;"> <i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                    <td colspan="2" class="hidden-xs"></td>
                    <td class="hidden-xs text-center"><strong>Total $<?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
                    <td><a href="<?php echo site_url('home/checkout') ?>" class="btn  btn-block" style="background: #3F51B5; color: white;">Checkout <i class="fa fa-angle-right"></i></a></td>
                </tr>
             </tfoot>
        </table>
</div>