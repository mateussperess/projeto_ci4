<?php


namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
  public function index(): string
  {
    $userModel = new UserModel();
    $data['admins'] = $userModel->getAdminsData();
    $data['brokers'] = $userModel->getBrokersData();

    return view('Dashboard/index', $data);
  }
}