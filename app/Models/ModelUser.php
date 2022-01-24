<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_user')
                    ->orderBy('id_user', 'DESC')
                    ->get()
                    ->getResultArray();
    }

    public function getDetailData($id_user)
    {
        return $this->db->table('tbl_user')
                    ->where('id_user', $id_user)
                    ->get()
                    ->getRowArray();
    }

    public function insertData($data) 
    {
        $this->db->table('tbl_user')->insert($data);
    }

    public function updateData($data, $id_user)
    {
        $this->db->table('tbl_user')
                ->where('id_user', $id_user)
                ->update($data);
    }

    public function hapusData($id_user)
    {
        $this->db->table('tbl_user')
                ->where('id_user', $id_user)
                ->delete();
    }
}
