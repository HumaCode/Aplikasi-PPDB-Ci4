<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;
use App\Models\ModelAgama;
use App\Models\ModelJalurMasuk;
use App\Models\ModelJurusan;
use App\Models\ModelLampiran;
use App\Models\ModelPekerjaan;
use App\Models\ModelPendidikan;
use App\Models\ModelPenghasilan;
use App\Models\ModelSiswa;
use App\Models\ModelWilayah;

class Siswa extends BaseController
{
    public function __construct()
    {
        $this->ModelSiswa       = new ModelSiswa();
        $this->ModelJalurMasuk  = new ModelJalurMasuk();
        $this->ModelAgama       = new ModelAgama();
        $this->ModelPendidikan  = new ModelPendidikan();
        $this->ModelPekerjaan  = new ModelPekerjaan();
        $this->ModelPenghasilan  = new ModelPenghasilan();
        $this->ModelWilayah     = new ModelWilayah();
        $this->ModelLampiran     = new ModelLampiran();
        $this->ModelJurusan     = new ModelJurusan();
        $this->ModelAdmin     = new ModelAdmin();
        helper('form', 'file');
    }

    public function index()
    {
        $data = [
            'title'         => 'Dashboard',
            'biodata'       => $this->ModelSiswa->getBiodataSiswa(),
            'jm'            => $this->ModelJalurMasuk->getAllData(),
            'validation'    => \Config\Services::validation(),
            'agama'         => $this->ModelAgama->getAllData(),
            'pendidikan'    => $this->ModelPendidikan->getAllData(),
            'penghasilan'   => $this->ModelPenghasilan->getAllData(),
            'pekerjaan'     => $this->ModelPekerjaan->getAllData(),
            'provinsi'      => $this->ModelWilayah->getProvinsi(),
            'berkas'        => $this->ModelSiswa->lampiran(),
            'lampiran'      => $this->ModelLampiran->getAllData(),
            'jurusan'       => $this->ModelJurusan->getAllData(),
        ];

        return view('siswa/v_formulir', $data);
    }

    public function updatePendaftaran($id_siswa)
    {
        $data = [
            'id_jurusan'     => $this->request->getPost('jurusan'),
            'id_jalur_masuk' => $this->request->getPost('jalur')
        ];

        // masukan ke dalam model
        $this->ModelSiswa->updateData($data, $id_siswa);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data Pendaftaran berhasil diubah..');
        return redirect()->to('/siswa');
    }

