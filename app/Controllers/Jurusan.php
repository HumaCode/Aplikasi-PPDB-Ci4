<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJurusan;

class Jurusan extends BaseController
{
    public function __construct()
    {
        $this->ModelJurusan = new ModelJurusan();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Jurusan',
            'jurusan' => $this->ModelJurusan->getAllData(),
        ];

        return view('admin/v_jurusan', $data);
    }

    public function insertData()
    {
        $data = [
            'jurusan' => htmlspecialchars($this->request->getPost('jurusan'))
        ];

        // masukan kedalam model
        $this->ModelJurusan->insertData($data);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan..');
        return redirect()->to('jurusan');
    }

    public function updateData($id_jurusan)
    {
        $data = [
            'jurusan' => htmlspecialchars($this->request->getPost('jurusan'))
        ];

        // masukan kedalam model
        $this->ModelJurusan->updateData($data, $id_jurusan);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil diubah..');
        return redirect()->to('jurusan');
    }

    public function hapusData($id_jurusan)
    {
        $this->ModelJurusan->hapusData($id_jurusan);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil dihapus..');
        return redirect()->to('jurusan');
    }
}
