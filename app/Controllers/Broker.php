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
    return view('broker/index');
  }

  public function pending()
  {

    $profile_photo = new ProfilePhotoModel();
    $announcesModel = new PreAnnouncementModel();
    $propertyTypesModel = new PropertyTypesModel();
    $propertyPhotosModel = new PropertyPhotosModel();

    $announcements = $announcesModel->getAllPreAnnouncement();

    // Get photos for each announcement
    foreach ($announcements as &$announcement) {
      $announcement['photos'] = $propertyPhotosModel
        ->where('pre_announcement_id', $announcement['id'])
        ->orderBy('is_main_photo', 'DESC')
        ->findAll();

      $user_data = $announcesModel->getUserDataByPreAnnouncementId($announcement['id']);
      $user_profile_photo = $profile_photo->getProfilePhotoByUserId($user_data['id']);
    }

    $data = [
      'announcements' => $announcements,
      'propertyTypes' => $propertyTypesModel->findAll(),
      'user_data' => $user_data,
      'user_profile_photo' => $user_profile_photo
    ];

    return view('broker/pending_list', $data);
  }
}
