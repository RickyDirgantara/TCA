<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'nama', 'foto'];

    public function login($username, $password)
    {
        // Query to check admin login
        $query = $this->db->table($this->table)
            ->where('username', $username)
            ->where('password', $password)
            ->get();

        // Return the login result
        return $query->getRow();
    }

}
