<div class="container-fluid">
    <h3>Edit Data Barang</h3>
    <?php foreach ($barang as $brg ): ?>
    <form method="post" action="<?php echo base_url().'admin/data_barang/update'?>">
    <div class="form-group">
        <label> Nama Barang</label>
        <input type="text" name="name_brg" class="form-control" value="<?= $brg->name_brg ?>">
    </div>
    <div class="form-group">
        <label> Harga Barang</label>
        <input type="text" name="harga" class="form-control" value="<?= $brg->harga ?>">
    </div>
    <div class="form-group">
        <label> Stok Barang</label>
        <input type="text" name="stok" class="form-control" value="<?= $brg->stok ?>">
    </div>
    <div class="form-group">
        <label> Deskripsi Barang</label>
        <input type="text"  name="deskripsi" class="form-control" value="<?= $brg->deskripsi ?>">
    </div>
    <div class="form-group">
        <label> Kategori Barang</label>
        <input type="hidden" name="id" class="form-control" value="<?= $brg->id ?>">
        <input type="text" name="kategori" class="form-control" value="<?= $brg->kategori ?>">
    </div>
        <button type="submit" class="btn btn-primary"> Update</button>    
    </form>

    <?php endforeach; ?>
</div>