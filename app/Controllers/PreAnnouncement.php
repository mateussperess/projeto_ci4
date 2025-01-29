<?php

namespace App\Controllers;

use App\Models\PreAnnouncementModel;
use App\Models\PropertyPhotosModel;
use App\Models\PropertyTypesModel;
use Faker\Core\Number;

use function PHPSTORM_META\type;

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


    $price = $this->request->getPost('price'); 
    $price = preg_replace('/[^0-9,]/', '', $price); 
    $price = str_replace(',', '.', $price);
    $price_ok = floatval($price);

    $data = [
      'user_id' => $session->get('user_id'),
      'property_type_id' => $this->request->getPost('property_type_id'),
      'title' => ucfirst(strtolower($this->request->getPost('title'))),
      'total_area' => $this->request->getPost('total_area'),
      'bedrooms' => $this->request->getPost('bedrooms'),
      'bathrooms' => $this->request->getPost('bathrooms'),
      'parking' => $this->request->getPost('parking'),
      'address' => $this->request->getPost('address'),
      'neighborhood' => $this->request->getPost('neighborhood'),
      'city' => $this->request->getPost('city'),
      'state' => $this->request->getPost('state'),
      'number' => $this->request->getPost('number'),
      'complement' => $this->request->getPost('complement'),
      'zip_code' => $this->request->getPost('zip_code'),
      'price' => $price_ok,
      'transaction_type' => $this->request->getPost('transaction_type'),
      'description' => $this->request->getPost('description'),
      'status' => 'pending'
    ];

    $pre_announcement_id = $announceModel->insert($data);

    $propertyPhotosModel = new PropertyPhotosModel();
    $files = $this->request->getFileMultiple('photos');

    if (!empty($files)) {
      $propertyPhotosModel->addPropertyPhotos($pre_announcement_id, $files);
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

    $announcements = $announcesModel->where('user_id', $userId)->findAll();

    // Get photos for each announcement
    foreach ($announcements as &$announcement) {
      $announcement['photos'] = $propertyPhotosModel
        ->where('pre_announcement_id', $announcement['id'])
        ->orderBy('is_main_photo', 'DESC')
        ->findAll();
    }

    $data = [
      'announcements' => $announcements,
      'propertyTypes' => $propertyTypesModel->findAll()
    ];

    return view('dashboard/list_announces', $data);
  }
}
