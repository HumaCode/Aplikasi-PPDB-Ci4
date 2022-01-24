<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPendidikan;

class Pendidikan extends BaseController
{
    public function __construct()
    {
        $this->ModelPendidikan = new ModelPendidikan();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Pendidikan',
            'pendidikan' => $this->ModelPendidikan->getAllData(),
        ];

        return view('admin/v_pendidikan', $data);
    }

    public function insertData()
    {
        $data = [
            'pendidikan' => htmlspecialchars($this->request->getPost('pendidikan'))
        ];

        // masukan kedalam model
        $this->ModelPendidikan->insertData($data);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan..');
        return redirect()->to('pendidikan');
    }

    public function updateData($id_pendidikan)
    {
        $data = [
            'pendidikan' => htmlspecialchars($this->request->getPost('pendidikan'))
        ];

        // masukan kedalam model
        $this->ModelPendidikan->updateData($data, $id_pendidikan);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil diubah..');
        return redirect()->to('pendidikan');
    }

    public function hapusData($id_pendidikan)
    {
        $this->ModelPendidikan->hapusData($id_pendidikan);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil dihapus..');
        return redirect()->to('pendidikan');
    }
}
