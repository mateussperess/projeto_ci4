<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyPhotosModel extends Model
{
  protected $table = 'property_photos';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';

  protected $allowedFields = [
    'pre_announcement_id',
    'file_name',
    'file_path',
    'mime_type',
    'is_main_photo',
    'photo_order',
    'created_at'
  ];

  protected $useTimestamps = true;
  protected $createdField = 'created_at';
  protected $updatedField = null;

  public function addPhotos($pre_announcement_id, $files)
  {
    foreach ($files as $index => $file) {
      if ($file->isValid() && !$file->hasMoved()) {
        $newName = $file->getRandomName();
        $uploadPath = ROOTPATH . 'public/uploads/property_photos';

        try {
          $file->move($uploadPath, $newName);

          $photoData = [
            'pre_announcement_id' => $pre_announcement_id,
            'file_name' => $newName,
            'file_path' => 'uploads/property_photos/' . $newName,
            'mime_type' => $file->getClientMimeType(),
            'is_main_photo' => ($index === 0) ? 1 : 0,
            'photo_order' => $index
          ];

          $db = \Config\Database::connect();
          $builder = $db->table($this->table);
          $builder->insert($photoData);
        } catch (\Exception $e) {
          throw $e;
        }
      }
    }
    return true;
  }

  public function getPhotosByPreAnnouncementId($pre_announcement_id) {
    $db = \Config\Database::connect();
    $builder = $db->table($this->table);
    $builder->where('pre_announcement_id', $pre_announcement_id);
    $builder->orderBy('photo_order', 'ASC');
    $query = $builder->get();
    return $query->getResultArray();
  }
}
