<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBanner;

class Banner extends BaseController
{
    public function __construct()
    {
        $this->ModelBanner = new ModelBanner();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Banner',
            'banner' => $this->ModelBanner->getAllData(),
        ];

        return view('admin/v_banner', $data);
    }

    public function insertData()
    {
        $file = $this->request->getFile('banner');
        
        // jika user mengupload gambar
        $nama_file = $file->getRandomName();

        $data = [
            'ket'       => htmlspecialchars($this->request->getPost('ket')),
            'banner'    => $nama_file,
        ];

        // upload logo
        $file->move('img/banner/' , $nama_file);
        

        // masukan ke dalam model
        $this->ModelBanner->insertData($data);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Pengaturan berhasil ditambahkan..');
        return redirect()->to('/banner');
    }

    public function updateData($id_banner)
    {
        // cek gambar, apakah gambar di upload
        $file = $this->request->getFile('banner');
        if($file->getError() == 4) {
            $data = [
                'ket' => htmlentities($this->request->getPost('ket'))
            ];
        }else{
            // jika user mengupload gambar
            $nama_file = $file->getRandomName();

            // hapus banner lama
            $bannerLama = $this->ModelBanner->detailBanner($id_banner);
            if($bannerLama['banner'] <> "") {
                unlink('img/banner/' . $bannerLama['banner']);
            }

            $data = [
                'ket' => $this->request->getPost('ket'),
                'banner' => $nama_file,
            ];

            // upload logo
            $file->move('img/banner/' , $nama_file);
        }

        // masukan ke dalam model
        $this->ModelBanner->updateData($data, $id_banner);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Pengaturan berhasil diubah..');
        return redirect()->to('/banner');
    }

    public function hapusData($id_banner)
    {
        // hapus gambar lama
        $bannerLama = $this->ModelBanner->detailBanner($id_banner);

        if($bannerLama['banner'] <> "") {
            unlink('img/banner/' . $bannerLama['banner']);
        }

        $this->ModelBanner->hapusData($id_banner);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil dihapus..');
        return redirect()->to('banner');
    }
}
