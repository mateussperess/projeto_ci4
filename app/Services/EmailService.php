<?php

namespace App\Services;

class EmailService
{
  protected $email;

  public function __construct()
  {
    $this->email = \Config\Services::email();
  }

  public function sendVerificationEmail($to, $username, $token)
  {
    $this->email->setTo($to);
    $this->email->setSubject('Verificação de Email - Peres Imóveis');

    $message = view('emails/verification', [
      'username' => $username,
      'token' => $token
    ]);

    $this->email->setMessage($message);

    return $this->email->send();
  }

  public function sendWelcomeEmail($userEmail, $username)
  {
    $this->email->setFrom('mateuspereslopesl@gmail.com', 'Peres Imóveis');
    $this->email->setTo($userEmail);
    $this->email->setSubject('Bem-vindo à Peres Imóveis!');

    $message = view('emails/welcome', [
      'username' => $username
    ]);

    $this->email->setMessage($message);

    return $this->email->send();
  }
}
