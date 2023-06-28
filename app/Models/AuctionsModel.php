<?php

namespace App\Models;

use CodeIgniter\Model;

class AuctionsModel extends Model
{
    protected $table = 'auction';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'description', 'start_time', 'end_time', 'starting_price', 'status'];
}
