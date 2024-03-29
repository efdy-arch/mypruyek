<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HalamanProdukM;

class TabelProdukC extends BaseController
{
    public function index($id)
    {
        $model = model(HalamanProdukM::class);
        $data = [
            'produk' => $model->getDetailProduk($id),
            'title' => 'Detail Produk'
        ];
        return view('Admin/Produk/detailproduk', $data);
    }
    public function editproduk($id)
    {
        $model = model(HalamanProdukM::class);
        $data = [
            'produk' => $model->getDetailProduk($id),
            'title' => 'Edit Produk'
        ];
        return view('Admin/Produk/EditProduk', $data);
    }
    public function updateproduk($id)
    {
        $post = $this->request->getPost(['nama_produk', 'kuantitas', 'harga', 'kategori', 'deskripsi', 'slug']);
        $fileGambar1 = $this->request->getFile('gambar_produk1');
        if ($fileGambar1 && $fileGambar1->isValid() && !$fileGambar1->hasMoved()) {
            $newName1 = $fileGambar1->getRandomName();
            $fileGambar1->move('img', $newName1);
        } else {
            $newName1 = 'default.jpg';
        }
        $fileGambar2 = $this->request->getFile('gambar_produk2');
        if ($fileGambar2 && $fileGambar2->isValid() && !$fileGambar2->hasMoved()) {
            $newName2 = $fileGambar2->getRandomName();
            $fileGambar2->move('img', $newName2);
        } else {
            $newName2 = 'default.jpg';
        }
        $fileGambar3 = $this->request->getFile('gambar_produk3');
        if ($fileGambar3 && $fileGambar3->isValid() && !$fileGambar3->hasMoved()) {
            $newName3 = $fileGambar3->getRandomName();
            $fileGambar3->move('img', $newName3);
        } else {
            $newName3 = 'default.jpg';
        }
        $fileGambar4 = $this->request->getFile('gambar_produk4');
        if ($fileGambar4 && $fileGambar4->isValid() && !$fileGambar4->hasMoved()) {
            $newName4 = $fileGambar4->getRandomName();
            $fileGambar4->move('img', $newName4);
        } else {
            $newName4 = 'default.jpg';
        }
        $model = model(HalamanProdukM::class);
        $model->update($id, [
            'nama_produk' => $post['nama_produk'],
            'slug' => url_title($post['nama_produk'], '-', true),
            'kuantitas' => $post['kuantitas'],
            'harga' => $post['harga'],
            'kategori' => $post['kategori'],
            'deskripsi' => $post['deskripsi'],
            'foto' => $newName1,
            'foto2' => $newName2,
            'foto3' => $newName3,
            'foto4' => $newName4,
            'updated_at' => date('Y-m-d H:i:s')

        ]);
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Diubah');
        $data = [
            'produk' => $model->getProduk()
        ];
        return view('Admin/Produk/tabelproduk', $data);
    }
    public function hapusproduk($id)
    {
        $model = model(HalamanProdukM::class);
        $model->delete($id);
        $data = [
            'produk' => $model->getProduk()
        ];
        $session = session();
        $session->setFlashdata('success', 'Data Berhasil Dihapus');

        return view('Admin/Produk/tabelproduk', $data);
    }
}
