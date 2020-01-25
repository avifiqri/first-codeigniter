<?php

class Admin extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }


    public function index()
    {
        $data['user'] = $this->db->get_where('auth',['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('user/header');
		$this->load->view('user/sidebar',$data);
		$this->load->view('user/admin',$data);
		$this->load->view('user/footer');
    }
        // invoices page controller
    public function invoices(){
        $data['user'] = $this->db->get_where('auth',['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('user/header');
		$this->load->view('user/sidebar',$data);
		$this->load->view('user/invoice',$data);
		$this->load->view('user/footer');

    }

}