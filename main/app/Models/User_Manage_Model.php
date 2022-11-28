<?php

namespace App\Models;

use CodeIgniter\Model;

class User_Manage_Model extends Model
{
    protected $table = 'register';
    protected $primaryKey = 'email';

    protected $returnType     = 'array';

    protected $allowedFields = ['fullname', 'email', 'password', 'profilepic', 'unique_id'];

}
