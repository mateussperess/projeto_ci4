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
}
