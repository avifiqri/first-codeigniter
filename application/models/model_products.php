<?php

class Model_products extends CI_Model
{
    // untuk menampilkan data data dari database
    public function tampil_data()
    {
        return $this->db->get('products');
    }
    // untuk create data ke database
    public function tambah_barang($data,$table)
    {
        $this->db->insert($table,$data);
    }
    // untuk mengedit data ke database
    public function edit_barang($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    // untuk perubahan data yang telah di edit
    public function update_barang($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    // delete data ke data base
    public function hapus_barang($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);   
    
    }
    
    public function find($id)
    {
        $result = $this->db->where('id',$id)->limit(1)->get('products');
        if($result->num_rows() > 0 )
        {
            return $result->row();
        } else
        {
            return array();
        }        
    }

    public function detail_brg($id)
    {
        $result = $this->db->where('id', $id)->get('products');

        if($result->num_rows() > 0) {
            return $result->result();
        }else {
            return false;
        }
    }
}


