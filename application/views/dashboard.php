<div class="container-fluid">

 <!-- membuat corousel -->
<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?php echo base_url('assets/img/awal.jpg') ?>" height="500px" width="100%" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url('assets/img/kedua.jpg') ?>"  height="500px" width="100%" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="<?php echo base_url('assets/img/ketiga.jpg') ?>"  height="500px" width="100%" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev"  href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" style="color: black" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->






    <div class="row">
    <!-- Get database and card list  -->
        <?php foreach ($barang as $brg) : ?>
        <div class="card mb-3 ml-5" style="width: 18rem;">
            <img class="card-img-top" src="<?= base_url().'/uploads/'.$brg->gambar ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $brg->name_brg ?></h5>
                    <small>Rp. <?= number_format($brg->harga, 0,".",",")   ?></small> <br>
                    <big><?= $brg->kategori  ?></big>
                    <p class="card-text"><?= $brg->deskripsi ?></p>
                    <?= anchor('Welcome/tambah_keranjang/'.$brg->id, '<div class="btn btn-primary">Tambah Keranjang</div>') ?>
                    <?= anchor('Welcome/detail/'.$brg->id, '<div class="btn btn-success"> Details</div>') ?>

                </div>
        </div>
        <?php endforeach ?>
    </div>
</div>