<?php

namespace App\Models;
use CodeIgniter\Model;

class LantaiModel extends Model {
    protected $table = 'lantai';
    protected $primaryKey = 'id_lantai';
    protected $allowedFields = ['nama_lantai', 'kapasitas', 'terisi'];
}