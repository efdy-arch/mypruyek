<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<div class="container-fluid">
    <h3><?= $title; ?></h3>
    <?php if (in_groups('admin')) : ?>
        <form action="<?= base_url(); ?>/user/updateprofil/<?= $user->id; ?>" class="row g-2" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-5">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" value="<?= $user->username; ?>" name="nama" readonly>
            </div>
            <div class="form-group col-md-5">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" value="<?= $user->email; ?>" name="email" readonly>
            </div>
            <div class="form-group col-md-5">
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" class="form-control" value="<?= $user->fullname; ?>" name="fullname" required>
            </div>
            <div class="form-group col-md-5">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="text" class="form-control" value="<?= $user->no_telepon; ?>" name="no_telepon" required>
            </div>
            <div class="form-group col-md-5">
                <label for="user_image" class="form-label">Foto Profil</label>
                <input type="file" class="form-control" value="<?= $user->user_image; ?>" name="user_image" required>
            </div>
            <div class="form-group col-md-5">

            </div>
            <div class="form-group col-md-5">

            </div>
            <div class="form-group col-md-5">
                <button class="btn btn-info" type="submit"><i class="fas fa-save"></i> Simpan</button>
                <button class="btn btn-danger" type="reset"><i class="fas fa-eraser"></i> Reset</button>
            </div>

        </form>
    <?php else : ?>
        <form action="<?= base_url(); ?>/user/updateprofil/<?= $user->id; ?>" class="row g-2" method="post" enctype="multipart/form-data">
            <div class="form-group col-md-5">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" value="<?= $user->username; ?>" name="nama" readonly>
            </div>
            <div class="form-group col-md-5">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" value="<?= $user->email; ?>" name="email" readonly>
            </div>
            <div class="form-group col-md-5">
                <label for="fullname" class="form-label">Fullname</label>
                <input type="text" class="form-control" value="<?= $user->fullname; ?>" name="fullname" required>
            </div>
            <div class="form-group col-md-5">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="text" class="form-control" value="<?= $user->no_telepon; ?>" name="no_telepon" required>
            </div>
            <div class="form-group col-md-5">
                <label for="user_image" class="form-label">Foto Profil</label>
                <input type="file" class="form-control" value="<?= $user->user_image; ?>" name="user_image" required>
            </div>
            <div class="form-group col-md-5">
                <button class="btn btn-info" type="submit">Simpan</button>
                <button class="btn btn-danger" type="reset">Reset</button>
            </div>

        </form>

    <?php endif ?>
</div>

<?= $this->endSection(); ?>