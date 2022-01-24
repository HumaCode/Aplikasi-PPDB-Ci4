<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAuth;
use App\Models\ModelSiswa;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->ModelSiswa = new ModelSiswa();
        $this->ModelAuth = new ModelAuth();
        helper('form');
    }

    public function index()
    {
        
    }

    public function login()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
        ];

        return view('v_login-user', $data);
    }

    public function cek_login_user()
    {
        // validasi
        if ($this->validate([
            'email' => [
                'label' => 'E-Mail',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong.!!',
                    'valid_email' => 'Format email salah.!!'
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong.!!',

                ],
            ]
        ])) {
            // jika valid
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $cek_login = $this->ModelAuth->login_user($email);

            if ($cek_login) {
                // buat session
                if(password_verify($password, $cek_login['password'])) {
                    session()->set('nama_user', $cek_login['nama_user']);
                    session()->set('email', $cek_login['email']);
                    session()->set('foto', $cek_login['foto']);
                    session()->set('level', 'admin');

                    // arahkan ke halaman admin
                    return redirect()->to('admin');
                } else{
                    session()->setFlashdata('p', 'Email atau Password Salah.!!');
                    return redirect()->to('auth/login');
                }
            }else{
                    session()->setFlashdata('p', 'Email atau Password Salah.!!');
                    return redirect()->to('/auth/login');
            }
        } else {
            // jika error
            $validation =  \Config\Services::validation();
            return redirect()->to('/auth/login')->withInput()->with('validation', $validation);
        };
    }

    public function logout()
    {
        session()->remove('nama_user');
        session()->remove('email');
        session()->remove('foto');
        session()->remove('level');
        
        // flashdata
        session()->setFlashdata('pesan', 'Anda berhasil logout');
        return redirect()->to('auth/login');
    }

    public function loginSiswa()
    {
        $data = [
            'title' => 'Halaman Login',
            'validation' => \Config\Services::validation()
        ];

        return view('v_login-siswa', $data);
    }

    public function cekLoginSiswa()
    {
        // validasi
        if ($this->validate([
            'nisn' => [
                'label' => 'NISN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong.!!',
                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Tidak boleh kosong.!!',

                ],
            ]
        ])) {
            // jika valid
            $nisn = $this->request->getPost('nisn');
            $password = $this->request->getPost('password');

            $cek_login = $this->ModelAuth->login_siswa($nisn);

            if ($cek_login) {
                // buat session
                if(password_verify($password, $cek_login['password'])) {
                    session()->set('id_siswa', $cek_login['id_siswa']);
                    session()->set('nisn', $cek_login['nisn']);
                    session()->set('nama_lengkap', $cek_login['nama_lengkap']);
                    session()->set('nama_panggilan', $cek_login['nama_panggilan']);
                    session()->set('tgl_lahir', $cek_login['tgl_lahir']);
                    session()->set('level', 'siswa');

                } else{
                    session()->setFlashdata('p', 'NISN atau Password Salah.!!');
                    return redirect()->to('/auth/loginSiswa');
                }
            }else{
                    session()->setFlashdata('p', 'NISN atau Password Salah.!!');
                    return redirect()->to('/auth/loginSiswa');
            }
        } else {
            // jika error
            $validation =  \Config\Services::validation();
            return redirect()->to('/auth/loginSiswa')->withInput()->with('validation', $validation);
        };

        // flashdata
        session()->setFlashdata('login', 'Anda berhasil login');
        return redirect()->to('/siswa');
    }

    public function logoutSiswa()
    {
        session()->remove('id_siswa');
        session()->remove('nisn');
        session()->remove('nama_lengkap');
        session()->remove('nama_panggilan');
        session()->remove('tgl_lahir');
        session()->remove('level');
        
        // flashdata
        session()->setFlashdata('logout', 'Anda berhasil logout');
        return redirect()->to('auth/loginSiswa');
    }
}
