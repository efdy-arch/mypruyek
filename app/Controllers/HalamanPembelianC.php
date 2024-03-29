<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HalamanProdukM;

class HalamanPembelianC extends BaseController
{
    public function beli($slug)
    {
        $barang = model(HalamanProdukM::class);
        $produk = [
            'produk' => $barang->getDetailProduk($slug)
        ];
        return view('Admin/HalamanPembelian/HalamanPembelianV', $produk);
    }
}
