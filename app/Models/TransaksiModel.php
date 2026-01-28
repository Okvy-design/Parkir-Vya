<?php

namespace App\Models;
use CodeIgniter\Model;

class TransaksiModel extends Model {
    protected $table = 'transaksi_parkir';
    protected $primaryKey = 'id_transaksi';
    protected $allowedFields = ['rfid_code', 'nopol', 'id_jenis', 'id_lantai', 'jam_masuk', 'jam_keluar', 'total_biaya', 'status'];
}
