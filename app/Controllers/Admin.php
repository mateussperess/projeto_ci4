<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserTypeModel;

class Admin extends Controller 
{
  public function index() {
    $admin = new UserTypeModel();
    $total_users = $admin->getTotalQuantityUsers();
    
    $data = [
      'total_users' => $total_users
    ];
    
    return view('admin/index', $data);
  }
}