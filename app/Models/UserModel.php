<?php

namespace App\Models;

use CodeIgniter\Model;
use Locale;

class UserModel extends Model
{
    protected $table = 'users'; // Nome da tabela
    protected $primaryKey = 'id'; // Chave primária
    protected $allowedFields = ['first_name', 'last_name', 'mail', 'password', 'profile_photo']; // Campos permitidos
    protected $useTimestamps = true;

    public function createUser($data)
    {
        return $this->insert($data); 
    }

    public function checkEmailExists($mail)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
    
        $builder->where('mail', $mail);
        $query = $builder->get();
    
        if ($query->getNumRows() > 0) {
            return true; 
        } else {
            return false; 
        }
    }
}
