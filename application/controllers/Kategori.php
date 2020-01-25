<?php 

class Kategori extends CI_Controller {

    public function kemeja_flanel()
    {
        $data['kemejaflanel'] = $this->model_kategory->data_kemeja_flanel()->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/footer');

    }
}