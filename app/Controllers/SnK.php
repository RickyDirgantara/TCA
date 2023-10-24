<?php

namespace App\Controllers;
use App\Models\UserModel;


class SnK extends BaseController
{
    public function index()
    {
     $userSession = session()->get('user');
     $namaUser = isset($userSession['full_name']) ? $userSession['full_name'] : '';
     $data['namaUser'] = $namaUser;
     return view('/layouts/user/snk', $data);
    }

}
