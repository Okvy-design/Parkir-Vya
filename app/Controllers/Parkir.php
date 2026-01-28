<?php

namespace App\Controllers;

class Parkir extends BaseController
{
    protected $db;

    public function __construct() {
        $this->db = \Config\Database::connect();
    }

    public function masuk() {
        $data['kartu'] = $this->db->table('kartu_rfid')->getWhere(['status' => 'tersedia'])->getResultArray();
        $data['lantai'] = $this->db->table('lantai')->get()->getResultArray();
        $data['jenis'] = $this->db->table('jenis_kendaraan')->get()->getResultArray();
        return view('parkir_masuk', $data);
    }

    public function proses_masuk() {
        $rfid = $this->request->getPost('rfid_code');
        $id_lantai = $this->request->getPost('id_lantai');

        $this->db->table('transaksi_parkir')->insert([
            'rfid_code' => $rfid,
            'nopol'     => $this->request->getPost('nopol'),
            'id_jenis'  => $this->request->getPost('id_jenis'),
            'id_lantai' => $id_lantai,
            'jam_masuk' => date('Y-m-d H:i:s'),
            'status'    => 'masuk'
        ]);

        $this->db->table('kartu_rfid')->where('rfid_code', $rfid)->update(['status' => 'digunakan']);
        $this->db->table('lantai')->where('id_lantai', $id_lantai)->increment('terisi');

        return redirect()->to('/dashboard')->with('msg', 'Kendaraan Berhasil Masuk!');
    }

    public function keluar()
    {

        $data['parkir_aktif'] = $this->db->table('transaksi_parkir t')
            ->select('t.*, j.nama_jenis, j.tarif')
            ->join('jenis_kendaraan j', 'j.id_jenis = t.id_jenis')
            ->where('t.status', 'masuk')
            ->get()->getResultArray();

        return view('parkir_keluar', $data);
    }

    public function proses_keluar()
    {
        $this->db = \Config\Database::connect();
        $id = $this->request->getPost('id_transaksi');
        $rfid = $this->request->getPost('rfid_code');
        $id_lantai = $this->request->getPost('id_lantai');
        $total = $this->request->getPost('total_bayar');
        $this->db->table('transaksi_parkir')->where('id_transaksi', $id)->update([
            'jam_keluar'  => date('Y-m-d H:i:s'),
            'total_bayar' => $total,
            'status'      => 'keluar'
        ]);

        $this->db->table('kartu_rfid')->where('rfid_code', $rfid)->update(['status' => 'tersedia']);

        $this->db->table('lantai')->where('id_lantai', $id_lantai)->decrement('terisi');

        return redirect()->to('/parkir/keluar')->with('msg', 'Kendaraan berhasil diproses keluar.');
    }
    public function konfirmasi_masuk()
    {
        $id_lantai = $this->request->getPost('id_lantai');
        $rfid      = $this->request->getPost('rfid_code');

        $this->db->table('transaksi_parkir')->insert([
            'rfid_code' => $rfid,
            'nopol'     => $this->request->getPost('nopol'),
            'id_jenis'  => $this->request->getPost('id_jenis'),
            'id_lantai' => $id_lantai,
            'jam_masuk' => date('Y-m-d H:i:s'),
            'status'    => 'masuk'
        ]);

        $this->db->table('kartu_rfid')->where('rfid_code', $rfid)->update(['status' => 'digunakan']);

        $this->db->table('lantai')->where('id_lantai', $id_lantai)->increment('terisi');

        return redirect()->to('/parkir/masuk')->with('msg', 'Kendaraan berhasil masuk!');
    }
}