<?php

class User extends CI_Controller {
    
    public function index()
    {
        $data['user'] = $this->db->get_where('auth',['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('user/header');
		$this->load->view('user/sidebar',$data);
		$this->load->view('user/index',$data);
		$this->load->view('user/footer');
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('auth',['email' => $this->session->userdata('email')])->row_array();
		$this->load->view('user/header');
		$this->load->view('user/sidebar',$data);
		$this->load->view('user/edituser',$data);
		$this->load->view('user/footer');


    }

}