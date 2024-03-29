<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<div class="container-fluid">
    <h1><?= $title; ?></h1>
    <?php foreach ($transaksi as $pesanan) : ?>
        <div class="card mb-1 mx-3" style="max-width: 600px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?= base_url(); ?>/img/<?= $pesanan['gambar_produk']; ?>" class="img-fluid rounded-start" alt="..." width="141">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?= $pesanan['nama_produk']; ?></h5>
                        <p class="card-text"><small>Rp<?= number_format($pesanan['total_harga'], 0, ',', '.'); ?>.00</small></p>
                        <p class="card-text"><small>Banyaknya :<?= $pesanan['jumlah']; ?></small></p>
                        <p class="card-text"><small>Status : <?= $pesanan['status']; ?></small></p>
                        <p class="card-text"><small class="text-body-secondary">Tgl Pemesanan: <?= $pesanan['created_at']; ?></small></p>
                        <?php $metode = $pesanan['metode_pembayaran'];
                        $status = $pesanan['status_pembayaran'];
                        $admin = $pesanan['status'];
                        if ($metode == 'Transfer Bank' && $admin == 'waiting') : ?>
                            <small class="card-text">Menunggu Penjual Mengkonfirmasi Pemesanan</small><br>
                            <small class="text-light">Metode Pembayaran: <?= $pesanan['metode_pembayaran']; ?></small>
                        <?php elseif ($metode == 'Transfer Bank' && $status == 'waiting' && $admin == 'Approved') :
                        ?>
                            <small><a href="<?= base_url(); ?>/Transaksi/pembayaran/<?= $pesanan['id']; ?>" class="btn btn-primary"><small>Lakukan Pembayaran</small></a></small>
                        <?php elseif ($metode == 'COD' && $admin == 'waiting') : ?>
                            <small class="card-text">Menunggu Persetujuan Penjual</small><br>
                            <small class="text-light">Metode Pembayaran: <?= $pesanan['metode_pembayaran']; ?></small>
                        <?php elseif ($metode == 'COD' && $admin == 'Approved') : ?>
                            <small class="text-light">Pesananmu telah disetujui!!</small><br>
                            <small class="card-text">Lakukan pembayaran saat barang sampai!</small>
                            <small class="card-text table-warning text-dark">Sedang Dikemas</small>
                        <?php elseif ($metode == 'Transfer Bank' && $status == 'Approved' && $admin == 'Approved') : ?>
                            <small class="card-text table-warning text-dark">Sedang Dikemas</small>
                        <?php endif ?>
                    </div>
                </div>

            </div>
        </div>
        <hr>
    <?php endforeach; ?>

</div>
<style>
    .card-text {
        margin-top: -18px;
        color: white;
        font-weight: bold;
        font-size: 14px;
        font-style: italic;
    }

    .card-body {
        background-color: darkslategray;
        font-weight: bold;
    }

    .col-md-4 {
        background-color: darkblue;
        vertical-align: middle;
    }

    .card-title {
        color: lightblue;
        font-weight: bold;
    }
</style>
<?= $this->endSection(); ?>