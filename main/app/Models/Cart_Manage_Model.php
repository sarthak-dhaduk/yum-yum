<?php

namespace App\Models;

use CodeIgniter\Model;

class Cart_Manage_Model extends Model
{
    protected $table = 'cart';
    //protected $primaryKey = 'email';

    protected $returnType = 'array';

    protected $allowedFields = ['fullname', 'email', 'item_name', 'price','quantity','one_item_price','catagory	'];

}
