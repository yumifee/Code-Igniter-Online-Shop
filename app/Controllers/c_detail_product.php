<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;

class c_detail_product extends BaseController
{
    public function index()
    {
        $Model = new Product();

        $Data['Product'] = $Model->getProduct();

        echo view('v_product_details', $Data);
    }
}