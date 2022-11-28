<?php

namespace App\Controllers;
use App\Models\Contact_Manage_Model;
use App\Models\Contact_Model;

class ContactController extends BaseController
{

    public $usermodel;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->usermodel =  new Contact_Manage_Model();
    }

    public function ManageUsers()
    {
        $data['userdata'] = $this->usermodel->findAll();
        return view("index2", $data);
    }


    public function contact()
    {
        
        return view("contact");
        
    }

    public function contact_us()
    {
        
        if ($this->request->getPost()) {
            
                $name = $this->request->getPostGet('name');
                $email = $this->request->getPostGet('email');
                $phone = $this->request->getPostGet('phone');
                $subject = $this->request->getPostGet('subject');
                $description = $this->request->getPostGet('description');
                

                $data1 = [
                    'fullname' => $name, 'email' => $email, 'subject' => $subject, 'description' => $description, 'phone' => $phone
                ];
                $db = \Config\Database::connect();
                $builder = $db->table('contact');
                if ($builder->insert($data1)) {
                    return view("index");
                } else {
                    return redirect()->to("http://localhost/main/public/login");
                }
            
        }
    }

    
    public function delete_contact_table()
    {

        $fullname="";$email="";$sub="";

        $fullname = $this->request->getVar('fullname');
        $email = $this->request->getVar('email');
        $sub = $this->request->getVar('sub');

        if ($fullname != "" && $email != "" && $sub != "") {
            $epm = new Contact_Model();
            $result = $epm->delete_data($fullname,$email,$sub);
                        if($result!=""){
                            $data['userdata'] = $this->usermodel->findAll();
                            return view("index2", $data);
                        }
        } else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }
}