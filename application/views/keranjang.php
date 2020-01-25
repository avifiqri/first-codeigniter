<div class="contaianer-fluid">
    <h4 class="text-center mb-4"> Keranjang Belanja anda</h4>

    <table class ="table table-bordered table-striped table-hover">
        <tr align="center">
            <td>No</td>
            <td>Nama Product</td>
            <td>Jumlah</td>
            <td>Harga</td>
            <td>Sub-Total</td>
        </tr>
        <?php
        $no = 1;
            foreach ($this->cart->contents() as $items) : ?>
            <tr align="center">
                <td><?= $no++ ?></td>
                <td><?= $items['name'] ?></td>
                <td><?= $items['qty'] ?></td>
                <td>Rp. <?= number_format($items['price'], 0,".",",") ?></td>
                <td>Rp. <?=number_format($items['subtotal'], 0,".","," ) ?></td>
            </tr>
        <?php endforeach ?>
            <tr>
                <td colspan="3"></td>
                <td align="center">Total</td>
                <td align="center">Rp. <?=number_format($this->cart->total(), 0,".","," ) ?></td>
            </tr>
    </table>
    <div align="right">
       <a href="<?= base_url('Welcome/hapusKeranjang') ?>">
            <div class="btn btn-danger"> Hapus Keranjang</div>
       </a> 

       <a href="<?= base_url('Welcome') ?>">
            <div class="btn btn-info"> Lanjut Belanja</div>
       </a> 
       <a href="<?= base_url('Welcome/pembayaran') ?>">
            <div class="btn btn-primary"> Pembayaran Keranjang</div>
       </a> 


    </div>
</div>