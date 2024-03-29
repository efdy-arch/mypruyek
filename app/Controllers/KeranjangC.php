<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HalamanProdukM;
use App\Models\KeranjangM;

class KeranjangC extends BaseController
{
    public function index($id)
    {
        $post = $this->request->getPost(['nama_produk', 'slug', 'harga', 'id', 'gambar_produk', 'id_user']);

        $model = model(KeranjangM::class);
        $model->save([
            'id' => $post['id_user'],
            'id_produk' => $post['id'],
            'nama_produk' => $post['nama_produk'],
            'slug'  => url_title($post['nama_produk'], '-', true),
            'harga' => $post['harga'],
            'created_at' => date('Y-m-d H:i:s'),
            'gambar_produk' => $post['gambar_produk']
        ]);
        $session = session();
        $session->setFlashdata('success', 'Berhasil Ditambahkan!');
        $modelP = model(HalamanProdukM::class);
        $data = [
            'title' => 'Detail Produk',
            'produk' => $modelP->getDetailProduk($id)
        ];
        return view('Admin/HalamanProduk/DetailProduk', $data);
    }
    public function keranjangproduk($id)
    {
        $model = model(KeranjangM::class);
        $keranjang = $model->getKeranjangProduk($id);
        if ($keranjang !== null) {
            $data = [
                'title' => 'Keranjangmu',
                'keranjang' => $keranjang
            ];
        }
        return view('user/keranjang', $data);
    }
    public function hapus_dari_keranjang($id)
    {
        $model = model(KeranjangM::class);
        $model->delete($id);
        return redirect()->back();
    }
}
