<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'full_name',
        'email',
        'password',
        'phone_number',
        'address',
        'username',
        'role',
        'registration_date',
        'image_path'      
    ];
    protected $useTimestamps = false;

    public function insert($data = null, bool $returnID = true)
    {
        if ($data !== null && !isset($data['registration_date'])) {
            $data['registration_date'] = date('Y-m-d H:i:s');
        }

        return parent::insert($data, $returnID);
    }

    public function getUsersByBidIds($bidIds)
    {
        return $this->whereIn('id', $bidIds)->findAll();
    }
}
