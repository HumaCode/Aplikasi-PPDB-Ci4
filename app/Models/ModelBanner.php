<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBanner extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_banner')
            ->get()
            ->getResultArray();
    }

    public function detailBanner($id_banner)
    {
        return $this->db->table('tbl_banner')
            ->where('id_banner', $id_banner)
            ->get()
            ->getRowArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_banner')->insert($data);
    }

    public function updateData($data, $id_banner)
    {
        $this->db->table('tbl_banner')
            ->where('id_banner', $id_banner)
            ->update($data);
    }

    public function hapusData($id_banner)
    {
        $this->db->table('tbl_banner')
            ->where('id_banner', $id_banner)
            ->delete();
    }

    public function jumlahPendaftar()
    {
        return $this->db->table('tbl_siswa')
            ->where('ta', date('Y'))
            ->where('stat_pendaftaran', 1)
            ->countAllResults();
    }

    public function jumlahLk()
    {
        return $this->db->table('tbl_siswa')
            ->where('ta', date('Y'))
            ->where('stat_pendaftaran', 1)
            ->where('jk', 'L')
            ->countAllResults();
    }

    public function jumlahPr()
    {
        return $this->db->table('tbl_siswa')
            ->where('ta', date('Y'))
            ->where('stat_pendaftaran', 1)
            ->where('jk', 'P')
            ->countAllResults();
    }
}
