<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelLampiran;

class Lampiran extends BaseController
{
    public function __construct()
    {
        $this->ModelLampiran = new ModelLampiran();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Lampiran',
            'lampiran' => $this->ModelLampiran->getAllData(),
        ];

        return view('admin/v_lampiran', $data);
    }

    public function insertData()
    {
        $data = [
            'lampiran' => htmlspecialchars($this->request->getPost('lampiran'))
        ];

        // masukan kedalam model
        $this->ModelLampiran->insertData($data);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan..');
        return redirect()->to('/lampiran');
    }

    public function updateData($id_lampiran)
    {
        $data = [
            'lampiran' => htmlspecialchars($this->request->getPost('lampiran'))
        ];

        // masukan kedalam model
        $this->ModelLampiran->updateData($data, $id_lampiran);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil diubah..');
        return redirect()->to('/lampiran');
    }

    public function hapusData($id_lampiran)
    {
        $this->ModelLampiran->hapusData($id_lampiran);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil dihapus..');
        return redirect()->to('/lampiran');
    }
}
