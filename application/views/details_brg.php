<div class="container-fluid">
    <div class="card">
    <?php foreach($barang as $brg) : ?>

        <h4 class="card-header bg-primary" style="color:black; text-align:center;"> Details Product <?= $brg->name_brg ?> </h4>
        <div class="card-body">
            <div class="row">

                <div class="col-md-4">
                    <img src="<?= base_url().'/uploads/'.$brg->gambar?>" class="card-img-top"  >
                </div>

                <div class="col-md-8">
                    <table class="table">
                        <tr>
                            <td>Name Product</td>
                            <td><strong><?= $brg->name_brg ?></strong></td>
                        </tr>
                        <tr>
                            <td>Harga Product</td>
                            <td> <strong><?= $brg->harga ?></strong></td>
                        </tr>
                    </table>
                </div>

            </div>
                <?php endforeach ?>
        </div>
    </div>
</div>