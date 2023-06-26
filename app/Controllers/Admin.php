<?php

namespace App\Controllers;

use App\Models\AdminModel;

class Admin extends BaseController
{
    private $session;

    public function __construct()
    {
        $this->session = session();
    }

    public function login()
    {
        // Validasi form
        $this->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Mendapatkan data dari form
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Membuat instance model
        $adminModel = new AdminModel();

        // Cek login admin
        $login = $adminModel->login($username, $password);

        if ($login) {
            // Jika login berhasil
            $adminId = $login->id; // Mengambil ID admin yang berhasil login
            $adminModel = new AdminModel();
            $admin = $adminModel->find($adminId); // Mengambil data admin berdasarkan ID

            if ($admin) {
                $sessionData = [
                    'id' => $adminId,
                    'admin' => $admin, // Menyimpan data admin ke session
                    'nama' => $login->nama, // Menyimpan nama admin ke session
                    'isLoggedIn' => true
                ];
                $this->session->set($sessionData);

                return redirect()->to('/dashboard');
            } else {
                return view('auth/login', ['error' => 'Failed to fetch admin data']);
            }
        } else {
            // Jika login gagal
            return view('auth/login', ['error' => 'Invalid email or password']);
        }
    }

    public function logout()
    {
        // Hapus session dan redirect ke halaman login
        session()->destroy();
        return redirect()->to('/login');
    }
}
