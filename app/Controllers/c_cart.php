<?php

namespace App\Controllers;

use App\Models\M_cart;
use App\Models\M_product;

class C_cart extends BaseController
{
    protected $cart;
    protected $session;

    protected $product;

    function __construct()
    {
        $this->session = session();
        $this->session->start();
        $this->product = new M_product();
    }

    public function index()
    {
        $cart = session()->get('cart');
        $total_harga = $this->totalHarga();
        return view('v_shopping_cart', ['cart' => $cart, 'total_harga' => $total_harga]);
    }

    public function update_qty($id_cart)
    {
        $jumlah = $this->request->getPost('jumlah');
        $this->cart->update_qty($id_cart, $jumlah);
        return redirect()->to('/cart');
    }

    public function addto($id)
    {
        // session()->destroy();
        $request = \Config\Services::request();
        $barang = $this->product->getOne($id);

        $cart = session()->get('cart');
        if ($cart) {
            $arr = array_search($id, array_column($cart, 'id_cart'));
            // check yang dicari ada ga kalau ada lakuin update kuantitas aja
            if ($arr !== false) {
                $cart[$arr]['jumlah'] = $cart[$arr]['jumlah'] + 1;
                session()->set('cart', $cart);
                session()->setFlashdata('msg', 'Berhasil menambahkan cart');
                return redirect()->to(base_url('/cart'));
            }
        }
        $cart[] = [
            'id_cart' => $id,
            'nama' => $barang->name,
            'jumlah' => 1,
            'harga' => $barang->price,
            'file' => $barang->file,
            'subtotal' => $barang->price * 1,
        ];


        session()->set('cart', $cart);
        return redirect()->to(base_url('/cart'));
    }

    public function totalHarga()
    {
        $cart = session()->get('cart');

        $totalCost = 0;
        foreach ($cart as $item) {
            $totalCost += $item['subtotal'];
        }

        return $totalCost;
    }
    public function destroyCart($id)
    {
        $session = session();
        $cart = $session->get('cart');
        array_splice($cart, $id, 1);
        $session->set('cart', $cart);
        session()->setFlashdata('msg', 'Berhasil menghapus item');
        return redirect()->to('/cart');
    }

    public function deleteCart()
    {
        $session = \Config\Services::session();

        $session->destroy();

        return redirect('/');
    }

}