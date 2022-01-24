<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenghasilan extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_penghasilan')
                    ->orderBy('id_penghasilan', 'DESC')
                    ->get()
                    ->getResultArray();
    }

    public function insertData($data) 
    {
        $this->db->table('tbl_penghasilan')->insert($data);
    }

    public function updateData($data, $id_penghasilan)
    {
        $this->db->table('tbl_penghasilan')
                ->where('id_penghasilan', $id_penghasilan)
                ->update($data);
    }

    public function hapusData($id_penghasilan)
    {
        $this->db->table('tbl_penghasilan')
                ->where('id_penghasilan', $id_penghasilan)
                ->delete();
    }
}
