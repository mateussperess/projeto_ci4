<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ProfilePhotoModel;
use App\Services\EmailService;

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
      return redirect()->to(base_url('public/register'))->with('warning_username', 'Este nome de usuário já está em uso!');
    }

    if ($userModel->checkEmailExistence($email)) {
      return redirect()->to(base_url('public/register'))->with('warning_email', 'Este email não está disponível!');
    }

    if ($password !== $confirm_password) {
      return redirect()->to(base_url('public/register'))->with('warning_passwords', 'As senhas devem ser iguais!');
    }

    // Dados para a tabela 'users'
    $userData = [
      'username'    => strtolower($username),
      'first_name'  => ucfirst(strtolower($first_name)),
      'last_name'   => ucfirst(strtolower($last_name)),
      'email'       => $email,
      'password'    => password_hash($password, PASSWORD_DEFAULT), // Hash da senha
      'created_at'  => date('Y-m-d H:i:s'),
      'updated_at'  => date('Y-m-d H:i:s'),
      'is_deleted'  => 0,
      'message'     => null,
    ];

    $userId = $userModel->insert($userData);

    if ($userId) {
      // verificar se o arquivo de foto foi enviado
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

        $photoModel = new ProfilePhotoModel();
        $photoModel->addPhoto($photoData);
      }
    } else {
      return redirect()->back()->withInput()->with('error', 'Erro ao registrar usuário.');
    }
    
    $emailService = new EmailService();
    $emailService->sendWelcomeEmail($userData['email'], $userData['username']);
    return redirect()->to(base_url('public/login'))->with('success', 'Conta criada com sucesso!');
  }

  public function login()
  {
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $profile_photo_model = new ProfilePhotoModel();
    $UserModel = new UserModel();
    $user = $UserModel->where('email', $email)->first();

    if ($user && password_verify($password, $user['password'])) {

      // Iniciar a sessão
      $session = session();
      $session->set('user_id', $user['id']);
      $session->set('username', $user['username']);
      $session->set('email', $user['email']);
      $session->set('logged_in', TRUE);

      $profile_photo = $profile_photo_model->getProfilePhotoByUserId($session->get('user_id'));
      $session->set('profile_photo', $profile_photo);

      return redirect()->to(base_url('public/'))->with('success_login', 'Bem-vindo(a) de volta!');
    } else {
      return redirect()->to(base_url('public/login'))->with('error', 'Email ou senha incorretos! Tente novamente.');
    }
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to(base_url('public/login'));
  }

  public function profile()
  {
    $session = session();
    $profile_photo_model = new ProfilePhotoModel();
    $user = new UserModel();

    if ($session->has('user_id')) {
      $profile_photo = $profile_photo_model->getProfilePhotoByUserId($session->get('user_id'));

      // $session->set('user_id', $user['id']);
      $session->set('username', $user->getUsernameByUserId($session->get('user_id')));
      $session->set('email', $user->getEmailByUserId($session->get('user_id')));
      $session->set('profile_photo', $profile_photo);

      $data = [
        'user_id' => $session->get('user_id'),
        'username' => $user->getUsernameByUserId($session->get('user_id')),
        'firstname' => $user->getFirstNameByUserId($session->get('user_id')),
        'lastname' => $user->getLastNameByUserId($session->get('user_id')),
        'profile_photo' => $profile_photo
      ];
      return view('profile', $data);
    } else {
      return redirect()->to(base_url('public/login'))->with('error', 'Email ou senha incorretos! Tente novamente.');
    }
  }

  public function edit_profile()
  {
    $session = session();
    $profile_photo_model = new ProfilePhotoModel();
    $user_model = new UserModel();

    if ($session->has('user_id')) {
      $profile_photo = $profile_photo_model->getProfilePhotoByUserId($session->get('user_id'));
      $user = $user_model->find($session->get('user_id'));
      $data = [
        'user_id' => $session->get('user_id'),
        'username' => $user['username'],
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name'],
        'email' => $user['email'],
        'profile_photo' => $profile_photo
      ];
      return view('edit_profile', $data);
    } else {
      // return redirect()->to(base_url('public/login?code=401'));
      return redirect()->to(base_url('public/login'))->with('error', 'Email ou senha incorretos! Tente novamente.');
    }
  }

  public function update_profile()
  {
    $session = session();
    $userModel = new UserModel();
    $profilePhotoModel = new ProfilePhotoModel();

    $userId = $session->get('user_id');
    $username = $this->request->getPost('username');
    $first_name = $this->request->getPost('first_name');
    $last_name = $this->request->getPost('last_name');
    $email = $this->request->getPost('email');

    // Obter os dados atuais do usuário
    $current_user = $userModel->find($userId);

    // Verificar se o email já está cadastrado e é diferente do atual
    if ($email !== $current_user['email']) {
      $existing_user = $userModel->where('email', $email)->where('id !=', $userId)->first();
      if ($existing_user) {
        // return redirect()->back()->with('error_email', 'O email já está cadastrado. Tente outro email.');
        return redirect()->to(base_url('public/edit_profile'))->with('error_email', 'O email já está cadastrado. Tente outro email.');
      }
    }

    // Verificar se o nome de usuário já está cadastrado e é diferente do atual
    if ($username !== $current_user['username']) {
      $existing_username = $userModel->where('username', $username)->where('id !=', $userId)->first();
      if ($existing_username) {
        // return redirect()->back()->with('error_username', 'O nome de usuário inserido não está disponível! Tente outro nome de usuário.');
        return redirect()->to(base_url('public/edit_profile'))->with('error_username', 'O nome de usuário inserido não está disponível! Tente outro nome de usuário.');
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

      // Verificar se o usuário já tem uma foto de perfil
      $existing_photo = $profilePhotoModel->where('user_id', $userId)->first();
      if ($existing_photo) {
        // Atualizar a foto de perfil existente
        $profilePhotoModel->update($existing_photo['id'], $photoData);
      } else {
        // Adicionar uma nova foto de perfil
        $photoData['user_id'] = $userId;
        $profilePhotoModel->insert($photoData);
      }
    }

    return redirect()->to(base_url('public/profile'))->with('success', 'Perfil atualizado com sucesso!');
  }
}
