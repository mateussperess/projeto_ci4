<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Logout extends BaseController
{
  public function logout()
  {
    $session = session();
    $session->destroy();
  }
}
