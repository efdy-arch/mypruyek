<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        $barang = model(HalamanProdukM::class);
        $produk = [
            'produk' => $barang->getProduk()
        ];
        return view('user/index', $produk);
    }
    public function profile($id)
    {
        $userModel = model(UserModel::class);
        $data = [
            'title' => 'My Profile',
            'user' => $userModel->getProfile($id)
        ];
        return view('user/profile', $data);
    }
    public function editprofil($id)
    {
        $model = model(UserModel::class);
        $data = [
            'user' => $model->getProfile($id),
            'title' => 'Edit Profile'
        ];
        return view('user/editprofil', $data);
    }
    public function editprofiladmin($id)
    {
        $model = model(UserModel::class);
        $data = [
            'user' => $model->getProfile($id),
            'title' => 'Edit Profile'
        ];
        return view('user/editprofil', $data);
    }
    public function updateprofil($id)
    {
        $post = $this->request->getPost(['nama', 'email', 'fullname', 'no_telepon']);
        $fileGambar = $this->request->getFile('user_image');
        if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $newName1 = $fileGambar->getRandomName();
            $fileGambar->move('img', $newName1);
        } else {
            $newName1 = 'default.jpg';
        }
        $model = model(ListUserM::class);
        $model->update($id, [
            'fullname' => $post['fullname'],
            'no_telepon' => $post['no_telepon'],
            'user_image' => $newName1
        ]);
        $session = session();
        $session->setFlashdata('pesan', 'Data berhasil diubah');
        $modelUser = model(UserModel::class);
        $data = [
            'title' => 'Profile',
            'user' => $modelUser->getProfile($id)
        ];
        return view('user/profile', $data);
    }
}
