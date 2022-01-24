<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;
use App\Models\ModelPpdb;
use App\Models\ModelSiswa;

class Ppdb extends BaseController
{
    public function __construct()
    {
        $this->ModelPpdb = new ModelPpdb();
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelAdmin = new ModelAdmin();
    }

    public function index()
    {
        $data = [
            'title' => 'Pendaftar Masuk',
            'masuk' => $this->ModelPpdb->getPpdbMasuk(),
        ];

        return view('admin/ppdb/v_masuk', $data);
    }

    public function listDiterima()
    {
        $data = [
            'title' => 'Pendaftar Diterima',
            'masuk' => $this->ModelPpdb->getPpdbditerima(),
        ];

        return view('admin/ppdb/v_diterima', $data);
    }

    public function listDitolak()
    {
        $data = [
            'title' => 'Pendaftar Ditolak',
            'masuk' => $this->ModelPpdb->getPpdbDitolak(),
        ];

        return view('admin/ppdb/v_ditolak', $data);
    }

    public function detail($id_siswa)
    {
        $data = [
            'title' => 'Detail Siswa',
            'siswa' => $this->ModelPpdb->detailData($id_siswa),
            'berkas' => $this->ModelPpdb->lampiran($id_siswa),
        ];

        return view('admin/ppdb/v_detail', $data);
    }

    public function diterima($id_siswa)
    {
        $data = [
            'stat_ppdb' => 1
        ];

        // masukan ke dalam model
        $this->ModelSiswa->updateData($data, $id_siswa);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Siswa berhasil diterima..');
        return redirect()->to('/ppdb');
    }

    public function ditolak($id_siswa)
    {
        $data = [
            'stat_ppdb' => 2
        ];

        // masukan ke dalam model
        $this->ModelSiswa->updateData($data, $id_siswa);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Calon siswa telah ditolak..');
        return redirect()->to('/ppdb');
    }

    public function laporan()
    {
        $data = [
            'title' => 'Laporan Kelulusan',
            'ta' => $this->ModelPpdb->getAllDataTa(),
        ];

        return view('admin/ppdb/v_laporan', $data);
    }

    public function cetakLaporan($tahun)
    {
        $data = [
            'title' => 'Laporan Kelulusan',
            'ta' => $this->ModelPpdb->getAllDataTa(),
            'tahun' => $tahun,
            'siswa' => $this->ModelPpdb->getDataLaporan($tahun),
            'setting' => $this->ModelAdmin->detailPengaturan(),
        ];

        return view('admin/ppdb/v_cetakLaporan', $data);
    }
}
