<?php

namespace App\Controllers;
use App\Models\Cart_Manage_Model;
use App\Models\Item_model;
use App\Models\Cart_model;

class CartController extends BaseController
{

    public $usermodel;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->usermodel =  new Cart_Manage_Model();
    }

    public function ManageUsers()
    {
        $data['userdata'] = $this->usermodel->findAll();
        return view("cart_t", $data);
    }

    public function cart()
    {
        $data['userdata'] = $this->usermodel->findAll();
        return view("cart", $data);
    }

    public function cart_u()
    {
        $item="";$name="";$email="";
        $item = $this->request->getVar('item');
        $name = $this->request->getVar('name');
        $email = $this->request->getVar('email');
        $quantity=1;

        if($item != "" && $name != "" && $email != ""){
            $epm = new Item_model();
            $userdata = $epm->fetch_data($item);
            $data['userdata'] = $userdata;

            $epm_c = new Cart_model();
            $result = $epm_c->fetch_data($name,$email,$item);
            if($result){
                $data['userdata'] = $this->usermodel->findAll();
                return view("cart", $data);
            }else{
                
                $data1 = [
                    'fullname' => $name, 'email' => $email, 'item_name' => $userdata->item_name, 'price' => $userdata->price, 'quantity' => $quantity, 'one_item_price' => $userdata->price, 'catagory' => $userdata->category
                ];
                $db = \Config\Database::connect();
                $builder = $db->table('cart');
                if ($builder->insert($data1)) {
                    $data['userdata'] = $this->usermodel->findAll();
                    return view("cart", $data);
                } else {
                    return redirect()->to("http://localhost/main/public/register");
                }
            }

        }else{
            
            return view("login");
        }
    }

    public function buy_from_cart()
    {
        $data = [];
        
        $item="";$name="";$email="";$one_price="";$quantity="";$price="";$catagory="";

        $name = $this->request->getVar('fullname');
        $email = $this->request->getVar('email');
        $item = $this->request->getVar('item_name');
        $one_price = $this->request->getVar('one_price');
        $quantity = $this->request->getVar('quantity');
        $price = $this->request->getVar('price');
        $catagory = $this->request->getVar('catagory');
                
                

                $data1 = [
                    'fullname' => $name, 'email' => $email, 'item_name' => $item, 'catagory' => $catagory, 'quantity' => $quantity, 'price' => $price, 'one_item_price' => $one_price
                ];
                $db = \Config\Database::connect();
                $builder = $db->table('orders');
                if ($builder->insert($data1)) {

                    $epm_c = new Cart_model();
                    $result = $epm_c->delete_data($name,$email,$item);
                    if($result){
                        $data['userdata'] = $this->usermodel->findAll();
                        return view("cart", $data);
                    }

                } else {
                    return redirect()->to("http://localhost/main/public/login");
                }
        
    }

    public function delete_from_cart()
    {
        $data = [];
        
        $item="";$name="";$email="";

        $name = $this->request->getVar('fullname');
        $email = $this->request->getVar('email');
        $item = $this->request->getVar('item_name');

        $epm_c = new Cart_model();
        $result = $epm_c->delete_data($name,$email,$item);
        if($result){
            $data['userdata'] = $this->usermodel->findAll();
            return view("cart", $data);
        }
        else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }

    public function edit_cart_table(){

        $fullname="";$email="";$item="";

        $fullname = $this->request->getVar('fullname');
        $email = $this->request->getVar('email');
        $item = $this->request->getVar('item');

        if ($fullname != "" && $email != "" && $item != "") {
            $epm = new Cart_Model();
            $userdata = $epm->fetch_data($fullname,$email,$item);
            $data['userdata'] = $userdata;
            return view('edit_cart_table', $data);
        } else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }


    public function edit_admin_cart_item()
    {
        $data = [];

        if ($this->request->getPost()) {

                $fullname = $this->request->getPostGet('fn');
                $email = $this->request->getPostGet('em');
                $item_name = $this->request->getPostGet('in');
                $catagory = $this->request->getPostGet('category');
                $quantity = $this->request->getPostGet('nqt');
                $one_item = $this->request->getPostGet('ooip');
                $price =$quantity*$one_item;
                echo $price;

                $epm = new Cart_Model();
                    $result = $epm->update_data($fullname, $email, $item_name, $quantity, $price, $one_item);
                        if($result){
                            return redirect()->to("http://localhost/main/public/cart_t");
                        }
                        else {
                        return redirect()->to("http://localhost/main/public/login");
                        }
        }
    }

    public function delete_cart_table()
    {
        $data = [];
        
        $item="";$fullname="";$email="";

        $fullname = $this->request->getVar('fullname');
        $email = $this->request->getVar('email');
        $item = $this->request->getVar('item');



        $epm = new Cart_model();
        $result = $epm->delete_data($fullname,$email,$item);
        if($result){
            return redirect()->to("http://localhost/main/public/cart_t");
        }
        else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }

}