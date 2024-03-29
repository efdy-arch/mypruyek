<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class TambahProdukC extends BaseController
{
    public function index()
    {
        helper('form', 'url');
        $validation = \Config\Services::validation(); // Memuat library validasi

        if (!$validation->run()) {
            // Validasi gagal, tetapkan pesan kesalahan ke sesi flashdata
            session()->setFlashdata('error', $validation->listErrors());
        }
        if (!$this->request->is('post')) {
            return view('Admin/Produk/index', ['validation' => $validation]);
        }
        $post = $this->request->getPost(['nama_produk', 'slug', 'kuantitas', 'harga', 'deskripsi', 'kategori']);

        $fileGambar = $this->request->getFile('gambar_produk1');

        // Periksa apakah file gambar telah diunggah
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $newName = $fileGambar->getRandomName();
            $fileGambar->move('img', $newName);
        } else {
            $newName = 'default.jpg';
        }
        $fileGambardua = $this->request->getFile('gambar_produk2');

        // Periksa apakah file gambar telah diunggah
        if ($fileGambardua && $fileGambardua->isValid() && !$fileGambardua->hasMoved()) {
            $newNamedua = $fileGambardua->getRandomName();
            $fileGambardua->move('img', $newNamedua);
        } else {
            $newNamedua = 'default.jpg';
        }

        $fileGambartiga = $this->request->getFile('gambar_produk3');

        // Periksa apakah file gambar telah diunggah
        if ($fileGambartiga && $fileGambartiga->isValid() && !$fileGambartiga->hasMoved()) {
            $newNametiga = $fileGambartiga->getRandomName();
            $fileGambartiga->move('img', $newNametiga);
        } else {
            $newNametiga = 'default.jpg';
        }

        $fileGambarpat = $this->request->getFile('gambar_produk4');

        // Periksa apakah file gambar telah diunggah
        if ($fileGambarpat && $fileGambarpat->isValid() && !$fileGambarpat->hasMoved()) {
            $newNamepat = $fileGambarpat->getRandomName();
            $fileGambarpat->move('img', $newNamepat);
        } else {
            $newNamepat = 'default.jpg';
        }



        $validationRules = [
            'nama_produk' => 'required|max_length[255]|min_length[3]',
            'kuantitas'  => 'required|max_length[5000]|min_length[1]',
            'harga' => 'required|max_length[5000]|min_length[5]',
            'deskripsi' => 'required|max_length[5000]|min_length[4]',
            'kategori' => 'required|max_length[5000]|min_length[1]',
        ];
        // Membuat objek validasi
        $validation = \Config\Services::validation();

        // Melakukan validasi
        if (!$validation->setRules($validationRules)->run($post)) {
            // Validasi gagal, mengirim pesan error ke tampilan
            $data['errors'] = $validation->getErrors();
            return view('Admin/Produk/index', $data);
        }

        // Validasi sukses, melanjutkan proses
        // ...
        $model = model(TambahProdukM::class);

        $model->save([
            'nama_produk' => $post['nama_produk'],
            'slug'  => url_title($post['nama_produk'], '-', true),
            'harga'  => $post['harga'],
            'kuantitas'  => $post['kuantitas'],
            'deskripsi'  => $post['deskripsi'],
            'kategori'  => $post['kategori'],
            'foto' => $newName,
            'foto2' => $newNamedua,
            'foto3' => $newNametiga,
            'foto4' => $newNamepat,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        echo "<script>document.getElementByName('myform').reset();</script>";
        $session = session();
        $session->setFlashdata('success', 'Produk berhasil ditambahkan.');
        return redirect()->back();
    }
}
