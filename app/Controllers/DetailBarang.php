<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\ImageModel;
use App\Models\AuctionModel;
use App\Models\BidsModel;
use App\Models\UserModel;


class DetailBarang extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->auctionModel = new AuctionModel();
        $this->bidsModel = new BidsModel();
        
    }

    public function show($id)
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
            if (!empty($barang['end_time'])) {
                $dateTimeParts = explode(' ', $barang['end_time']);
                $barang['tanggal'] = $dateTimeParts[0];
                $barang['jam'] = $dateTimeParts[1];
            } else {
                $barang['tanggal'] = '';
                $barang['jam'] = '';
            }
            
    $auction = $auctionModel->getAuctionByBarangId($id);
    if ($auction) {
        $barang['starting_price'] = $auction['starting_price'];
    }
    $data['auction_id'] = isset($auction['id']) ? $auction['id'] : '';

    $data['barang'] = $barang;
    $bidsModel = new BidsModel();
    $totalBids = $bidsModel->where('auction_id', $data['auction_id'])->countAllResults();
    $bids = $bidsModel->where('barang_id', $id)->findAll();
    $data['bids'] = $bids;
    $data['totalBids'] = $totalBids;
    $data['currentPrice'] = isset($barang['current_price']) ? $barang['current_price'] : 0;
    $rekomendasiBarangs = $barangModel->getBarangsByKategori($barang['kategori']);
    foreach ($rekomendasiBarangs as &$rekomendasiBarang) {
        $images = $imageModel->getImagesByBarangId($rekomendasiBarang['barang_id']);
        $rekomendasiBarang['image'] = isset($images[0]['image_url']) ? $images[0]['image_url'] : '';
        $auction = $auctionModel->getAuctionByBarangId($rekomendasiBarang['barang_id']);
        if ($auction) {
            $rekomendasiBarang['end_time'] = $auction['end_time'];
            $rekomendasiBarang['starting_price'] = $auction['starting_price'];
        }
    }
    $data['rekomendasiBarangs'] = $rekomendasiBarangs;
    return view('/layouts/user/detail-barang', $data);
}

public function category($kategori)
{
    return $this->index($kategori);
}



public function getTotalBids($id)
{
    $bidsModel = new BidsModel();
    $totalBids = $bidsModel->where('auction_id', $id)->countAllResults();
    return $this->response->setJSON([
        'totalBids' => $totalBids
    ]);
}

public function checkIfBidsExistInDatabase()
{
    $bidsModel = new BidsModel();
    $totalBids = $bidsModel->countAllResults();
    $bidsExist = $totalBids > 0;
    return $this->response->setJSON([
        'bidsExist' => $bidsExist
    ]);
}


public function liveBids($id)
{
    $auctionModel = new AuctionModel();
    $bidsModel = new BidsModel();
    $userSession = session()->get('user');

    $auction = $auctionModel->where('barang_id', $id)->first();


    if (!$auction) {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Auction not found'
        ]);
    }

    $bidAmount = $this->request->getPost('bidAmount');
    
    $lastBid = $bidsModel->where('auction_id', $auction['id'])->orderBy('amount', 'DESC')->first();
    // Check if bid amount is a positive number
if ($bidAmount <= 0) {
    return $this->response->setJSON([
        'status' => 'error',
        'message' => 'Bid amount must be a positive number'
    ]);
}

// Check if bid amount is greater than or equal to minimum bid amount
$minimumBidAmount = 5000;
if ($bidAmount < $minimumBidAmount) {
    return $this->response->setJSON([
        'status' => 'error',
        'message' => 'Bid amount must be at least Rp. ' . $minimumBidAmount
    ]);
}

// Check if bid amount is less than or equal to maximum bid amount
$maximumBidAmount = 1000000;
if ($bidAmount > $maximumBidAmount) {
    return $this->response->setJSON([
        'status' => 'error',
        'message' => 'Bid amount must be no more than Rp. ' . $maximumBidAmount
    ]);
}

    if ($lastBid) {
        $minimumIncrement = 1000;
        $nextBidAmount = $lastBid['amount'] + $minimumIncrement;

        if ($bidAmount < $nextBidAmount) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Your bid amount must be at least Rp. ' . $nextBidAmount
            ]);
        }
    }

    $bidsModel->insertBid($auction['id'], $userSession['id'], $bidAmount, $id);


    // Retrieve updated auction data after the bid
    $auction = $auctionModel->getAuctionByBarangId($id);

    if ($auction) {
        $data['auction_id'] = isset($auction->id) ? $auction->id : '';
    } else {
        $data['auction_id'] = '';
    }

    $bids = $bidsModel->where('barang_id', $id)->findAll();
    $totalBids = count($bids);
    $currentPrice = $auction['starting_price'] + array_sum(array_column($bids, 'amount'));

    if (!empty($currentPrice)) {
        $auctionModel->updateCurrentPrice($auction['id'], $currentPrice);
    }

    $barangModel = new BarangModel();
    $barangModel->update($id, ['current_price' => $currentPrice]);

    $output = [
        'status' => 'success',
        'totalBids' => $totalBids,
        'currentPrice' => $currentPrice,
        'bids' => $bids
    ];

    return $this->response->setJSON($output);
}


}



