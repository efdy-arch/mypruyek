<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<div class="container-fluid">
    <title><?= $title; ?></title>
    <h6><?= $title; ?></h6>
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success">
            <?= session('success') ?>
        </div>
    <?php endif ?>
    <div class="table-responsive-sm">
        <table class="table table-sm table-hover table-dark">
            <thead>
                <tr>
                    <th>No</th>
                    <th scope="col">Nama Klien</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Metode Pembayaran</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Tanggal Transaksi</th>
                    <th scope="col">Status</th>
                    <th scope="col">Status Pembayaran</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                foreach ($transaksi as $transaksi) : ?>
                    <tr class="content text-dark">
                        <td class="table-dark"><?= $i++; ?></td>
                        <td class="table-info"><?= $transaksi['nama_klien']; ?></td>
                        <td class="table-warning"><?= $transaksi['nama_produk']; ?></td>
                        <td class="table-info"><?= $transaksi['metode_pembayaran']; ?></td>
                        <td class="table-warning"><?= $transaksi['jumlah']; ?></td>
                        <td class="table-info">Rp<?= number_format($transaksi['harga'], 0, ',', '.'); ?></td>
                        <td class="table-warning"><?= $transaksi['created_at']; ?></td>
                        <td class="table-danger"><?= $transaksi['status']; ?></td>
                        <td class="table-warning"><?= $transaksi['status_pembayaran']; ?></td>
                        <td class="table-info d-flex ">
                            <a class="btn btn-sm btn-primary table-info" href="<?= base_url(); ?>Admin/DetailTransaksi/<?= $transaksi['id']; ?>"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                                </svg></a>
                            <a data-toggle="modal" data-target="#hapusModal<?= $transaksi['id']; ?>" class="btn btn-sm btn-danger table-info" href="<?= base_url(); ?>Admin/HapusTransaksi/<?= $transaksi['id']; ?>"><i class="fas fa-trash"></i></a>
                            <div class="modal fade" id="hapusModal<?= $transaksi['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Menghapus data Transaksi</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>
                                        <div class="modal-body">Anda yakin ingin menghapus transaksi <?= $transaksi['nama_produk']; ?> dari <?= $transaksi['nama_klien']; ?>?</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                            <a class="btn btn-danger" href="<?= base_url(); ?>Admin/HapusTransaksi/<?= $transaksi['id']; ?>">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>

        </table>

        <style>
            .tbody {
                vertical-align: middle !important;
                align-items: center;
                justify-content: center;
            }
        </style>
    </div>
</div>
<?= $this->endSection(); ?>