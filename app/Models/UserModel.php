<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\ProfilePhotoModel;

class UserModel extends Model
{
	protected $table      = 'users';                 // Nome da tabela
	protected $primaryKey = 'id';                    // Chave primária
	protected $useAutoIncrement = true;              // Usa incremento automático para o id
	protected $allowedFields = [
		'username',
		'first_name',
		'last_name',
		'email',
		'password',
		'role_id',
		'created_at',
		'updated_at',
		'deleted_at',
		'is_deleted',
		'message'
	];                                                 // Campos que podem ser manipulados

	protected $useTimestamps = true;                   // Habilita o uso de timestamps
	protected $createdField  = 'created_at';           // Nome do campo de data de criação
	protected $updatedField  = 'updated_at';           // Nome do campo de data de atualização
	protected $deletedField  = 'deleted_at';           // Nome do campo de data de exclusão (soft delete)     
	protected $validationRules = [
		'username'    => 'required|min_length[3]|max_length[255]',
		'email'       => 'required|valid_email|is_unique[users.email]',
		'password'    => 'required|min_length[8]',
	];

	protected $belongsTo = [
		'role' => 'App\Models\UserTypeModel'
	];

	protected $validationMessages = [
		'email' => [
			'is_unique' => 'Esse email já está em uso.'
		],
	];

	private $username;
	private $first_name;
	private $last_name;
	private $email;
	private $password;
	private $role_id;
	private $created_at;
	private $updated_at;
	private $deleted_at;
	private $is_deleted;
	private $message;

	public function getUsername()
	{
		return $this->username;
	}

	public function setUsername($value)
	{
		$this->username = $value;
	}

	public function getFirst_name()
	{
		return $this->first_name;
	}

	public function setFirst_name($value)
	{
		$this->first_name = $value;
	}

	public function getLast_name()
	{
		return $this->last_name;
	}

	public function setLast_name($value)
	{
		$this->last_name = $value;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($value)
	{
		$this->email = $value;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($value)
	{
		$this->password = $value;
	}

	public function getRoleId($value)
	{
		return $this->role_id;
	}

	public function setRoleId($value)
	{
		$this->role_id = $value;
	}

	public function getCreated_at()
	{
		return $this->created_at;
	}

	public function setCreated_at($value)
	{
		$this->created_at = $value;
	}

	public function getUpdated_at()
	{
		return $this->updated_at;
	}

	public function setUpdated_at($value)
	{
		$this->updated_at = $value;
	}

	public function getDeleted_at()
	{
		return $this->deleted_at;
	}

	public function setDeleted_at($value)
	{
		$this->deleted_at = $value;
	}

	public function getIs_deleted()
	{
		return $this->is_deleted;
	}

	public function setIs_deleted($value)
	{
		$this->is_deleted = $value;
	}

	public function getMessage()
	{
		return $this->message;
	}

	public function setMessage($value)
	{
		$this->message = $value;
	}

	public function insertUser($data)
	{
		if (!$this->validate($data)) {
			return false;
		}

		$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

		return $this->insert($data);
	}

	public function checkUserNameExistence(string $username)
	{
		return $this->where('username', $username)->first();
	}

	public function checkEmailExistence(string $email)
	{
		return $this->where('email', $email)->first();
	}

	public function setUserProfilePhoto($userId, $fileData)
	{
		$photoModel = new ProfilePhotoModel();

		$data = [
			'user_id'   => $userId,
			'file_name' => $fileData['file_name'],
			'file_path' => $fileData['file_path'],
			'mime_type' => $fileData['mime_type'],
			'created_at' => date('Y-m-d H:i:s'),
		];

		return $photoModel->addPhoto($data);
	}

	public function getFirstNameByUserId($userId)
	{
		$user = $this->find($userId);
		return $user['first_name'];
	}

	public function getLastNameByUserId($userId)
	{
		$user = $this->find($userId);
		return $user['last_name'];
	}

	public function updateUser($userId, $data)
	{
		return $this->update($userId, $data);
	}

	public function getUsernameByUserId($userId)
	{
		$user = $this->find($userId);
		return $user['username'];
	}

	public function getEmailByUserId($userId)
	{
		$user = $this->find($userId);
		return $user['email'];
	}

	public function getProfilePhotoByUserId($userId) {
		$profilePhotoModel = new ProfilePhotoModel();
		return $profilePhotoModel->getProfilePhotoByUserId($userId);
	}

	public function getUserRoleByUserId($userId) {
		$UserType = new UserTypeModel();
		return $UserType->getUserTypeByUserId($userId);
	}

	public function updateUserProfilePhoto($userId, $fileData) {
		$photoModel = new ProfilePhotoModel();
			$data = [
			'user_id' => $userId,
			'file_name' => $fileData['file_name'],
			'file_path' => $fileData['file_path'],
			'mime_type' => $fileData['mime_type'],
			'created_at' => date('Y-m-d H:i:s'),
		];

		$existing_photo = $photoModel->where('user_id', $userId)->first();
		return $photoModel->update($existing_photo, $data);
	}
}
