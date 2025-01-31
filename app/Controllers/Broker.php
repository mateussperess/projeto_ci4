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
    $preAdsModel = new PreAnnouncementModel();
    $data['recent_ads'] = $preAdsModel->getRecentPreAds();
    return view('broker/index', $data);
  }

  public function pending()
  {
    $ProfilePhotoModel = new ProfilePhotoModel();
    $AnnouncementModel = new PreAnnouncementModel();
    $PropertyTypesModel = new PropertyTypesModel();
    $PropertyPhotosModel = new PropertyPhotosModel();

    $announcements = $AnnouncementModel->getAllPreAnnouncement();

    foreach ($announcements as &$announcement) {
      $announcement['photos'] = $PropertyPhotosModel
        ->where('pre_announcement_id', $announcement['id'])
        ->orderBy('is_main_photo', 'DESC')
        ->findAll();

      $user_data = $AnnouncementModel->getUserDataByPreAnnouncementId($announcement['id']);

      if ($user_data) {
        $user_profile_photo = $ProfilePhotoModel->getProfilePhotoByUserId($user_data['id'])
          ?? base_url('public/uploads/profile_photos/default.png');
      } else {
        $user_profile_photo = base_url('public/uploads/profile_photos/default.png');
      }

      $announcement['user_photo'] = $user_profile_photo;
    }

    $data = [
      'announcements' => $announcements,
      'user_data' => $user_data,
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

      // Get user data and profile photo
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

    if (!empty($broker_notes) && $broker_notes == '') {
      return redirect()->to(base_url('broker/review/' . $pre_ad_id))->with('error', 'As anotações do corretor são obrigatórias.');
    }

    $announcement = $preAdsModel->find($pre_ad_id);
    $reject = $preAdsModel->rejectPreAnnouncement($announcement['id'], $broker_notes);

    if ($reject) {
      return redirect()->to(base_url('broker/pending'))->with('success', 'Anúncio rejeitado com sucesso!');
    } else {
      return redirect()->to(base_url('broker/pending'))->with('error', 'Erro ao rejeitar anúncio.');
    }
  }
}
