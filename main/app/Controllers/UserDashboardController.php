<?php

namespace App\Controllers;
use App\Models\Edit_profile_model;
use App\Models\User_Manage_Model;
use App\Models\Delete;

class UserDashboardController extends BaseController
{
    // public function index()
    // {
    //     $session = \Config\Services::session();
    //     if ($session->has('uname')) {
    //         return view("User_Dashboard");
    //     } else {
    //         return redirect()->to("http://localhost/main/public/login");
    //     }
    // }


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

    public function ManageUsers_u()
    {
        $session = \Config\Services::session();
        if ($session->has('uname')) {
            $email = $session->getTempdata('uname');
            $epm = new Edit_profile_model();
            $userdata = $epm->fetch_data($email);
            $data['userdata'] = $userdata;
            return view('index3', $data);
        } else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }


    public function logout()
    {
        $session = \Config\Services::session();
        $session->remove('uname');
        $session->remove('username');
        $session->remove('roll');
        $session->destroy();
        return redirect()->to("http://localhost/main/public/index");
    }

    public function edit_profile()
    {
        $session = \Config\Services::session();
        if ($session->has('uname')) {
            $email = $session->getTempdata('uname');
            $roll = $session->getTempdata('roll');
            $epm = new Edit_profile_model();
            $userdata = $epm->fetch_data($email);
            $data['userdata'] = $userdata;
            if($roll=="Admin"){
                return view('pages_account_settings_account', $data);
            }
            else {
                return view('pages_account_settings_account_u', $data);
            }
        } else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }

    public function edit_register_table()
    {
        $email="";
        $email = $this->request->getVar('email');
        if ($email != "") {
            $epm = new Edit_profile_model();
            $userdata = $epm->fetch_data($email);
            $data['userdata'] = $userdata;
            return view('edit_register_table', $data);
        } else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }

    public function delete_register_table()
    {
        $email="";
        $email = $this->request->getVar('email');
        $session = \Config\Services::session();
        $roll = $session->getTempdata('roll');
        if ($email != "") {
            $epm = new Delete();
            $result = $epm->single_register_delete($email);
            if ($result) {
                $data['userdata'] = $this->usermodel->findAll();
                echo "<script>alert='Sucessfull';</script>";

                if($roll=="Admin"){
                    return view('tables_basic',$data);
                }
                else {
                        $session = \Config\Services::session();
                        $session->remove('uname');
                        $session->remove('username');
                        $session->remove('roll');
                        $session->destroy();
                        return redirect()->to("http://localhost/main/public/index");
                }
            
            }
            else {
                $data['userdata'] = $this->usermodel->findAll();
                echo "<script>alert='Error';</script>";
                if($roll=="Admin"){
                    return view('tables_basic',$data);
                }
                else {
                        $session = \Config\Services::session();
                        $session->remove('uname');
                        $session->remove('username');
                        $session->remove('roll');
                        $session->destroy();
                        return redirect()->to("http://localhost/main/public/index");
                }
            
            }
            
        } else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }

