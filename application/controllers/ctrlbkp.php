<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

	public function index(){
		$this->load->view('user/layout/header');
		$this->load->view('user/layout/navigasi');
		$this->load->view('landing');
		$this->load->view('user/layout/footer');
	}


	public function register(){
		$this->load->view('user/layout/header');
		$this->load->view('user/layout/navigasiv1');
		$this->load->view('register');
		$this->load->view('user/layout/footer');
	}

	public function sukses_page(){
		$this->load->view('user/layout/header');
		$this->load->view('user/layout/navigasiv1');
		$this->load->view('sukses');
		$this->load->view('user/layout/footer');
	}

	public function user_autentication(){
		$this->form_validation->set_rules('password','password','required|min_length[6]|max_length[15]');
		$this->form_validation->set_rules('confirmpw', 'Password Confirmation', 'required|matches[password]');  
		$this->form_validation->set_rules('username', 'username', 'required|is_unique[user.username]'); 
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[customers.email_add]'); 
			if($this->form_validation->run() == FALSE){
				$this->register();
			} else {
				$pass = $_POST['confirmpw'];
				$passencript=hash('md5',$pass);
				$username=$_POST['username'];
				$email = $_POST['email'];
				$emailcript=md5($email);
				$data=array(
					'password'=> $passencript,
					'username'=> $username
				);

				$data2=array(
					'email_add'=>$email,
					'login_name'=>$username
				);

				$cek= $this->produk_model->insertUser('customers',$data2);
				$cek1= $this->produk_model->insertUser('user',$data);
				if ($cek1 and $cek) {
					$this->session->set_flashdata('msg','<div>Regristrasi Berhasil</div>');
					redirect('home/register');
				} 
			}
	}


