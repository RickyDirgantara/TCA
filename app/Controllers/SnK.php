<?php

namespace App\Controllers;
use App\Models\UserModel;


class SnK extends BaseController
{
    public function index()
    {
     // Mendapatkan data session user
     $userSession = session()->get('user');

     // Mendapatkan nama user dari session jika user sudah login
     $namaUser = isset($userSession['full_name']) ? $userSession['full_name'] : '';

     // Mengirimkan data sesi user ke tampilan
     $data['namaUser'] = $namaUser;


     return view('/layouts/user/snk', $data);
    }

}
