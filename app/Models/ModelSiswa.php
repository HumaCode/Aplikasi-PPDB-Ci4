<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSiswa extends Model
{
    public function getAllData()
    {
        return $this->db->table('tbl_siswa')
            ->orderBy('id_siswa', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getById($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->where('id_siswa', $id_siswa)
            ->get()
            ->getRowArray();
    }

    public function berkasById($id_berkas)
    {
        return $this->db->table('tbl_berkas')
            ->where('id_berkas', $id_berkas)
            ->get()
            ->getRowArray();
    }

    public function getBiodataSiswa()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_jalur_masuk', 'tbl_jalur_masuk.id_jalur_masuk=tbl_siswa.id_jalur_masuk', 'left')
            ->join('tbl_agama', 'tbl_agama.id_agama=tbl_siswa.id_agama', 'left')
            ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi=tbl_siswa.id_provinsi', 'left')
            ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten=tbl_siswa.id_kabupaten', 'left')
            ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan=tbl_siswa.id_kecamatan', 'left')
            ->join('tbl_jurusan', 'tbl_jurusan.id_jurusan=tbl_siswa.id_jurusan', 'left')
            ->where('id_siswa', session()->get('id_siswa'))
            ->get()
            ->getRowArray();
    }

    public function insertData($data)
    {
        $this->db->table('tbl_siswa')->insert($data);
    }

    public function updateData($data, $id_siswa)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $id_siswa)
            ->update($data);
    }

    public function hapusData($id_siswa)
    {
        $this->db->table('tbl_siswa')
            ->where('id_siswa', $id_siswa)
            ->delete();
    }

    public function noPendaftaran()
    {
        $query = $this->db->query("SELECT MAX(RIGHT(no_pendaftaran,4)) AS no_pendaftaran
                            FROM tbl_siswa WHERE DATE(tgl_pendaftaran)=CURDATE()");

        $kode = "";
        if ($query->getNumRows() > 0) {
            foreach ($query->getResult() as $k) {
                $tmp = ((int)$k->no_pendaftaran) + 1;
                $kode = sprintf("%04s", $tmp);
            }
        } else {
            $kode = "0001";
        }

        date_default_timezone_set("Asia/Jakarta");
        return date('Ymd') . $kode;
    }

    public function lampiran()
    {
        return $this->db->table('tbl_berkas')
            ->join('tbl_lampiran', 'tbl_lampiran.id_lampiran=tbl_berkas.id_lampiran', 'left')
            ->where('tbl_berkas.id_siswa', session()->get('id_siswa'))
            ->get()
            ->getResultArray();
    }

    public function addBerkas($data)
    {
        $this->db->table('tbl_berkas')->insert($data);
    }

    public function deleteBerkas($id_berkas)
    {
        $this->db->table('tbl_berkas')
            ->where('id_berkas', $id_berkas)
            ->delete();
    }
}
