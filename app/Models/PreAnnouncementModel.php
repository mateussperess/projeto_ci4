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
    'topography',
    'soil_type',
    'zip_code',
    'price',
    'transaction_type',
    'description',
    'status',
    'broker_notes',
    'is_verified'
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

  // public function getAnnouncesByUserId($userId)
  // {
  //   return $this->where('user_id', $userId)->findAll();
  // }

  public function getAnnouncesByUserId($userId)
  {
    return $this->select('pre_announcements.*, property_photos.file_name as photo')
      ->join('property_photos', 'property_photos.pre_announcement_id = pre_announcements.id', 'left')
      ->where('pre_announcements.user_id', $userId)
      ->findAll();
  }

  public function getUserDataByPreAnnouncementId($id)
  {
    $this->select('users.id, users.username, users.email, users.first_name, users.last_name, users.role_id, users.is_deleted');
    $this->join('users', 'users.id = pre_announcements.user_id');
    $this->join('profile_photos', 'profile_photos.user_id = users.id');
    $this->where('pre_announcements.id', $id);
    $query = $this->get();
    return $query->getRowArray();
  }

  public function getRecentPreAds()
  {
    return $this->select('pre_announcements.*, users.username, users.email, profile_photos.file_path as user_photo, property_types.name as property_type')
      ->join('users', 'users.id = pre_announcements.user_id')
      ->join('profile_photos', 'profile_photos.user_id = users.id', 'left')
      ->join('property_types', 'property_types.id = pre_announcements.property_type_id')
      ->where('pre_announcements.created_at >= DATE_SUB(CURDATE(), INTERVAL 3 DAY)')
      ->orderBy('pre_announcements.created_at', 'DESC')
      ->limit(5)
      ->findAll();
  }

  public function getAllPreAnnouncement()
  {
    return $this->select('pre_announcements.*, users.username, users.email, users.first_name, users.last_name, profile_photos.file_path, property_types.name as property_type')
      ->join('users', 'users.id = pre_announcements.user_id')
      ->join('profile_photos', 'profile_photos.user_id = users.id', 'left')
      ->join('property_types', 'property_types.id = pre_announcements.property_type_id')
      ->where('pre_announcements.status', 'pending')
      ->findAll();
  }

  public function setBrokerNotes($pre_ad_id, $broker_notes)
  {
    return $this->update($pre_ad_id, ['broker_notes' => $broker_notes]);
  }

  public function rejectPreAnnouncement($id, $broker_notes)
  {
    return $this->update($id, ['status' => 'rejected', 'is_verified' => 1, 'broker_notes' => $broker_notes]);
  }
  public function approvePreAnnouncement($id, $broker_notes)
  {
    return $this->update($id, ['status' => 'approved', 'is_verified' => 1, 'broker_notes' => $broker_notes]);
  }

  public function getAllPreEvaluatedAnnouncement()
  {
    return $this->select('pre_announcements.*, users.first_name, users.last_name, users.email, users.username')
      ->join('users', 'users.id = pre_announcements.user_id')
      ->where('pre_announcements.status !=', 'pending')
      ->orderBy('pre_announcements.updated_at', 'DESC')
      ->findAll();
  }
}
