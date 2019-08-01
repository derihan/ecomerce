<?php
$sesiakses= $this->session->userdata('akses');
if ($sesiakses != 1) {
	redirect('home/shop');
} else {
include_once('layout/header.php');
include_once('layout/navigasi.php');
echo $contents;
include_once('layout/footer.php');
}
?>