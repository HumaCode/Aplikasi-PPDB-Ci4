<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPekerjaan;

class Pekerjaan extends BaseController
{
    public function __construct()
    {
        $this->ModelPekerjaan = new ModelPekerjaan();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Pekerjaan',
            'pekerjaan' => $this->ModelPekerjaan->getAllData(),
        ];

        return view('admin/v_pekerjaan', $data);
    }

    public function insertData()
    {
        $data = [
            'pekerjaan' => htmlspecialchars($this->request->getPost('pekerjaan'))
        ];

        // masukan kedalam model
        $this->ModelPekerjaan->insertData($data);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan..');
        return redirect()->to('pekerjaan');
    }

    public function updateData($id_pekerjaan)
    {
        $data = [
            'pekerjaan' => htmlspecialchars($this->request->getPost('pekerjaan'))
        ];

        // masukan kedalam model
        $this->ModelPekerjaan->updateData($data, $id_pekerjaan);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil diubah..');
        return redirect()->to('pekerjaan');
    }

    public function hapusData($id_pekerjaan)
    {
        $this->ModelPekerjaan->hapusData($id_pekerjaan);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil dihapus..');
        return redirect()->to('pekerjaan');
    }
}
