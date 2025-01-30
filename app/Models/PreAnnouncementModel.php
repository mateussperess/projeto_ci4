<?php

namespace App\Models;

use CodeIgniter\Model;

class PreAnnouncementModel extends Model
{
  protected $table = 'pre_announcements';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';

  protected $allowedFields = [
    'user_id',
    'property_type_id',
    'title',
    'total_area',
    'bedrooms',
    'bathrooms',
    'parking',
    'address',
    'city',
    'neighborhood',
    'state',
    'number',
    'complement',
    'zip_code',
    'price',
    'transaction_type',
    'description',
    'status',
    'broker_notes'
  ];

  protected $useTimestamps = true;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';

  protected $validationRules = [
    'user_id' => 'required|numeric',
    'property_type_id' => 'required|numeric',
    'title' => 'required',
    'total_area' => 'required|numeric',
    'address' => 'required',
    'city' => 'required',
    'neighborhood' => 'required',
    'state' => 'required|exact_length[2]',
    'number' => 'required',
    'zip_code' => 'required',
    'price' => 'required|numeric',
    'transaction_type' => 'required|in_list[sale,rent]',
    'description' => 'required'
  ];

  public function getAnnouncesByUserId($userId) {
    return $this->where('user_id', $userId)->findAll();
  }

  public function getAllPreAnnouncement() {
    return $this->findAll();
  }

  public function getUserDataByPreAnnouncementId($id) {
    $this->select('users.id, users.username, users.email, users.first_name, users.last_name, users.role_id, users.is_deleted');
    $this->join('users', 'users.id = pre_announcements.user_id');
    $this->join('profile_photos', 'profile_photos.user_id = users.id');
    $this->where('pre_announcements.id', $id);
    $query = $this->get();
    return $query->getRowArray();
  }
}
