<?php

namespace App\Controllers;

use App\Models\UserTypeModel;
use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\ProfilePhotoModel;

class Broker extends Controller {
  public function index() {
    return view('broker/index');
    // $broker = new UserTypeModel();
    // $total_users = $broker->getTotalQuantityUsers();
  }
}