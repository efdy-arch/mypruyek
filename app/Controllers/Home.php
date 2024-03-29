<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('auth/login');
    }
    public function register()
    {
        return view('auth/register');
    }
    public function user()
    {
        $model = model(HalamanProdukM::class);
        $produk = $model->getProduk();
        $data = [
            'produk' => $produk,
            "title" => "Home",
            'active' => 'home'
        ];
        return view('user/index', $data);
    }
    public function HomePage()
    {
        return view('HomePage');
    }
}
