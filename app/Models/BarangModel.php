<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'barang_id';
    protected $allowedFields = ['auction_id', 'name', 'description', 'image_id'];

    public function getBarang()
    {
        return $this->findAll();
    }
}