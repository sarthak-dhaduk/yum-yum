<?php

namespace App\Controllers;
//use App\Controllers\BaseController;
use App\Models\User_Manage_Model;

class UserController extends BaseController
{

    public $usermodel;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->usermodel =  new User_Manage_Model();
    }

    public function ManageUsers()
    {
        $data['userdata'] = $this->usermodel->findAll();
        return view("tables_basic", $data);
    }

    
    public function addUserform()
    {
        return view('AddUser_adminView');
    }
    public function addUser()
    {
        if ($this->request->getPost()) {
            $session = \Config\Services::session();
            $fullname = $this->request->getPostGet('fullname');
            $email = $this->request->getPostGet('email');
            $password = $this->request->getPostGet('password');
            $mobile = $this->request->getPostGet('mobile');
            $unique_id = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
            helper('url');
            $data = [
                'fullname' => $fullname, 'email' => $email, 'password' => $password, 'mobile' => $mobile, 'unique_id' => $unique_id
            ];
            if ($this->usermodel->insert($data)) {
                return redirect()->to("http://localhost/CI/DemoProject/ManageUsers");
            }
        }
        return view('AddUser_adminView', ['errors' => $this->usermodel->errors()]);
    }
    public function EditUserForm()
    {
        $email = $this->request->getVar('email');
        //echo $email;
        $data['udata'] = $this->usermodel->find($email);
        //print_r($data['udata']);
        return view('Edit_user_view', $data);
    }
    public function viewUser()
    {
        return view('Manage_users');
    }
    public function EditUser()
    {
        if ($this->request->getPost()) {
            $fullname = $this->request->getPostGet('fullname');
            $email = $this->request->getPostGet('email');
            echo $email;
            $password = $this->request->getPostGet('password');
            $mobile = $this->request->getPostGet('mobile');
            $unique_id = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
            helper('url');
            $data = [
                'fullname' => $fullname, 'password' => $password, 'mobile' => $mobile, 'unique_id' => $unique_id
            ];
            if ($this->usermodel->update($email, $data)) {

                return redirect()->to("http://localhost/CI/DemoProject/ManageUsers");
            }
        }
        return view('AddUser_adminView', ['errors' => $this->usermodel->errors()]);
    }
    public function AdminDeleteUser()
    {
        $email = $this->request->getVar('email');
        $data = ['status' => 'Deleted'];
        if ($this->usermodel->update($email, $data)) {
            return redirect()->to("http://localhost/CI/DemoProject/ManageUsers");
        }
    }
}
