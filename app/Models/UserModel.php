<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $allowedFields = [
        'email',
        'password',
        'level',
        'created_at'
    ];

    public function getAllUser()
    {
        return $this->findAll();
    }

    public function getUser($email)
    {
        return $this->where(['email' => $email])->first();
    }

    public function insertUser($data)
    {
        return $this->save($data);
    }
}
