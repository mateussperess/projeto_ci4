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
    'is_verified',
    'broker_id',
    'is_deleted',
    'verified_at'
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

  public function rejectPreAnnouncement($id, $broker_notes, $user_id)
  {
    return $this->update($id, [
      'status' => 'rejected',
      'is_verified' => 1,
      'broker_notes' => $broker_notes,
      'broker_id' => (int)$user_id,
      'verified_at' => date('Y-m-d H:i:s')  // Using full datetime format
    ]);
  }
  public function approvePreAnnouncement($id, $broker_notes)
  {
    return $this->update($id, [
      'status' => 'approved',
      'is_verified' => 1,
      'broker_notes' => $broker_notes,
      'broker_id' => session()->get('user_id'),
      'verified_at' => date('Y-m-d H:i:s')  // Using full datetime format
    ]);
  }

  public function getAllPreEvaluatedAnnouncement()
  {
    return $this->select('pre_announcements.*, users.first_name, users.last_name, users.email, users.username')
      ->join('users', 'users.id = pre_announcements.user_id')
      ->where('pre_announcements.status !=', 'pending')
      ->orderBy('pre_announcements.updated_at', 'DESC')
      ->findAll();
  }

  public function setPropertyData($pre_ad_id, $files)
  {
    $propertyPhotosModel = new PropertyPhotosModel();
    $propertyPhotosModel->addPropertyPhotos($pre_ad_id, $files);
  }

  public function getAllPreAnnouncementDataByUserId($userId)
  {
    return $this->select('pre_announcements.*, users.username, users.email, users.first_name, users.last_name, profile_photos.file_path, property_types.name as property_type, GROUP_CONCAT(DISTINCT property_photos.file_name) as photo_files, GROUP_CONCAT(DISTINCT property_photos.is_main_photo) as main_photos')
      ->join('users', 'users.id = pre_announcements.user_id')
      ->join('profile_photos', 'profile_photos.user_id = users.id', 'left')
      ->join('property_types', 'property_types.id = pre_announcements.property_type_id')
      ->join('property_photos', 'property_photos.pre_announcement_id = pre_announcements.id', 'left')
      ->where('users.id', $userId)
      ->orderBy('pre_announcements.created_at', 'DESC')
      ->groupBy('pre_announcements.id')
      ->findAll();
  }

  public function getAnnouncesApprovedToday()
  {
    $today = date('Y-m-d');
    return $this->select('pre_announcements.*')
      ->where('pre_announcements.status', 'approved')
      ->where('DATE(pre_announcements.verified_at)', $today)
      ->where('pre_announcements.is_deleted', 0)
      ->countAllResults();
  }

  public function getAllPendingAnnounces()
  {
    return $this->select('pre_announcements.*')
      ->where('pre_announcements.status', 'pending')
      ->countAllResults();
  }

  public function getAllRejectedAnnounces()
  {
    return $this->select('pre_announcements.*')
      ->where('pre_announcements.status', 'rejected')
      ->countAllResults();
  }

  public function getAllRejectedAnnouncesByUserId($userId)
  {
    return $this->select('pre_announcements.*')
      ->where('pre_announcements.status', 'rejected')
      ->where('pre_announcements.broker_id', (int)$userId)
      ->countAllResults();
  }

  public function getAllReviewedAnnounces()
  {
    return $this->select('pre_announcements.*')
      ->where('pre_announcements.status !=', 'pending')
      ->countAllResults();
  }

  public function getPreAnnouncementById($id)
  {
    return $this->select('pre_announcements.*, users.username, users.email, users.first_name, users.last_name, profile_photos.file_path, property_types.name as property_type, GROUP_CONCAT(DISTINCT property_photos.file_name) as photo_files, GROUP_CONCAT(DISTINCT property_photos.is_main_photo) as main_photos')
      ->join('users', 'users.id = pre_announcements.user_id')
      ->join('profile_photos', 'profile_photos.user_id = users.id', 'left')
      ->join('property_types', 'property_types.id = pre_announcements.property_type_id')
      ->join('property_photos', 'property_photos.pre_announcement_id = pre_announcements.id', 'left')
      ->where('pre_announcements.id', $id)
      ->groupBy('pre_announcements.id')
      ->first();
  }

  public function getHousesData()
  {
    $propertyPhotos = new PropertyPhotosModel();

    $houses = $this->select('pre_announcements.*, property_types.name as property_type')
      ->join('property_types', 'property_types.id = pre_announcements.property_type_id')
      ->where('pre_announcements.property_type_id', 1)
      ->where('pre_announcements.status', 'approved')
      ->where('pre_announcements.is_deleted', 0)
      ->orderBy('pre_announcements.created_at', 'DESC')
      ->findAll();

    $housesData = [];

    foreach ($houses as $house) {
      $photos = $propertyPhotos->getPropertyPhotosByPreAnnouncementId($house['id']);
      $mainPhoto = !empty($photos) ? $photos[0]['file_name'] : 'default.jpg';

      $housesData[] = [
        'id' => $house['id'],
        'title' => $house['title'],
        'price' => $house['price'],
        'address' => $house['address'],
        'description' => $house['description'],
        'property_type' => $house['property_type'],
        'total_area' => $house['total_area'],
        'bedrooms' => $house['bedrooms'],
        'bathrooms' => $house['bathrooms'],
        'parking' => $house['parking'],
        'transaction_type' => $house['transaction_type'],
        'main_photo' => $mainPhoto,
        'photos' => $photos
      ];
    }

    return $housesData;
  }

  public function getApartmentsData()
  {
    $propertyPhotos = new PropertyPhotosModel();

    $apartments = $this->select('pre_announcements.*, property_types.name as property_type')
      ->join('property_types', 'property_types.id = pre_announcements.property_type_id')
      ->where('pre_announcements.property_type_id', 2)
      ->where('pre_announcements.status', 'approved')
      ->where('pre_announcements.is_deleted', 0)
      ->orderBy('pre_announcements.created_at', 'DESC')
      ->findAll();

    $apartmentsData = [];

    foreach ($apartments as $apartment) {
      $photos = $propertyPhotos->getPropertyPhotosByPreAnnouncementId($apartment['id']);
      $mainPhoto = !empty($photos) ? $photos[0]['file_name'] : 'default.jpg';

      $apartmentsData[] = [
        'id' => $apartment['id'],
        'title' => $apartment['title'],
        'price' => $apartment['price'],
        'address' => $apartment['address'],
        'description' => $apartment['description'],
        'property_type' => $apartment['property_type'],
        'total_area' => $apartment['total_area'],
        'bedrooms' => $apartment['bedrooms'],
        'bathrooms' => $apartment['bathrooms'],
        'parking' => $apartment['parking'],
        'transaction_type' => $apartment['transaction_type'],
        'main_photo' => $mainPhoto,
        'photos' => $photos
      ];
    }

    return $apartmentsData;
  }
  public function getLandsData()
  {
    $propertyPhotos = new PropertyPhotosModel();

    $lands = $this->select('pre_announcements.*, property_types.name as property_type')
      ->join('property_types', 'property_types.id = pre_announcements.property_type_id')
      ->where('pre_announcements.property_type_id', 3)
      ->where('pre_announcements.status', 'approved')
      ->where('pre_announcements.is_deleted', 0)
      ->orderBy('pre_announcements.created_at', 'DESC')
      ->findAll();

    $landsData = [];

    foreach ($lands as $land) {
      $photos = $propertyPhotos->getPropertyPhotosByPreAnnouncementId($land['id']);
      $mainPhoto = !empty($photos) ? $photos[0]['file_name'] : 'default.jpg';

      $landsData[] = [
        'id' => $land['id'],
        'title' => $land['title'],
        'price' => $land['price'],
        'address' => $land['address'],
        'description' => $land['description'],
        'property_type' => $land['property_type'],
        'total_area' => $land['total_area'],
        'transaction_type' => $land['transaction_type'],
        'main_photo' => $mainPhoto,
        'photos' => $photos
      ];
    }

    return $landsData;
  }
  public function getAllActivatedPreAnnouncement()
  {
    $array = [
      'status' => 'approved',
      'is_deleted' => 0,
    ];

    return $this->where($array)->countAllResults();
  }

  public function getRecentAnnouncements($limit = 5)
  {
    $propertyPhotos = new PropertyPhotosModel();

    $announcements = $this->select('pre_announcements.*, users.first_name, users.last_name, users.email, profile_photos.file_path')
      ->join('users', 'users.id = pre_announcements.user_id')
      ->join('profile_photos', 'users.id = profile_photos.user_id', 'left')
      ->orderBy('pre_announcements.created_at', 'DESC')
      ->limit($limit)
      ->findAll();

    foreach ($announcements as &$announcement) {
      $photos = $propertyPhotos->getPropertyPhotosByPreAnnouncementId($announcement['id']);
      $announcement['main_photo'] = !empty($photos) ? $photos[0]['file_name'] : 'default.jpg';
    }

    return $announcements;
  }
}
