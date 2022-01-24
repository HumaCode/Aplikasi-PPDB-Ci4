<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJalurMasuk extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_jalur_masuk')
            ->orderBy('id_jalur_masuk', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getById($id_jalur_masuk)
    {
        return $this->db->table('tbl_jalur_masuk')
            ->where('id_jalur_masuk', $id_jalur_masuk)
            ->get()
            ->getRowArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_jalur_masuk')->insert($data);
    }

    public function updateData($data, $id_jalur_masuk)
    {
        $this->db->table('tbl_jalur_masuk')
            ->where('id_jalur_masuk', $id_jalur_masuk)
            ->update($data);
    }

    public function hapusData($id_jalur_masuk)
    {
        $this->db->table('tbl_jalur_masuk')
            ->where('id_jalur_masuk', $id_jalur_masuk)
            ->delete();
    }
}
