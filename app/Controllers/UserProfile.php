<?php

namespace App\Controllers;


use App\Models\BarangModel;
use App\Models\ImageModel;
use App\Models\AuctionModel;
use App\Models\BidsModel;
use App\Models\UserModel;

class UserProfile extends BaseController
{
    private $session;
    protected $userModel;

    public function __construct()
    {
        $this->session = session();
        $this->userModel = new UserModel();
        $this->auctionModel = new AuctionModel();
        
    }
    public function index()
    {
        // Mendapatkan data session user
        $userSession = session()->get('user');

        $namaUser = isset($userSession['full_name']) ? $userSession['full_name'] : '';
        $emailUser = isset($userSession['email']) ? $userSession['email'] : '';
        $phoneUser = isset($userSession['phone_number']) ? $userSession['phone_number'] : '';
        $addressUser = isset($userSession['address']) ? $userSession['address'] : '';
        $imgUser = isset($userSession['image_path']) ? $userSession['image_path'] : '';

        // Menambahkan pengecekan role
        $roleUser = isset($userSession['role']) ? $userSession['role'] : '';
        if ($roleUser === 'seller') {
            // Mendapatkan data barang berdasarkan user_id
            $barangModel = new BarangModel();
            $imageModel = new ImageModel();

            // Mendapatkan data barang berdasarkan user_id dengan pagination
            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
            $itemsPerPage = 4; // Set jumlah item per halaman yang diinginkan
            $totalItems = $barangModel->getTotalBarangsByUserId($userSession['id']);
            $totalPages = ceil($totalItems / $itemsPerPage);
            // Jika currentPage melebihi totalPages, arahkan kembali ke halaman terakhir
            if ($currentPage > $totalPages) {
                $currentPage = $totalPages;
            }
            $barangs = $barangModel->getBarangsByUserIdPaginated($userSession['id'], $itemsPerPage, $currentPage, true);

            // Periksa apakah ada barang yang dimiliki oleh pengguna atau tidak
            $hasBarangs = !empty($barangs);

            // Tambahkan URL gambar untuk setiap barang
            if (!empty($barangs)) {
                foreach ($barangs as &$barang) {
                    $images = $imageModel->getImagesByBarangId($barang['barang_id']);
                    $barang['image'] = isset($images[0]['image_url']) ? $images[0]['image_url'] : '';
                    $barang['user_id'] = $userSession['id'];
                    $auctionModel = new AuctionModel();
            $auction = $auctionModel->where('barang_id', $barang['barang_id'])->first();
            $barang['end_time'] = isset($auction->end_time) ? $auction->end_time : '';
        
            // Memisahkan tanggal dan jam
            if (!empty($barang['end_time'])) {
                $dateTimeParts = explode(' ', $barang['end_time']);
                $barang['tanggal'] = $dateTimeParts[0];
                $barang['jam'] = $dateTimeParts[1];
            } else {
                $barang['tanggal'] = '';
                $barang['jam'] = '';
            }
                }
            }

            return view('layouts/user/user_profile', [
                'namaUser' => $namaUser,
                'emailUser' => $emailUser,
                'phoneUser' => $phoneUser,
                'addressUser' => $addressUser,
                'imgUser' => $imgUser,
                'barangs' => $barangs,
                'currentPage' => $currentPage,
                'itemsPerPage' => $itemsPerPage,
                'totalItems' => $totalItems,
                'totalPages' => $totalPages,
                'hasBarangs' => $hasBarangs // Tambahkan variabel hasBarangs ke dalam data view
            ]);
        } else {
            // Jika pengguna bukan "seller", tampilkan halaman profil tanpa paginasi
            return view('layouts/user/user_profile', [
                'namaUser' => $namaUser,
                'emailUser' => $emailUser,
                'phoneUser' => $phoneUser,
                'imgUser' => $imgUser,
                'addressUser' => $addressUser,
                'hasBarangs' => false // Set hasBarangs ke false jika pengguna bukan penjual
            ]);
        }
    }

    public function updateProfileView(){
        $userSession = session()->get('user');

        // Mendapatkan nama user dari session jika user sudah login
         $namaUser = isset($userSession['full_name']) ? $userSession['full_name'] : '';
         $nickUser = isset($userSession['username']) ? $userSession['username'] : '';
         $emailUser = isset($userSession['email']) ? $userSession['email'] : '';
         $phoneUser = isset($userSession['phone_number']) ? $userSession['phone_number'] : '';
         $addressUser = isset($userSession['address']) ? $userSession['address'] : '';
    
        
        return view('layouts/user/edit_profile',  [
            'namaUser' => $namaUser,
            'emailUser' => $emailUser,
            'phoneUser' => $phoneUser,
            'addressUser' => $addressUser,
            'nickUser' => $nickUser,
        ]);
    }

    public function updateProfile()
    {
        $userId = $this->session->get('user')['id'];
    
        // Mendapatkan data pengguna dari form pengeditan profil
        $fullName = $this->request->getPost('full_name');
        $email = $this->request->getPost('email');
        $phoneNumber = $this->request->getPost('phone_number');
        $address = $this->request->getPost('address');
        $username = $this->request->getPost('username');
        $newPassword = $this->request->getPost('new_password');
    
        // Mendapatkan data pengguna dari database
        $userModel = new UserModel();
        $user = $userModel->find($userId);
    
        // Update data pengguna dengan data yang baru jika ada
        if (!empty($fullName)) {
            $user['full_name'] = $fullName;
        }
        if (!empty($email)) {
            $user['email'] = $email;
        }
        if (!empty($phoneNumber)) {
            $user['phone_number'] = $phoneNumber;
        }
        if (!empty($address)) {
            $user['address'] = $address;
        }
        if (!empty($username)) {
            $user['username'] = $username;
        }
    
        // Jika password baru tidak kosong, hash password baru dan simpan ke dalam database
        if (!empty($newPassword)) {
            $user['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        }
    
        // Simpan perubahan data pengguna ke dalam database
        $userModel->save($user);
        session()->set('user', $user);
    
        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->to('/myProfile')->with('success', 'Profil berhasil diperbarui.');
    }

    public function UpdateProfilePictures()
    {
        $userId = $this->session->get('user')['id'];
    
        // Mengambil data pengguna dari database
        $userModel = new UserModel();
        $user = $userModel->find($userId);
    
        // Menghapus file gambar lama jika ada
        if (!empty($user['image_path'])) {
            $oldImagePath = ROOTPATH . 'public' . $user['image_path'];
            if (is_file($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
    
        // Proses upload gambar
        $gambar = $this->request->getFile('image_path');
    
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            $gambar->move(ROOTPATH . 'public/uploads/user');
    
            // Memperbarui data pengguna dengan image_path yang baru
            $newImagePath = '/uploads/user/' . $gambar->getName();
            $user['image_path'] = $newImagePath;
            $userModel->save($user);
        }
         // Update data foto admin di session
         $user['image_path'] = $user['image_path'];
         session()->set('user', $user);
    
        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->to('/myProfile')->with('success', 'Foto profil berhasil diunggah.');
    }

    
}

