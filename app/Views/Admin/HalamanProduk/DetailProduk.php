<?= $this->extend('layoutes/index'); ?>
<?= $this->section('page-konten'); ?>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

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
    <h6>Detail Produk</h6>

    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"><?= $produk['nama_produk']; ?></h3>
                    <div class="col-12">
                        <img src="<?= base_url(); ?>/img/<?= $produk['foto']; ?>" class="product-image" alt="Product Image" style="width:400px;">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        <div class="product-image-thumb active"><img src="<?= base_url(); ?>/img/<?= $produk['foto']; ?>" alt="Product Image" style="width: 30px;"></div>
                        <div class="product-image-thumb"><img src="<?= base_url(); ?>/img/<?= $produk['foto2']; ?>" alt="..." style="width:50px; height:auto;"></div>
                        <div class="product-image-thumb"><img src="<?= base_url(); ?>/img/<?= $produk['foto3']; ?>" alt="..." style="width:50px; height:auto;"></div>
                        <div class="product-image-thumb"><img src="<?= base_url(); ?>/img/<?= $produk['foto4']; ?>" alt="..." style="width:50px; height:auto;"></div>
                    </div>
                    <style>
                        .product-image-thumbs {
                            display: flex;
                            /* grid-template-columns: repeat(auto-fit, minmax(100px, 3fr)); */
                            width: 30px;
                            height: 30px;
                            gap: 10px;
                            margin-top: 10px;
                            margin-bottom: 20px;
                        }

                        .product-image-thumbs :active {
                            display: flex;
                            height: 50px;

                        }
                    </style>

                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3"><?= $produk['nama_produk']; ?></h3>
                    <p><?= $produk['kategori']; ?></p>

                    <hr>

                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            Rp<?= number_format($produk['harga'], 0, ',', '.'); ?>.00
                        </h2>
                        <h4 class="mt-0">
                            <?php
                            $stoks = $produk['kuantitas'];
                            if ($stoks != '0') : ?>
                                <small>Stok : <?= $produk['kuantitas']; ?></small>
                            <?php else : ?>
                                <small>Stok : Habis</small>
                            <?php endif ?>
                        </h4>
                    </div>

                    <div class="mt-4">
                        <div class="">
                            <button data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn-primary" type="button">
                                <i class="fas fa-shopping-cart fa-lg mb-2">
                                    Beli Sekarang</i></button>

                            <form action="<?= base_url(); ?> Produk/keranjang/<?= $produk['id']; ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="nama_produk" value="<?= $produk['nama_produk']; ?>">
                                <input type="hidden" name="gambar_produk" value="<?= $produk['foto']; ?>">
                                <input type="hidden" name="harga" value="<?= $produk['harga']; ?>">
                                <input type="hidden" name="id" value="<?= $produk['id']; ?>">
                                <input type="hidden" name="slug" value="<?= $produk['slug']; ?>">
                                <?php
                                $model = model(UserModel::class);
                                $user = $model->profile();
                                ?>
                                <input type="hidden" name="id_user" id="id_user" value="<?= $user->id; ?>">


                                <button class="btn btn-danger btn-sm mx-8 mt-2 text-right" type="submit">
                                    <i class="fas fa-cart-plus">Keranjang</i>
                                </button>

                            </form>





                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
                                <div class="modal-content" id="myModal">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Form Pembelian</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>


                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= base_url(); ?>Transaksi/index" method="post" id="form">
                                            <div class="col-md-12">
                                                <label for="nama" class="form-label">Nama</label>
                                                <?php
                                                $userModel = new \App\Models\UserModel();
                                                $user = $userModel->profile();
                                                ?>
                                                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user->username ?>">
                                                <input type="hidden" class="form-control" id="id" name="id_user" value="<?= $user->id ?>">
                                                <label for="nama_produk">Nama Produk</label>
                                                <label class="form-control"><?= $produk['nama_produk']; ?></label>
                                                <input type="hidden" value="<?= $produk['nama_produk']; ?>" name="nama_produk">
                                                <input type="hidden" value="<?= $produk['foto']; ?>" name="foto">
                                                <input type="hidden" value="waiting" name="status">
                                                <input type="hidden" value="waiting" name="status_pembayaran">
                                                <label for="jumlah">Banyaknya</label>
                                                <input type="number" min="1" class="form-control" id="jumlah" name="jumlah" onchange="updateTotal()" value="1">
                                                <input type="hidden" class="form-control" id="harga" name="harga" value="<?= $produk['harga']; ?>">
                                                <input type="hidden" class="form-control" id="stok" name="kuantitas" value="<?= $produk['kuantitas']; ?>">
                                                <input type="hidden" class="form-control" id="id" name="id" value="<?= $produk['id']; ?>">
                                                <label for="total">Total Harga</label>
                                                <label class="form-control" id="total" name="total"><?= $produk['harga']; ?></label>

                                                <script>
                                                    function updateTotal() {
                                                        var harga = parseInt(document.getElementById('harga').value);
                                                        var jumlah = parseInt(document.getElementById('jumlah').value);
                                                        var total = harga * jumlah;
                                                        document.getElementById('total').textContent = total;
                                                    }

                                                    // Inisialisasi nilai total
                                                    updateTotal();
                                                </script>


                                            </div>
                                            <div class="col-md-12">
                                                <label for="no_telpon" class="form-label">No Telpon</label>
                                                <input type="text" min="0" class="form-control" id="no_telpon" name="no_telpon" placeholder="6281234567890" value="<?= $user->no_telepon; ?>" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="inputAddress" class="form-label">Kabupaten</label>
                                                <select id="provinsi" class="select2 col-12 form-group" name="provinsi" required>
                                                    <option value="">Pilih Kabupaten</option>
                                                    <option value="KotaMedan">Kota Medan</option>
                                                    <option value="DeliSerdang">Deli Serdang</option>
                                                    <option value="Langkat">Langkat</option>
                                                    <option value="Nias">Nias</option>
                                                    <option value="PadangLawas">Padang Lawas</option>
                                                    <option value="LabuhanBatu">Labuhan Batu</option>
                                                    <option value="TapanuliUtara">Tapanuli Utara</option>
                                                    <option value="TapanuliSelatan">Tapanuli Selatan</option>
                                                    <option value="TobaSamosir">Toba Samosir</option>
                                                    <option value="Simalungun">Simalungun</option>
                                                    <option value="Karo">Karo</option>
                                                    <option value="Asahan">Asahan</option>
                                                    <option value="MandailingNatal">Mandailing Natal</option>
                                                    <option value="TapanuliTengah">Tapanuli Tengah</option>
                                                    <option value="HumbangHasundutan">Humbang Hasundutan</option>
                                                    <option value="SerdangBedagai">Serdang Bedagai</option>
                                                    <option value="NiasUtara">Nias Utara</option>
                                                    <option value="NiasBarat">Nias Barat</option>
                                                    <!-- Tambahkan opsi kabupaten lainnya sesuai dengan daftar kabupaten di Sumatera Utara -->
                                                </select>

                                                <script>
                                                    $(document).ready(function() {
                                                        $('.select2').select2({
                                                            placeholder: 'Pilih Provinsi',
                                                            allowClear: true
                                                        });
                                                    });
                                                </script>

                                            </div>
                                            <div class="col-12">
                                                <label for="inputAddress" class="form-label">Kota</label>
                                                <select id="kota" name="kota" class="col-12" required>
                                                    <option value="">Pilih Kota</option>
                                                    <!-- Opsi kota akan ditambahkan secara dinamis menggunakan JavaScript -->
                                                </select>
                                                <script>
                                                    // Daftar kota untuk setiap provinsi
                                                    var kotaOptions = {
                                                        KotaMedan: ["Medan Baru", "Medan Selayang", "Medan Polonia"],
                                                        DeliSerdang: ["Lubuk Pakam", "Percut Sei Tuan", "Pantai Labu"],
                                                        Langkat: ["Stabat", "Binjai", "Kuala", "Salapian", "Secanggang"],
                                                        Karo: ["Kabanjahe", "Berastagi", "Tigapanah"],
                                                        Simalungun: ["Pematang Siantar", "Raya", "Tebing Tinggi"],
                                                        Dairi: ["Sidikalang", "Lubuk Pakam", "Pancur Batu"],
                                                        TapanuliUtara: ["Tarutung", "Siborong-borong", "Naborsahon"],
                                                        TapanuliTengah: ["Sibolga", "Padang Sidempuan", "Pagaran"],
                                                        TapanuliSelatan: ["Padang Sidempuan", "Angkola Julu", "Muara Sipongi"],
                                                        Nias: ["Gunungsitoli", "Lahomi", "Teluk Dalam"],
                                                        NiasSelatan: ["Teluk Dalam", "Hilisalo'o"],
                                                        NiasBarat: ["Lahomi", "Laurensia", "Onolimbu"],
                                                        HumbangHasundutan: ["Doloksanggul", "Sibolga", "Pagaran"],
                                                        Asahan: ["Doloksanggul", "Sibolga", "Pagaran"],
                                                        Karo: ["Kabanjahe", "Berastagi", "Tigapanah"],
                                                        Simalungun: ["Pematang Siantar", "Raya", "Tebing Tinggi"],
                                                        Dairi: ["Sidikalang", "Lubuk Pakam", "Pancur Batu"],
                                                        PakpakBharat: ["Salak", "Sitellu Tali Urang Jehe", "Lingga Bayu"],
                                                        Samosir: ["Samosir", "Pangururan", "Simanindo"],
                                                        SerdangBedagai: ["Sei Rampah", "Perbaungan", "Dolok Ilir"],
                                                        BatuBara: ["Lima Puluh", "Tanjung Tiram", "Talawi"],
                                                        LabuhanbatuSelatan: ["Kotapinang", "Silangkitang", "Kampung Rakyat"],
                                                        LabuhanbatuUtara: ["Rantau Prapat", "Kota Pinang", "Kotapinang"],
                                                        NiasUtara: ["Lotu", "Bawolato", "Afulu"],
                                                        PadangLawas: ["Sibuhuan", "Huta Padang", "Padang Bolak"],
                                                        PadangLawasUtara: ["Gunung Tua", "Barumun", "Padang Bolak"],
                                                        TobaSamosir: ["Balige", "Parapat", "Siantar Narumonda"],
                                                        MandailingNatal: ["Panyabungan", "Pangaribuan", "Ranto Baek"],
                                                        TapanuliSelatan: ["Padang Sidempuan", "Angkola Julu", "Muara Sipongi"],
                                                        TapanuliTengah: ["Sibolga", "Padang Sidempuan", "Pagaran"],
                                                        TapanuliUtara: ["Tarutung", "Siborong-borong", "Naborsahon"],
                                                        // Tambahkan daftar kota untuk kabupaten lainnya di Sumatera Utara
                                                    };


                                                    // Fungsi untuk memperbarui opsi kota berdasarkan pilihan provinsi
                                                    function updateKotaOptions() {
                                                        var provinsiSelect = document.getElementById("provinsi");
                                                        var kotaSelect = document.getElementById("kota");
                                                        var selectedProvinsi = provinsiSelect.value;

                                                        // Hapus semua opsi kota yang ada
                                                        kotaSelect.innerHTML = '<option value="">Pilih Kota</option>';

                                                        if (selectedProvinsi && kotaOptions[selectedProvinsi]) {
                                                            // Tambahkan opsi kota berdasarkan provinsi yang dipilih
                                                            kotaOptions[selectedProvinsi].forEach(function(kota) {
                                                                var option = document.createElement("option");
                                                                option.value = kota;
                                                                option.textContent = kota;
                                                                kotaSelect.appendChild(option);
                                                            });
                                                        }
                                                    }

                                                    // Panggil fungsi updateKotaOptions ketika pilihan provinsi berubah
                                                    var provinsiSelect = document.getElementById("provinsi");
                                                    provinsiSelect.addEventListener("change", updateKotaOptions);
                                                </script>

                                            </div>
                                            <div class="col-12">
                                                <label for="inputAddress2" class="form-label">Alamat</label>
                                                <input type="text" class="form-control" id="inputAddress2" name="alamat" placeholder="Perumahan, Nama Jalan, No Rumah" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="inputCity" class="form-label">Alamat Detail</label>
                                                <input type="text" class="form-control" id="inputCity" name="alamat_detail" placeholder="Patokan rumah, Ciri-ciri rumah, dsb" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label for="kode_pos" class="form-label">Kode Pos</label>
                                                <input type="number" min="0" class="form-control" id="kode_pos" name="kode_pos" required>
                                            </div>
                                            <div class="col-md-12">
                                                <label for="metode_pembayaran" class="form-label" require>Pilih Metode Pembayaran</label>
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="metode_pembayaran1" name="metode_pembayaran" value="Transfer Bank" checked>
                                                    <label class="form-check-label" for="metode_pembayaran1">Transfer Bank</label>
                                                </div>
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" id="metode_pembayaran2" name="metode_pembayaran" value="COD">
                                                    <label class="form-check-label" for="metode_pembayaran2">Cash On Delivery</label>
                                                </div>
                                                <!-- Tambahkan pilihan metode pembayaran lainnya sesuai kebutuhan -->
                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-danger" id="submitButton">Konfirmasi Pembelian</button>

                                            </div>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                // Ambil referensi elemen modal, form, dan tombol submit
                                const modal = document.getElementById('myModal');
                                const form = modal.querySelector('form');
                                const submitButton = modal.querySelector('#submitButton');

                                // Tambahkan event listener pada modal saat ditampilkan
                                modal.addEventListener('shown.bs.modal', function() {
                                    // Tambahkan event listener pada form saat pengguna melakukan input
                                    form.addEventListener('input', function() {
                                        // Cek apakah form valid
                                        const isFormValid = form.checkValidity();

                                        // Mendisable atau mengaktifkan tombol submit berdasarkan kevalidan form
                                        submitButton.disabled = !isFormValid;
                                    });
                                });
                            });
                        </script>


                        <style>
                            .modal-content {
                                background-color: whitesmoke;
                                color: black;
                            }

                            .modal-title {
                                color: white;
                                font-size: larger;
                                align-items: center;
                            }

                            .modal-header {
                                background-color: darkgreen;
                                align-items: center;
                            }
                        </style>
                    </div>
                    <div class="row mt-4">
                        <p>Deskripsi Produk:</p>
                        <p><?= $produk['deskripsi']; ?></p>
                    </div>

                </div>
            </div>
            <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"><?= $produk['deskripsi']; ?></div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"><?= $produk['kategori']; ?></div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- jQuery -->
<script src="<?= base_url(); ?>/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url(); ?>/dist/js/demo.js"></script> -->
<script>
    $(document).ready(function() {
        $('.product-image-thumb').on('click', function() {
            var $image_element = $(this).find('img')
            $('.product-image').prop('src', $image_element.attr('src'))
            $('.product-image-thumb.active').removeClass('active')
            $(this).addClass('active')
        })
    })
</script>

<?= $this->endSection(); ?>