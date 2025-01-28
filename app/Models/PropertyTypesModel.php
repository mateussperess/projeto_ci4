<?php

namespace App\Models;

use CodeIgniter\Model;

class PropertyTypesModel extends Model {
  protected $table = 'property_types';
  protected $primaryKey = 'id';
  protected $useAutoIncrement = true;
  protected $returnType = 'array';
  protected $allowedFields = [
    'id',
    'name', 
    'description'
  ];

  protected $useTimestamps = true;
  protected $createdField = 'created_at';
  protected $updatedField = 'updated_at';

  protected $validationRules = [
    'name' => 'required|min_length[3]|max_length[50]|is_unique[property_types.name,id,{id}]',
    'description' => 'permit_empty|min_length[10]'
  ];

  // Get all property types
  public function getAllTypes() {
    return $this->findAll();
  }

  // Get active property types
  public function getActiveTypes() {
    return $this->where('status', 'active')->findAll();
  }

  // Get type by ID
  public function getTypeById($id) {
    return $this->find($id);
  }

  // Get type by name
  public function getTypeByName($name) {
    return $this->where('name', $name)->first();
  }

  // Add new property type
  public function addType($data) {
    return $this->insert($data);
  }

  // Update property type
  public function updateType($id, $data) {
    return $this->update($id, $data);
  }
}