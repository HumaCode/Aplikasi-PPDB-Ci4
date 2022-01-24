<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelTa;

class Ta extends BaseController
{
    public function __construct()
    {
        $this->ModelTa = new ModelTa();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Tahun Pelajaran',
            'ta' => $this->ModelTa->getAllData(),
        ];

        return view('admin/v_tahun-ajar', $data);
    }

    public function insertData()
    {
        $data = [
            'tahun' => htmlspecialchars($this->request->getPost('tahun')),
            'ta' => htmlspecialchars($this->request->getPost('ta'))
        ];

        // masukan kedalam model
        $this->ModelTa->insertData($data);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan..');
        return redirect()->to('ta');
    }

    public function updateData($id_th_ajar)
    {
        $data = [
            'tahun' => htmlspecialchars($this->request->getPost('tahun')),
            'ta' => htmlspecialchars($this->request->getPost('ta'))
        ];

        // masukan kedalam model
        $this->ModelTa->updateData($data, $id_th_ajar);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil diubah..');
        return redirect()->to('ta');
    }

    public function hapusData($id_th_ajar)
    {
        $this->ModelTa->hapusData($id_th_ajar);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil dihapus..');
        return redirect()->to('ta');
    }

    public function statusAktif($id_th_ajar)
    {
        $data = [
            'status' => 1,
        ];

        // reset semua status ke 0
        $this->ModelTa->resetStatus();

        // masukan kedalam model
        $this->ModelTa->updateData($data, $id_th_ajar);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Status berhasil diaktifkan..');
        return redirect()->to('ta');
    }

    public function statusNonAktif($id_th_ajar)
    {
        $data = [
            'status' => 0,
        ];

        // masukan kedalam model
        $this->ModelTa->updateData($data, $id_th_ajar);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Status berhasil dinonaktifkan..');
        return redirect()->to('ta');
    }
}
