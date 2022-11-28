<?php

namespace App\Models;

use CodeIgniter\Model;

class Item_Manage_Model extends Model
{
    protected $table = 'add_item';
    //protected $primaryKey = 'email';

    protected $returnType = 'array';

    protected $allowedFields = ['item_name', 'category', 'description', 'price','photo'];

}
