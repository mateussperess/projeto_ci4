<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserTypeModel;
use App\Models\ProfilePhotoModel;
use App\Models\UserModel;

class Auth extends BaseController
{
  public function login()
  {
    $userModel = new UserModel();
    $email = trim($this->request->getPost('email'));
    $password = $this->request->getPost('password');

    $userFinded = $userModel->where('email', $email)->first();

    if (!$userFinded) {
      return redirect()->to(base_url('login'))->with('error', 'Email ou senha incorretos! Tente novamente.');
    }

    if ($userFinded && password_verify($password, $userFinded['password']) && $userFinded['is_deleted'] == 0) {
      $userRole = $userModel->getUserRoleByUserId($userFinded['id']);

      $session = session();
      $session->set('user_id', $userFinded['id']);
      $session->set('username', $userFinded['username']);
      $session->set('email', $userFinded['email']);
      $session->set('role', $userRole['id']);
      $session->set('logged_in', TRUE);

      $profilePhoto = $userModel->getProfilePhotoByUserId($userFinded['id']);
      $session->set('profile_photo', $profilePhoto);

      if ($userRole['id'] == 1) {
        return redirect()->to(base_url('admin'))->with('success_login', 'Bem-vindo(a) de volta, administrador!');
      } else if ($userRole['id'] == 2) {
        return redirect()->to(base_url('broker'))->with('success_login', 'Bem-vindo(a) de volta, corretor!');
      } else if ($userRole['id'] == 3) {
        return redirect()->to(base_url('dashboard'))->with('success_login', 'Bem-vindo(a) de volta, cliente!');
      }
    } else {
      return redirect()->to(base_url('login'))->with('error', 'Email ou senha incorretos! Tente novamente.');
    }
  }
}
