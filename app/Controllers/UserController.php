<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
  public function index()
  {
    $usermodel = new UserModel();
    $data = $usermodel->findAll();

    return view(
      'user_list',
      [
        'usuarios' => $data
      ]
    );
  }

  public function createAccount() 
  {
    return view('createAccount');
  }

  public function login() 
  {

  }
}
