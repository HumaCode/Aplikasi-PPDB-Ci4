<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLampiran extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_lampiran')
                    ->orderBy('id_lampiran', 'DESC')
                    ->get()
                    ->getResultArray();
    }

    public function insertData($data) 
    {
        $this->db->table('tbl_lampiran')->insert($data);
    }

    public function updateData($data, $id_lampiran)
    {
        $this->db->table('tbl_lampiran')
                ->where('id_lampiran', $id_lampiran)
                ->update($data);
    }

    public function hapusData($id_lampiran)
    {
        $this->db->table('tbl_lampiran')
                ->where('id_lampiran', $id_lampiran)
                ->delete();
    }
}
