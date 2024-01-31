<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UserCrud extends BaseController
{
    // show users list
    public function index(){

        $session = session();
        //echo "Hello : ".$session->get('name');
        
        $userModel = new UserModel();
        $data = [];
        $data['users'] = $userModel->orderBy('id', 'DESC')->findAll();
        echo view('layouts/header.php');
        echo view('crud/user_view', $data);
    }
    // add user form
    public function create(){
        echo view('layouts/header.php');
        return view('crud/add_user');
    }

    // insert data
    public function store() {
        $userModel = new UserModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/users-list'));
    }
    // show single user
    public function singleUser($id = null){
        $userModel = new UserModel();
        $data['user_obj'] = $userModel->where('id', $id)->first();
       //print_r($data); die;
       echo view('layouts/header.php');
        return view('crud/edit_view', $data);
    }
    // update user data
    public function update(){
        $userModel = new UserModel();
        $id = $this->request->getVar('id');
        $data = [
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
        ];
        $userModel->update($id, $data);
        return $this->response->redirect(site_url('/users-list'));
    }

    // delete user
    public function delete($id = null){
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->delete($id);
        return $this->response->redirect(site_url('/users-list'));
    } 
}
