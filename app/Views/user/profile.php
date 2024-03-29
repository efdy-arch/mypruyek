<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<div class="container-fluid">
    <?php if (session()->has('success')) : ?>
        <div class="alert alert-success">
            <?= session('success') ?>
        </div>
    <?php endif ?>
    <div class="text-left ">
    <div class="card mb-3 bg-light text-light" style="max-width:1000px;">
  <div class="row g-0">
    <div class="col-md-4 mt-4 mx-3 bg-dark">
      <img src="<?= base_url('img/'); ?><?= $user->user_image; ?>" class="img-fluid rounded-circle" alt="...">
    </div>
    <div class="col-md-6 mx-3 mt-3" style="vertical-align: middle;">
      <table class="table  table-hover mt-4" style="color:black;">
        <tr>
            <th class="text-left">Nama </th>
            <td class="text-right"><?= $user->username; ?></td>
        </tr>
        <tr>
            <th class="text-left">Nama Lengkap</th>
            <td class="text-right"><?= $user->fullname; ?></td>
        </tr>
        <tr>
            <th class="text-left">Email</th>
            <td class="text-right"><?= $user->email; ?></td>
        </tr>
        <tr>
            <th class="text-left">No Telepon</th>
            <td class="text-right"><?= $user->no_telepon; ?></td>
        </tr>
        <tr>
            <th class="text-left">Tanggal Daftar</th>
            <td class="text-right"><?= $user->created_at; ?></td>
        </tr>
      </table>
    </div>
  </div>
  
  <div class="card-body text-right">
                <a href="<?= base_url(); ?>/user/editprofil/<?= $user->id; ?>" class="btn btn-info">Edit Profile</a>
            </div>
</div>
    </div>
</div>
<?= $this->endSection(); ?>