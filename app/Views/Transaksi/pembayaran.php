<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<div class="container-fluid">
    <h1><?= $title; ?></h1>
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success">
            <?= session('success') ?>
        </div>
    <?php endif; ?>
    <?php
    $metode = $transaksi['metode_pembayaran'];
    if ($metode == 'Transfer Bank') :
    ?>
        <form action="<?= base_url(); ?>/Transaksi/konfirmasi_bayar/<?= $transaksi['id']; ?>" class="row g-3" method="post" enctype="multipart/form-data">
            <div class="col-md-6 d-flex inline">
                <label for="produk" class="label">Nama Produk</label>
                <input type="text" class="form-control mx-6" name="nama_produk" value="<?= $transaksi['nama_produk']; ?>" readonly>
                <input type="hidden" class="form-control mx-6" name="id_transaksi" value="<?= $transaksi['id']; ?>" readonly>
            </div>
            <div class="col-md-6 d-flex inline">
                <label for="produk" class="label">Total Harga</label>
                <input type="text" name="total_harga" id="" value="Rp<?= number_format($transaksi['total_harga'], 0, ',', '.'); ?>.00" class="form-control" readonly>
            </div>
            <div class="col-md-6">
                <label for="tf">Lakukan Pembayaran Senilai :</label>
                <input type="text" class="form-control" value="Rp<?= number_format($transaksi['total_harga'], 0, ',', '.'); ?>.00" name="total_hargas" readonly>
            </div>
            <div class="col-md-6">
                <label for="tf">Nomor Rekening :</label>
                <input type="text" class="form-control" value="8957564655766755" readonly>
            </div>
            <div class="col-md-6">
                <label for="tf">Atas Nama :</label>
                <input type="text" class="form-control" value="MogaLaris Corp" readonly>
            </div>
            <div class="col-md-6">
                <label for="tf">Upload Bukti Pembayaran Disini :</label>
                <input type="file" class="form-control" name="bukti_pembayaran" required>
            </div>
            <div class="col-md-6">
                <label for="tf">Nama Anda:</label>
                <input type="text" class="form-control" name="nama_klien" required>
            </div>
            <div class="col-md-6 my-3">
                <button type="submit" class="btn btn-info">Konfirmasi </button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>


        </form>
    <?php endif ?>
    <style>
        .col-md-5 {
            margin-top: 1rem;
        }

        .form {
            justify-content: center;
            align-items: center;
            margin-left: 2rem;
        }

        .container-fluid {
            justify-content: center;
            align-items: center;
        }
    </style>
</div>

<?= $this->endSection(); ?>