<?php

namespace App\Controllers;

use App\Models\PendaftarModel;
use App\Models\UserModel;

use CodeIgniter\I18n\Time;
use DateTime;

class User extends BaseController
{
    // variabel model
    protected $pendaftarModel, $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->pendaftarModel = new PendaftarModel();
        helper('form');
    }

    // menampilkan halaman beranda user
    public function beranda()
    {
        $data = [
            'halaman'   => 'Beranda',
            'user'      => $this->userModel->getUser(session()->get('email')),
            'pendaftar' => $this->pendaftarModel->getPendaftar(session()->get('email'))
        ];

        return view('page/user/beranda', $data);
    }

    // menampilkan halaman edit data user
    public function editPendaftar($id)
    {
        $data = [
            'halaman'   => 'Edit Data',
            'user'      => $this->userModel->getUser(session()->get('email')),
            'pendaftar' => $this->pendaftarModel->getDetailPendaftar($id)
        ];

        return view('page/user/editpendaftar', $data);
    }

    // menyimpan data update user yang diubah
    public function updatePendaftar($id)
    {
        if (!$this->validate([
            'nama' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Judul harus diisi.',
                ]
            ],
            'alamat' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat harus diisi.',
                ]
            ],
            'asal_sekolah' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Asal sekolah harus diisi.',
                ]
            ],
            'nilai_mtk' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nilai harus diisi.',
                ]
            ],
            'nilai_bing' => [
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nilai harus diisi.',
                ]
            ]
        ])) {
            $validation = \Config\Services::validation();
            $error = [
                'nama' => $validation->getError('nama'),
                'alamat'  => $validation->getError('alamat'),
                'asal_sekolah'  => $validation->getError('asal_sekolah'),
                'nilai_mtk'  => $validation->getError('nilai_mtk'),
                'nilai_bing'  => $validation->getError('nilai_bing'),
                'header' => 'Isi Data Dengan Benar'
            ];
            session()->setFlashdata('error', $error);
            return redirect()->to("/edit-data/$id")->withInput();
        }

        if ($this->pendaftarModel->getDetailPendaftar($id)['status'] == 'Belum Daftar') {
            $status = 'Menunggu Persetujuan';
        } elseif ($this->pendaftarModel->getDetailPendaftar($id)['status'] != 'Menunggu Persetujuan') {
            $status = $this->pendaftarModel->getDetailPendaftar($id)['status'];
        } else {
            $status = 'Menunggu Persetujuan';
        }

        $fotoDb = $this->pendaftarModel->getDetailPendaftar($id)['foto'];  // nama foto dari db
        $usingName = $this->pendaftarModel->getDetailPendaftar($id)['email'] . ".jpg"; // nama foto seharusnya

        $fileFoto = $this->request->getFile('foto');
        if (
            $fileFoto->getError() == 4
            && $fotoDb == 'image.jpg'
        ) {
            $namaFoto = 'image.jpg';
        } elseif (
            $fileFoto->getError() == 0
            && (($fotoDb == $usingName) || ($fotoDb == 'image.jpg'))
        ) {
            if (file_exists('assets/img/' . $usingName)) {
                unlink('assets/img/' . $usingName);
            }
            $namaFoto = $usingName;
            $fileFoto->move('assets/img', $namaFoto);
        } elseif (
            $fileFoto->getError() == 4
            && $fotoDb == $usingName
        ) {
            $namaFoto = $fotoDb;
        }

        $this->pendaftarModel->insertPendaftar([
            'id' => $id,
            'id_pendaftaran' => 'PSBID-' . $this->userModel->getUser(session()->get('email'))['id'],
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat'),
            'asal_sekolah' => $this->request->getVar('asal_sekolah'),
            'nilai_mtk' => $this->request->getVar('nilai_mtk'),
            'nilai_bing' => $this->request->getVar('nilai_bing'),
            'status' => $status,
            'foto' => $namaFoto,
            'updated_at' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
        ]);

        session()->setFlashdata('success', 'Data berhasil diubah.');
        return redirect()->to('/beranda');
    }
}
