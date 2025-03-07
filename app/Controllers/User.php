<?php

namespace App\Controllers;

use App\Models\PreAnnouncementModel;
use App\Models\PropertyPhotosModel;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Services\EmailService;
use App\Controllers\Logout;

class User extends Controller
{
  public function register_page()
  {
    return view('register');
  }

  public function login_page()
  {
    return view('login');
  }
  public function create()
  {
    $username = $this->request->getPost('username');
    $first_name = $this->request->getPost('first_name');
    $last_name = $this->request->getPost('last_name');
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $confirm_password = $this->request->getPost('confirm_password');

    $userModel = new UserModel();

    if ($userModel->checkUserNameExistence($username)) {
      return redirect()->to(base_url('register'))->with('warning_username', 'Este nome de usuário já está em uso!');
    }

    if ($userModel->checkEmailExistence($email)) {
      return redirect()->to(base_url('register'))->with('warning_email', 'Este email não está disponível!');
    }

    if ($password !== $confirm_password) {
      return redirect()->to(base_url('register'))->with('warning_passwords', 'As senhas devem ser iguais!');
    }

    $userData = [
      'username'    => strtolower($username),
      'first_name'  => ucfirst(strtolower($first_name)),
      'last_name'   => ucfirst(strtolower($last_name)),
      'email'       => $email,
      'password'    => password_hash($password, PASSWORD_DEFAULT), // password hash
      'created_at'  => date('Y-m-d H:i:s'),
      'updated_at'  => date('Y-m-d H:i:s'),
      'is_deleted'  => 0,
      'message'     => null,
    ];

    $userId = $userModel->insert($userData);

    if ($userId) {
      $profile_photo = $this->request->getFile('profile_photo');

      if ($profile_photo->isValid() && !$profile_photo->hasMoved()) {
        $newName = $profile_photo->getRandomName();
        $uploadPath = ROOTPATH  . 'public/uploads/profile_photos';

        // move o arquivo para o local definitivo
        try {
          $profile_photo->move($uploadPath, $newName);
        } catch (\Exception $e) {
          return redirect()->back()->withInput()->with('error', 'Erro ao mover a foto de perfil: ' . $e->getMessage());
        }

        $photoData = [
          'user_id'   => $userId,
          'file_name' => $newName,
          'file_path' => 'uploads/profile_photos/' . $newName,
          'mime_type' => $profile_photo->getClientMimeType(),
          'created_at' => date('Y-m-d H:i:s'),
        ];

        $userModel->setUserProfilePhoto($userId, $photoData);
      }
    } else {
      return redirect()->back()->withInput()->with('error', 'Erro ao registrar usuário.');
    }

    $emailService = new EmailService();
    $emailService->sendWelcomeEmail($userData['email'], $userData['username']);
    return redirect()->to(base_url('login'))->with('success', 'Conta criada com sucesso!');
  }

  public function logout()
  {
    $logout = new Logout();
    $logout->logout();
    return redirect()->to(base_url('login'));
  }

  public function profile()
  {
    $session = session();
    $userModel = new UserModel();


    if ($session->has('user_id')) {
      $userRole = $userModel->getUserRoleByUserId($session->get('user_id'));
      $userProfilePhoto = $userModel->getProfilePhotoByUserId($session->get('user_id'));

      $session->set('username', $userModel->getUsernameByUserId($session->get('user_id')));
      $session->set('email', $userModel->getEmailByUserId($session->get('user_id')));
      $session->set('profile_photo', $userProfilePhoto);

      $data = [
        'user_id' => $session->get('user_id'),
        'username' => $userModel->getUsernameByUserId($session->get('user_id')),
        'firstname' => $userModel->getFirstNameByUserId($session->get('user_id')),
        'lastname' => $userModel->getLastNameByUserId($session->get('user_id')),
        'profile_photo' => $userProfilePhoto,
        'user_role' => $userRole['id']
      ];

      return view('profile', $data);
    } else {
      return redirect()->to(base_url('login'))->with('error', 'Email ou senha incorretos! Tente novamente.');
    }
  }

  public function edit_profile()
  {
    $session = session();

    if ($session->has('user_id')) {
      $userModel = new UserModel();
      $profilePhoto = $userModel->getProfilePhotoByUserId($session->get('user_id'));

      $user = $userModel->find($session->get('user_id'));
      $data = [
        'user_id' => $session->get('user_id'),
        'username' => $user['username'],
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name'],
        'email' => $user['email'],
        'profile_photo' => $profilePhoto
      ];
      return view('edit_profile', $data);
    } else {
      return redirect()->to(base_url('login'))->with('error', 'Email ou senha incorretos! Tente novamente.');
    }
  }

