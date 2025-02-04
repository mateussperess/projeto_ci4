<?php

namespace App\Controllers;

use App\Models\PreAnnouncementModel;
use App\Models\PropertyPhotosModel;
use App\Models\UserTypeModel;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ProfilePhotoModel;
use App\Models\PropertyTypesModel;

class Broker extends Controller
{
  public function index()
  {
    $session = session();

    $preAdsModel = new PreAnnouncementModel();
    $data['recent_ads'] = $preAdsModel->getRecentPreAds();
    $data['pending_ads'] = $preAdsModel->getAllPendingAnnounces();
    $data['rejected_ads'] = $preAdsModel->getAllRejectedAnnouncesByUserId($session->get('user_id'));
    $data['reviewed_ads'] = $preAdsModel->getAllReviewedAnnounces();
    $data['approved_today_ads'] = $preAdsModel->getAnnouncesApprovedToday();
    return view('broker/index', $data);
  }

  public function pending()
  {
    $ProfilePhotoModel = new ProfilePhotoModel();
    $AnnouncementModel = new PreAnnouncementModel();
    $PropertyTypesModel = new PropertyTypesModel();
    $PropertyPhotosModel = new PropertyPhotosModel();
    $UserModel = new UserModel();  // Add this line

    $announcements = $AnnouncementModel->getAllPreAnnouncement();

    foreach ($announcements as &$announcement) {
      $announcement['photos'] = $PropertyPhotosModel
        ->where('pre_announcement_id', $announcement['id'])
        ->orderBy('is_main_photo', 'DESC')
        ->findAll();

      $user_data = $UserModel->find($announcement['user_id']); // Get user data here

      if ($user_data) {
        $user_profile_photo = $ProfilePhotoModel->getProfilePhotoByUserId($user_data['id'])
          ?? base_url('public/uploads/profile_photos/default.png');
      } else {
        $user_profile_photo = base_url('public/uploads/profile_photos/default.png');
      }

      $announcement['user_photo'] = $user_profile_photo;
      $announcement['user_data'] = $user_data;
    }

    $data = [
      'announcements' => $announcements,
      'propertyTypes' => $PropertyTypesModel->findAll()
    ];

    return view('broker/pending_list', $data);
  }

  public function review($pre_ad_id)
  {
    $preAdsModel = new PreAnnouncementModel();
    $propertyPhotosModel = new PropertyPhotosModel();
    $profilePhotoModel = new ProfilePhotoModel();
    $userModel = new UserModel();

    $announcement = $preAdsModel->find($pre_ad_id);

    $ad_photos = $propertyPhotosModel->where('pre_announcement_id', $pre_ad_id)->findAll();
    $user_data = $userModel->find($announcement['user_id']);

    $user_profile_photo = $profilePhotoModel->getProfilePhotoByUserId($user_data['id']);

    $data = [
      'announcement' => $announcement,
      'ad_photos' => $ad_photos,
      'user_data' => $user_data,
      'user_profile_photo' => $user_profile_photo,
    ];

    return view('broker/review', $data);
  }

  public function evaluated()
  {
    $ProfilePhotoModel = new ProfilePhotoModel();
    $AnnouncementModel = new PreAnnouncementModel();
    $PropertyPhotosModel = new PropertyPhotosModel();

    $announcements = $AnnouncementModel->getAllPreEvaluatedAnnouncement();

    foreach ($announcements as &$announcement) {
      // Get property photos
      $announcement['photos'] = $PropertyPhotosModel
        ->where('pre_announcement_id', $announcement['id'])
        ->orderBy('is_main_photo', 'DESC')
        ->findAll();

      $user_data = $AnnouncementModel->getUserDataByPreAnnouncementId($announcement['id']);

      if ($user_data) {
        $user_profile_photo = $ProfilePhotoModel->getProfilePhotoByUserId($user_data['id']);
        $announcement['user_photo'] = $user_profile_photo ? 'public/' . $user_profile_photo['file_path'] : 'public/uploads/profile_photos/default.png';
      } else {
        $announcement['user_photo'] = 'public/uploads/profile_photos/default.png';
      }
    }

    $data = [
      'announcements' => $announcements
    ];

    return view('broker/evaluated_list', $data);
  }

