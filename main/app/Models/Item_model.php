<?php

namespace App\Models;

use CodeIgniter\Model;

class Item_model extends Model
{
    public function fetch_data(string $item)
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from add_item where item_name='" . $item . "'");
        if ($result) {
            return $result->getRow();
        } else {
            return false;
        }
    }

    public function fatch_all()
    {
        $db = \Config\Database::connect();
        $result = $db->query("select * from add_item");
        if ($result) {
            return $result->getRow();
        } else {
            return false;
        }
    }

    public function update_data(string $ofn, string $foodname,string $category,string $description,string $price,string $new_name)
    {
        $db = \Config\Database::connect();
        $result = $db->query("update add_item set item_name='" . $foodname . "', category='" . $category . "', description='" . $description . "', price='" . $price . "', photo='" . $new_name . "'  where item_name='" . $ofn . "'");
        return $result;
    }

    public function delete_data(string $foodname)
    {
        $db = \Config\Database::connect();
        $result = $db->query("Delete from add_item where item_name='" . $foodname . "'");
        return $result;
    }
}
