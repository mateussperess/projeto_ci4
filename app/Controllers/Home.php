<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
	public function index()
	{
		$session = session();
		$userModel = new UserModel();
		$data['admins'] = $userModel->getAdminsData();
		$data['brokers'] = $userModel->getBrokersData();

		if (!empty($session->get('user_id')) && $session->get('logged_in')) {

			if ($session->get('role') == 1) {
				return redirect()->to(base_url('admin'));
			}

			if ($session->get('role') == 2) {
				return redirect()->to(base_url('broker'));
			}

			if ($session->get('role') == 3) {
				return redirect()->to(base_url('dashboard'));
			}
		}

		return view('index', $data);
	}
}
