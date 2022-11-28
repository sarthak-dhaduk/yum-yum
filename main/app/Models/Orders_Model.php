<?php

namespace App\Models;

use CodeIgniter\Model;

class Orders_Model extends Model
{
    public function fetch_data(string $fullname,string $email,string $item,string $qt,string $one_price)
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from orders where fullname='" . $fullname . "' and email='" . $email . "' and item_name='" . $item . "' and quantity='" . $qt . "' and one_item_price='" . $one_price . "'");
        if ($result) {
            return $result->getRow();
        } else {
            return false;
        }
    }

    public function fatch_all()
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from orders");
        if ($result) {
            return $result->getRow();
        } else {
            return false;
        }
    }
    // , photo='" . $new_name . "'  
    public function update_data(string $fullname,string $email,string $item_name,string $catagory,string $quantity,string $price,string $one_item,string $ofn,string $oem,string $oin,string $oqt,string $ooip)
    {
        $db = \Config\Database::connect();
        $result = $db->query("update orders set  fullname='" . $fullname . "' , email='" . $email . "' , item_name='" . $item_name . "' , catagory='" . $catagory . "' , quantity='" . $quantity . "' , price='" . $price . "' , one_item_price='" . $one_item . "' where fullname='" . $ofn . "' and email='" . $oem . "' and item_name='" . $oin . "' and quantity='" . $oqt . "' and one_item_price='" . $ooip . "'");
        return $result;
    }

    public function delete_data(string $fullname,string $email,string $item,string $qt,string $one_price)
    {
        $db = \Config\Database::connect();
        $result = $db->query("Delete from orders where fullname='" . $fullname . "' and email='" . $email . "' and item_name='" . $item . "' and quantity='" . $qt . "' and one_item_price='" . $one_price . "'");
        return $result;
    }
}
