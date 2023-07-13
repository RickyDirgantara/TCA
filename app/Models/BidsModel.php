<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\UserModel;

class BidsModel extends Model
{
    protected $table = 'bids';
    protected $primaryKey = 'bid_id';
    protected $allowedFields = [
        'auction_id',
        'user_id',
        'amount',
        'bid_time',
        'barang_id',
        'user_name'
    ];

    protected $useTimestamps = false;

    public function insertBid($auctionId, $userId, $amount, $barangId)
    {
        $userModel = new UserModel();
        $user = $userModel->find($userId);
        $userName = $user['username'];

        $data = [
            'auction_id' => $auctionId,
            'user_id' => $userId,
            'amount' => $amount,
            'bid_time' => date('Y-m-d H:i:s'),
            'barang_id' => $barangId,
            'user_name' => $userName
        ];

        return $this->insert($data, true);
    }
    
}