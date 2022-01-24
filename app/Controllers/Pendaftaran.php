<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelJalurMasuk;
use App\Models\ModelJurusan;
use App\Models\ModelSiswa;
use App\Models\ModelTa;

class Pendaftaran extends BaseController
{
    public function __construct()
    {
        $this->ModelTa          = new ModelTa();
        $this->ModelSiswa       = new ModelSiswa();
        $this->ModelJurusan     = new ModelJurusan();
        $this->ModelJalurMasuk  = new ModelJalurMasuk();
        helper('form');
    }

    public function index()
    {
        $data = [
            'title' => 'Pendaftaran',
            'ta' => $this->ModelTa->tampilByStatus(),
            'jm' =>  $this->ModelJalurMasuk->getAllData(),
            'jurusan' =>  $this->ModelJurusan->getAllData(),
            'validation' => \Config\Services::validation()
        ];

        return view('v_pendaftaran', $data);
    }

    public function simpanPendaftaran()
    {
        // validasi
        if ($this->validate([
            'nisn' => [
                'label' => 'NISN',
                'rules'  => 'required|max_length[10]|is_unique[tbl_siswa.nisn]',
                'errors' => [
                    'required' => '{field} Wajib diisi.!!',
                    'max_length' => '{field} Maksimal 10 karakter.!!',
                    'is_unique' => '{field} Sudah dipakai user lain.!!',
                ],
            ],
            'nama'    => [
                'label' => 'Nama Lengkap',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi.!!',
                ],
            ],
            'nama_panggilan'    => [
                'label' => 'Nama Panggilan',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi.!!',
                ],
            ],
            'lahir'    => [
                'label' => 'Tempat Lahir',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi.!!',
                ],
            ],
            'jk'    => [
                'label' => 'Jenis Kelamin',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi.!!',
                ],
            ],
            'jalur'    => [
                'label' => 'Jalur Masuk',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi.!!',
                ],
            ],
            'tgl'    => [
                'label' => 'Tanggal Kelahiran',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi.!!',
                ],
            ],
            'bln'    => [
                'label' => 'Bulan Kelahiran',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi.!!',
                ],
            ],
            'thn'    => [
                'label' => 'Tahun Kelahiran',
                'rules'  => 'required',
                'errors' => [
                    'required' => '{field} Wajib diisi.!!',
                ],
            ],
        ])) {
            // dirangkai dulu tanggal lahirnya
            $tgl = $this->request->getPost('tgl');
            $bln = $this->request->getPost('bln');
            $thn = $this->request->getPost('thn');

            $tgl_lahir = $thn . '-' . $bln . '-' . $tgl;
            $pass = $tgl . $bln . $thn;
            $no =  $this->ModelSiswa->noPendaftaran();
            $tgl_daftar = date('Y-m-d');

            // tahun pelajaran
            $th_ajar = $this->ModelTa->tampilByStatus();

            // jika validasinya benar, ambil datanya
            $data = [
                'no_pendaftaran'        => $no,
                'tgl_pendaftaran'       => $tgl_daftar,
                'ta'                    => $th_ajar['tahun'],
                'id_jurusan'            => $this->request->getPost('jurusan'),
                'nisn'                  => htmlspecialchars($this->request->getPost('nisn')),
                'nama_lengkap'          => htmlspecialchars(strtoupper($this->request->getPost('nama'))),
                'nama_panggilan'        => htmlspecialchars(strtoupper($this->request->getPost('nama_panggilan'))),
                'tempat_lahir'          => htmlspecialchars(strtoupper($this->request->getPost('lahir'))),
                'tgl_lahir'             => $tgl_lahir,
                'jk'                    => htmlspecialchars($this->request->getPost('jk')),
                'password'              => password_hash($pass, PASSWORD_BCRYPT),
                'id_jalur_masuk'        => $this->request->getPost('jalur'),
            ];


            // update kuota di jalur masuk
            $id_jalur_masuk = $this->request->getPost('jalur');
            $jalur = $this->ModelJalurMasuk->getById($id_jalur_masuk);

            // jika kuota sudah habis, maka tidak bisa di pilih
            if ($jalur['kuota'] == 0) {
                // tampilkan flashdata
                session()->setFlashdata('gagal', 'Jalur masuk pendaftaran yang anda pilih, kuota sudah terpenuhi..');
                return redirect()->to('/pendaftaran');
            }

            // kuota dikurangi 1
            $jm = $jalur['kuota'] - 1;

            $data2 = [
                'kuota' => $jm
            ];

            // update tabel
            $this->ModelJalurMasuk->updateData($data2, $id_jalur_masuk);
        } else {
            $validation =  \Config\Services::validation();
            return redirect()->to('/pendaftaran')->withInput()->with('validation', $validation);
        }

        // simpan ke dalam database
        $this->ModelSiswa->insertData($data);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Pendaftaran berhasil, Silahkan login untuk melengkapi data.');
        return redirect()->to('/auth/loginSiswa');
    }
}
