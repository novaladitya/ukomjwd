<?php

namespace App\Controllers;

use App\Models\PendaftarModel;
use App\Models\UserModel;

use CodeIgniter\I18n\Time;
use DateTime;

class Admin extends BaseController
{
	// variabel model
	protected $pendaftarModel, $userModel;
	public function __construct()
	{
		$this->pendaftarModel = new PendaftarModel();
		$this->userModel = new UserModel();
	}

	// menampilkan halaman beranda admin
	public function beranda()
	{
		$pendaftar = $this->pendaftarModel->getAllPendaftar();
		$menungguPersetujuan = 0;
		$diterima = 0;
		$tidakDiterima = 0;
		$cadangan = 0;
		foreach ($pendaftar as $p) {
			if ($p['status'] == "Menunggu Persetujuan") {
				$menungguPersetujuan += 1;
			} elseif ($p['status'] == "Diterima") {
				$diterima += 1;
			} elseif ($p['status'] == "Tidak Diterima") {
				$tidakDiterima += 1;
			} elseif ($p['status'] == "Cadangan") {
				$cadangan += 1;
			}
		}

		$data = [
			'halaman' => 'Beranda',
			'menungguPersetujuan' => $menungguPersetujuan,
			'diterima' => $diterima,
			'tidakDiterima' => $tidakDiterima,
			'cadangan' => $cadangan
		];

		return view('page/admin/beranda', $data);
	}

	// menampilkan halaman list pendaftar
	public function infoPendaftar()
	{
		$data = [
			'halaman' => 'Info Pendaftar',
			'pendaftar' => $this->pendaftarModel->getAllPendaftar()
		];

		return view('page/admin/info_pendaftar', $data);
	}

	// menampilkan detail si pendaftar
	public function detailPendaftar($id)
	{
		$data = [
			'halaman'   => 'Detail Pendaftar',
			'pendaftar' => $this->pendaftarModel->getDetailPendaftar($id)
		];

		return view('page/admin/detailpendaftar', $data);
	}

	// update status pendaftar
	public function updatePendaftar($id)
	{
		$this->pendaftarModel->insertPendaftar([
			'id' => $id,
			'status' => $this->request->getVar('status'),
			'updated_at' => DateTime::createFromFormat('Y-m-d H:i:s', Time::now('Asia/Jakarta'))->format('j F Y, G:i') . ' WIB'
		]);

		session()->setFlashdata('success', 'Data berhasil diubah.');
		return redirect()->to("/admin/info-pendaftar");
	}

	// menampilkan halaman list akun yang terdaftar pada sistem
	public function akunPendaftar()
	{
		$data = [
			'halaman'   => 'Akun Pendaftar',
			'user' 	    => $this->userModel->getAllUser()
		];

		return view('page/admin/akun_pendaftar', $data);
	}
}
