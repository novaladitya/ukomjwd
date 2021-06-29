<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftarModel extends Model
{
    protected $table = 'pendaftar';
    protected $allowedFields = [
        'email',
        'id_pendaftaran',
        'nama',
        'alamat',
        'asal_sekolah',
        'nilai_mtk',
        'nilai_bing',
        'status',
        'foto',
        'created_at',
        'updated_at'
    ];

    public function getAllPendaftar()
    {
        return $this->findAll();
    }

    public function getPendaftar($email)
    {
        return $this->where(['email' => $email])->first();
    }

    public function getDetailPendaftar($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function insertPendaftar($data)
    {
        return $this->save($data);
    }
}
