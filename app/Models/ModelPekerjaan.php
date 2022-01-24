<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPekerjaan extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_pekerjaan')
                    ->orderBy('id_pekerjaan', 'DESC')
                    ->get()
                    ->getResultArray();
    }

    public function insertData($data) 
    {
        $this->db->table('tbl_pekerjaan')->insert($data);
    }

    public function updateData($data, $id_pekerjaan)
    {
        $this->db->table('tbl_pekerjaan')
                ->where('id_pekerjaan', $id_pekerjaan)
                ->update($data);
    }

    public function hapusData($id_pekerjaan)
    {
        $this->db->table('tbl_pekerjaan')
                ->where('id_pekerjaan', $id_pekerjaan)
                ->delete();
    }
}
