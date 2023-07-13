<?php

namespace App\Controllers;

use App\Models\AuctionModel;
use CodeIgniter\Controller;

class Auction extends Controller
{
    public function index()
    {
        // Pengecekan session
        if (!session()->isLoggedIn) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        }
        $namaAdmin = session()->get('nama');
        // Membuat instance dari model AuctionsModel
        $model = new AuctionModel();

        $data['auction'] = $model->findAll();
        return view('auction/auctions_view', ['namaAdmin' => $namaAdmin, 'auction' => $data['auction']]);
    }
}
