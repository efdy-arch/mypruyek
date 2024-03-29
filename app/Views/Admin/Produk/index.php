<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<?php if (session()->has('success')) : ?>
    <div class="alert alert-success">
        <?= session('success') ?>
    </div>
<?php elseif (isset($errors)) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach ($errors as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
    <?php endif; ?>

<div class="container-fluid">

    <h1 class="h3 mb-4 text-gray-800">Tambahkan Produk</h1>
    <?= session()->getFlashdata('error') ?>
    <form class="row g-3" action="/Admin/Produk/index" method="post" id="quickForm" enctype="multipart/form-data">
        <div class="form-group col-md-6">
            <label for="inputEmail4" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="<?= old('nama_produk'); ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="kuantitas" class="form-label">Kuantitas</label>
            <input type="number" min="1" class="form-control" name="kuantitas" value="<?= old('kuantitas'); ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4" class="form-label my-1">Harga</label>
            <input type="number" min="1" class="form-control" name="harga" value="<?= old('harga'); ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="kuantitas" class="form-label my-1">Kategori</label>
            <input type="text" class="form-control" name="kategori" value="<?= old('kategori'); ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="kuantitas" class="form-label my-1">Gambar Produk 1</label>
            <input type="file" class="form-control" name="gambar_produk1" value="<?= old('gambar_produk'); ?>" required>
        </div>
        <div class="form-group col-md-3">
            <label for="kuantitas" class="form-label my-1">Gambar Produk 2</label>
            <input type="file" class="form-control" name="gambar_produk2" value="<?= old('gambar_produk'); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="kuantitas" class="form-label my-1">Gambar Produk 3</label>
            <input type="file" class="form-control" name="gambar_produk3" value="<?= old('gambar_produk'); ?>">
        </div>
        <div class="form-group col-md-3">
            <label for="kuantitas" class="form-label my-1">Gambar Produk 4</label>
            <input type="file" class="form-control" name="gambar_produk4" value="<?= old('gambar_produk'); ?>">
        </div>
        <div class="form-group col-md-6 ">
            <label for="kuantitas" class="form-label my-1">Deskripsi Produk </label>
            <textarea type="text-area" class="form-control" name="deskripsi" style="height: 100px" value="<?= old('deskripsi'); ?>" required></textarea>
        </div>
        <div class="form-group col-md-6 ">

        </div>
        <div class="form-group col-md-6 ">

        </div>
        <br>
        <div class="row g-6">
            <div class="col mx-3">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-upload"></i>
                    Simpan
                </button>
                <button class="btn btn-danger"><i class="fas fa-trash"></i> Batal</button>
            </div>
        </div>
    </form>
</div>
<script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url(); ?>/plugins/jquery-validation/additional-methods.min.js"></script>
<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                alert("Form submitted successfully!");
            }
        });

        $('.quickForm').validate({
            rules: {
                nama_produk: {
                    required: true,
                    minlength: 1
                },
                kuantitas: {
                    required: true,
                    minlength: 1
                },
                harga: {
                    required: true,
                    minlength: 1
                },
                kategori: {
                    required: true,
                    minlength: 1
                },
                gambar_produk: {
                    required: true,
                    minlength: 1
                },
                deskripsi: {
                    required: true,
                    minlength: 10
                },
            },
            messages: {
                nama_produk: {
                    required: "Masukkan Nama produk",
                    minlength: "Masukkan minimal 5 Karakter",
                },
                kuantitas: {
                    required: "Masukkan jumlah produk",
                    minlength: "Masukkan minimal 1 "
                },
                harga: {
                    required: "Masukkan Harga yang sesuai",
                    minlength: "Masukkan minimal 1 "
                },
                kategori: {
                    required: "Masukkan kategori produk",
                    minlength: "Masukkan minimal 5 karakter"
                },
                gambar_produk: {
                    required: "Masukkan gambar yang sesuai",
                    minlength: "Gambar yang anda masukkan tidak Valid!"
                },
                deskripsi: {
                    required: "Masukkan deskripsi produk",
                    minlength: "Masukkan deskripsi produk minimal 10 karakter"
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>

<?= $this->endSection(); ?>