  public function reject($pre_ad_id)
  {
    $preAdsModel = new PreAnnouncementModel();
    $broker_notes = $this->request->getPost('broker_notes');
    $session = session();

    if (!empty($broker_notes) && $broker_notes == '') {
      return redirect()->to(base_url('broker/review/' . $pre_ad_id))->with('error', 'As anotações do corretor são obrigatórias.');
    }

    $announcement = $preAdsModel->find($pre_ad_id);
    $reject = $preAdsModel->rejectPreAnnouncement($announcement['id'], $broker_notes, session()->get('user_id'));

    if ($reject) {
      return redirect()->to(base_url('broker/pending'))->with('success', 'Anúncio rejeitado com sucesso!');
    } else {
      return redirect()->to(base_url('broker/pending'))->with('error', 'Erro ao rejeitar anúncio.');
    }
  }
  public function approve($pre_ad_id)
  {
    $preAdsModel = new PreAnnouncementModel();
    $broker_notes = $this->request->getPost('broker_notes');

    if (!empty($broker_notes) && $broker_notes == '') {
      return redirect()->to(base_url('broker/review/' . $pre_ad_id))->with('error', 'As anotações do corretor são obrigatórias.');
    }

    $announcement = $preAdsModel->find($pre_ad_id);
    $reject = $preAdsModel->approvePreAnnouncement($announcement['id'], $broker_notes);

    if ($reject) {
      return redirect()->to(base_url('broker/pending'))->with('success', 'Anúncio aprovado com sucesso!');
    } else {
      return redirect()->to(base_url('broker/pending'))->with('error', 'Erro ao aprovar anúncio.');
    }
  }

  public function profile()
  {
    $session = session();
    $userModel = new UserModel();

    if ($session->has('user_id')) {
      $user_id = $session->get('user_id');
      $user = $userModel->find($user_id);

      $userProfilePhoto = $userModel->getProfilePhotoByUserId($session->get('user_id'));

      $data = [
        'user_id' => $session->get('user_id'),
        'username' => $userModel->getUsernameByUserId($session->get('user_id')),
        'firstname' => $userModel->getFirstNameByUserId($session->get('user_id')),
        'lastname' => $userModel->getLastNameByUserId($session->get('user_id')),
        'is_deleted' => $user['is_deleted'],
        'created_at' => $user['created_at'],
        'profile_photo' => $userProfilePhoto
      ];

    }

    return view('broker/profile', $data);
  }

  public function update_profile()
  {
    $session = session();
    $userModel = new UserModel();

    $userId = $session->get('user_id');
    $username = $this->request->getPost('username');
    $first_name = $this->request->getPost('first_name');
    $last_name = $this->request->getPost('last_name');
    $email = $this->request->getPost('email');
    $new_password = $this->request->getPost('new_password');
    $confirm_new_password = $this->request->getPost('confirm_new_password');
    $bio = $this->request->getPost('bio');

    $currUser = $userModel->find($userId);

    if ($email !== $currUser['email']) {
      $existing_user = $userModel->where('email', $email)->where('id !=', $userId)->first();
      if ($existing_user) {
        return redirect()->to(base_url('broker/profile'))->with('error', 'O e-mail já está em uso por outro usuário.');
      }
    }

    if ($username !== $currUser['username']) {
      $existing_username = $userModel->where('username', $username)->where('id !=', $userId)->first();
      if ($existing_username) {
        return redirect()->to(base_url('broker/profile'))->with('error', 'O nome de usuário já está em uso por outro usuário.');
      }
    }

    if ($new_password !== $currUser['password']) {
      if ($new_password !== $confirm_new_password) {
        return redirect()->to(base_url('broker/profile'))->with('error', 'Senhas invalidas.');
      }
    }

    $updateData = [];
    if ($username !== $currUser['username']) {
      $updateData['username'] = strtolower($username);
    }
    if ($first_name !== $currUser['first_name']) {
      $updateData['first_name'] = ucfirst(strtolower($first_name));
    }
    if ($last_name !== $currUser['last_name']) {
      $updateData['last_name'] = ucfirst(strtolower($last_name));
    }
    if ($email !== $currUser['email']) {
      $updateData['email'] = $email;
    }
    if ($new_password == $confirm_new_password && $new_password !== $currUser['password']) {
      $updateData['password'] = password_hash($new_password, PASSWORD_DEFAULT); // password hash);
    }
    if ($bio !== $currUser['message']) {
      $updateData['message'] = $bio;
    }
    if (!empty($updateData)) {
      $updateData['updated_at'] = date('Y-m-d H:i:s');
      $userModel->update($userId, $updateData);
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
        $userModel->updateUserProfilePhoto($userId, $photoData);
      } else {
        $photoData['user_id'] = $userId;
        $userModel->setUserProfilePhoto($userId, $photoData);
      }
    }

    return redirect()->to(base_url('broker/profile'))->with('success', 'Perfil atualizado com sucesso!');
  }

  public function logout()
  {
    $session = session();
    $session->destroy();
    return redirect()->to(base_url('login'));
  }
}
