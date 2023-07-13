<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\ImageModel;
use App\Models\AuctionModel;
use App\Models\BidsModel;


class Checkout extends BaseController
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
           $barang['deskripsi_produk'] = $desc['deskripsi_produk'];
    $auction = $auctionModel->getAuctionByBarangId($id);
    if ($auction) {
        $barang['buy_now_price'] = $auction['buy_now_price'];
    }
    $data['auction_id'] = isset($auction['id']) ? $auction['id'] : '';
    $data['barang'] = $barang;
    $data['buyNowPrice'] = isset($barang['buy_now_price']) ? $barang['buy_now_price'] : 0;

     return view('/layouts/user/checkout', $data);
    }

    public function Checkout(){
         // Mendapatkan data session user
     $userSession = session()->get('user');

     // Mendapatkan nama user dari session jika user sudah login
     $namaUser = isset($userSession['full_name']) ? $userSession['full_name'] : '';

     // Mengirimkan data sesi user ke tampilan
     $data['namaUser'] = $namaUser;


     return view('/layouts/user/bukti_pembayaran', $data);
    }

}

