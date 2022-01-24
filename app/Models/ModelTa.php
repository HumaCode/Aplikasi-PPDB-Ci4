<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelTa extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_th_ajar')
                    ->orderBy('id_th_ajar', 'DESC')
                    ->get()
                    ->getResultArray();
    }

    public function tampilByStatus()
    {
        return $this->db->table('tbl_th_ajar')
                ->where('status', 1)
                ->get()
                ->getRowArray();
    }

    public function insertData($data) 
    {
        $this->db->table('tbl_th_ajar')->insert($data);
    }

    public function updateData($data, $id_th_ajar)
    {
        $this->db->table('tbl_th_ajar')
                ->where('id_th_ajar', $id_th_ajar)
                ->update($data);
    }

    public function hapusData($id_th_ajar)
    {
        $this->db->table('tbl_th_ajar')
                ->where('id_th_ajar', $id_th_ajar)
                ->delete();
    }

    public function resetStatus()
    {
        $this->db->table('tbl_th_ajar')
                ->update(['status' => 0]);
    }
}
