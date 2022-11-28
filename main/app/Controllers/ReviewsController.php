<?php

namespace App\Controllers;
use App\Models\Reviews_Manage_Model;
use App\Models\Review_Model;

class ReviewsController extends BaseController
{

    public $usermodel;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->usermodel =  new Reviews_Manage_Model();
    }

    public function ManageUsers()
    {
        $data['userdata'] = $this->usermodel->findAll();
        return view("reviews", $data);
    }


    public function give_review()
    {
        
        if ($this->request->getPost()) {
            
                $fn = $this->request->getPostGet('fn');
                $em = $this->request->getPostGet('em');
                $in = $this->request->getPostGet('in');
                $ratting = $this->request->getPostGet('ratting');
                $comment = $this->request->getPostGet('comment');
                

                $data1 = [
                    'fullname' => $fn, 'email' => $em, 'item_name' => $in, 'description' => $comment, 'rating' => $ratting
                ];
                $db = \Config\Database::connect();
                $builder = $db->table('review');
                if ($builder->insert($data1)) {
                    return view("index");
                } else {
                    return redirect()->to("http://localhost/main/public/login");
                }
            
        }
    }

    public function edit_review_table(){

        $fullname="";$email="";$item="";

        $fullname = $this->request->getVar('fullname');
        $email = $this->request->getVar('email');
        $item = $this->request->getVar('item');
        
        if ($fullname != "" && $email != "" && $item != "") {
            $epm = new Review_Model();
            $userdata = $epm->fetch_data($fullname,$email,$item);
            $data['userdata'] = $userdata;
            return view('edit_review_table', $data);
        } else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }

    public function edit_admin_review_item()
    {
        $data = [];
        $ofn = $this->request->getPostGet('ofn');
        $oem = $this->request->getPostGet('oem');
        $oin = $this->request->getPostGet('oin');
        
        $rules = [
            'nfn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fullname is required'
                ],
            ],
            'nem' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Enter Valid Email address',
                ],
            ],
            'nin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Food name is required'
                ],
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'One item price is required',
                ],
            ],
        ];
        if ($this->request->getPost()) {
            if ($this->validate($rules)) {

                $fullname = $this->request->getPostGet('nfn');
                $email = $this->request->getPostGet('nem');
                $item_name = $this->request->getPostGet('nin');
                $description = $this->request->getPostGet('description');
                $ratting = $this->request->getPostGet('ratting');

                $epm = new Review_Model();
                    $result = $epm->update_data($fullname, $email, $item_name, $description,$ratting,$ofn, $oem, $oin);
                        if($result){
                            return redirect()->to("http://localhost/main/public/reviews");
                        }
                        else {
                        return redirect()->to("http://localhost/main/public/login");
                    }
            } else {
               
                $fullname="";$email="";$item="";

                $fullname = $ofn;
                $email = $oem;
                $item = $oin;
        
                if ($fullname != "" && $email != "" && $item != "") {
                    $epm = new Review_Model();
                    $userdata = $epm->fetch_data($fullname,$email,$item);
                    $data['userdata'] = $userdata;
                    $data['err'] = $this->validator;
                    return view('edit_review_table', $data);
                } else {
                    return redirect()->to("http://localhost/main/public/login");
                }
            }
        }
    }

    public function delete_review_table()
    {

        $fullname="";$email="";$item="";

        $fullname = $this->request->getVar('fullname');
        $email = $this->request->getVar('email');
        $item = $this->request->getVar('item');

        if ($fullname != "" && $email != "" && $item != "") {
            $epm = new Review_Model();
            $result = $epm->delete_data($fullname,$email,$item);
                        if($result!=""){
                            $data['userdata'] = $this->usermodel->findAll();
                            return view("reviews", $data);
                        }
        } else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }
}