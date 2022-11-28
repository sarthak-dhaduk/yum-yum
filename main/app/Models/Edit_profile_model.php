<?php

namespace App\Models;

use CodeIgniter\Model;

class Edit_profile_model extends Model
{
    public function fetch_data(string $email)
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from register where email='" . $email . "'");
        if ($result) {
            return $result->getRow();
        } else {
            return false;
        }
    }

    public function fatch_all()
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from register");
        if ($result) {
            return $result->getRow();
        } else {
            return false;
        }
    }

    public function update_data(string $o_email, string $fn,string $email,string $password,string $new_name)
    {
        $db = \Config\Database::connect();
        $result = $db->query("update register set fullname='" . $fn . "', email='" . $email . "',password='" . $password . "', profilepic='" . $new_name . "'  where email='" . $o_email . "'");
        return $result;
    }
    public function check_password(String $email)
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from register where email='" . $email . "'");
        if ($result) {
            return $result->getRow();
        } else {
            return false;
        }
    }
    public function edit_password(string $email, string $password)
    {
        $db = \Config\Database::connect();
        $result = $db->query("update register set password='" . $password . "' where email='" . $email . "'");
        return $result;
    }
    public function update_profile_pic(string $email, string $filename)
    {
        $db = \Config\Database::connect();
        $result = $db->query("update register set profilepic='" . $filename . "' where email='" . $email . "'");
        return $result;
    }
    // public function fetch_data_password_token(string $email)
    // {
    //     $db = \Config\Database::connect();
    //     $result = $db->query("select * from password_token where email='" . $email . "'");
    //     if ($result) {
    //         return $result->getRow();
    //     } else {
    //         return false;
    //     }
    // }
}
