<?php
$session = $this->session->userdata('username');
$sesiakses= $this->session->userdata('akses');
$datasesi = $this->produk_model->findCus($session);
?>
<div class="nav">
    <nav class="nav">
        <ul >
            <li class="samping">[DIGG-KOM]</li>
            <div class="nav-is">
                <li class="home"><i class="fa fa-bars fa-1x"> </i></li>
                <li class="home-x"><i class="fa fa-times fa-1x"></i></i></li>
                <li class="login" >
                <?php
                $out = " <a href='#' style='text-decoration: none;' data-toggle='modal' data-target='#myModal'><i class='fa fa-users' ></i></a></li>";
                 $out2 = "<a href=".base_url('home/userProfil')." style='text-decoration: none;'>[Edit Profil]</li>";
                  $out3 = "<a href=".base_url('home/admin')." style='text-decoration: none;'>[Edit Profil]</li>";
               
                  if (empty($session)) {
                    echo $out;
                  } else {
                    if ($sesiakses !=1) {
                        echo $out3;
                    } else {
                      echo $out2;
                    }
                  }
                ?>
            </div>
        </ul>
    </nav>
    <div class="over-nav">
        <ul class="menu-nav">
            <li><a href="<?php echo base_url() ?>">Home</a></li>
            <li><a href="<?php echo base_url('home/shop') ?>">Shop</a></li>
            <li><a href="http://www.amikom.ac.id/">Amikom</a></li>
             <li><a href="<?php echo base_url('home/user_guide') ?>">User Guides</a></li>
            <?php
            $output = "<li><a href=".base_url('home/showcart').">Cart</a></li><li><a href=".base_url('home/userdashboard').">Dashboard</a></li><li><a href=".base_url('home/logout').">Logout</a></li>";
            $output2 = "<li><a href=".base_url('home/admin').">Dashboard</a></li></li><li><a href=".base_url('home/logout').">Logout</a></li>";
              if (!empty($session)) {
                  if ($sesiakses == 1) {
                      echo $output;
                  } else {
                     echo $output2;
                  }
              } else {
                echo "";
              }
            ?>
             <br>
            <div class="wrap-nav">
                <i class="fa fa-map-marker"></i><h5>Universitas amikom yogyakarta, </h5>
            </div>
            <br>
            <div class="wrap-nav">
                <i class="fa fa-phone"></i><h5>(089) 67400 7136 </h5>
            </div>
             <br>
             <div class="wrap-nav">
                <i class="fa fa-at"></i><a href="#">rihan.nonim@gmail.com</a>
            </div>
            <br>
            <div class="wrap-nav">
               <h5>Social Account :</h5><i></i>
            </div>
        </ul>  
    </div>
</div><!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background: #3F51B5;">
        <button type="button" class="close" data-dismiss="modal" style="color: white;" >&times;</button>
        <h4 class="modal-title" style="color: white;">Selamat Datang</h4>
      </div>
      <div class="modal-body text-center">
          <div align="center">
            <ul class="">
          <form class="form" action="<?php echo base_url('home/login') ?>" method="POST">
            <div class="control">
                <h2>Kamu belum Login</h2>
            </div>
            <div class="control">
                <input type="text" name="username" class="input" placeholder="username" required autocomplete="false">
            </div>
            <div class="control">
                  <input type="password" name="password" class="input"  placeholder="password" value="" required autocomplete="false">
            </div>
            <div class="control">
                  <input type="submit" name="send" class="button" value="Login">
            </div>
            <div class="control">
                  <h5>Dont have an account ? <a href="<?php echo base_url('home/register') ?>">register here</a></h5>
            </div>
           
          </form>
        </ul>
        </div>
      </div>
    </div>

  </div>
</div>