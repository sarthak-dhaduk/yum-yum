<?php

namespace App\Models;

use CodeIgniter\Model;

class Contact_Manage_Model extends Model
{
    protected $table = 'contact';
    //protected $primaryKey = 'email';

    protected $returnType = 'array';

    protected $allowedFields = ['fullname', 'email', 'description', 'subject','	phone'];

}
