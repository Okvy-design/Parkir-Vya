<?php

namespace App\Models;
use CodeIgniter\Model;

class KartuModel extends Model {
    protected $table = 'kartu_rfid';
    protected $primaryKey = 'rfid_code';
    protected $allowedFields = ['status'];
}