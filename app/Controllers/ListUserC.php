<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ListUserC extends BaseController
{
    public function index()
    {
        $user = model(ListUserM::class);
        $dataUser = [
            'dataUser' => $user->getUser()
        ];
        return view('Admin/listUser', $dataUser);
    }
}
