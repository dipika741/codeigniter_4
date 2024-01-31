<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ProfileController extends BaseController
{
    public function index()
    {
        $session = session();
        //echo "Hello : ".$session->get('name');
        
        $data = [];
        $data['name'] = $session->get('name');
        echo view('profile', $data);
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/signin');
    }
}
