<div class="alert alert-success" style="text-align:center;" role="alert">
    <p> Pembayaran anda adalah</p>

    <?php 
        $grand_total= 0;
        if($keranjang = $this->cart->contents())
        {
            foreach($keranjang as $item)
            {
                $grand_total = $grand_total+$item['subtotal'];
            }

            echo " Rp. " . number_format($grand_total,0,',','.');
        }
    
    ?>

</div>

<div class="container-fluid">
    <div class="row">
        <form action="<?= base_url().'Welcome/proses_pesanan'; ?>" method="post">
            <div class="form-group">
                <label >Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= set_value('nama') ?>">  
                    <small class="text-danger"><?= form_error('nama') ?> </small>
            </div>
            <div class="form-group">
                <label >Alamat Lengkap</label>
                <input type="text" name="alamat" class="form-control" value="<?= set_value('alamat') ?>">
                <small class="text-danger"><?= form_error('alamat') ?> </small>
            </div>
            <div class="form-group">
                <label >Pilih Pengirim</label>
                <select name="pengirim" class="form-control">
                    <option value="JNE">JNE</option>
                    <option value="Gojek">Gojek</option>
                    <option value="JNT">JNT</option>
                </select>
            </div>
            <div class="form-group">
                <label >Pilih Bank</label>
                <select name="bank" class="form-control">
                    <option value="BCA">BCA</option>
                    <option value="BRI">BRI</option>
                    <option value="Mandiri">Mandiri</option>
                    <option value="Cimbniaga">Cimbniaga</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success" >Kirim</button>

        </form>
    </div>
</div>