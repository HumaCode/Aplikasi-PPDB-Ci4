<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'jurusan' => $this->ModelAdmin->totalJurusan(),
            'pekerjaan' => $this->ModelAdmin->totalPekerjaan(),
            'agama' => $this->ModelAdmin->totalAgama(),
            'penghasilan' => $this->ModelAdmin->totalPenghasilan(),
            'pendidikan' => $this->ModelAdmin->totalPendidikan(),
            'user' => $this->ModelAdmin->totalUser(),
            'pendaftarMasuk' => $this->ModelAdmin->totalPendaftarMasuk(),
            'pendaftarDiterima' => $this->ModelAdmin->totalPendaftarDiterima(),
            'pendaftarDitolak' => $this->ModelAdmin->totalPendaftarDitolak(),
        ];

        return view('admin/v_dashboard', $data);
    }

    public function setting()
    {
        $data = [
            'title' => 'Pengaturan',
            'setting' => $this->ModelAdmin->detailPengaturan(),
        ];

        return view('admin/v_pengaturan', $data);
    }

    public function simpanPengaturan()
    {
        // cek gambar, apakah gambar di upload
        $file = $this->request->getFile('logo');
        if ($file->getError() == 4) {
            $data = [
                'nama_sekolah'  => htmlspecialchars($this->request->getPost('nama_sekolah')),
                'alamat'        => htmlspecialchars($this->request->getPost('alamat')),
                'kecamatan'     => htmlspecialchars($this->request->getPost('kecamatan')),
                'kabupaten'     => htmlspecialchars($this->request->getPost('kabupaten')),
                'provinsi'      => htmlspecialchars($this->request->getPost('provinsi')),
                'no_telepon'    => htmlspecialchars($this->request->getPost('no_telepon')),
                'email'         => htmlspecialchars($this->request->getPost('email')),
                'web'           => htmlspecialchars($this->request->getPost('web')),
                'deskripsi'     => htmlspecialchars($this->request->getPost('deskripsi')),
            ];
        } else {
            // jika user mengupload gambar
            $nama_file = $file->getRandomName();

            // hapus logo lama
            $gmbrLama = $this->ModelAdmin->detailPengaturan();
            if ($gmbrLama['logo'] <> "") {
                unlink('img/' . $gmbrLama['logo']);
            }

            $data = [
                'nama_sekolah'  => htmlspecialchars($this->request->getPost('nama_sekolah')),
                'alamat'        => htmlspecialchars($this->request->getPost('alamat')),
                'kecamatan'     => htmlspecialchars($this->request->getPost('kecamatan')),
                'kabupaten'     => htmlspecialchars($this->request->getPost('kabupaten')),
                'provinsi'      => htmlspecialchars($this->request->getPost('provinsi')),
                'no_telepon'    => htmlspecialchars($this->request->getPost('no_telepon')),
                'email'         => htmlspecialchars($this->request->getPost('email')),
                'web'           => htmlspecialchars($this->request->getPost('web')),
                'deskripsi'     => htmlspecialchars($this->request->getPost('deskripsi')),
                'logo'          => $nama_file,
            ];

            // upload logo
            $file->move('img/', $nama_file);
        }

        // masukan ke dalam model
        $this->ModelAdmin->simpanPengaturan($data);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Pengaturan berhasil diubah..');
        return redirect()->to('admin/setting');
    }

    public function beranda()
    {
        $data = [
            'title' => 'Beranda',
            'beranda' => $this->ModelAdmin->detailPengaturan(),
        ];

        return view('admin/v_beranda', $data);
    }

    public function saveBeranda()
    {
        $data = [
            'beranda' => $this->request->getPost('beranda')
        ];

        // masukan ke dalam model
        $this->ModelAdmin->simpanPengaturan($data);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Pengaturan berhasil diubah..');
        return redirect()->to('admin/beranda');
    }
}
