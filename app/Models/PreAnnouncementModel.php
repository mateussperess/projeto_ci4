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
}
