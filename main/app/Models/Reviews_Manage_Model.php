<?php

namespace App\Models;

use CodeIgniter\Model;

class Reviews_Manage_Model extends Model
{
    protected $table = 'review';
    //protected $primaryKey = 'email';

    protected $returnType = 'array';

    protected $allowedFields = ['fullname', 'email', 'description', 'item_name','rating'];

}
