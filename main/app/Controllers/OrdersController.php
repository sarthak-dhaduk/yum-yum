<?php

namespace App\Controllers;
use App\Models\Orders_Manage_Model;
use App\Models\Orders_Model;


class OrdersController extends BaseController
{

    public $usermodel;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->usermodel =  new Orders_Manage_Model();
    }

    public function ManageUsers()
    {
        $data['userdata'] = $this->usermodel->findAll();
        return view("orderd", $data);
    }

    public function edit_orderd_table(){

        $fullname="";$email="";$item="";$qt="";$one_item="";

        $fullname = $this->request->getVar('fullname');
        $email = $this->request->getVar('email');
        $item = $this->request->getVar('item');
        $qt = $this->request->getVar('qt');
        $one_item = $this->request->getVar('one_item');

        if ($fullname != "" && $email != "" && $item != "" && $qt != "" && $one_item != "") {
            $epm = new Orders_Model();
            $userdata = $epm->fetch_data($fullname,$email,$item,$qt,$one_item);
            $data['userdata'] = $userdata;
            return view('edit_orderd_table', $data);
        } else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }

    public function edit_admin_orderd_item()
    {
        $data = [];
        $ofn = $this->request->getPostGet('ofn');
        $oem = $this->request->getPostGet('oem');
        $oin = $this->request->getPostGet('oin');
        $oqt = $this->request->getPostGet('oqt');
        $ooip = $this->request->getPostGet('ooip');

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
            'noip' => [
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
                $catagory = $this->request->getPostGet('category');
                $quantity = $this->request->getPostGet('nqt');
                $one_item = $this->request->getPostGet('noip');
                $price =$quantity*$one_item;
                echo $price;

                $epm = new Orders_Model();
                    $result = $epm->update_data($fullname, $email, $item_name, $catagory, $quantity, $price, $one_item, $ofn, $oem, $oin, $oqt, $ooip);
                        if($result){
                            return redirect()->to("http://localhost/main/public/orderd");
                        }
                        else {
                        return redirect()->to("http://localhost/main/public/login");
                    }
            } else {
               
                $fullname="";$email="";$item="";$catagory="";$qt="";$one_item="";

                $fullname = $ofn;
                $email = $oem;
                $item = $oin;
                $qt = $oqt;
                $one_item = $ooip;
        
                if ($fullname != "" && $email != "" && $item != "" && $qt != "" && $one_item != "") {
                    $epm = new Orders_Model();
                    $userdata = $epm->fetch_data($fullname,$email,$item,$qt,$one_item);
                    $data['userdata'] = $userdata;
                    $data['err'] = $this->validator;
                    return view('edit_orderd_table', $data);
                } else {
                    return redirect()->to("http://localhost/main/public/login");
                }
            }
        }
    }

    public function delete_orderd_table()
    {

        $fullname="";$email="";$item="";$qt="";$one_item="";

        $fullname = $this->request->getVar('fullname');
        $email = $this->request->getVar('email');
        $item = $this->request->getVar('item');
        $qt = $this->request->getVar('qt');
        $one_item = $this->request->getVar('one_item');

        if ($fullname != "" && $email != "" && $item != "" && $qt != "" && $one_item != "") {
            $epm = new Orders_Model();
            $result = $epm->delete_data($fullname,$email,$item,$qt,$one_item);
                        if($result!=""){
                            $data['userdata'] = $this->usermodel->findAll();
                            return view("orderd", $data);
                        }
        } else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }
}