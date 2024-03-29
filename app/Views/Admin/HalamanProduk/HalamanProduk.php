<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<style>
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(10rem, 1fr));
        gap: 5px;
        max-width: 6 * (18rem + 10px);
        margin: 0 auto;
        margin-top: 0;
    }

    .card {
        width: 10rem;
        height: 15rem;
        margin-bottom: 10px;
        background-color: white;
    }


    .card-body {
        height: 5rem;
    }

    .harga {
        border: none;
        gap: 0;
        text-decoration-color: red;
        color: red;
    }

    .card-img-top {
        height: 100px;
        width: auto;
    }

    .card-title {
        color: black;
        font-size: smaller;
        margin: 0;
        padding-top: 0;
        padding-bottom: 0;
    }

    .container-fluid {
        background-image: url('danautoba.jpg');
        background-repeat: no-repeat;
        background-size: cover;
    }

    .carousel-inner img {
        width: 200px;
        height: auto;
    }
</style>
<?= $this->renderSection('produk-page'); ?>
<div class="container-fluid">
    <div class="card-grid">
        <?php foreach ($produk as $produk) : ?>

            <div class="card">
                <img src="<?= base_url(); ?>/img/<?= $produk['foto']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $produk['nama_produk']; ?></h5>
                    <small class="harga">Rp<?= number_format($produk['harga'], 0, ',', '.'); ?></small>
                </div>
                <div class="card-body row">
                    <a href="<?php echo base_url(); ?>/Admin/HalamanProduk/DetailProduk/<?= $produk['id']; ?>" class="btn btn-sm btn-primary card-link mt-0"><small>Detail</small></a>
                    <div class="col-sm-10 mb-9">
                        <form action="<?= base_url(); ?> Produk/keranjang/<?= $produk['id']; ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="nama_produk" value="<?= $produk['nama_produk']; ?>">
                            <input type="hidden" name="gambar_produk" value="<?= $produk['foto']; ?>">
                            <input type="hidden" name="harga" value="<?= $produk['harga']; ?>">
                            <input type="hidden" name="id" value="<?= $produk['id']; ?>">
                            <input type="hidden" name="slug" value="<?= $produk['slug']; ?>">
                            <?php
                            $model = model(UserModel::class);
                            $user = $model->profile();
                            ?>
                            <input type="hidden" name="id_user" id="id_user" value="<?= $user->id; ?>">


                            <button class="btnn btn-danger btn-sm mb-0" type="submit">
                                <i class="fas fa-cart-plus"></i>
                            </button>

                        </form>
                    </div>
                    <style>
                        .btn {
                            font-weight: bold;
                            /* margin-top: -25px; */
                            /* margin-left: 0px; */
                        }

                        .btnn {
                            margin-left: 70px;
                            margin-top: -100px;
                            margin-bottom: 100px;
                        }

                        .col-sm-10 {
                            margin-bottom: 10px;
                        }
                    </style>
                </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>