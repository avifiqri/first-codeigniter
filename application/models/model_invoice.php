<?php 

class Model_invoice extends CI_Model {

    public function proses()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');

        $invoice = array(

            'nama'      => $nama,
            'alamat'    => $alamat,
            'tgl_pesan' =>date('Y-m-d H:i:s'),
            'batas_bayar' => date('Y-m-d H:i:s',mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1,date('Y'))), 
        );

        $this->db->insert('invoice',$invoice);
        $id_invoice = $this->db->insert_id();
        
        foreach($this->cart->contents() as $item) {
            $data  = array(
                'id_invoice' => $id_invoice,
                'id_brg'      => $item['id_brg'],
                'name_brg'    => $item['name_brg'],
                'jumlah'      =>$item['jumlah'],
                'harga'       =>$item['harga'],
            );
            $this->db->insert('pesanan', $data);
        }
        return TRUE;

    }

    public function tampil_data()
    {
        $result = $this->db->get('invoice');
        if($result->num_rows() >0) {
            return $result->result;
        }else {
            return false;
        }

    }
}