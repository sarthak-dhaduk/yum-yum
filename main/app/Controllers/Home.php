<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('index');
    }
    
    public function shop()
    {
        return view('shop');
    }

    public function news()
    {
        return view('news');
    }

    public function s_news()
    {
        return view('single-news');
    }

    public function s_product()
    {
        return view('single-product');
    }

    public function contact()
    {
        return view('contact');
    }

    public function cart()
    {
        return view('cart');
    }

    public function about()
    {
        return view('about');
    }
    
    public function InsertData()
    {
        $data = [];
        //$data['validationError'] = null;
        $session = \Config\Services::session();
        $rules = [
            'name' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fullname is required'
                ],
            ],
            'email' => [
                'rules' => 'required|valid_email|is_unique[register.email]',
                'errors' => [
                    'required' => 'Email is required',
                    'valid_email' => 'Enter Valid Email address',
                    'is_unique' => 'Email is already regsitererd',
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
                $pwd = $this->request->getPostGet('pwd');
                $file = $this->request->getFile('pic');
                $unique_id = md5(str_shuffle('abcdefghijklmnopqrstuvwxyz' . time()));
                $new_name = $file->getRandomName();
                $user="User";
                if ($file->isValid() && !$file->hasMoved()) {
                    if ($file->move(FCPATH . 'public/assets/uploads', $new_name)) {
                        
                    } else {
                        echo "<script>alert('File Upload Failed Try Again.');</script>";
                    }
                } else {
                    echo $file->getErrorString() . " " . $file->getError();
                }

                $data1 = [
                    'fullname' => $fn, 'email' => $email, 'password' => $pwd, 'profilepic' => $new_name, 'unique_id' => $unique_id, 'user' => $user
                ];
                //print_r($data1);
                $db = \Config\Database::connect();
                $builder = $db->table('register');
                if ($builder->insert($data1)) {
                    $data['ins'] = 1;
                    $from = 'sdhaduk666@rku.ac.in';
                    $to = $email;
                    $subject = 'Yum-Yum';
                    $message = "Hello " . $fn . "<br><br>Your acount has been created successfully.<br><b><i>Thank For Joining Us.</i></b>";
                    $em = \Config\Services::email();
                    $em->setFrom($from);
                    $em->setTo($to);
                    $em->setSubject($subject);
                    $em->setMessage($message);
                    if ($em->send()) {
                        $session->setTempdata('username',$fn);
                        $session->setTempdata('uname',$email);
                        $session->setTempdata('roll',$user);
                        return redirect()->to("http://localhost/main/public/index");
                    } else {
                        return redirect()->to("http://localhost/main/public/register");
                    }
                } else {
                    return redirect()->to("http://localhost/main/public/register");
                }
            } else {
                $data['err'] = $this->validator;
                return view('register',$data);
            }
        }
    }

    public function login()
    {
        // $session = \Config\Services::session();
        // if ($session->has('uname')) {
        //     return view("index");
        // } else {
        //     return redirect()->to("http://localhost/main/public/login");
        // }
        return view("login");
    }

    public function register()
    {
        // $session = \Config\Services::session();
        // if ($session->has('uname')) {
        //     return view("index");
        // } else {
        //     return redirect()->to("http://localhost/main/public/register");
        // }
        return view("register");
    }

}
