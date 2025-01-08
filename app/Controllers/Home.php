<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }
    public function testEmail()
    {
        $email = \Config\Services::email();

        $email->setFrom('mateuspereslopesl@gmail.com', 'Peres Imóveis');
        $email->setTo('mateuspereslopesl@gmail.com');
        $email->setSubject('Email Teste');
        $email->setMessage('<h1>Email de teste do sistema Peres Imóveis</h1><p>Este é um email de teste.</p>');

        if ($email->send()) {
            echo 'Email enviado com sucesso!';
        } else {
            echo $email->printDebugger(['headers']);
        }
    }
}
