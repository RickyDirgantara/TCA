<?php

namespace App\Models;

use CodeIgniter\Model;

class ImageModel extends Model
{
    protected $table = 'images';
    protected $primaryKey = 'image_id';
    protected $allowedFields = ['auction_id', 'barang_id', 'image_url'];

    public function getImagesByBarangId($barangId)
    {
        return $this->where('barang_id', $barangId)->findAll();
    }
    
}
