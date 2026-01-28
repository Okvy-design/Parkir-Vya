<?php

namespace App\Models;
use CodeIgniter\Model;

class KendaraanModel extends Model {
    protected $table = 'jenis_kendaraan';
    protected $primaryKey = 'id_jenis';
    protected $allowedFields = ['nama_jenis', 'tarif'];
}