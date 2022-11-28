<?php


namespace App\Models;

use CodeIgniter\Model;

class Activate_Model extends Model
{
    public function verify_id(string $id)
    {
        $db = \Config\Database::connect();
        $result = $db->query("select creation_dt,status,unique_id from register where `unique_id`='" . $id . "'");
        $count = $result->getNumRows();
        if ($count == 1) {
            return $result->getRow();
        } else {
            return false;
        }
    }
    public function verify_id_password_token(string $id)
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from register where `unique_id`='" . $id . "'");
        $count = $result->getNumRows();
        if ($count == 1) {
            return $result->getRow();
        } else {
            return false;
        }
    }
}
