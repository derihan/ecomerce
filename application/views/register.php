
<div class="main">

        <div class="container-reg page-top">
            <div id="notifikasi"><?php echo $this->session->flashdata('msg'); ?></div>
            <fieldset><legend style="padding: 10px; background: #3F51B5; color: white;">Daftar Sekarang</legend>
            <form method="POST" class="appointment-form" id="appointment-form" action="<?php echo base_url()?>home/user_autentication">
                <div class="form-group-1">
                    <input class="input-reg" type="text" name="username" id="email" placeholder="username" required />
                    <h5>  <?php echo form_error('username'); ?></h5> 
                  
                    <input class="input-reg" type="email" name="email" id="email" placeholder="Email" required />
                    <h5>  <?php echo form_error('email'); ?></h5>  
                    
                    <input class="input-reg" type="password" name="password" id="pw" placeholder="password" required />
                    <h5 >  <?php echo form_error('password'); ?></h5> 
                 
                    <input class="input-reg" type="password" name="confirmpw" id="pwcon" placeholder="konfirmasi password" required /> 
                    <h5 >  <?php echo form_error('confirmpw'); ?></h5>  
                </div>
                <div class="form-submit">
                    <input type="submit" name="submit" id="submit" class="submit" value="Register Now" />
                    <a href="<?php echo base_url()?>home/shop" class="submit" style="text-decoration: none; font-size: 15px;">Batal</a>    
                </div>
            </form>
         </fieldset>
        </div>
    </div>