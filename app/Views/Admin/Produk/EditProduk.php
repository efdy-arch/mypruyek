<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<div class="container-fluid">
    <h1><?= $title; ?></h1>
    <div class="form">
        <form action="/admin/editproduk/<?= $produk['id']; ?>" method="post" enctype="multipart/form-data">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nama_produk">Nama Produk</label>
                    <input type="text" class="form-control" value="<?= $produk['nama_produk']; ?>" name="nama_produk" required>
                    <input type="hidden" name="slug" class="form-control" value="<?= $produk['nama_produk']; ?>">
                </div>
                <div class="col-md-6">
                    <label for="Stok">Stok</label>
                    <input type="number" class="form-control" value="<?= $produk['kuantitas']; ?>" name="kuantitas" required>
                </div>
                <div class="col-md-6">
                    <label for="nama_produk">Harga</label>
                    <input type="number" class="form-control" value="<?= $produk['harga']; ?>" name="harga" required>
                </div>
                <div class="col-md-6">
                    <label for="nama_produk">Kategori</label>
                    <input type="text" class="form-control" value="<?= $produk['kategori']; ?>" name="kategori" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="kuantitas" class="form-label my-1">Gambar Produk 1</label>
                    <input type="file" class="form-control" name="gambar_produk1" value="<?= $produk['foto'] ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="kuantitas" class="form-label my-1">Gambar Produk 2</label>
                    <input type="file" class="form-control" name="gambar_produk2" value="<?= $produk['foto2'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="kuantitas" class="form-label my-1">Gambar Produk 3</label>
                    <input type="file" class="form-control" name="gambar_produk3" value="<?= $produk['foto3'] ?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="kuantitas" class="form-label my-1">Gambar Produk 4</label>
                    <input type="file" class="form-control" name="gambar_produk4" value="<?= $produk['foto4'] ?>">
                </div>
                <div class="col-md-6">
                    <label for="nama_produk">Tgl Diposting</label>
                    <input type="text" class="form-control" value="<?= $produk['created_at']; ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="nama_produk">Tgl Update</label>
                    <input type="text" class="form-control" value="<?= $produk['updated_at']; ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="nama_produk">Deskripsi</label>
                    <textarea type="text" class="form-control" value="<?= $produk['deskripsi']; ?>" name="deskripsi" required></textarea>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-primary mt-4" type="submit">Simpan</button>
                    <button class="btn btn-danger mt-4" type="reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection(); ?>