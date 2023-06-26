<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        // Pengecekan session
        if (!session()->isLoggedIn) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        }
    
        // Mengambil data nama admin dari session
        $namaAdmin = session()->nama;
    
        // Mengirim data nama admin ke view dashboard
        return view('dashboard', ['namaAdmin' => $namaAdmin]);
    }
}
