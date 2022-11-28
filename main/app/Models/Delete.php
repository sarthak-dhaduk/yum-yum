<?php

namespace App\Models;

use CodeIgniter\Model;

class Delete extends Model
{
    public function single_register_delete(String $email)
    {
        $db = \Config\Database::connect();
        $result = $db->query("DELETE FROM register WHERE email='" . $email . "'");
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
}
