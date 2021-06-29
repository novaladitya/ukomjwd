<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PendaftarModel;

use CodeIgniter\I18n\Time;
use DateTime;

class Auth extends BaseController
{
    // variabel model
    protected $userModel, $pendaftarModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pendaftarModel = new PendaftarModel();
    }

    // menampilkan halaman login
    public function login()
    {
        return view('page/login');
    }

    // menampilkan halaman register
    public function register()
    {
        return view('page/register');
    }

    // verifikasi login
    public function cekAuth()
    {
        $inputEmail = $this->request->getVar('email');
        $inputPassword = $this->request->getVar('password');
        $user = $this->userModel->getUser($inputEmail);

        if ($user) {
            $password = $user['password'];
            if ($inputPassword == $password) {
                $dataSession = [
                    'email' => $user['email'],
                    'level' => $user['level'],
                    'logged_in' => TRUE
                ];
                session()->set($dataSession);
                if ($user['level'] == 1) {
                    return redirect()->to('/admin');
                }
                return redirect()->to('/beranda');
            } else {
                session()->setFlashdata('error', 'Password salah.');
                return redirect()->to('/');
            }
        } else {
            session()->setFlashdata('error', 'Email tidak ditemukan.');
            return redirect()->to('/');
        }
    }

    // menghapus data session (logout)
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    // menyimpan akun yang baru register
    public function createAcc()
    {
        $inputEmail = $this->request->getVar('email');
        $inputPassword = $this->request->getVar('password');

        if ($inputEmail != '' && $inputPassword != '') {
            $this->userModel->insertUser([
                'email'      => $inputEmail,
                'password'   => $inputPassword,
                'level'      => '2',
                'created_at' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
            ]);

            $this->pendaftarModel->insertPendaftar([
                'email'          => $inputEmail,
                'status'         => 'Belum Daftar',
                'foto'           => 'default.jpg',
                'created_at'     => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB',
                'updated_at'     => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB',
            ]);

            session()->setFlashdata('success', 'Akun telah dibuat, silahkan login.');
            return redirect()->to('/');
        } else {
            session()->setFlashdata('error', 'Isi email dan password dengan benar.');
            return redirect()->to('/register');
        }
    }
}
