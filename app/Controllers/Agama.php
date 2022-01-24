<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAgama;

class Agama extends BaseController
{
    public function __construct()
    {
        $this->ModelAgama = new ModelAgama();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Agama',
            'agama' => $this->ModelAgama->getAllData(),
        ];

        return view('admin/v_agama', $data);
    }

    public function insertData()
    {
        $data = [
            'agama' => htmlspecialchars($this->request->getPost('agama')) 
        ];

        // masukan kedalam model
        $this->ModelAgama->insertData($data);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan..');
        return redirect()->to('agama');
    }

    public function updateData($id_agama)
    {
        $data = [
            'agama' => htmlspecialchars($this->request->getPost('agama'))
        ];

        // masukan kedalam model
        $this->ModelAgama->updateData($data, $id_agama);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil diubah..');
        return redirect()->to('agama');
    }

    public function hapusData($id_agama)
    {
        $this->ModelAgama->hapusData($id_agama);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil dihapus..');
        return redirect()->to('agama');
    }
}
