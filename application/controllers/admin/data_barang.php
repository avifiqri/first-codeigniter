<?php
class Data_barang extends CI_Controller 
{
    public function index()
    {
        $data['barang'] = $this->model_products->tampil_data()->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/data_barang',$data);
        $this->load->view('template_admin/footer');

    }

    //menambahkan method untuk tambah aksi
    public function tambah_aksi()
    {
        $name_brg           = $this->input->post('name_brg');
        $harga              = $this->input->post('harga');
        $stok               = $this->input->post('stok');
        $kategori           = $this->input->post('kategori');
        $deskripsi          = $this->input->post('deskripsi');
        $gambar             = $_FILES['gambar']['name'];
        if ($gambar = ''){} else
        {
            $config['upload_path'] = './uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload',$config);
            if(!$this->upload->do_upload('gambar'))
            {
                echo "Gambar gagal di upload";
            }else 
            {
                $gambar = $this->upload->data('file_name');

            }
        }
        // data di arraykan
        $data = array
        (
            'name_brg'    => $name_brg,
            'harga'       => $harga,
            'stok'        => $stok,
            'kategori'    => $kategori,
            'deskripsi'   => $deskripsi,
            'gambar'      => $gambar

        );

        $this->model_products->tambah_barang($data,'products');
        redirect('admin/data_barang');
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $data['barang'] = $this->model_products->edit_barang($where,'products')->result();
        $this->load->view('template_admin/header');
        $this->load->view('template_admin/sidebar');
        $this->load->view('admin/edit_barang',$data);
        $this->load->view('template_admin/footer');

    }

    public function update()
    {
        $id                 = $this->input->post('id');
        $name_brg           = $this->input->post('name_brg');
        $harga              = $this->input->post('harga');
        $stok               = $this->input->post('stok');
        $kategori           = $this->input->post('kategori');
        $deskripsi          = $this->input->post('deskripsi');

        $data = array
        (
            'name_brg'    => $name_brg,
            'harga'       => $harga,
            'stok'        => $stok,
            'kategori'    => $kategori,
            'deskripsi'   => $deskripsi,

        );

        $where = array(
            'id' => $id
        );

        $this->model_products->update_barang($where, $data, 'products');
        redirect('admin/data_barang');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->model_products->hapus_barang($where,'products');
        redirect('admin/data_barang');
    }
}