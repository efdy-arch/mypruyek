<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<div class="container-fluid">
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success">
            <?= session('success') ?>
        </div>
    <?php endif ?>
    <h3>Tabel Produk</h3>
    <div class="table-responsive">
        <div class="table">
            <table class="table table-striped table-hover table-dark">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">ID</th>
                        <th scope="col">Produk</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($produk as $produk) : ?>
                        <tr>
                            <td class="table-dark"><?= $i++; ?></td>
                            <th class="table-warning text-dark" scope="row"><?= $produk['id']; ?></th>
                            <td class="table-info text-dark"><?= $produk['nama_produk']; ?></td>
                            <td class="table-warning text-dark"><?= $produk['kuantitas']; ?></td>
                            <td class="table-info text-dark">Rp<?= number_format($produk['harga'], 0, ',', '.'); ?></td>
                            <td class="table-warning text-dark"><?= $produk['kategori']; ?></td>
                            <td class="table-info text-dark table-active">
                                <a href="<?= base_url(); ?>admin/produk/detailproduk/<?= $produk['id']; ?>" class="btn btn-success btn-sm"><small><i class="fas fa-folder"></i>View</small></a>
                                <a href="<?= base_url(); ?>admin/produk/editproduk/<?= $produk['id']; ?>" class="btn btn-info btn-sm"><small><i class="fas fa-edit"></i>Edit</small></a>
                                <a data-toggle="modal" data-target="#hapusModal<?= $produk['id']; ?>" href="<?= base_url(); ?>admin/produk/hapusproduk/<?= $produk['id']; ?>" class="btn btn-danger btn-sm"><small><i class="fas fa-trash"></i>Hapus</small></a>
                                <div class="modal fade" id="hapusModal<?= $produk['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menghapus produk</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin ingin menghapus <?= $produk['nama_produk']; ?>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url(); ?>/admin/produk/hapusproduk/<?= $produk['id']; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            
        </div>
    </div>
</div>

<?= $this->endSection(); ?>