<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<div class="container-fuid ">
    <div class="card mb-3 mx-4" style="max-width: 1000px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?= base_url('img'); ?>/<?= $bukti['bukti_pembayaran']; ?>" class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <table class="table table-dark table-hover">
                        <tr>
                            <th>Nama</th>
                            <td><?= $bukti['nama_klien']; ?></td>
                        </tr>
                        <tr>
                            <th>Total Harga Produk</th>
                            <td><?= $bukti['total_harga']; ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Bayar</th>
                            <td><?= $bukti['created_at']; ?></td>
                        </tr>
                        <tr>
                            <th>Pembayaran Untuk</th>
                            <td><?= $bukti['nama_produk']; ?></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>