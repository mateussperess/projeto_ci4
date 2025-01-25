<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AdminFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (!session()->get('user_id') || session()->get('role') != 1) {
      return redirect()->to(base_url('login'));
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do nothing
  }
}
