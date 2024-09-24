<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nome da tabela
    protected $primaryKey = 'id'; // Chave primária
    protected $allowedFields = ['first_name', 'last_name', 'mail', 'password', 'profile_photo']; // Campos permitidos
    protected $useTimestamps = true;

    public function createUser($data)
    {
        return $this->insert($data); // Usa o método insert para adicionar os dados
    }
}
