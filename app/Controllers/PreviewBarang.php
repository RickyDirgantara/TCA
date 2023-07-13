<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\ImageModel;
use App\Models\AuctionModel;
use App\Models\BidsModel;
use App\Models\UserModel;


class PreviewBarang extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->auctionModel = new AuctionModel();
        
    }

    public function index($id)
{
     // Mendapatkan data session user
     $userSession = session()->get('user');

     // Mendapatkan nama user dari session jika user sudah login
     $namaUser = isset($userSession['full_name']) ? $userSession['full_name'] : '';

     // Mengirimkan data sesi user ke tampilan
     $data['namaUser'] = $namaUser;
     
     $barangModel = new BarangModel();
     $imageModel = new ImageModel();
     $auctionModel = new AuctionModel();
     $barang = $barangModel->find($id);
     $images = $imageModel->getImagesByBarangId($id);
     $images = $imageModel->getImagesByBarangId($barang['barang_id']);
     $desc = $barangModel->getBarangById($id);
     $barang['image'] = isset($images[0]['image_url']) ? $images[0]['image_url'] : '';
     $auction = $auctionModel->getAuctionByBarangId($id);
if ($auction) {
    $barang['starting_price'] = $auction['starting_price'];
    $barang['current_price'] = $auction['current_price'];
}
            $barang['deskripsi_produk'] = $desc['deskripsi_produk'];
            $data['auction_id'] = isset($auction['id']) ? $auction['id'] : '';            
            $auction = $auctionModel->where('barang_id', $barang['barang_id'])->first();
            $barang['end_time'] = $auction['end_time'];
           $barang['deskripsi_produk'] = $desc['deskripsi_produk'];
            // Memisahkan tanggal dan jam
            if (!empty($barang['end_time'])) {
                $dateTimeParts = explode(' ', $barang['end_time']);
                $barang['tanggal'] = $dateTimeParts[0];
                $barang['jam'] = $dateTimeParts[1];
            } else {
                $barang['tanggal'] = '';
                $barang['jam'] = '';
            }
            

    // Memuat relasi auction dengan kueri manual
    $auction = $auctionModel->getAuctionByBarangId($id); // Use $auctionModel after initialization
    if ($auction) {
        $barang['starting_price'] = $auction['starting_price'];
    }
    $data['auction_id'] = isset($auction['id']) ? $auction['id'] : '';

    $data['barang'] = $barang;
      // Calculate the total bids for the auction
      $bidsModel = new BidsModel();
      $totalBids = $bidsModel->where('auction_id', $data['auction_id'])->countAllResults();
    $bids = $bidsModel->where('barang_id', $id)->findAll();

      // Mengirimkan data penawaran ke view
    $data['bids'] = $bids;
    // Assign the total bids to the data array
    $data['totalBids'] = $totalBids;
    // Assign the current price to the data array
    $data['currentPrice'] = isset($barang['current_price']) ? $barang['current_price'] : 0;


    return view('/layouts/user/previewbarang', $data);
}

public function EditBarang($id)
{
    // Mendapatkan data session user
    $userSession = session()->get('user');

    // Mendapatkan nama user dari session jika user sudah login
    $namaUser = isset($userSession['full_name']) ? $userSession['full_name'] : '';

    // Mengirimkan data sesi user ke tampilan
    $data['namaUser'] = $namaUser;
    
    $barangModel = new BarangModel();
    $imageModel = new ImageModel();
    $auctionModel = new AuctionModel();
    $barang = $barangModel->find($id);
    $images = $imageModel->getImagesByBarangId($id);
    $images = $imageModel->getImagesByBarangId($barang['barang_id']);
    $desc = $barangModel->getBarangById($id);
    $barang['image'] = isset($images[0]['image_url']) ? $images[0]['image_url'] : '';
    $auction = $auctionModel->getAuctionByBarangId($id);
if ($auction) {
   $barang['starting_price'] = $auction['starting_price'];
   $barang['current_price'] = $auction['current_price'];
}
           $barang['deskripsi_produk'] = $desc['deskripsi_produk'];
           $data['auction_id'] = isset($auction['id']) ? $auction['id'] : '';            
           $auction = $auctionModel->where('barang_id', $barang['barang_id'])->first();
           $barang['end_time'] = $auction['end_time'];
          $barang['deskripsi_produk'] = $desc['deskripsi_produk'];
           // Memisahkan tanggal dan jam
           if (!empty($barang['end_time'])) {
               $dateTimeParts = explode(' ', $barang['end_time']);
               $barang['tanggal'] = $dateTimeParts[0];
               $barang['jam'] = $dateTimeParts[1];
           } else {
               $barang['tanggal'] = '';
               $barang['jam'] = '';
           }
           

   // Memuat relasi auction dengan kueri manual
   $auction = $auctionModel->getAuctionByBarangId($id); // Use $auctionModel after initialization
   if ($auction) {
       $barang['starting_price'] = $auction['starting_price'];
   }
   $data['auction_id'] = isset($auction['id']) ? $auction['id'] : '';

   $data['barang'] = $barang;
     // Calculate the total bids for the auction
     $bidsModel = new BidsModel();
     $totalBids = $bidsModel->where('auction_id', $data['auction_id'])->countAllResults();
   $bids = $bidsModel->where('barang_id', $id)->findAll();

     // Mengirimkan data penawaran ke view
   $data['bids'] = $bids;
   // Assign the total bids to the data array
   $data['totalBids'] = $totalBids;
   // Assign the current price to the data array
   $data['currentPrice'] = isset($barang['current_price']) ? $barang['current_price'] : 0;

   return view('/layouts/user/edit_barang', $data);
}



public function update($barangId)
{
    $namaProduk = $this->request->getPost('nama_produk');
    $buyNowPrice = $this->request->getPost('buy_now_price');
    $endTime = $this->request->getPost('end_time');
    $deskripsiProduk = $this->request->getPost('deskripsi_produk');

    $barangModel = new BarangModel();
    $auctionModel = new AuctionModel();

    // Retrieve the existing data from the database
    $barang = $barangModel->getBarangById($barangId);
    $auction = $auctionModel->getAuctionByBarangId($barangId);

    // Update data barang if there are changes
    if (!empty($namaProduk)) {
        $barang['nama_produk'] = $namaProduk;
        $barangModel->updateBarang($barangId, $barang);
    }

    // Update data auction if there are changes
    if (!empty($buyNowPrice) || !empty($endTime)) {
        if (!empty($buyNowPrice)) {
            $auction['buy_now_price'] = $buyNowPrice;
        }
        if (!empty($endTime)) {
            $auction['end_time'] = $endTime;
        }
        $auctionModel->updateAuction($auction['id'], $auction);
    }

    // Update deskripsi_produk if there are changes
    if (!empty($deskripsiProduk)) {
        $barang['deskripsi_produk'] = $deskripsiProduk;
        $barangModel->updateBarang($barangId, $barang);
    }

    // Redirect to the user profile page with a success message
    return redirect()->to('/UserProfile')->with('success', 'Profil berhasil diperbarui.');
}


}
