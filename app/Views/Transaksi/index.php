<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<div class="container-fluid">
    <h1>Ini Halaman Transaksi</h1>
    <?php if (isset($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach ($errors as $error) : ?>
                    <li><?= $error ?></li>
                <?php endforeach ?>
            </ul>
        </div>
    <?php else : ?>
        <div class="container-fluid">
            <?php if (session()->has('success')) : ?>
                <div class="alert alert-success">
                    <?= session('success') ?>
                </div>
            <?php endif; ?>
            <p>Menunggu Penjual mengkonfirmasi pembelian!</p>
            <?php
            $userModel = model(UserModel::class);
            $user = $userModel->profile();
            ?>
            <p>Cek halaman <a href="<?= base_url(); ?>/Transaksi/Pesanan/<?= $user->id; ?>">Pesananmu</a> secara berkala</p>

        </div>
    <?php endif ?>

</div>

<?= $this->endSection(); ?>