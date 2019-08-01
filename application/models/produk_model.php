<?php 
	class Produk_model extends CI_Model{
	
		public function setLogin($user,$passdecript){
			return $this->db->query("select * from user where username='$user' and password='$passdecript'");
		}


		public function getData($tables){
			return $this->db->get($tables);
		}

		function get_all($perpage, $start){
			return $this->db->get('produk', $perpage, $start);
		}

		public function get_cat_key($keyword)
		{
			$this->db->select('*');
			$this->db->from('produk');
			$this->db->like('nama_produk',$keyword);
			$this->db->or_like('harga_produk',$keyword);
			return $this->db->get();
		}

		public function count_all(){
			return $this->db->get('produk')->num_rows();
		}

		public function get_where($cat){
			return $this->db->get_where('produk',array('id_kategori'=>$cat));
		}

		public function findId($id){
			$this->db->where('Id_produk', $id);
			return $this->db->get('produk')->row();
		}

		public function findCus($id){
			$this->db->where('login_name', $id);
			return $this->db->get('customers')->row();
		}

		public function insertUser($tables,$data){
			return $this->db->insert($tables,$data);
		}		

		public function insertorder($data){
			return $this->db->insert_batch('order',$data);
		}

		public function setPayment(){
			return $this->db->get('payment_list')->result();
		}

		public function fetch_data($query){
			$this->db->select('*');
			$this->db->from('order');
			if($query != ''){
				$this->db->like('nama_produk',$query);
			} 
			$this->db->order_by('id_order','DESC');
			return $this->db->get();
		}

		public function getOrderku($idcus){
			$this->db->where('Id_cus', $idcus);
			$this->db->order_by('id_produk', 'ASC');
			return $this->db->get('order');
		}

		public function editdata($tables,$data,$id){
			$query=$this->db->update($tables,$data,$id);
			return $query;
		}


		public function findvoice($where){
			$this->db->where('Id_cus',$where);
			return $this->db->get('invoice');
		}

		public function voiceget($voice){
			$this->db->where('Id_invoice',$voice);
			return $this->db->get('invoice');
		}

		public function voicedetget($voice){
			$this->db->where('Id_invoice',$voice);
			return $this->db->get('invoice_detail');
		}

		public function voicegetorder($voice){
			$this->db->where('id_invoice',$voice);
			return $this->db->get('order');
		}

		public function datagetwhere($where,$table){
			$this->db->where('id_invoice',$where);
			return $this->db->get($table);
		}

		public function getdataw($where,$table){
			$this->db->where($where);
			return $this->db->get($table);
		}

		public function deldata($table,$where){
			return $this->db->delete($table,$where);
		}
}


?>