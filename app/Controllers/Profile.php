<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Profile extends BaseController
{
    public function index()
    {
         // Pengecekan session
         if (!session()->isLoggedIn) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        }

        // Mendapatkan ID admin yang sedang login dari session
        $adminId = session()->get('id');
    
        // Membuat instance dari model AdminModel
        $model = new AdminModel();
    
        // Mengambil data admin berdasarkan ID admin yang sedang login
        $admin = $model->find($adminId);
        $namaAdmin = session()->get('nama');
        // Memastikan data admin ditemukan
        if (!empty($admin)) {
            // Mengirim data admin ke view
            return view('layouts/profile', ['namaAdmin' => $namaAdmin,'admin' => $admin]);
        } else {
            // Jika data admin tidak ditemukan, bisa menampilkan pesan kesalahan atau melakukan redirect ke halaman lain
            return redirect()->to('/')->with('error', 'Data admin tidak ditemukan');
        }
    }

    public function updateProfile()
    {
        // Validasi file foto yang diunggah
        $validation = \Config\Services::validation();
        $validation->setRules(['foto' => 'uploaded[foto]|max_size[foto,1024]|is_image[foto]']);

        if (!$validation->withRequest($this->request)->run()) {
            // Jika validasi gagal, kembali ke halaman sebelumnya dan tampilkan pesan error
            return redirect()->back()->withInput()->with('error', $validation->getErrors());
        }

        // Ambil file foto yang diunggah
        $foto = $this->request->getFile('foto');

        // Pindahkan file foto ke folder yang ditentukan
        if ($foto->isValid() && ! $foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(ROOTPATH . 'public/uploads', $newName);
        } else {
            // Jika ada masalah saat memindahkan file foto, tampilkan pesan error
            return redirect()->back()->withInput()->with('error', 'Gagal mengunggah foto.');
        }

        // Update data foto admin di database
        $adminModel = new AdminModel();
        $admin = $adminModel->find(session()->get('admin')['id']);
        $admin['foto'] = 'uploads/' . $newName;
        $adminModel->save($admin);

        // Update data foto admin di session
        $admin['foto'] = $admin['foto'];
        session()->set('admin', $admin);

        // Redirect ke halaman profil dengan pesan sukses
        return redirect()->to('/profile')->with('success', 'Foto profil berhasil diunggah.');
    }
}