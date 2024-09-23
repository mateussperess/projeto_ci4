<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users'; // Nome da tabela
    protected $primaryKey = 'id'; // Chave primária
    protected $allowedFields = ['first_name', 'mail']; // Campos permitidos
}
