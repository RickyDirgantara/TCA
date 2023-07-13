<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\BarangModel;
use App\Models\ImageModel;
use App\Models\AuctionModel;

class UserBarang extends BaseController
{
    protected $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        // Mendapatkan data session user
        $userSession = session()->get('user');
        
        // Mendapatkan nama user dari session
        $namaUser = isset($userSession['full_name']) ? $userSession['full_name'] : '';
    
        // Mengirimkan data sesi user ke tampilan
        $data['namaUser'] = $namaUser;

        return view('layouts/user/form_barang',$data);
    }

    public function store()
    {
        $namaProduk = $this->request->getPost('nama_produk');
        $kategori = $this->request->getPost('kategori');
        $deskripsiProduk = $this->request->getPost('deskripsi_produk');
        $start_time = $this->request->getPost('start_time');
        $end_time = $this->request->getPost('end_time');
        $starting_price = $this->request->getPost('starting_price');
        $BuyNowPrice = $this->request->getPost('buy_now_price');
    
        // Validasi input tidak boleh kosong
        if (empty($namaProduk)) {
            // Tampilkan pesan error atau lakukan tindakan yang sesuai
            return redirect()->back()->withInput()->with('error', 'Nama produk tidak boleh kosong');
        }
    
        // Dapatkan user ID dari session atau sumber lainnya
        $userId = $this->session->get('user')['id']; // Misalnya, fungsi getUserID() mengambil user ID dari session
    
        // Simpan data ke tabel 'barang'
        $barangModel = new BarangModel();
        $barangId = $barangModel->insert([
            'user_id' => $userId, // Simpan user ID ke kolom 'user_id'
            'nama_produk' => $namaProduk,
            'kategori' => $kategori,
            'deskripsi_produk' => $deskripsiProduk,
        ]);
    
        // Simpan data ke tabel 'auctions'
        $auctionModel = new AuctionModel();
        $auctionData = [
            'title' => $namaProduk,
            'description' => $deskripsiProduk,
            'start_time' => $start_time,
            'end_time' => $end_time,
            'starting_price' => $starting_price,
            'status' => 'Aktif',
            'user_id' => $userId,
            'barang_id' => $barangId,
            'buy_now_price' => $BuyNowPrice,
        ];
        $auctionId = $auctionModel->insert($auctionData);
        $auctionId = $auctionModel->getInsertID();
    
        // Proses upload gambar
        $gambar = $this->request->getFile('gambar');
    
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $gambar->move(ROOTPATH . 'public/user/imgBarang');
    
            // Simpan data ke tabel 'images'
            $imageModel = new ImageModel();
            $imageData = [
                'auction_id' => $auctionId,
                'image_url' => '/user/imgBarang/' . $gambar->getName(),
                'barang_id' => $barangId
            ];
            $imageModel->insert($imageData);
        }
    
        // Tampilkan pesan sukses atau lakukan tindakan yang sesuai
        return redirect()->to('UserProfile')->with('success', 'Data barang berhasil disimpan');
    }
    
    
   
}
