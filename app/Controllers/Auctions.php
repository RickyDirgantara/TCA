<?php

namespace App\Controllers;

use App\Models\AuctionsModel;
use CodeIgniter\Controller;

class Auctions extends Controller
{
    public function index()
    {
        // Pengecekan session
        if (!session()->isLoggedIn) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        }
        $namaAdmin = session()->get('nama');
        // Membuat instance dari model AuctionsModel
        $model = new AuctionsModel();

        $data['auctions'] = $model->findAll();
        return view('auction/auctions_view', ['namaAdmin' => $namaAdmin, 'auctions' => $data['auctions']]);
    }
}
