<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Diposting</th>
                    <th scope="col">Diupdate</th>
                    <th scope="col">Deskripsi</th>
                </tr>
            <tbody>
                <tr class="text-dark">
                    <td class="table-info"><?= $produk['id']; ?></td>
                    <td class="table-warning"><?= $produk['nama_produk']; ?></td>
                    <td class="table-info"><?= $produk['kuantitas']; ?></td>
                    <td class="table-warning"><?= $produk['harga']; ?></td>
                    <td class="table-info"><?= $produk['kategori']; ?></td>
                    <td class="table-warning"><?= $produk['created_at']; ?></td>
                    <td class="table-info"><?= $produk['updated_at']; ?></td>
                    <td class="table-warning"><?= $produk['deskripsi']; ?></td>
                </tr>
            </tbody>
            </thead>
        </table>
        <h3>Gambar Produk</h3>
        <div class="image">
            <img src="/img/<?= $produk['foto']; ?>" alt="" width="100">
            <img src="/img/<?= $produk['foto2']; ?>" alt="" width="200">
            <img src="/img/<?= $produk['foto3']; ?>" alt="" width="200">
            <img src="/img/<?= $produk['foto4']; ?>" alt="" width="200">

        </div>
    </div>
</div>

<?= $this->endSection(); ?>