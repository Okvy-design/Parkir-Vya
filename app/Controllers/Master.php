<?php
namespace App\Controllers;

class Master extends BaseController {
    protected $db;
    public function __construct() { $this->db = \Config\Database::connect(); }

    public function lantai() {
        $data['lantai'] = $this->db->table('lantai')->get()->getResultArray();
        return view('master/lantai', $data);
    }

    public function rfid() {
        $data['kartu'] = $this->db->table('kartu_rfid')->get()->getResultArray();
        return view('master/rfid', $data);
    }
    public function tambah_lantai() {
        return view('master/tambah_lantai');
    }
    
    public function simpan_lantai() {
        $this->db->table('lantai')->insert([
            'nama_lantai' => $this->request->getPost('nama_lantai'),
            'kapasitas'   => $this->request->getPost('kapasitas'),
            'terisi'      => 0
        ]);
        return redirect()->to('/master/lantai');
    }
    
    public function edit_lantai($id) {
        $data['lantai'] = $this->db->table('lantai')->getWhere(['id_lantai' => $id])->getRowArray();
        return view('master/edit_lantai', $data);
    }
    
    public function update_lantai($id) {
        $this->db->table('lantai')->where('id_lantai', $id)->update([
            'nama_lantai' => $this->request->getPost('nama_lantai'),
            'kapasitas'   => $this->request->getPost('kapasitas'),
        ]);
        return redirect()->to('/master/lantai');
    }

    public function hapus_lantai($id)
    {   
        $db->table('lantai')->where('id_lantai', $id)->delete();
        
        return redirect()->to('/master/lantai');
    }

    public function tambah_rfid() {
        return view('master/tambah_rfid');
    }
    
    public function simpan_rfid() {
        $this->db->table('kartu_rfid')->insert([
            'rfid_code' => $this->request->getPost('rfid_code'),
            'status'    => 'tersedia'
        ]);
        return redirect()->to('/master/rfid');
    }
    
    public function hapus_rfid($id) {
        $this->db->table('kartu_rfid')->where('rfid_code', $id)->delete();
        return redirect()->to('/master/rfid');
    }

    public function jenis()
    {
        $data['jenis'] = $this->db->table('jenis_kendaraan')->get()->getResultArray();
        return view('master/jenis', $data);
    }

    public function tambah_jenis()
    {
        return view('master/tambah_jenis');
    }

    public function simpan_jenis()
    {
        $this->db->table('jenis_kendaraan')->insert([
            'nama_jenis' => $this->request->getPost('nama_jenis'),
            'tarif'      => $this->request->getPost('tarif')
        ]);
        return redirect()->to('/master/jenis');
    }

    public function hapus_jenis($id)
    {
        $this->db->table('jenis_kendaraan')->where('id_jenis', $id)->delete();
        return redirect()->to('/master/jenis');
    }
}