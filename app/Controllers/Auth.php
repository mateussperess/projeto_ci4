<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller
{
  public function login()
  {
    return view('login');
  }

  public function loginAction()
  {
    // Aqui você pode processar os dados do formulário (username, password)
    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // Verificação de autenticação (simples para exemplo)
    if ($username == 'admin' && $password == 'admin') {
      return redirect()->to('/dashboard');
    } else {
      return redirect()->back()->with('error', 'Usuário ou senha inválidos.');
    }
  }
}
