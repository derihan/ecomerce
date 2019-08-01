<?php
$sesiakses= $this->session->userdata('akses');
if ($sesiakses != 1) {
	redirect('admin/home');
} else {
include_once('userdashboard/header.php');
echo $contents;
include_once('userdashboard/footer.php');
}
?>