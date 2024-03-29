<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<style>
    /* .container-fluid {
        background-image: url('danautoba.jpg');
    }
     */
</style>
<?php if (in_groups('user')) : ?>
    <!-- Page Heading -->
    <?= $this->extend('Admin/HalamanProduk/HalamanProduk'); ?>
    <?= $this->section('produk-page'); ?>
    <?= $this->endSection(); ?>
<?php elseif (in_groups('admin')) : ?>
    <!-- Begin Page Content -->
    <?= $this->extend('Admin/Produk/index'); ?>
    <?= $this->section('page-konten'); ?>

    <?= $this->endSection(); ?>
    <!-- /.container-fluid -->
<?php endif; ?>

<?= $this->endSection(); ?>