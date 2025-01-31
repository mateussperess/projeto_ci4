<?php

namespace App\Controllers;

use App\Models\PreAnnouncementModel;
use App\Models\PropertyPhotosModel;
use App\Models\PropertyTypesModel;

class PreAnnouncement extends BaseController
{
  public function create()
  {
    $propertyTypesModel = new PropertyTypesModel();
    $data['propertyTypes'] = $propertyTypesModel->getAllTypes();

    return view('dashboard/announce', $data);
  }

  public function store()
  {
    $session = session();
    $announceModel = new PreAnnouncementModel();
    $property_type_id = $this->request->getPost('property_type_id');
    $propertyPhotosModel = new PropertyPhotosModel();

    $price = $this->request->getPost('price');
    $price = preg_replace('/[^0-9,]/', '', $price);
    $price = str_replace(',', '.', $price);
    $price_ok = floatval($price);

    $data = [
      'user_id' => $session->get('user_id'),
      'property_type_id' => $property_type_id,
      'title' => ucfirst(strtolower($this->request->getPost('title'))),
      'total_area' => $this->request->getPost('total_area'),
      'address' => $this->request->getPost('address'),
      'neighborhood' => $this->request->getPost('neighborhood'),
      'city' => $this->request->getPost('city'),
      'state' => $this->request->getPost('state'),
      'number' => $this->request->getPost('number'),
      'zip_code' => $this->request->getPost('zip_code'),
      'price' => $price_ok,
      'transaction_type' => $this->request->getPost('transaction_type'),
      'description' => $this->request->getPost('description'),
      'status' => 'pending'
    ];

    if ($property_type_id == 3) {
      // terreno
      $data['topography'] = $this->request->getPost('topography');
      $data['soil_type'] = $this->request->getPost('soil_type');
    } else {
      // casa ou ap
      $data['bedrooms'] = $this->request->getPost('bedrooms');
      $data['bathrooms'] = $this->request->getPost('bathrooms');
      $data['parking'] = $this->request->getPost('parking');
    }

    $pre_announcement_id = $announceModel->insert($data);

    if ($pre_announcement_id) {
      $files = $this->request->getFileMultiple('photos');

      if (!empty($files)) {
        $propertyPhotosModel->addPropertyPhotos($pre_announcement_id, $files);
      }
    }

    if ($pre_announcement_id) {
      return redirect()->to(base_url('dashboard/announcements/' . session()->get('user_id')))->with('success', 'Anúncio enviado para aprovação!');
    }
    return redirect()->to(base_url('dashboard'))->with('error', 'Erro ao enviar anúncio.');
  }
  public function list()
  {
    $userId = session()->get('user_id');

    $announcesModel = new PreAnnouncementModel();
    $propertyTypesModel = new PropertyTypesModel();
    $propertyPhotosModel = new PropertyPhotosModel();

    $announcements = $announcesModel->select('pre_announcements.*, property_types.name as property_type')
      ->join('property_types', 'property_types.id = pre_announcements.property_type_id')
      ->where('user_id', $userId)
      ->findAll();

    foreach ($announcements as &$announcement) {
      $photos = $propertyPhotosModel->where('pre_announcement_id', $announcement['id'])
        ->orderBy('is_main_photo', 'DESC')
        ->findAll();

      $announcement['photos'] = $photos;
      $announcement['main_photo'] = !empty($photos) ? $photos[0]['file_name'] : 'default.jpg';
    }

    $data = [
      'announcements' => $announcements,
      'propertyTypes' => $propertyTypesModel->findAll()
    ];

    // var_dump($data);
    // exit;

    return view('dashboard/list_announces', $data);
  }
}
