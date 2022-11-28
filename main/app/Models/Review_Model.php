<?php

namespace App\Models;

use CodeIgniter\Model;

class Review_Model extends Model
{
    public function fetch_data(string $fullname,string $email,string $item)
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from review where fullname='" . $fullname . "' and email='" . $email . "' and item_name='" . $item . "'");
        if ($result) {
            return $result->getRow();
        } else {
            return false;
        }
    }

    public function fatch_all()
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from review");
        if ($result) {
            return $result->getRow();
        } else {
            return false;
        }
    }
    // , photo='" . $new_name . "'  
    public function update_data(string $fullname,string $email,string $item_name,string $description,string $ratting,string $ofn,string $oem,string $oin)
    {
        $db = \Config\Database::connect();
        $result = $db->query("update review set  fullname='" . $fullname . "' , email='" . $email . "' , item_name='" . $item_name . "' , description='" . $description . "' , rating='" . $ratting . "' where fullname='" . $ofn . "' and email='" . $oem . "' and item_name='" . $oin . "'");
        return $result;
    }

    public function delete_data(string $fullname,string $email,string $item)
    {
        $db = \Config\Database::connect();
        $result = $db->query("Delete from review where fullname='" . $fullname . "' and email='" . $email . "' and item_name='" . $item . "'");
        return $result;
    }
}
