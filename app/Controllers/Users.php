<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Users extends Controller
{
    public function index()
    {
        // Pengecekan session
        if (!session()->isLoggedIn) {
            return redirect()->to('/login')->with('error', 'Anda harus login terlebih dahulu');
        }
    
        // Mengambil data nama admin dari session
        $namaAdmin = session()->get('nama'); // Menggunakan session()->get('nama') untuk mengambil nilai 'nama' dari session

        $model = new UserModel();
        
        $data['users'] = $model->findAll();

        return view('auction/users_view', ['namaAdmin' => $namaAdmin, 'users' => $data['users']]); // Mengubah argument view() menjadi array yang berisi namaAdmin dan data
    }
    public function registration()
    {
        $data['validation'] = null; // Initialize validation data

        return view('auth/signup', $data);
    }

    public function save()
    {
        $model = new UserModel();

        // Define validation rules
        $rules = [
            'full_name' => 'required',
            'username' => 'required|min_length[4]',
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]',
            'phone_number' => 'required',
            'address' => 'required',
            'role' => 'required'
        ];

        // Set custom error messages
        $errors = [
            'full_name' => [
                'required' => 'Full name is required'
            ],
            'username' => [
                'required' => 'Username is required',
                'min_length' => 'Username must be at least 4 characters long'
            ],
            'email' => [
                'required' => 'Email is required',
                'valid_email' => 'Please enter a valid email address'
            ],
            'password' => [
                'required' => 'Password is required',
                'min_length' => 'Password must be at least 6 characters long'
            ],
            'phone_number' => [
                'required' => 'Phone number is required'
            ],
            'address' => [
                'required' => 'Address is required'
            ],
            'role' => [
                'required' => 'Role is required'
            ]
        ];

        // Validate the form data
        if (!$this->validate($rules, $errors)) {
            // If validation fails, redirect back to the registration form with validation errors
            $data['validation'] = $this->validator;
            return view('auth/signup', $data);
        }

        // If validation passes, save the user data to the database
        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'phone_number' => $this->request->getPost('phone_number'),
            'address' => $this->request->getPost('address'),
            'role' => $this->request->getPost('role'),
            'registration_date' => date('Y-m-d')
        ];

        $model->insert($data);

        return redirect()->to('/user_login')->with('success', 'Registration successful. Please login.');
    }

    public function user_login()
    {
        return view('auth/user_login');
    }

    public function processLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        $userModel = new UserModel();
        $user = $userModel->where('username', $username)->first();
    
        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Jika password cocok, buat session dan arahkan ke halaman utama
                $userData = [
                    'id' => $user['id'],
                    'full_name' => $user['full_name'],
                    'username' => $user['username'],
                    'email' => $user['email'],
                    'phone_number' => $user['phone_number'],
                    'address' => $user['address'],
                    'image_path' =>['image_path'],
                    'role' => $user['role'], // Simpan informasi role pengguna di session
                    'isLoggedIn' => true
                ];
                session()->set('user', $userData);
    
                return redirect()->to('/');
            } else {
                // Jika password tidak cocok, arahkan kembali ke halaman login dengan pesan error
                return redirect()->to('/user_login')->with('error', 'Password Tidak Cocok');
            }
        } else {
            // Jika username tidak ditemukan, arahkan kembali ke halaman login dengan pesan error
            return redirect()->to('/user_login')->with('error', 'Username Tidak Cocok');
        }
    }
    
    
    
    public function Userlogout()
    {
        // Hapus session dan redirect ke halaman login
        session()->destroy();
        return redirect()->to('/');
    }
}
