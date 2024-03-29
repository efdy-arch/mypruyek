<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HalamanProdukM;

class HalamanProdukC extends BaseController
{
    public function index()
    {
        $barang = model(HalamanProdukM::class);
        $produk = [
            'produk' => $barang->getProduk()
        ];
        return view('Admin/HalamanProduk/HalamanProduk', $produk);
    }
    public function detail($id)
    {
        $barang = model(HalamanProdukM::class);
        $produk = [
            'produk' => $barang->getDetailProduk($id)
        ];
        return view('Admin/HalamanProduk/DetailProduk', $produk);
    }
    public function cari()
    {
        $search = $this->request->getVar('search');
        $barang = new HalamanProdukM();
        $produk = $barang->getCari($search);
        // if ($produk['produk'] === null) {
        //     $produk['results'] = 'Tidak ada hasil untuk "' . $search . '"';
        //     // Lakukan sesuatu dengan pesan, seperti menampilkannya di view
        //     // atau mengatur flash data untuk ditampilkan di halaman lain
        // }

        return view('Admin/HalamanProduk/HalamanProduk', ['produk' => $produk]);
    }
    public function tabelproduk()
    {
        $model = model(HalamanProdukM::class);
        $data = [
            'produk' => $model->getProduk(),
            'title' => 'Tabel Produk'
        ];
        return view('Admin/Produk/tabelproduk', $data);
    }
}
