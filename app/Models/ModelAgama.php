<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAgama extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_agama')
                    ->orderBy('id_agama', 'DESC')
                    ->get()
                    ->getResultArray();
    }

    public function insertData($data) 
    {
        $this->db->table('tbl_agama')->insert($data);
    }

    public function updateData($data, $id_agama)
    {
        $this->db->table('tbl_agama')
                ->where('id_agama', $id_agama)
                ->update($data);
    }

    public function hapusData($id_agama)
    {
        $this->db->table('tbl_agama')
                ->where('id_agama', $id_agama)
                ->delete();
    }
}