  public function update_profile()
  {
    $session = session();
    $userModel = new UserModel();
    // $profilePhotoModel = new ProfilePhotoModel();

    $userId = $session->get('user_id');
    $username = $this->request->getPost('username');
    $first_name = $this->request->getPost('first_name');
    $last_name = $this->request->getPost('last_name');
    $email = $this->request->getPost('email');

    $current_user = $userModel->find($userId);

    if ($email !== $current_user['email']) {
      $existing_user = $userModel->where('email', $email)->where('id !=', $userId)->first();
      if ($existing_user) {
        return redirect()->to(base_url('dashboard/edit_profile'))->with('error_email', 'O email já está cadastrado. Tente outro email.');
      }
    }

    if ($username !== $current_user['username']) {
      $existing_username = $userModel->where('username', $username)->where('id !=', $userId)->first();
      if ($existing_username) {
        return redirect()->to(base_url('dashboard/edit_profile'))->with('error_username', 'O nome de usuário inserido não está disponível! Tente outro nome de usuário.');
      }
    }

    // atualiza os dados se forem diferentes dos
    $userData = [];
    if ($username !== $current_user['username']) {
      $userData['username'] = strtolower($username);
    }
    if ($first_name !== $current_user['first_name']) {
      $userData['first_name'] = ucfirst(strtolower($first_name));
    }
    if ($last_name !== $current_user['last_name']) {
      $userData['last_name'] = ucfirst(strtolower($last_name));
    }
    if ($email !== $current_user['email']) {
      $userData['email'] = $email;
    }
    if (!empty($userData)) {
      $userData['updated_at'] = date('Y-m-d H:i:s');
      $userModel->update($userId, $userData);
    }

    $profile_photo = $this->request->getFile('profile_photo');
    if ($profile_photo && $profile_photo->isValid() && !$profile_photo->hasMoved()) {
      $newName = $profile_photo->getRandomName();
      $uploadPath = ROOTPATH . 'public/uploads/profile_photos';

      try {
        $profile_photo->move($uploadPath, $newName);
      } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Erro ao mover a foto de perfil: ' . $e->getMessage());
      }

      $photoData = [
        'file_name' => $newName,
        'file_path' => 'uploads/profile_photos/' . $newName,
        'mime_type' => $profile_photo->getClientMimeType(),
        'created_at' => date('Y-m-d H:i:s')
      ];

      $existingProfilePhoto = $userModel->getProfilePhotoByUserId($userId);

      if ($existingProfilePhoto) {
        // atualiza a foto de perfil existente
        $userModel->updateUserProfilePhoto($userId, $photoData);
      } else {
        // adiciona uma nova foto de perfil
        $photoData['user_id'] = $userId;
        $userModel->setUserProfilePhoto($userId, $photoData);
      }
    } else {
      $photoData = [
        'file_name' => 'default.png',
        'file_path' => 'public/uploads/profile_photos/default.png', 
        'mime_type' => 'image/png',
        'created_at' => date('Y-m-d H:i:s')
      ];

      $existingProfilePhoto = $userModel->getProfilePhotoByUserId($userId);

      if (!$existingProfilePhoto) {
        $photoData['user_id'] = $userId;
        $userModel->setUserProfilePhoto($userId, $photoData);
      }
    }

    return redirect()->to(base_url('dashboard/profile'))->with('success', 'Perfil atualizado com sucesso!');
  }

  public function view_announce($announceId)
  {
    $preAdsModel = new PreAnnouncementModel();
    $propertyPhotosModel = new PropertyPhotosModel();
    $userModel = new UserModel();

    $announcement = $preAdsModel->find($announceId);
    $ad_photos = $propertyPhotosModel->where('pre_announcement_id', $announceId)->findAll();

    $userData = $userModel->find($announcement['user_id']);
    $userData['profile_photo'] = $userModel->getProfilePhotoByUserId($announcement['user_id']);

    $brokerData = $userModel->find($announcement['broker_id']);
    if ($brokerData) {
      $brokerData['profile_photo'] = $userModel->getProfilePhotoByUserId($announcement['broker_id']);
    }

    $data = [
      'announcement' => $announcement,
      'ad_photos' => $ad_photos,
      'user_data' => $userData,
      'broker_data' => $brokerData
    ];

    return view('dashboard/view_announce', $data);
  }
}
