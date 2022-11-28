<?php

namespace App\Controllers;
use App\Models\Item_Manage_Model;
use App\Models\Reviews_Manage_Model;
use App\Models\Item_model;

class ItemController extends BaseController
{

    public $usermodel;
    public $riview;
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->usermodel =  new Item_Manage_Model();
        $this->review =  new Reviews_Manage_Model();
        
    }

    public function ManageUsers_Web()
    {
        $data['userdata'] = $this->usermodel->findAll();
        return view("shop", $data);
    }

    public function Single_Item_Web()
    {
        $item="";
        $item = $this->request->getVar('item');
        
        if($item != ""){
            $epm = new Item_model();
            $userdata = $epm->fetch_data($item);
            $data['userdata'] = $userdata;
            $data['userdata_sp'] = $this->usermodel->findAll();
            $data['review'] = $this->review->findAll();
            return view("single-product", $data);
        }else{
            $data['userdata'] = $this->usermodel->findAll();
            return view("shop", $data);
        }
        
    }


    public function ManageUsers()
    {
        $data['userdata'] = $this->usermodel->findAll();
        return view("added_item", $data);
    }

    public function add_item()
    {
        $data = [];
        $session = \Config\Services::session();
        $rules = [
            'fn' => [
                'rules' => 'required|is_unique[add_item.item_name]',
                'errors' => [
                    'required' => 'Food name is required',
                    'is_unique' => 'Food name is already regsitererd',
                ],
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'description is required',
                ],
            ],
            'price' => [
                'rules' => 'required|max_length[5]',
                'errors' => [
                    'required' => 'Price is required',
                    'max_length' => 'Maximum 5 characters are allowed for price',
                ],
            ],
            'pic' => [
                'rules' => 'uploaded[pic]',
                'errors' => [
                    'uploaded' => 'Please select a file to upload',
                    
                ],
            ],
        ];
        if ($this->request->getPost()) {
            if ($this->validate($rules)) {
                $foodname = $this->request->getPostGet('fn');
                $category = $this->request->getPostGet('category');
                $description = $this->request->getPostGet('description');
                $price = $this->request->getPostGet('price');
                $file = $this->request->getFile('pic');
                $new_name = $file->getRandomName();
                if ($file->isValid() && !$file->hasMoved()) {
                    if ($file->move(FCPATH . 'public/assets/uploads', $new_name)) {
                        
                    } else {
                        echo "<script>alert('File Upload Failed Try Again.');</script>";
                    }
                } else {
                    echo $file->getErrorString() . " " . $file->getError();
                }

                $data1 = [
                    'item_name' => $foodname, 'category' => $category, 'description' => $description, 'price' => $price, 'photo' => $new_name
                ];
                $db = \Config\Database::connect();
                $builder = $db->table('add_item');
                if ($builder->insert($data1)) {
                    $data['userdata'] = $this->usermodel->findAll();
                    return view("added_item", $data);
                } else {
                    return redirect()->to("http://localhost/main/public/admin_add_item");
                }
            } else {
                $data['err'] = $this->validator;
                return view('admin_add_item',$data);
            }
        }
    }

    public function edit_added_item_table()
    {
        $item="";
        $item = $this->request->getVar('item');
        if ($item != "") {
            $epm = new Item_model();
            $userdata = $epm->fetch_data($item);
            $data['userdata'] = $userdata;
            return view('edit_added_item_table', $data);
        } else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }

    public function edit_admin_added_item()
    {
        $data = [];
        $ofn = $this->request->getPostGet('ofn');
        $rules = [
            'fn' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Food name is required',
                ],
            ],
            'description' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'description is required',
                ],
            ],
            'price' => [
                'rules' => 'required|max_length[5]',
                'errors' => [
                    'required' => 'Price is required',
                    'max_length' => 'Maximum 5 characters are allowed for price',
                ],
            ],
            'pic' => [
                'rules' => 'uploaded[pic]',
                'errors' => [
                    'uploaded' => 'Please select a file to upload',
                ],
            ],
        ];
        if ($this->request->getPost()) {
            if ($this->validate($rules)) {
                $foodname = $this->request->getPostGet('fn');
                $category = $this->request->getPostGet('category');
                $description = $this->request->getPostGet('description');
                $price = $this->request->getPostGet('price');
                $file = $this->request->getFile('pic');
                $new_name = $file->getRandomName();

                if ($file->isValid() && !$file->hasMoved()) {
                    
                    if ($file->move(FCPATH . 'public/assets/uploads', $new_name)) {
                    $epm = new Item_model();
                    $result = $epm->update_data($ofn, $foodname, $category, $description, $price, $new_name);
                        if($result){
                            return redirect()->to("http://localhost/main/public/added_item");
                        }
                    } else {
                        return redirect()->to("http://localhost/main/public/login");
                    }
                } else {
                    return redirect()->to("http://localhost/main/public/index");
                }

            } else {
               
                $item="";
                $item = $this->request->getPostGet('ofn');
                if ($item != "") {
                    $epm = new Item_model();
                    $userdata = $epm->fetch_data($item);
                    $data['userdata'] = $userdata;
                    $data['err'] = $this->validator;
                    return view('edit_added_item_table', $data);
                } else {
                    return redirect()->to("http://localhost/main/public/login");
                }
            }
        }
    }

    public function delete_added_item_table()
    {
        $foodname="";
        $foodname = $this->request->getVar('item');
        if ($foodname != "") {
            $epm = new Item_model();
            $result = $epm->delete_data($foodname);
                        if($result!=""){
                            $data['userdata'] = $this->usermodel->findAll();
                            return view("added_item", $data);
                        }
        } else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }


    public function buy_from_item()
    {
        $data = [];
        if ($this->request->getPost()) {
                $fullname = $this->request->getPostGet('fn');
                $email = $this->request->getPostGet('em');
                $item_name = $this->request->getPostGet('in');
                $catagory = $this->request->getPostGet('ca');
                $quantity = $this->request->getPostGet('qt');
                $one_item_price = $this->request->getPostGet('oip');
                $price = $one_item_price*$quantity;
                

                $data1 = [
                    'fullname' => $fullname, 'email' => $email, 'item_name' => $item_name, 'catagory' => $catagory, 'quantity' => $quantity, 'price' => $price, 'one_item_price' => $one_item_price
                ];
                $db = \Config\Database::connect();
                $builder = $db->table('orders');
                if ($builder->insert($data1)) {
                    $data['userdata'] = $this->usermodel->findAll();
                    return view("shop", $data);
                } else {
                    return redirect()->to("http://localhost/main/public/login");
                }
            
        }
    }
    

}