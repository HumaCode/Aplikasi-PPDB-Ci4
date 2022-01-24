<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct()
    {
        $this->ModelUser = new ModelUser();
        helper('form', 'file');
    }

    public function index()
    {
        $data = [
            'title' => 'User',
            'user' => $this->ModelUser->getAllData(),
        ];

        return view('admin/v_user', $data);
    }

    public function insertData()
    {
        // library validasi
        $validate = \Config\Services::validation();

        // validasi
        if ($this->validate([
            'email' => [
                'label' => 'Email',
                'rules' => 'required|is_unique[tbl_user.email]',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong.!!',
                    'is_unique' => 'Email sudah digunakan user lain..!!'
                ]
            ]
        ])) {
            $file = $this->request->getFile('foto');
            $nama_file = $file->getRandomName();

            $data = [
                'nama_user'     => htmlspecialchars($this->request->getPost('nama_user')),
                'email'         => htmlspecialchars($this->request->getPost('email')),
                'password'      => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'foto'          => $nama_file
            ];

            // upload foto
                $file->move('foto/' , $nama_file);

            // masukan kedalam model
            $this->ModelUser->insertData($data);

            // tampilkan flashdata
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan..');
            return redirect()->to('user');
        }else{
            // jika error
            session()->setFlashdata('errors', $validate->getErrors());
            return redirect()->to('user');
        }
    } 

    public function updateData($id_user)
    {
        // cek password, apakah user mengubah password
        if($this->request->getPost('password') == '') {
            $pass = $this->request->getPost('passLama');
        }else{
            $pass = password_hash($this->request->getPost('password'), PASSWORD_BCRYPT);
        }

        // cek , user mengupload foto atau tidak
        $file = $this->request->getFile('foto');
        if($file->getError() == 4) {
            $data = [
                'id_user'   => $id_user,
                'nama_user' => htmlspecialchars($this->request->getPost('nama_user')),
                'email'     => htmlspecialchars($this->request->getPost('email')),
                'password'  => $pass,
            ];
        }else{
            $file = $this->request->getFile('foto');
            $nama_file = $file->getRandomName();

            // hapus gambar lama
            $gmbrLama = $this->ModelUser->getDetailData($id_user);

            if($gmbrLama['foto'] <> "") {
                unlink('foto/' . $gmbrLama['foto']);
            }

            $data = [
                'id_user'   => $id_user,
                'nama_user' => $this->request->getPost('nama_user'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
                'foto' => $nama_file
            ];

            // upload foto
                $file->move('foto/' , $nama_file);
        }

        // masukan kedalam model
        $this->ModelUser->updateData($data, $id_user);
        

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil diubah..');
        return redirect()->to('user');
    }

    public function hapusData($id_user)
    {
        // hapus gambar lama
        $gmbrLama = $this->ModelUser->getDetailData($id_user);

        if($gmbrLama['foto'] <> "") {
            unlink('foto/' . $gmbrLama['foto']);
        }

        $this->ModelUser->hapusData($id_user);

        // tampilkan flashdata
        session()->setFlashdata('pesan', 'Data berhasil dihapus..');
        return redirect()->to('user');
    }
}
