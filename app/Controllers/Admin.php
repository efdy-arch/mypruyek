<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index()
    {
        // Mendapatkan instance dari model UserModel
        $userModel = new \App\Models\UserModel();

        // Mendapatkan data pengguna berdasarkan id
        $user = $userModel->find($userModel); // Ganti $userId dengan id pengguna yang sedang aktif

        // Mengirim data pengguna ke tampilan profil
        $data['user'] = $user;

        // return view('profil', $data);

        return view('Admin/index');
    }
}
