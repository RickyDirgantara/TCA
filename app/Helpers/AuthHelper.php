<?php

namespace App\Helpers;

class AuthHelper
{
    function isLoggedIn()
    {
        return session()->get('user') !== null;
    }
    
    // Fungsi untuk mendapatkan nama lengkap pengguna
    function getUserFullName()
    {
        $userSession = session()->get('user');
        if ($userSession) {
            return $userSession['full_name'];
            return $userSession['email'];
        }
        return '';
    }
}
