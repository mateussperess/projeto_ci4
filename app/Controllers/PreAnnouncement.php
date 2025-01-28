<?php

namespace App\Controllers;

use App\Models\PreAnnouncementModel;
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

    $data = [
      'user_id' => $session->get('user_id'),
      'property_type_id' => $this->request->getPost('property_type_id'),
      'total_area' => $this->request->getPost('total_area'),
      'bedrooms' => $this->request->getPost('bedrooms'),
      'bathrooms' => $this->request->getPost('bathrooms'),
      'parking' => $this->request->getPost('parking'),
      'address' => $this->request->getPost('address'),
      'neighborhood' => $this->request->getPost('neighborhood'),       'city' => $this->request->getPost('city'),
      'state' => $this->request->getPost('state'),
      'number' => $this->request->getPost('number'), 
      'complement' => $this->request->getPost('complement'),
      'zip_code' => $this->request->getPost('zip_code'), 
      'price' => $this->request->getPost('price'),
      'transaction_type' => $this->request->getPost('transaction_type'),
      'description' => $this->request->getPost('description'),
      'status' => 'pending'
    ];

    $pre_announcement_id = $announceModel->insert($data);

    if ($pre_announcement_id) {
      return redirect()->to(base_url('dashboard'))->with('success', 'Anúncio enviado para aprovação!');
    }
    return redirect()->to(base_url('dashboard'))->with('error', 'Erro ao enviar anúncio.');
  }
}
