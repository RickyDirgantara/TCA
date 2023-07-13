<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Controller;

class Barang extends Controller
{
    public function index()
    {
        // Pengecekan session
        if (!session()->isLoggedIn) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        }
        $namaAdmin = session()->get('nama');
        // Membuat instance dari model AuctionsModel
        $model = new BarangModel();

        $data['barang'] = $model->findAll();
        return view('auction/barang', ['namaAdmin' => $namaAdmin, 'barang' => $data['barang']]);

    }
}
