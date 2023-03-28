<?php

namespace App\Controllers;

use App\Models\m_product;
use Config\View;
// use App\Models\MBarang;
use App\Models\m_cart;

class LandingController extends BaseController
{
    public function index()
    {
        $model = new m_product();
        $data['products'] = $model->getAll();

        return view("v_product.php", $data);
    }
}