<?php

namespace App\Models;

use CodeIgniter\Model;

class Cart_model extends Model
{
    public function fetch_data(string $fullname,string $email,string $item)
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from cart where fullname='" . $fullname . "' and email='" . $email . "' and item_name='" . $item . "'");
        $count=$result->getNumRows();
        if($count >=1)
        {
            return $result->getRow();
        }
        else{
            return false;
        }
    }

    public function fetch_data_o(string $fullname,string $email)
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from cart where fullname='" . $fullname . "' and email='" . $email . "'");
        if($result)
        {
            return $result->getRow();
        }
        else{
            return false;
        }
    }

    public function fatch_all()
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from cart");
        if ($result) {
            return $result->getRow();
        } else {
            return false;
        }
    }
    // , photo='" . $new_name . "'  
    public function update_data(string $fullname,string $email,string $item_name,string $quantity,string $price,string $one_item)
    {
        $db = \Config\Database::connect();
        $result = $db->query("update cart set  quantity='" . $quantity . "' , price='" . $price . "' where fullname='" . $fullname . "' and email='" . $email . "' and item_name='" . $item_name . "'");
        return $result;
    }

    public function delete_data(string $fullname,string $email,string $item)
    {
        $db = \Config\Database::connect();
        $result = $db->query("Delete from cart where fullname='" . $fullname . "' and email='" . $email . "' and item_name='" . $item . "'");
        return $result;
    }
}
