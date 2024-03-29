<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>
<div class="container-fluid">
    <?php foreach($keranjang as $item): ?>
        <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="<?= base_url('img/'); ?><?= $item['gambar_produk']; ?>" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?= $item['nama_produk']; ?></h5>
        <p class="card-text">Rp<?= number_format($item['harga'], 0, ',', '.'); ?>.00</p>
        <p class="card-text"><small class="text-muted"><?= $item['created_at']; ?></small></p>
      </div>
      <a href="<?= base_url('Admin/HalamanProduk/DetailProduk'); ?>/<?= $item['id_produk']; ?>" class="btn btn-danger btn-sm mb-2">
        Check Out
      </a>
      <a data-toggle="modal" data-target="#hapusModal<?= $item['id_keranjang']; ?>" href="<?= base_url('hapus_dari_keranjang/'); ?><?= $item['id_keranjang']; ?>" class="btn btn-sm btn-warning mb-2">Hapus</a>
      <div class="modal fade" id="hapusModal<?= $item['id_keranjang']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Menghapus produk</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Anda yakin ingin menghapus <?= $item['nama_produk']; ?>?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" href="<?= base_url('hapus_dari_keranjang/'); ?><?= $item['id_keranjang']; ?>">Hapus</a>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>



        <?php endforeach ?>
</div>
<style>
    .container-fluid{
        align-items: center;
    }
</style>

<?= $this->endSection(); ?>