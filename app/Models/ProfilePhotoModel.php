<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilePhotoModel extends Model
{
  protected $table = 'profile_photos';
  protected $primaryKey = 'id';
  protected $allowedFields = ['user_id', 'file_name', 'file_path', 'mime_type', 'created_at'];
  protected $useTimestamps = false; // Se os campos timestamps forem gerenciados manualmente

  public function addPhoto(array $data)
  {
    $this->insert($data);
    return $this->insertID();
  }

  public function getPhotosByUserId($userId)
  {
    return $this->where('user_id', $userId)->findAll();
  }
}
