<?php

namespace App\Controllers;

class Laporan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();
        
        $data['transaksi'] = $db->table('transaksi_parkir t')
            ->select('t.*, j.nama_jenis, l.nama_lantai')
            ->join('jenis_kendaraan j', 'j.id_jenis = t.id_jenis')
            ->join('lantai l', 'l.id_lantai = t.id_lantai')
            ->where('t.status', 'keluar')
            ->orderBy('t.jam_keluar', 'DESC')
            ->get()->getResultArray();

        return view('laporan', $data);
    }
}