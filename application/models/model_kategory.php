<?php 

class Model_kategory extends CI_Model {

    public function data_kemeja_flanel()
    {
        $this->db->get_where('products', array('kategori'=> 'kemeja_flanel'));
    }

}