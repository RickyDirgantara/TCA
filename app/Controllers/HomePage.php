<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\ImageModel;
use App\Models\UserModel;
use App\Models\AuctionModel;

class HomePage extends BaseController
{
    protected $request;

    public function __construct()
    {
        $this->request = service('request');
    }

    public function index($kategori = null)
    {
         

        $userSession = session()->get('user');

        $namaUser = isset($userSession['full_name']) ? $userSession['full_name'] : '';

        $data['namaUser'] = $namaUser;

        $barangModel = new BarangModel();
        $imageModel = new ImageModel();

        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $itemsPerPage = 8;

        if ($kategori === null) {
            $totalItems = $barangModel->getTotalBarangs();
            $barangs = $barangModel->getBarangsPaginated($itemsPerPage, $currentPage);
        } else {
            $totalItems = $barangModel->getTotalBarangsByKategori($kategori);
            $barangs = $barangModel->getBarangsByKategoriPaginated($kategori, $itemsPerPage, $currentPage);
        }

        $totalPages = ceil($totalItems / $itemsPerPage);

        if ($currentPage > $totalPages) {
            $currentPage = $totalPages;
        }

        foreach ($barangs as &$barang) {
            $images = $imageModel->getImagesByBarangId($barang['barang_id']);
            $barang['image'] = isset($images[0]['image_url']) ? $images[0]['image_url'] : '';          
            $auctionModel = new AuctionModel();
            $auction = $auctionModel->where('barang_id', $barang['barang_id'])->first();
            $barang['end_time'] = $auction['end_time'];
        
            if (!empty($barang['end_time'])) {
                $dateTimeParts = explode(' ', $barang['end_time']);
                $barang['tanggal'] = $dateTimeParts[0];
                $barang['jam'] = $dateTimeParts[1];
            } else {
                $barang['tanggal'] = '';
                $barang['jam'] = '';
            }
        }

        $data['barangs'] = $barangs;
        $data['currentPage'] = $currentPage;
        $data['itemsPerPage'] = $itemsPerPage;
        $data['totalItems'] = $totalItems;
        $data['totalPages'] = $totalPages;
        $data['kategori'] = $kategori;

        return view('home', $data);
    }
    public function category($kategori)
    {
        return $this->index($kategori);
    }


    private function getUserFullName()
    {
        $userSession = session('user');
        if ($userSession) {
            return $userSession['full_name'];
        }
        return '';
    }
}