public function cancel(){
	$this->cart->destroy();
	redirect(base_url('home/shop'));
}





	public function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$passencript = hash('md5',$password);
		$cek_login= $this->produk_model->setLogin($username,$passencript)->num_rows();
		$cek= $this->produk_model->setLogin($username,$passencript)->row_array();
		$cek_akses=$cek['akses'];
		if ($cek_login > 0) {
			$sesi = array(
				'username' => $username,
				'akses' => $cek_akses
			);
			$this->session->set_userdata($sesi);
			switch ($cek_akses) {
				case '1':
					redirect(base_url('home/shop'));
					break;
				case '2':
					redirect(base_url('home/admin'));
					break;
				default:
					redirect(base_url('home/shop'));
					break;
			}
		} else {
			$this->session->set_flashdata('item','Password atau username anda salah !! ');
			redirect(base_url('home/shop'));
		}
	}
	public function logout(){
		$this->session->sess_destroy('username','akses');
		$this->template->load('user/wraper','landing');
		redirect('home/shop');
	}

	public function checkout(){

		if (count($this->cart->contents())<1) {
			redirect('home/shop');
		} else {
		$invoice = $this->produk_model->getData('invoice')->num_rows();
		$generate_num =$invoice+1;
		$unique = 'NVC0';
		$invo = $unique.strval($generate_num);
		$data['generate_id']= $invo;
		$invc = array('invoice' =>$invo);
		$this->session->set_userdata($invc);
		$data['sesi']=$this->session->userdata('username');
		$data['order']=$this->cart->contents();
		$data['payment'] = $this->produk_model->setPayment();
		$this->template->load('user/wraper','user/isi/checkout',$data);}

	}



	public function shop()
	{
		$count_row=$this->produk_model->count_all();
		$config['base_url'] = 'http://localhost/FP_Website/home/shop';
		$config['total_rows'] = $count_row;
		$config['per_page'] = 30;
		$start = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['shop']=$this->produk_model->get_all($config['per_page'], $start)->result();
		$data['count']=$this->produk_model->count_all();
		$sess= $this->session->userdata('username');
		$this->load->view('user/layout/header');
		$this->load->view('user/layout/navigasi');
		$this->load->view('user/isi/shop',$data);
		$this->load->view('user/layout/footer');
	}
	
	public function search(){
		$keyword = $this->input->post('keyword');
		$data['search']=$this->produk_model->get_cat_key($keyword)->result();
		$data['count']=$this->produk_model->get_cat_key($keyword)->num_rows();
		$this->load->view('user/layout/header');
		$this->load->view('user/layout/navigasi');
		$this->load->view('user/isi/shop',$data);
		$this->load->view('user/layout/footer');
	}

	public function kategori($cat){
		$data['shop']=$this->produk_model->get_where($cat)->result();
		$data['count']=$this->produk_model->get_where($cat)->num_rows();
		$this->load->view('user/layout/header');
		$this->load->view('user/layout/navigasi');
		$this->load->view('user/isi/shop',$data);
		$this->load->view('user/layout/footer');
	}

	public function addcart($id){
		if (empty($this->session->userdata('username'))) {
			redirect('home/showcart');
		} else {
		$getPrduk= $this->produk_model->findId($id);
		$data = array(
        'id'      => $getPrduk->Id_produk,
        'qty'     => 1,
        'price'   => $getPrduk->harga_produk,
        'name'	 => $getPrduk->nama_produk 
		);
		$this->cart->insert($data);
		redirect('home/showcart');
	}
	}

	public function showcart(){

		$this->template->load('user/wraper','user/isi/myCart');
	}

	public function delete($id){
		$this->cart->update(array('rowid'=> $id, 'qty'=> 0));
		redirect('home/showcart');
	}

	public function update(){
		$i = 1;
		foreach ($this->cart->contents() as $update) {
			$this->cart->update(array('rowid' => $_POST['rowid'.$i], 'qty' => $_POST['qty'.$i] ));
			$i++;
		}
		redirect('home/showcart');
	}

    public function userdashboard(){
    	$this->template->load('user/userdashboard','user/isi/dashboard');
    }
   
   public function userProfil(){
   		$this->template->load('user/userdashboard','user/isi/profil');
    }

    public function orderku(){
    	$customers = $this->sesi();
    	$idcus=$customers->Id_cus;
    	$data['orderku']=$this->produk_model->getOrderku($idcus)->result();
    	$data['ngitung']=$this->produk_model->getOrderku($idcus)->num_rows();
    	$this->template->load('user/userdashboard','user/isi/orderku',$data);
    }

    public function cekpw(){
    	echo hash('md5', 'admin');
    }

    public function admin()
    {
    	$this->template->load('admin/wraper','admin/isi/index');
    }

    public function procupload(){
    	$customers = $this->sesi();
    	$config['upload_path'] 		='./foto_profil/';  
    	$config['allowed_types']	='jpg|png|';
    	$config['file_name']		=$customers->login_name;
    	$config['max_size']			=100;
    	$config['max_width']		=1024;
    	$config['max_height']		=768;
    	$config['overwrite']		=true;

    	$this->load->library('upload',$config);
    	$poto = $this->input->post('berkas');
    	if (! $this->upload->do_upload('berkas')) {
    		$error = array('error' => $this->upload->display_errors());
    		$this->template->load('user/userdashboard','user/isi/profil',$error);
    	} else {
    		
    		$edit = array(
    			'image' => $this->upload->data('file_name')
    		);
    		$where = array(
    			'Id_cus' => $customers->Id_cus
    		);
    		$this->produk_model->editdata('customers',$edit,$where);
    		echo $this->upload->data('file_name');
    		// echo "<pre>";
    		// print_r($cek);
    		// echo "</pre>";
    		$data = array('upload_data' =>'Upload Berhasil');
    		$this->template->load('user/userdashboard','user/isi/profil',$data);
    	}
    }

 	public function editprofil(){

 		if (isset($_POST['save'])) {
 		
 		$customers = $this->sesi();
 		
 		$data = array(
 			'first_name' => $this->input->post('nama'),
 			'last_name' => $this->input->post('last_name'),
 			'email_add' => $this->input->post('email'),
 			'phone_number' => $this->input->post('mobile'),
 			'add_1'	=> $this->input->post('alamat1'),
 			'add_2'	=> $this->input->post('alamat2'),
 			'add_3'	=> $this->input->post('alamat3'),
 			'add_4'	=> $this->input->post('alamat4')
 		);
 		$id = array (
 			'Id_cus' => $customers->Id_cus
 		);


 		if ($this->produk_model->editdata('customers',$data,$id)) {
 			$notif = array('notif' => "<div class='alert bg-info' role='alert' ><em class='fa fa-lg fa-warning'>&nbsp;</em> Update Data Berhasil </div>");
 			$this->template->load('user/userdashboard','user/isi/profil',$notif);
 		} else {
 			$notif = array('notif' => 'Update Gagal');
 			$this->template->load('user/userdashboard','user/isi/profil',$notif);
 		}
 		
 		}
 	}

 	public function editpw(){

 	}	


 	public function invoice(){
 		$customers = $this->sesi();
    	$id = $customers->Id_cus;
 		$invoice['count'] = $this->produk_model->findvoice($id)->num_rows();
 		$invoice['invc'] = $this->produk_model->findvoice($id)->result();
 		$this->template->load('user/userdashboard','user/isi/invoice',$invoice);
 	}

 	public function showinvoice(){
 		$invoice = $this->session->userdata('invoice');
 		$data['vc']= $this->produk_model->voiceget($invoice)->row();
 		$data['id']= $this->db->get_where('invoice_detail',array('Id_invoice'=> $invoice))->row();
 		// echo "<pre>";
 		// print_r($data);
 		// echo "</pre>";
 		$this->template->load('user/userdashboard','user/isi/showinvoce',$data);
 	}

 	public function prosesCheck(){

		$sesi = $this->session->userdata('username');
    	$customers_id = $this->produk_model->findCus($sesi);
    	$id_cus = $customers_id->Id_cus;
		$invoice = $this->produk_model->getData('invoice')->num_rows();
		$generate_num =$invoice+1;
		$unique = 'NVC0';
		$generate_id= $unique.strval($generate_num);
		$generated = $this->input->post('idvoice');
		$id = $this->input->post('id_pro');
		$customers = $_POST['id_cus'];
		$nama = $_POST['nama'];
		$qty = $_POST['qty'];
		$tot = $_POST['total'];
		$date=$_POST['date'];
		$data=array();
		$cc = count($this->cart->contents());
		$index = 0;
		foreach ($nama as $order) {
			array_push($data, array(
				'id_cus'=> $customers[$index],
				'date_order'=> $date[$index],
				'id_produk'=> $id[$index],
				'qty_order'=> $qty[$index],
				'price_order' => $tot[$index],
				'id_invoice'=> $generated[$index]
			));
		$index++;
		}

		$nameKirim = $this->input->post('fname').$this->input->post('lname');

		$invcdet=array(
			'Id_invoice' => $generate_id,
			'send_to' => $customers_id->first_name,
			'add_1'=> $this->input->post('add_1'),
			'add_2'=> $this->input->post('add_2'),
			'add_3'=> $this->input->post('add_3'),
			'add_4'=> $this->input->post('add_4'),
			'payment_method' => $this->input->post('bayar'),
			'bill_to' => 'Digg Computer',
			'kirim_ke' => $nameKirim,
			'tgl_order' => date('Y-m-d')
		);

		// echo "<pre>";
		// print_r($invcdet);
		// echo "</pre>";

		$tgl = date('Y-m-d');
		
		$invo = array(
			'Id_invoice' => $generate_id,
			'total_bayar' => $this->cart->total(),
			'tgl_msk' => $tgl,
			'Id_cus' => $id_cus
		);

		$this->produk_model->insertUser('invoice_detail',$invcdet);
		$this->produk_model->insertUser('invoice',$invo);
		$this->produk_model->insertOrder($data);
		$this->cart->destroy();
		redirect('home/showinvoice');
	}

 	public function sesi(){
    	$customers = $this->produk_model->findCus($this->session->userdata('username'));
    	return $customers;
 	}

 	public function generateinvoiceID(){
 		$invoice = $this->produk_model->getData('invoice')->num_rows();
		$generate_num =$invoice+1;
		$unique = 'NVC0';
		$generate_id= $unique.strval($generate_num);
 	}

 	public function cekInvoice(){
 		$this->template->load('user/userdashboard','user/isi/cekinvoice');
 	}

 	public function kporder(){
 
 		$id = $this->uri->segment(3);
 		$data['idvc'] = $this->produk_model->voiceget($id)->row();
 		$this->template->load('user/userdashboard','user/isi/payconfirm',$data);	
 	}


 	public function invc(){
 		if (empty($this->input->post('invc'))) {
 			$notif['data'] ="<div class='alert bg-danger' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em> <?php $data=''; echo $data ?></div>" ;	
 			$this->template->load('user/userdashboard','user/isi/cekinvoice',$notif);
 		} else {
 			$invc = $this->input->post('invc');
 			$ngitung= $this->produk_model->voiceget($invc)->num_rows();
 			if ($ngitung < 1) {
 				$notif['data'] ="<div class='alert bg-danger' role='alert'><em class='fa fa-lg fa-warning'>&nbsp;</em>Data tidak di temukan</div>" ;
 				$this->template->load('user/userdashboard','user/isi/cekinvoice',$notif);
 			} else {
 				$data['vc']= $this->produk_model->voiceget($invc)->row();
 				$data['id']= $this->produk_model->voicedetget($invc)->row();
 				$data['order']= $this->produk_model->voicegetorder($invc)->result();
 				$this->template->load('user/userdashboard','user/isi/cekinvc',$data);
 			}
 		}
 		
 	}

 	function procbayar(){
 		$namafile = $this->input->post('ivc'); 
 		$tgl = date('ymd');

    	$conf['upload_path'] 	='./bukti_tf/';  
    	$conf['allowed_types']	='jpg|png|';
    	$conf['file_name']		=$namafile.$tgl;
    	$conf['max_size']		=100;
    	$conf['max_width']		=1024;
    	$conf['max_height']		=768;
    	$conf['overwrite']		=true;

    	$this->load->library('upload',$conf);
    	$poto = $this->input->post('files');
    	if (! $this->upload->do_upload('files')) {
    		$error = array('error' => $this->upload->display_errors());
    		redirect('home/kporder');
    	} else {
    		$statdata= array(
    			'status' => 'pending'
    		);

    		$id = array(
    			'Id_invoice' => $namafile
    		);

    		$data = array(
    			'id_invoice' => $namafile,
    			'nama_bank' => $this->input->post('cekbank'),
    			'no_rekening' => $this->input->post('norek'),
    			'nama' => $this->input->post('nama_tab'),
    			'total_bayar' => $this->input->post('tobar'),
    			'bukti_tf' => $this->upload->data('file_name'),
    			'bank_to' => $this->input->post('bankto')
    		);
    		if ($this->produk_model->insertUser('transaksi',$data)) {
    			$this->produk_model->editdata('invoice',$statdata,$id);
    			redirect('home/userdashboard');
    		}
    	}
 		}


 		//Controller admin//

 		public function addproduk(){
 			$this->template->load('admin/wraper','admin/form/addproduk');
 		}

 		public function addkategori(){
 			$this->template->load('admin/wraper','admin/form/addkategori');
 		}

 		//PRODUK
 		public function addProses(){

 		$seleksi = $this->input->post('seleksi');
 		switch ($seleksi) {
 			case 'produk':
 			$namafile = $this->input->post('nama'); 
 			$tgl = date('ymd');

    		$conf['upload_path'] 	='./foto_produk/';  
    		$conf['allowed_types']	='jpg|png|';
    		$conf['file_name']		=$namafile.$tgl;
    		$conf['max_size']		=300;
    		$conf['max_width']		=1024;
    		$conf['max_height']		=768;
    		$conf['overwrite']		=true;

    		$this->load->library('upload',$conf);
    		$poto = $this->input->post('poto');
    		if (! $this->upload->do_upload('poto')) {
    			$error = array('error' => $this->upload->display_errors());
    			$this->template->load('admin/wraper','admin/form/addproduk',$error);
    		} else {
    			$data = array(
    				
    				'nama_produk' => $this->input->post('nama'),
    				'harga_produk' => $this->input->post('harga'),
    				'produk_desc' => $this->input->post('desk'),
    				'id_kategori' => $this->input->post('kat'),
    				'id_brand' => $this->input->post('merk'),
    				'produk_qty' => $this->input->post('jml'),
    				'image' =>  $this->upload->data('file_name')
    			);
    			if ($this->produk_model->insertUser('produk',$data)) {
    				$notif = "<div class='alert bg-success'><i class='fa fa-alert'></i>Tambah Data berhasil</div>";
 					$this->session->set_flashdata('notif',$notif);
    				redirect('home/showproduct');
    			}
    		}
    			break;
 			
 			case 'vendor':
 				$data = array(
    				
    				'nama' => $this->input->post('nama'),
    				'email' => $this->input->post('email'),
    				'alamat' => $this->input->post('alamat'),
    				'no_telp' => $this->input->post('telp')
    			);

 				if ($this->produk_model->insertUser('vendor',$data)) {
    				$notif = "<div class='alert bg-success'><i class='fa fa-alert'></i>Tambah Data berhasil</div>";
 					$this->session->set_flashdata('notif',$notif);
    				redirect('home/allvendor');
    			}

 				break;

 			case 'kategori':
 					$data = array(
    				
    				'nama_kategori' => $this->input->post('nama')
    				
    			);

 				if ($this->produk_model->insertUser('kategori',$data)) {
    				$notif = "<div class='alert bg-success'><i class='fa fa-alert'></i>Tambah Data berhasil</div>";
 					$this->session->set_flashdata('notif',$notif);
    				redirect('home/showkategori');
    			}

 				break;
 		}

 		}

 		public function editftpr(){

 					$id = $this->input->post('idk');
 					$namafile = $this->input->post('nama'); 
 					$tgl = date('ymd');

    				$conf['upload_path'] 	='./foto_produk/';  
    				$conf['allowed_types']	='jpg|png|';
    				$conf['file_name']		=$namafile.$tgl;
    				$conf['max_size']		=300;
    				$conf['max_width']		=1024;
    				$conf['max_height']		=768;
    				$conf['overwrite']		=true;

    				$this->load->library('upload',$conf);
    				    				
    				if (! $this->upload->do_upload('poto')) {
    					$error = array('error' => $this->upload->display_errors());
    					redirect('home/editproduk/'.$id);
    					} else {
    						
    						$where = array(
    							'Id_produk' => $id
    						);
    						$data = array(
    							'image' =>  $this->upload->data('file_name')
    						);
    						if ($this->produk_model->editdata('produk',$data,$where)) {
    						$this->session->set_flashdata('notif','Edit Foto Sukses');
    						redirect('home/editproduk/'.$id);
    						} 
    				}
 		}

 		public function editproduk(){
 			$id = $this->uri->segment(3);
 			$idp = array('Id_produk' => $id);
 			$data['where'] = $this->produk_model->getdataw($idp,'produk')->row();
 			// echo "<pre>";
 			// print_r($data);
 			// echo "</pre>";
 			$this->template->load('admin/wraper','admin/form/editproduk',$data);
 		}

 		public function editvendor(){
 			$id = $this->uri->segment(3);
 			$idp = array('id_vendor' => $id);
 			$data['where'] = $this->produk_model->getdataw($idp,'vendor')->row();
 			// echo "<pre>";
 			// print_r($data);
 			// echo "</pre>";
 			$this->template->load('admin/wraper','admin/form/editvendor',$data);
 		}

 		//show data

 		public function showkategori(){
 			$data['value'] = $this->produk_model->getData('kategori')->result();
 			$data['count'] = $this->produk_model->getData('kategori')->num_rows();
 			$this->template->load('admin/wraper','admin/isi/showkategori',$data);
 		}

 		public function showbrand(){
 			$data['value'] = $this->produk_model->getData('brand')->result();
 			$data['count'] = $this->produk_model->getData('brand')->num_rows();
 			$this->template->load('admin/wraper','admin/isi/showbrand',$data);
 		}

 		public function orderan(){
 			$this->template->load('admin/wraper','admin/isi/orderan');
 		}

 		public function showproduct(){
 			$data['value'] = $this->produk_model->getData('produk')->result();
 			$data['count'] = $this->produk_model->getData('produk')->num_rows();
 			$this->template->load('admin/wraper','admin/isi/showproduct',$data);
 		}

 		public function showtransaksi(){
 			$data['value'] = $this->produk_model->getData('transaksi')->result();
 			$data['count'] = $this->produk_model->getData('transaksi')->num_rows();
 			$this->template->load('admin/wraper','admin/isi/showtransaksi',$data);
 		}

 		public function showCs(){
 			$this->template->load('admin/wraper','admin/isi/showcustomers');
 		}

 		public function allCs(){
 			$data['value'] = $this->produk_model->getData('customers')->result();
 			$data['count'] = $this->produk_model->getData('customers')->num_rows();
 			$this->template->load('admin/wraper','admin/isi/allCs',$data);
 		}

 		public function allvendor(){
 			$data['value'] = $this->produk_model->getData('vendor')->result();
 			$data['count'] = $this->produk_model->getData('vendor')->num_rows();
 			$this->template->load('admin/wraper','admin/isi/allvendor',$data);
 		}

 		//end show data

 		public function editproses(){
 			$seleksi = $this->input->post('seleksi');
 			switch ($seleksi) {
 				case 'produk':
 				
 					$id = $this->input->post('idk');
		
    				$where = array(
    					'Id_produk' => $id
    				);
    				
    				$data = array(
    					'vendor' =>  $this->input->post('vendor'),
    					'nama_produk' => $this->input->post('nama'),
    					'harga_produk' => $this->input->post('harga'),
    					'produk_desc' => $this->input->post('desk'),
    					'id_kategori' => $this->input->post('kat'),
    					'id_brand' => $this->input->post('merk'),
    					'produk_qty' => $this->input->post('jml'),
    				);
    				
    					if ($this->produk_model->editdata('produk',$data,$where)) {
    							
    						$notif = "<div class='alert bg-success'><i class='fa fa-alert'></i>Data berhasil di update</div>";
 							$this->session->set_flashdata('notif',$notif);
    						redirect('home/showproduct');
    					} 
 					break;

 				case 'vendor':
 					$id = $this->input->post('idk');
		
    				$where = array(
    					'id_vendor' => $id
    				);
    				
    				$data = array(
    					
    					'nama' => $this->input->post('nama'),
    					'email' => $this->input->post('email'),
    					'alamat' => $this->input->post('alamat'),
    					'no_telp' => $this->input->post('telp')
    				
    				);
    				
    					if ($this->produk_model->editdata('vendor',$data,$where)) {
    							
    						$notif = "<div class='alert bg-success'><i class='fa fa-alert'></i>Data berhasil di update</div>";
 							$this->session->set_flashdata('notif',$notif);
    						redirect('home/allvendor');
    					} 
 					break;
 					
 			}
 		}

 		public function delproduk(){
 			$id = $this->uri->segment(3);
 			$where = array(
 				'Id_produk' => $id
 			);
 			if ($this->produk_model->deldata('produk',$where)) {
 				$notif = "<div class='alert bg-success'><i class='fa fa-alert'></i>Data berhasil di hapus</div>";
 				$this->session->set_flashdata('notif',$notif);
 				redirect('home/showproduct');
 			}
 		}

 		public function delvendor(){
 			$id = $this->uri->segment(3);
 			$where = array(
 				'id_vendor' => $id
 			);
 			if ($this->produk_model->deldata('vendor',$where)) {
 				$notif = "<div class='alert bg-success'><i class='fa fa-alert'></i>Data berhasil di hapus</div>";
 				$this->session->set_flashdata('notif',$notif);
 				redirect('home/allvendor');
 			}
 		}


 		public function admInvoice(){
 			$data['count'] = $this->produk_model->getData('invoice')->num_rows();
 			$data['invoice'] = $this->produk_model->getData('invoice')->result();
 			$this->template->load('admin/wraper','admin/isi/invoice',$data);
 		}

 		public function admkonfirmivc(){
 			$this->template->load('admin/wraper','admin/isi/invoice');
 		}

 		public function addproduct(){
 			$this->template->load('admin/wraper','admin/isi/addproduct');
 		}

 		

 		public function addvendor(){
 			$this->template->load('admin/wraper','admin/form/addvendor');
 		}

 		public function admkonfirm(){
 			$idvc = $this->uri->segment(3);
 			$data['idns'] = $this->produk_model->datagetwhere($idvc,'transaksi')->row();
 			$this->template->load('admin/wraper','admin/isi/konfrmpay',$data);
 		}

 		public function setToComplete(){
 			$idns = $this->input->post('id');
 			$data = array(
 				'status' => 'complete'
 			);

 			$where = array(
 				'Id_invoice' => $idns
 			);

 			if ($this->produk_model->editdata('invoice',$data,$where)) {
 				$flash = array('cek' => "<div class='alert bg-succes' >Konfirmasi pembayaran ".$idns." sukses");
 				$this->session->set_flashdata($flash);
				redirect('home/admInvoice'); 				
 			}
 		}

}	 	
?>