<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Users extends Controller
{
    public function index()
    {
        // Pengecekan session
        if (!session()->isLoggedIn) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        }
    
        // Mengambil data nama admin dari session
        $namaAdmin = session()->get('nama'); // Menggunakan session()->get('nama') untuk mengambil nilai 'nama' dari session

        $model = new UserModel();
        $data['users'] = $model->findAll();

        return view('auction/users_view', ['namaAdmin' => $namaAdmin, 'users' => $data['users']]); // Mengubah argument view() menjadi array yang berisi namaAdmin dan data
    }
}
