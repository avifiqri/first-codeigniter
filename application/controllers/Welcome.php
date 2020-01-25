<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('auth',['email' => $this->session->userdata('email')])->row_array();
		$data['barang'] = $this ->model_products->tampil_data()->result();
		$this->load->view('template/header');
		$this->load->view('template/sidebar',$data);
		$this->load->view('dashboard',$data);
		$this->load->view('template/footer');

	}
	public function tambah_keranjang($id){
		$barang = $this->model_products->find($id);

		$data = array(
			'id' 	=> $barang->id,
			'qty' 	=> 1,
			'price' => $barang->harga,
			'name'	=>$barang->name_brg
 		);
		
		 $this->cart->insert($data);
		 redirect('Welcome');
	}

	public function detail_keranjang()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('keranjang');
		$this->load->view('template/footer');

	}
	public function hapusKeranjang()
	{
		$this->cart->destroy();
		redirect('Welcome/detail_keranjang');
	}
	public function pembayaran()
	{
		$this->load->view('template/header');
		$this->load->view('template/sidebar');
		$this->load->view('pembayaran');
		$this->load->view('template/footer');

	}
	public function proses_pesanan()
	{
	
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',
		['matches'=> 'kurang lengap',
		]);

		if ($this->form_validation->run() == false) {

			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('pembayaran');
			$this->load->view('template/footer');
			
	}else {

		$is_proses = $this->model_invoice->proses();
		if($is_proses) {
			$this->cart->destroy();
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('proses_pesanan');
			$this->load->view('template/footer');
	
		}else {
			echo "<h1> maaf yang anda proses gagal </h1>";
		}
	}

	}

	public function detail($id) 
	{
		$data['barang'] = $this->model_products->detail_brg($id);
			$this->load->view('template/header');
			$this->load->view('template/sidebar');
			$this->load->view('details_brg',$data);
			$this->load->view('template/footer');
	}


}
