<div class="container-fluid">
    <div class="row">
        <!-- modal button tambah -->
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambahdata"><i class="fa fa-plus"> </i> Tambah data</button>
        
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Deskripsi</th>
                <th>Kategory</th>
                <th colspan="3">Aksi</th>
            </tr>
            
            <?php
            $no =1;
            foreach ($barang as $brg ) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $brg->name_brg ?></td>
                    <td><?= $brg->harga ?></td>
                    <td><?= $brg->stok ?></td>
                    <td><?= $brg->kategori ?></td>
                    <td><?= $brg->deskripsi ?></td>
                    <td><div class="btn btn-primary"> <i class="fas fa-search-plus"></i></div></td>
                    <td><?php echo anchor('admin/data_barang/edit/'. $brg->id , '<div class="btn btn-success">
                     <i class="fa fa-edit"></i></div>' ) ?></td>
                    <td><?= anchor('admin/data_barang/hapus/'. $brg->id , '<div class="btn btn-danger"> <i class="fa fa-trash"></i></div>' ) ?></td>

                </tr>

                <?php endforeach ?>
        
        </table>


<!-- Modal -->
<div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url().'admin/data_barang/tambah_aksi'; ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label >Nama Barang</label>
            <input type="text" name="name_brg" class="form-control" placeholder="masukan nama barang" >
            </div>
            <div class="form-group">
            <label >Harga Barang</label>
            <input type="text" name="harga" class="form-control" placeholder="masukan harga barang">
            </div>
            <div class="form-group">
            <label > Stok Barang</label>
            <input type="text" name="stok" class="form-control" placeholder="masukan stok barang">
            </div>
            <div class="form-group">
            <label >Kategori Barang</label>
            <input type="text" name="kategori" class="form-control" placeholder="masukan kategori barang">
            </div>
            <div class="form-group">
            <label >Deskripsi Barang</label>
            <textarea type="text" name="deskripsi" class="form-control" row="30"></textarea>
            </div>
            <div class="form-group">
            <label >Gambar Barang</label>
            <input type="file" name="gambar" class="form-control" >
            </div>
          </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Save Data</button>
      </div>
      
      </form>

      </div>
  </div>
</div>

    </div>
</div>