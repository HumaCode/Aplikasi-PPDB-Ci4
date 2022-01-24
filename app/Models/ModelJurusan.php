<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelJurusan extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_jurusan')
                    ->orderBy('id_jurusan', 'DESC')
                    ->get()
                    ->getResultArray();
    }

    public function insertData($data) 
    {
        $this->db->table('tbl_jurusan')->insert($data);
    }

    public function updateData($data, $id_jurusan)
    {
        $this->db->table('tbl_jurusan')
                ->where('id_jurusan', $id_jurusan)
                ->update($data);
    }

    public function hapusData($id_jurusan)
    {
        $this->db->table('tbl_jurusan')
                ->where('id_jurusan', $id_jurusan)
                ->delete();
    }
}
