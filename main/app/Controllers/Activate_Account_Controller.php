<?php

namespace App\Controllers;

use App\Models\Activate_Model;
use App\Models\Edit_profile_model;

class Activate_Account_Controller extends BaseController
{
    public function forget_Password()
    {
        return view('forget_password_view');
    }
    public function forget_Password_action()
    {
        $session = \Config\Services::session();
        if ($this->request->getPostGet()) {
            $email = $this->request->getPostGet('email');
            $epm = new Edit_profile_model();
            $userdata = $epm->fetch_data($email);
            if ($userdata) {
                        $from = 'sdhaduk666@rku.ac.in';
                        $to = $email;
                        $subject = 'Change Password';
                        $message = "Hello, " . $userdata->fullname . "<br><br><u><i>Reset your password</u></i> : <a href='" . base_url() . "/foregtpwdpage?id=" . $userdata->unique_id . "'>RESET PASSWORD</a>" . "<br/><br/>" . "<i><b>Thanks.</i></b>";
                        $em = \Config\Services::email();
                        $em->setFrom($from);
                        $em->setTo($to);
                        $em->setSubject($subject);
                        $em->setMessage($message);
                        if ($em->send()) {
                            echo "<b> Check Your Mail <b> <br><br> <a href='" . base_url() . "/index'>BACK TO WEBSITE</a>";
                        } else {
                            return redirect()->to("http://localhost/main/public/forget_password_view");
                        }
            } else {
                return redirect()->to('http://localhost/main/public/forget_password_view');
            }
        }
    }

    public function newPasswordForm()
    {
        return view('newPasswordForm');
    }

    public function forget_Password_update()
    {
        $data = [];
        $id = $this->request->getVar('id');
        if (!empty($id)) {
            $a_acc = new Activate_Model();
            $userdata = $a_acc->verify_id_password_token($id);
            if ($userdata) {
                    $session = \Config\Services::session();
                    $session->setTempdata('pwdemail', $userdata->email);
                    return redirect()->to('http://localhost/main/public/newPasswordForm');
            } else {
                $data['err'] = "Sorry, We are unable to find your account";
            }
        } else {
            $data['err'] = "Sorry Unable to process your request";
        }
        return view("forget_password_view", $data);
    }
    public function updatenewPassword()
    {
        $session = \Config\Services::session();
        $session->getTempdata('pwdemail');
        $data = [];
        $session = \Config\Services::session();
        if ($session->has('pwdemail')) {
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
                'cpwd' => [
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
                    $epm = new Edit_profile_model();
                    $email = $session->getTempdata('pwdemail');
                    $result = $epm->edit_password($email, $pwd);

                    if ($result) {
                        return redirect()->to('http://localhost/main/public/login');
                    } else {
                        return redirect()->to("http://localhost/main/public/newPasswordForm");
                    }
                } else {
                    $data['err'] = $this->validator;
                    return view('newPasswordForm', $data);
                }
            }
        } else {
            return redirect()->to("http://localhost/main/public/login");
        }
    }
}
