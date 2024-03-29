<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<div class="container-fluid">
    <table class="table table-striped  table-hover table-dark">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            foreach ($dataUser as $user) : ?>
                <tr class="text-dark">
                    <th scope="row" class="table-dark"><?= $i++; ?></th>
                    <td class="table-warning"><?= $user['username']; ?></td>
                    <td class="table-info"><?= $user['email']; ?></td>
                    <td class="table-warning"><?= $user['created_at']; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>