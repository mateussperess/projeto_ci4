<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        
        if (!empty($session->get('user_id')) && $session->get('logged_in')) {
            return redirect()->to(base_url('dashboard'));
        }

        return view('index');
    }
}
