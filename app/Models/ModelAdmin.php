<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    public function detailPengaturan()
    {
        return $this->db->table('tbl_setting')
            ->where('id', 1)
            ->get()
            ->getRowArray();
    }

    public function simpanPengaturan($data)
    {
        $this->db->table('tbl_setting')
            ->where('id', 1)
            ->update($data);
    }

    public function totalJurusan()
    {
        return $this->db->table('tbl_jurusan')->countAllResults();
    }

    public function totalPekerjaan()
    {
        return $this->db->table('tbl_pekerjaan')->countAllResults();
    }

    public function totalAgama()
    {
        return $this->db->table('tbl_agama')->countAllResults();
    }

    public function totalPenghasilan()
    {
        return $this->db->table('tbl_penghasilan')->countAllResults();
    }

    public function totalPendidikan()
    {
        return $this->db->table('tbl_pendidikan')->countAllResults();
    }

    public function totalUser()
    {
        return $this->db->table('tbl_user')->countAllResults();
    }

    public function totalPendaftarMasuk()
    {
        return $this->db->table('tbl_siswa')
            ->where('stat_pendaftaran', 1)
            ->where('stat_ppdb', 0)
            ->countAllResults();
    }

    public function totalPendaftarDiterima()
    {
        return $this->db->table('tbl_siswa')
            ->where('stat_pendaftaran', 1)
            ->where('stat_ppdb', 1)
            ->countAllResults();
    }

    public function totalPendaftarDitolak()
    {
        return $this->db->table('tbl_siswa')
            ->where('stat_pendaftaran', 1)
            ->where('stat_ppdb', 2)
            ->countAllResults();
    }
}
