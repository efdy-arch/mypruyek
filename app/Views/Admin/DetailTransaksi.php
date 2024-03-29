<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<div class="container-fluid">
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success">
            <?= session('success') ?>
        </div>
    <?php endif; ?>
    <h3><?= $title; ?></h3>
    <div class="action">
        <a href="<?= base_url(); ?>/Admin/ApprovedTransaksi/<?= $transaksi['id']; ?>" class="btn btn-info btn-sm mb-2"><i class="fas fa-check"></i> Approved</a>
        <?php
        $statuss = $transaksi['status'];
        if ($statuss == 'Approved') :

        ?>
            <button class="btn btn-success mx-4 btn-sm mb-2" onclick="printForm()"><i class="fas fa-print"></i> Cetak Form</button>
        <?php endif ?>

    </div>

    <div class="form-container" id="formKu">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-dark" border="1">
                <tr>
                    <th>ID Transaksi</th>
                    <th>Nama Klien</th>
                    <th>Nama Produk</th>
                    <th>No Telepon</th>
                    <th>Jumlah</th>
                    <th>Harga</th>

                </tr>
                <tr class="text-dark table-info">
                    <td><?= $transaksi['id']; ?></td>
                    <td><?= $transaksi['nama_klien']; ?></td>
                    <td><?= $transaksi['nama_produk']; ?></td>
                    <td><?= $transaksi['no_telpon']; ?></td>
                    <td><?= $transaksi['jumlah']; ?></td>
                    <td>Rp<?= number_format($transaksi['harga'], 0, ',', '.'); ?>.00</td>
                </tr>
                <tr>
                    <th>Kabupaten</th>
                    <th>Kota</th>
                    <th>Alamat</th>
                    <th>Alamat Detail</th>
                    <th>Kode Pos</th>
                    <th>Total Harga</th>
                </tr>
                <tr class="text-dark table-info">
                    <td><?= $transaksi['provinsi']; ?></td>
                    <td><?= $transaksi['kota']; ?></td>
                    <td><?= $transaksi['alamat']; ?></td>
                    <td><?= $transaksi['alamat_detail']; ?></td>
                    <td><?= $transaksi['kode_pos']; ?></td>
                    <td>Rp<?= number_format($transaksi['harga'], 0, ',', '.'); ?>.00</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <th>Status Pembayaran</th>
                    <th>Metode Pembayaran</th>
                    <th>Tanggal Pesan</th>
                    <th>Tanggal Konfirmasi</th>
                    <th>Bukti Pembayaran</th>
                </tr>
                <tr class="text-dark">
                    <td class="table-danger"><?= $transaksi['status']; ?></td>
                    <td class="table-danger"><?= $transaksi['status_pembayaran']; ?></td>
                    <td class="table-info"><?= $transaksi['metode_pembayaran']; ?></td>
                    <td class="table-info"><?= $transaksi['created_at']; ?></td>
                    <td class="table-info"><?= $transaksi['updated_at']; ?></td>
                    <td class="table-danger text-center">
                        <?php
                        $bukti = $transaksi['status_pembayaran'];
                        if ($bukti == 'Approved') :
                        ?>
                            <a href="<?= base_url(); ?>/lihat_bukti_bayar/<?= $transaksi['id']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-folder">View</i></a>
                        <?php elseif ($bukti == 'waiting') : ?>
                            Menunggu
                        <?php endif ?>
                    </td>
                </tr>
            </table>
        </div>
        <style>
            @media print {

                /* Set the width and display properties for form items */
                .form-container div {
                    display: inline-block !important;
                    width: 30% !important;
                    /* Adjust the width as needed */
                }
            }
        </style>


        <script>
            function printForm() {
                // Salin isi form ke jendela pop-up
                var printWindow = window.open('', '_blank');
                printWindow.document.open();
                printWindow.document.write('<html><head><title>Cetak Form</title></head><body>');
                printWindow.document.write(document.getElementById('formKu').innerHTML);
                printWindow.document.write('</body></html>');
                printWindow.document.close();

                // Cetak jendela pop-up
                printWindow.print();
            }
        </script>
    </div>

</div>

<?= $this->endSection(); ?>