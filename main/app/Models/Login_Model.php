<?php

namespace App\Models;

use CodeIgniter\Model;

class Login_Model extends Model{
    public function verify_email(string $email)
    {
        $db=\Config\Database::connect();
        $result=$db->query("select * from register where email='".$email."'");
        $count=$result->getNumRows();
        if($count==1)
        {
            return $result->getRow();
        }
        else{
            return false;
        }
    }
}