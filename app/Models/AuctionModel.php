<?php

namespace App\Models;

use CodeIgniter\Model;

class AuctionModel extends Model
{
    protected $table = 'auction';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'title',
        'description',
        'start_time',
        'end_time',
        'starting_price',
        'status',
        'barang_id',
        'current_price',
        'buy_now_price'
    ];

    public function getAuctionByBarangId($barangId)
    {
        return $this->where('barang_id', $barangId)->first();
    }
    public function updateAuction($id, $data)
    {
        return $this->update($id, $data);
    }
public function updateCurrentPrice($id, $currentPrice)
    {
        return $this->update($id, ['current_price' => $currentPrice]);
    }

}