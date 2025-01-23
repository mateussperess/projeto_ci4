<?php


namespace App\Controllers;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
  public function index(): string
  {
      return view('Dashboard/index');
  }
}