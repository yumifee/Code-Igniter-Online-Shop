<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;

class LandingController extends BaseController
{
    public function index()
    {
        $Model = new Product();

        $Data['Product'] = $Model->getProduct();

        echo view('landing', $Data);
    }
}
