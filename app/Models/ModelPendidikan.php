<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPendidikan extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_pendidikan')
                    ->orderBy('id_pendidikan', 'DESC')
                    ->get()
                    ->getResultArray();
    }

    public function insertData($data) 
    {
        $this->db->table('tbl_pendidikan')->insert($data);
    }

    public function updateData($data, $id_pendidikan)
    {
        $this->db->table('tbl_pendidikan')
                ->where('id_pendidikan', $id_pendidikan)
                ->update($data);
    }

    public function hapusData($id_pendidikan)
    {
        $this->db->table('tbl_pendidikan')
                ->where('id_pendidikan', $id_pendidikan)
                ->delete();
    }
}
