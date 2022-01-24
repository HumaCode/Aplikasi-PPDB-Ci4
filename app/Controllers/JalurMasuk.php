<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJalurMasuk;

class JalurMasuk extends BaseController
{
    public function __construct()
    {
        $this->ModelJalurMasuk = new ModelJalurMasuk();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Jalur Masuk',
            'jalurMasuk' => $this->ModelJalurMasuk->getAllData(),
        ];

        return view('admin/v_jalur-masuk', $data);
    }

    public function insertData()
    {
        $data = [
            'jalur_masuk' => $this->request->getPost('jalur_masuk'),
            'kuota' => $this->request->getPost('kuota')
        ];

        // masukan kedalam model
        $this->ModelJalurMasuk->insertData($data);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan..');
        return redirect()->to('/jalurMasuk');
    }

    public function updateData($id_jalur_masuk)
    {
        $data = [
            'jalur_masuk' => $this->request->getPost('jalur_masuk'),
            'kuota' => $this->request->getPost('kuota')
        ];

        // masukan kedalam model
        $this->ModelJalurMasuk->updateData($data, $id_jalur_masuk);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil diubah..');
        return redirect()->to('/jalurMasuk');
    }

    public function hapusData($id_jalur_masuk)
    {
        $this->ModelJalurMasuk->hapusData($id_jalur_masuk);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil dihapus..');
        return redirect()->to('/jalurMasuk');
    }
}
