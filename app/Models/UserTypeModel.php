<?php

namespace App\Models;

use CodeIgniter\Model;

class UserTypeModel extends Model
{
  protected $table = 'user_types';
  protected $primaryKey = 'id';
  protected $allowedFields = ['name', 'description'];
  protected $useTimestamps = true;
  protected $createdField = 'created_at';

  protected $hasMany = [
    'users' => 'App\Models\UserModel'
  ];
  public function getUserTypeByUserId($userId)
  {
    return $this->db->table('users')
      ->select('user_types.*')
      ->join('user_types', 'user_types.id = users.role_id')
      ->where('users.id', $userId)
      ->get()
      ->getRowArray();
  }
}
