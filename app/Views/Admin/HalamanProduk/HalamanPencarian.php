<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<style>
    .card-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(18rem, 1fr));
        gap: 1rem;
    }
</style>
<?= $this->renderSection('produk-page'); ?>
<div class="container-fluid">
    <h1>Halaman Produk</h1>
    <div class="card-grid">
        <?php foreach ($produk as $produk) : ?>
            <div class="card" style="width: 18rem;">
                <img src="<?= base_url(); ?>/img/<?= $produk['foto']; ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $produk['nama_produk']; ?></h5>
                    <p class="card-text"><?= $produk['deskripsi']; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Rp<?= number_format($produk['harga'], 0, ',', '.'); ?>.00</li>
                    <li class="list-group-item">Kategori : <?= $produk['kategori']; ?></li>
                    <li class="list-group-item">Stok : <?= $produk['kuantitas']; ?></li>
                    <li class="list-group-item">Diposting: <?= $produk['created_at']; ?></li>
                </ul>
                <div class="card-body">
                    <a href="<?= base_url(); ?>/Admin/HalamanProduk/DetailProduk/<?= $produk['slug']; ?>" class="card-link">Detail</a>
                    <a href="#" class="card-link">Beli Sekarang</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?= $this->endSection(); ?>