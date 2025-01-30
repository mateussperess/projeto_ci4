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
    $profile_photo = new ProfilePhotoModel();
    $announcesModel = new PreAnnouncementModel();
    $propertyTypesModel = new PropertyTypesModel();
    $propertyPhotosModel = new PropertyPhotosModel();

    $announcements = $announcesModel->getAllPreAnnouncement();

    foreach ($announcements as &$announcement) {
      $announcement['photos'] = $propertyPhotosModel
        ->where('pre_announcement_id', $announcement['id'])
        ->orderBy('is_main_photo', 'DESC')
        ->findAll();

      $user_data = $announcesModel->getUserDataByPreAnnouncementId($announcement['id']);
      // $announcement['user_data'] = $user_data; 

      if ($user_data) {
        $user_profile_photo = $profile_photo->getProfilePhotoByUserId($user_data['id'])
          ?? base_url('public/uploads/profile_photos/default.png');
      } else {
        $user_profile_photo = base_url('public/uploads/profile_photos/default.png');
      }

      $announcement['user_photo'] = $user_profile_photo;
    }

    $data = [
      'announcements' => $announcements,
      'user_data' => $user_data,
      'propertyTypes' => $propertyTypesModel->findAll()
    ];

    // var_dump($data);
    // exit;

    return view('broker/pending_list', $data);
  }
}
