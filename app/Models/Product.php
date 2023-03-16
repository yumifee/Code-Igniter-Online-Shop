<?php

namespace App\Models;

use CodeIgniter\Model;

class Product extends Model
{
    protected $table = 'products';
    
    public function getProduct()
    {
        return $this->findAll();
    }
}
