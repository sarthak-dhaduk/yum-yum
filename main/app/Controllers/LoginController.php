<?php

namespace App\Controllers;

use App\Models\Login_Model;

class LoginController extends BaseController
{
    public function verify_user()
    {
        if ($this->request->getPost()) {
            $data = [];
            $session = \Config\Services::session();
            $rules = [
                'email' => [
                    'rules' => 'required|valid_email',
                    'errors' => [
                        'required' => 'Email Id cannot be empty',
                        'valid_email' => 'Invalid email address',
                    ],
                ],
                'pwd' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password cannot be empty',
                    ],
                ],
            ];

            if ($this->validate($rules)) {
                $email = $this->request->getPostGet('email');
                $pass = $this->request->getPostGet('pwd');
                $lm = new Login_Model();
                $userdata = $lm->verify_email($email);
                if ($userdata) {
                    if ($pass == $userdata->password) {
                            $session->setTempdata('username', $userdata->fullname);
                            $session->setTempdata('uname', $userdata->email);
                            $session->setTempdata('roll', $userdata->user);
                            return redirect()->to("http://localhost/main/public/index");
                    } else {
                        return redirect()->to("http://localhost/main/public/login");
                    }
                } else {
                    return redirect()->to("http://localhost/main/public/login");
                }
            } else {
                $data['err'] = $this->validator;
                return view('login', $data);
            }
        }
    }
}
