<?php

namespace App\Models;

use CodeIgniter\Model;

class Orders_Manage_Model extends Model
{
    protected $table = 'orders';
    //protected $primaryKey = 'email';

    protected $returnType = 'array';

    protected $allowedFields = ['fullname', 'email', 'item_name', 'catagory', 'quantity', 'price', 'one_item_price'];

}