    public function single_user_u()
    {
        $data = [];
        $o_email = $this->request->getPostGet('o_email');
        $rules = [
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fullname is required'
                ],
            ],
            'email' => [
                'rules' => 'required|valid_email|',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Enter Valid Email address',
                    
                ],
            ],
            'pwd' => [
                'rules' => 'required|min_length[8]|max_length[16]|check_small|check_capital|check_special|check_number',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Minimum 8 characters are Required',
                    'max_length' => 'Maximum 16 characters are allowed for password',
                    'check_small' => 'Password must contain at least one lower case letter',
                    'check_capital' => 'Password must contain at least one Uppercase letter',
                    'check_special' => 'Password must contain at least one special symbol',
                    'check_number' => 'Password must contain at least one number',
                ],
            ],
            'cpwd' => [
                'rules' => 'required|matches[pwd]',
                'errors' => [
                    'required' => 'Confirm Password is required',
                    'matches' => 'Password and Confirm Password must be same',
                ],
            ],
            'pic' => [
                'rules' => 'uploaded[pic]|ext_in[pic,jpg,png,gif]',
                'errors' => [
                    'uploaded' => 'Please select a file to upload',
                    'ext_in' => 'image file with extension jpg,png and gif are allowed',
                ],
            ],
        ];
        if ($this->request->getPost()) {
            if ($this->validate($rules)) {
                $fn = $this->request->getPostGet('name');
                $email = $this->request->getPostGet('email');
                $password = $this->request->getPostGet('pwd');
                $file = $this->request->getFile('pic');
                $unique_id = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
                $new_name = $file->getRandomName();

                if ($file->isValid() && !$file->hasMoved()) {
                    
                    if ($file->move(FCPATH . 'public/assets/uploads', $new_name)) {
                    $epm = new Edit_profile_model();
                    $result = $epm->update_data($o_email, $fn, $email, $password, $new_name);
                        if($result){
                            return redirect()->to("http://localhost/main/public/tables_basic");
                        }
                    } else {
                        return redirect()->to("http://localhost/main/public/login");
                    }
                } else {
                    return redirect()->to("http://localhost/main/public/index");
                }

            } else {
                $email="";
                $email = $this->request->getVar('email');
                if ($email != "") {
                    $epm = new Edit_profile_model();
                    $userdata = $epm->fetch_data($email);
                    $data['userdata'] = $userdata;
                    $data['err'] = $this->validator;
                    return view('edit_register_table', $data);
                } else {
                    return redirect()->to("http://localhost/main/public/login");
                }
            }
        }
    }

    public function editProfile()
    {
        $data = [];
        //$data['validationError'] = null;
        $session = \Config\Services::session();
        $o_email=$session->getTempdata('uname');
        $roll=$session->getTempdata('roll');
        $rules = [
            'fn1' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fullname is required'
                ],
            ],
            'email' => [
                'rules' => 'required|valid_email|',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Enter Valid Email address',
                    
                ],
            ],
            'pwd' => [
                'rules' => 'required|min_length[8]|max_length[16]|check_small|check_capital|check_special|check_number',
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Minimum 8 characters are Required',
                    'max_length' => 'Maximum 16 characters are allowed for password',
                    'check_small' => 'Password must contain at least one lower case letter',
                    'check_capital' => 'Password must contain at least one Uppercase letter',
                    'check_special' => 'Password must contain at least one special symbol',
                    'check_number' => 'Password must contain at least one number',
                ],
            ],
            'cpwd' => [
                'rules' => 'required|matches[pwd]',
                'errors' => [
                    'required' => 'Confirm Password is required',
                    'matches' => 'Password and Confirm Password must be same',
                ],
            ],
            'pic' => [
                'rules' => 'uploaded[pic]|ext_in[pic,jpg,png,gif]',
                'errors' => [
                    'uploaded' => 'Please select a file to upload',
                    'ext_in' => 'image file with extension jpg,png and gif are allowed',
                ],
            ],
        ];
        if ($this->request->getPost()) {
            if ($this->validate($rules)) {
                $fn = $this->request->getPostGet('fn1');
                $email = $this->request->getPostGet('email');
                $password = $this->request->getPostGet('pwd');
                $file = $this->request->getFile('pic');
                $unique_id = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
                $new_name = $file->getRandomName();

                if ($file->isValid() && !$file->hasMoved()) {
                    
                    if ($file->move(FCPATH . 'public/assets/uploads', $new_name)) {
                    $epm = new Edit_profile_model();
                    $result = $epm->update_data($o_email, $fn, $email, $password, $new_name);
                        if($result){
                            if($roll=="Admin"){
                                return redirect()->to("http://localhost/main/public/index2");
                            }
                            else {
                                return redirect()->to("http://localhost/main/public/index3");
                            }
                        }
                    } else {
                        return redirect()->to("http://localhost/main/public/login");
                    }
                } else {
                    return redirect()->to("http://localhost/main/public/index");
                }

            } else {
                $session = \Config\Services::session();
                if ($session->has('uname')) {
                    $email = $session->getTempdata('uname');
                    $epm = new Edit_profile_model();
                    $userdata = $epm->fetch_data($email);
                    $data['userdata'] = $userdata;
                $data['err'] = $this->validator;
                if($roll=="Admin"){
                    return view('pages_account_settings_account', $data);
                }
                else {
                    return view('pages_account_settings_account_u', $data);
                }
                }
            }
        }
    }
    public function change_password()
    {
        $session = \Config\Services::session();
        if ($session->has('uname')) {

            return view('changePassword');
        } else {
            return redirect()->to("http://localhost/CI/DemoProject/Login");
        }
    }
    public function update_password()
    {
        //echo "hello";
        helper('form');
        helper('url');
        $data = [];
        $data['validationError'] = null;
        $session = \Config\Services::session();
        if ($session->has('uname')) {
            $rules = [
                'pwd' => [
                    'rules' => 'required|min_length[8]|max_length[16]|check_small|check_capital|check_special|check_number',
                    'errors' => [
                        'required' => 'Password is required',
                        'min_length' => 'Minimum 8 characters are Required',
                        'max_length' => 'Maximum 16 characters are allowed for password',
                        'check_small' => 'Password must contain at least one lower case letter',
                        'check_capital' => 'Password must contain at least one Uppercase letter',
                        'check_special' => 'Password must contain at least one special symbol',
                        'check_number' => 'Password must contain at least one number',
                    ],
                ],
                'repwd' => [
                    'rules' => 'required|matches[pwd]',
                    'errors' => [
                        'required' => 'Confirm Password is required',
                        'matches' => 'Password and Confirm Password must be same',
                    ],
                ],
                
            ];
            if ($this->request->getPost()) {
                if ($this->validate($rules)) {

                    $pwd = $this->request->getPostGet('pwd');
                    $oldpassword = $this->request->getPostget('pwdold');
                    $epm = new Edit_profile_model();
                    $email = $session->getTempdata('uname');
                    $userdata = $epm->check_password($email);
                    if ($userdata) {

                        if ($userdata->password == $oldpassword) {

                            $result = $epm->edit_password($email, $pwd);

                            if ($result) {
                                //echo "password updated";
                                $session->setTempdata('success', 'Password updated Successfully', 10);
                                return redirect()->to('http://localhost/CI/DemoProject/changePassword');
                            } else {
                                $session->setTempdata('error', 'Failed to update password try again later.', 10);
                                return redirect()->to("http://localhost/CI/DemoProject/changePassword");
                            }
                        } else {
                            $session->setTempdata('error', 'Incorrect old Password', 10);
                            return redirect()->to("http://localhost/CI/DemoProject/changePassword");
                        }
                    } else {
                        $session->setTempdata('error', 'Unable to find record please try again after sometime', 10);
                        return redirect()->to("http://localhost/CI/DemoProject/changePassword");
                    }
                } else {
                    $data['validationError'] = $this->validator;
                    return view('changePassword', $data);
                }
            }
        } else {
            return redirect()->to("http://localhost/CI/DemoProject/Login");
        }
    }
    public function change_profile_pic()
    {
        $session = \Config\Services::session();
        if ($session->has('uname')) {
            $email = $session->getTempData('uname');
            $data[] = "";
            $epm = new Edit_profile_model();
            $userdata = $epm->check_password($email);
            if ($userdata) {
                $data['userdata'] = $userdata;
            } else {
            }
            return view('changeProfilePicture', $data);
        } else {
            return redirect()->to("http://localhost/CI/DemoProject/Login");
        }
    }
    public function update_profilepic()
    {
        //  echo "hello";
        helper('form');
        helper('url');
        $data = [];
        $data['validationError'] = null;
        $session = \Config\Services::session();
        if ($session->has('uname')) {
            $email = $session->getTempdata('uname');
            $rules = [
                'pic' => [
                    'rules' => 'uploaded[pic]|max_size[pic,1024]|ext_in[pic,jpg,png,gif]',
                    'errors' => [
                        'uploaded' => 'Please select a file to upload',
                        'max_size' => 'Maximum file size should be 10 KB',
                        'ext_in' => 'image file with extension jpg,png and gif are allowed',
                    ],
                ],
            ];
            if ($this->request->getPost()) {
                if ($this->validate($rules)) {
                    $file = $this->request->getFile('pic');
                    // echo $file;
                    $new_name = $file->getRandomName();
                    //echo $new_name;
                    if ($file->isValid() && !$file->hasMoved()) {
                        // $path = base_url() . "/public/assets/uploads/";
                        if ($file->move(FCPATH . 'public/assets/uploads', $new_name)) {
                            // copy(WRITEPATH . 'uploads/' . $new_name, $path);
                            $epm = new Edit_profile_model();
                            if ($epm->update_profile_pic($email, $new_name)) {
                                $session->setTempdata('success', 'Profile Picture Updated Successfully', 3);
                                return redirect()->to("http://localhost/CI/DemoProject/edit_profile");
                            } else {
                                $session->setTempdata('error', 'Failed to upload Profile Picture', 3);
                                return redirect()->to("http://localhost/CI/DemoProject/edit_profile");
                            }
                        } else {
                            $session->setTempdata('error', 'Error in uploading Profile Picture', 3);
                            return redirect()->to("http://localhost/CI/DemoProject/edit_profile");
                        }
                    } else {
                        //echo $file->getErrorString() . " " . $file->getError();
                        $session->setTempdata('error', 'Invalid File. Please a file with proper format', 3);
                        return redirect()->to("http://localhost/CI/DemoProject/edit_profile");
                    }
                } else {
                    $data['validationError'] = $this->validator;
                    return view('changeProfilePicture', $data);
                }
            } else {
                return redirect()->to("http://localhost/CI/DemoProject/Login");
            }
        }
    }

    
}
