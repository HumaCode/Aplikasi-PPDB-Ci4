<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelWilayah extends Model
{
    public function getProvinsi()
    {
        return $this->db->table('tbl_provinsi')
            ->get()
            ->getResultArray();
    }

    public function getKabupaten($id_provinsi)
    {
        return $this->db->table('tbl_kabupaten')
            ->where('id_provinsi', $id_provinsi)
            ->get()
            ->getResultArray();
    }

    public function getKecamatan($id_kabupaten)
    {
        return $this->db->table('tbl_kecamatan')
            ->where('id_kabupaten', $id_kabupaten)
            ->get()
            ->getResultArray();
    }
}