    public function updateFoto($id_siswa)
    {
        if ($this->validate([
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1 Mb',
                ]
            ]
        ])) {

            $file = $this->request->getFile('foto');
            $nama_file = $file->getRandomName();

            $siswa = $this->ModelSiswa->getBiodataSiswa();

            $gambar_lama = $siswa['foto'];
            if ($gambar_lama != 'noimage.png') {
                if ($gambar_lama !== null) {
                    unlink('foto/siswa/' . $gambar_lama);
                }
            }

            $data = [
                'foto' => $nama_file,
            ];

            // upload logo
            $file->move('foto/siswa/', $nama_file);
        } else {
            // jika error
            $validation =  \Config\Services::validation();
            return redirect()->to('/siswa')->withInput()->with('validation', $validation);
        }
        // masukan ke dalam model
        $this->ModelSiswa->updateData($data, $id_siswa);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Foto berhasil diubah..');
        return redirect()->to('/siswa');
    }

    public function updateIdentitas($id_siswa)
    {
        $data = [
            'nama_lengkap'      => htmlspecialchars(strtoupper($this->request->getPost('nama_lengkap'))),
            'nama_panggilan'    => htmlspecialchars(strtoupper($this->request->getPost('nama_panggilan'))),
            'tempat_lahir'      => htmlspecialchars(strtoupper($this->request->getPost('tempat_lahir'))),
            'tgl_lahir'         => htmlspecialchars($this->request->getPost('tgl_lahir')),
            'jk'                => htmlspecialchars($this->request->getPost('jk')),
            'nik'               => htmlspecialchars($this->request->getPost('nik')),
            'id_agama'          => htmlspecialchars($this->request->getPost('id_agama')),
            'no_telepon'        => htmlspecialchars($this->request->getPost('no_telepon')),
            'bahasa'            => htmlspecialchars(strtoupper($this->request->getPost('bahasa'))),
            'saudara_angkat'    => htmlspecialchars(strtoupper($this->request->getPost('saudara_angkat'))),
            'saudara_tiri'      => htmlspecialchars(strtoupper($this->request->getPost('saudara_tiri'))),
            'anak_ke'           => htmlspecialchars(strtoupper($this->request->getPost('anak_ke'))),
            'jml_saudara'       => htmlspecialchars(strtoupper($this->request->getPost('jml_saudara'))),
        ];

        // masukan kedalam model
        $this->ModelSiswa->updateData($data, $id_siswa);


        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Identitas berhasil dilengkapi..');
        return redirect()->to('/siswa');
    }

    public function updateDataAyah($id_siswa)
    {
        $data = [
            'nik_ayah'                  => htmlspecialchars($this->request->getPost('nik_ayah')),
            'ayah'                      => htmlspecialchars(strtoupper($this->request->getPost('ayah'))),
            'tempat_lahir_ayah'         => htmlspecialchars(strtoupper($this->request->getPost('tempat_lahir'))),
            'tgl_lahir_ayah'            => htmlspecialchars($this->request->getPost('tgl_lahir')),
            'alamat_ayah'               => htmlspecialchars(strtoupper($this->request->getPost('alamat'))),
            'pendidikan_ayah'           => htmlspecialchars($this->request->getPost('pendidikan')),
            'pekerjaan_ayah'            => htmlspecialchars($this->request->getPost('pekerjaan')),
            'penghasilan_ayah'          => htmlspecialchars($this->request->getPost('penghasilan')),
            'no_hp_ayah'                => htmlspecialchars($this->request->getPost('no_telepon')),
            'kewarganegaraan_ayah'      => htmlspecialchars(strtoupper($this->request->getPost('kewarganegaraan'))),
        ];

        // masukan kedalam model
        $this->ModelSiswa->updateData($data, $id_siswa);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data Ayah Kandung berhasil dilengkapi..');
        return redirect()->to('/siswa');
    }

    public function updateDataIbu($id_siswa)
    {
        $data = [
            'nik_ibu'                  => htmlspecialchars($this->request->getPost('nik_ibu')),
            'ibu'                      => htmlspecialchars(strtoupper($this->request->getPost('ibu'))),
            'tempat_lahir_ibu'         => htmlspecialchars(strtoupper($this->request->getPost('tempat_lahir'))),
            'tgl_lahir_ibu'            => htmlspecialchars($this->request->getPost('tgl_lahir')),
            'alamat_ibu'               => htmlspecialchars(strtoupper($this->request->getPost('alamat'))),
            'pendidikan_ibu'        => htmlspecialchars(strtoupper($this->request->getPost('pendidikan'))),
            'pekerjaan_ibu'         => htmlspecialchars(strtoupper($this->request->getPost('pekerjaan'))),
            'penghasilan_ibu'       => htmlspecialchars($this->request->getPost('penghasilan')),
            'no_hp_ibu'                => htmlspecialchars($this->request->getPost('no_telepon')),
            'kewarganegaraan_ibu'      => htmlspecialchars(strtoupper($this->request->getPost('kewarganegaraan'))),
        ];

        // masukan kedalam model
        $this->ModelSiswa->updateData($data, $id_siswa);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data Ibu Kandung berhasil dilengkapi..');
        return redirect()->to('/siswa');
    }

    public function updateDataWali($id_siswa)
    {
        $data = [
            'nik_wali'                  => htmlspecialchars($this->request->getPost('nik_wali')),
            'wali'                      => htmlspecialchars(strtoupper($this->request->getPost('wali'))),
            'tempat_lahir_wali'         => htmlspecialchars(strtoupper($this->request->getPost('tempat_lahir'))),
            'tgl_lahir_wali'            => htmlspecialchars($this->request->getPost('tgl_lahir')),
            'alamat_wali'               => htmlspecialchars(strtoupper($this->request->getPost('alamat'))),
            'pendidikan_wali'           => htmlspecialchars(strtoupper($this->request->getPost('pendidikan'))),
            'pekerjaan_wali'            => htmlspecialchars(strtoupper($this->request->getPost('pekerjaan'))),
            'penghasilan_wali'          => htmlspecialchars($this->request->getPost('penghasilan')),
            'no_hp_wali'                => htmlspecialchars($this->request->getPost('no_telepon')),
            'kewarganegaraan_wali'      => htmlspecialchars(strtoupper($this->request->getPost('kewarganegaraan'))),
        ];

        // masukan kedalam model
        $this->ModelSiswa->updateData($data, $id_siswa);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data Wali siswa berhasil dilengkapi..');
        return redirect()->to('/siswa');
    }

    public function updateDataAlamat($id_siswa)
    {
        $data = [
            'id_provinsi'      => htmlspecialchars($this->request->getPost('id_provinsi')),
            'id_kabupaten'     => htmlspecialchars(strtoupper($this->request->getPost('id_kabupaten'))),
            'id_kecamatan'     => htmlspecialchars(strtoupper($this->request->getPost('id_kecamatan'))),
            'desa'             => htmlspecialchars($this->request->getPost('desa')),
            'rt'               => htmlspecialchars(strtoupper($this->request->getPost('rt'))),
            'rw'               => htmlspecialchars(strtoupper($this->request->getPost('rw'))),
            'kode_pos'         => htmlspecialchars(strtoupper($this->request->getPost('kode_pos'))),
            'jarak_sekolah'    => htmlspecialchars($this->request->getPost('jarak_sekolah')),
            'berangkat'        => htmlspecialchars($this->request->getPost('berangkat')),
        ];

        // masukan kedalam model
        $this->ModelSiswa->updateData($data, $id_siswa);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data Alamat siswa berhasil dilengkapi..');
        return redirect()->to('/siswa');
    }

    public function updateDataKesehatan($id_siswa)
    {
        $data = [
            'berat_badan'      => htmlspecialchars($this->request->getPost('berat_badan')),
            'tinggi_badan'     => htmlspecialchars($this->request->getPost('tinggi_badan')),
            'golongan_darah'   => htmlspecialchars(strtoupper($this->request->getPost('golongan_darah'))),
            'penyakit'         => htmlspecialchars($this->request->getPost('penyakit')),
            'kelainan_lain'  => htmlspecialchars(strtoupper($this->request->getPost('kelainan_lain'))),
        ];

        // masukan kedalam model
        $this->ModelSiswa->updateData($data, $id_siswa);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data Kesehatan siswa berhasil dilengkapi..');
        return redirect()->to('/siswa');
    }

    public function updateDataAsalSekolah($id_siswa)
    {
        $data = [
            'asal_sekolah'      => htmlspecialchars(strtoupper($this->request->getPost('asal_sekolah'))),
            'th_lulus'          => htmlspecialchars($this->request->getPost('th_lulus')),
            'no_ijazah'         => htmlspecialchars($this->request->getPost('no_ijazah')),
            'no_skhun'          => htmlspecialchars($this->request->getPost('no_skhun')),
        ];

        // masukan kedalam model
        $this->ModelSiswa->updateData($data, $id_siswa);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data asal sekolah berhasil dilengkapi..');
        return redirect()->to('/siswa');
    }

    public function addBerkas($id_siswa)
    {
        if ($this->validate([
            'id_lampiran' => [
                'label' => 'Lampiran',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Harus dipilih',
                ]
            ],
            'berkas' => [
                'label' => 'Berkas',
                'rules' => 'max_size[berkas,1024]|ext_in[berkas,pdf]',
                'errors' => [
                    'max_size' => 'Ukuran {field} maksimal 1 Mb',
                    'ext_in' => 'Yang anda upload bukan file pdf ',
                ]
            ]
        ])) {
            $berkas = $this->request->getFile('berkas');
            $nama_berkas = $berkas->getRandomName();

            $data = [
                'id_siswa' => $id_siswa,
                'id_lampiran' => htmlspecialchars($this->request->getPost('id_lampiran')),
                'ket' => htmlspecialchars($this->request->getPost('keterangan')),
                'berkas' => $nama_berkas
            ];

            // upload berkas
            $berkas->move('berkas/', $nama_berkas);
        } else {
            // jika error
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to('/siswa');
        }

        // masukan ke dalam model
        $this->ModelSiswa->addBerkas($data);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Berkas berhasil ditambahkan..');
        return redirect()->to('/siswa');
    }

    public function deleteBerkas($id_berkas)
    {
        // hapus gambar lama
        $berkas = $this->ModelSiswa->berkasById($id_berkas);

        if ($berkas['berkas'] <> "") {
            unlink('berkas/' . $berkas['berkas']);
        }

        $this->ModelSiswa->deleteBerkas($id_berkas);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil dihapus..');
        return redirect()->to('/siswa');
    }

    public function apply($id_siswa)
    {
        $data = [
            'stat_pendaftaran' => 1
        ];

        // masukan kedalam model
        $this->ModelSiswa->updateData($data, $id_siswa);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Anda Berhasil Mendaftar');
        return redirect()->to('/siswa');
    }

    public function buktiLulus()
    {
        $data = [
            'title'         => 'Bukti Lulus',
            'siswa'         => $this->ModelSiswa->getBiodataSiswa(),
            'setting'       => $this->ModelAdmin->detailPengaturan(),
        ];

        return view('siswa/v_bukti-lulus', $data);
    }
}
