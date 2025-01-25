<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserTypeModel;
use App\Models\ProfilePhotoModel;
use App\Models\UserModel;

class Admin extends Controller
{
  public function index()
  {
    $admin = new UserTypeModel();
    $total_users = $admin->getTotalQuantityUsers();

    $data = [
      'total_users' => $total_users
    ];

    return view('admin/index', $data);
  }

  public function users()
  {
    $admin = new UserTypeModel();
    $profile_photo_model = new ProfilePhotoModel();

    $users = $admin->getAllUsers();
    $profile_photos = [];

    foreach ($users as $user) {
      $profile_photos[$user['id']] = $profile_photo_model->getProfilePhotoByUserId($user['id']);
    }

    $data = [
      'users' => $users,
      'profile_photos' => $profile_photos,
      'total_users' => $admin->getTotalQuantityUsers()
    ];

    return view('admin/users', $data);
  }

  public function toggle_user_status()
  {
    $user_id = $this->request->getPost('user_id');
    $user_model = new UserModel();

    $user = $user_model->find($user_id);

    if ($user['is_deleted'] == 1) {
      $user_model->update($user_id, [
        'is_deleted' => 0,
        'deleted_at' => NULL
      ]);
      return redirect()->to(base_url('admin/users'))->with('success', 'Usuário habilitado com sucesso!');
    } else {
      $user_model->update($user_id, [
        'is_deleted' => 1,
        'deleted_at' => date('Y-m-d H:i:s')
      ]);
      return redirect()->to(base_url('admin/users'))->with('success', 'Usuário desabilitado com sucesso!');
    }
  }

  public function edit_user_page($user_id)
  {
    $user = new UserModel();
    $profile_photo_model = new ProfilePhotoModel();

    $profile_photo = $profile_photo_model->getProfilePhotoByUserId($user_id);

    $user_data = $user->find($user_id);
    $data = [
      'user' => $user_data,
      'profile_photo' => $profile_photo
    ];

    return view('admin/edit_user', $data);
  }

  public function update_user($user_id)
  {
    $userModel = new UserModel();
    $profilePhotoModel = new ProfilePhotoModel();

    $username = $this->request->getPost('username');
    $first_name = $this->request->getPost('first_name');
    $last_name = $this->request->getPost('last_name');
    $email = $this->request->getPost('email');
    $role_id = $this->request->getPost('role_id');
    $is_deleted = $this->request->getPost('is_deleted');

    // Get current user data
    $current_user = $userModel->find($user_id);

    // Check email uniqueness
    if ($email !== $current_user['email']) {
      $existing_user = $userModel->where('email', $email)->where('id !=', $user_id)->first();
      if ($existing_user) {
        return redirect()->back()->with('error', 'Email já está em uso por outro usuário.');
      }
    }

    // Check username uniqueness
    if ($username !== $current_user['username']) {
      $existing_username = $userModel->where('username', $username)->where('id !=', $user_id)->first();
      if ($existing_username) {
        return redirect()->back()->with('error', 'Nome de usuário já está em uso.');
      }
    }

    // Update user data
    $userData = [
      'username' => strtolower($username),
      'first_name' => ucfirst(strtolower($first_name)),
      'last_name' => ucfirst(strtolower($last_name)),
      'email' => $email,
      'role_id' => $role_id,
      'is_deleted' => $is_deleted,
      'updated_at' => date('Y-m-d H:i:s')
    ];

    // Handle password update if provided
    $password = $this->request->getPost('password');
    if ($password) {
      $userData['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    $userModel->update($user_id, $userData);

    // Handle profile photo upload
    $profile_photo = $this->request->getFile('profile_photo');
    if ($profile_photo && $profile_photo->isValid() && !$profile_photo->hasMoved()) {
      $newName = $profile_photo->getRandomName();
      $uploadPath = ROOTPATH . 'public/uploads/profile_photos';

      try {
        $profile_photo->move($uploadPath, $newName);

        $photoData = [
          'file_name' => $newName,
          'file_path' => 'uploads/profile_photos/' . $newName,
          'mime_type' => $profile_photo->getClientMimeType(),
          'created_at' => date('Y-m-d H:i:s')
        ];

        $existing_photo = $profilePhotoModel->where('user_id', $user_id)->first();
        if ($existing_photo) {
          $profilePhotoModel->update($existing_photo['id'], $photoData);
        } else {
          $photoData['user_id'] = $user_id;
          $profilePhotoModel->insert($photoData);
        }
      } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Erro ao atualizar foto de perfil: ' . $e->getMessage());
      }
    }

    return redirect()->to(base_url('admin/users'))->with('success', 'Usuário atualizado com sucesso!');
  }
}
