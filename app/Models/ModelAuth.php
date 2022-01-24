<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function login_user($email)
    {
        return $this->db->table('tbl_user')->where(
            [
                'email' => $email,
            ]
        )->get()->getRowArray();
    }

    public function login_siswa($nisn)
    {
        return $this->db->table('tbl_siswa')->where(
            [
                'nisn' => $nisn,
            ]
        )->get()->getRowArray();
    }
}
