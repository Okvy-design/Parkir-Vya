<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data['lantai'] = $db->table('lantai')->get()->getResultArray();

        $data['parkir_aktif'] = $db->table('transaksi_parkir t')
            ->select('t.*, j.nama_jenis, l.nama_lantai')
            ->join('jenis_kendaraan j', 'j.id_jenis = t.id_jenis')
            ->join('lantai l', 'l.id_lantai = t.id_lantai')
            ->where('t.status', 'masuk')
            ->orderBy('t.jam_masuk', 'DESC')
            ->get()->getResultArray();

        return view('dashboard', $data); 
    }
}