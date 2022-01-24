<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPenghasilan;

class Penghasilan extends BaseController
{
    public function __construct()
    {
        $this->ModelPenghasilan = new ModelPenghasilan();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Penghasilan',
            'penghasilan' => $this->ModelPenghasilan->getAllData(),
        ];

        return view('admin/v_penghasilan', $data);
    }

    public function insertData()
    {
        $data = [
            'penghasilan' => htmlspecialchars($this->request->getPost('penghasilan'))
        ];

        // masukan kedalam model
        $this->ModelPenghasilan->insertData($data);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan..');
        return redirect()->to('penghasilan');
    }

    public function updateData($id_penghasilan)
    {
        $data = [
            'penghasilan' => htmlspecialchars($this->request->getPost('penghasilan'))
        ];

        // masukan kedalam model
        $this->ModelPenghasilan->updateData($data, $id_penghasilan);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil diubah..');
        return redirect()->to('penghasilan');
    }

    public function hapusData($id_penghasilan)
    {
        $this->ModelPenghasilan->hapusData($id_penghasilan);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil dihapus..');
        return redirect()->to('penghasilan');
    }
}
