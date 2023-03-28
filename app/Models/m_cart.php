<?php

namespace App\Models;

use CodeIgniter\Model;

class M_cart extends Model
{
    protected $table = "cart";
    protected $primaryKey = 'id_cart';
    protected $allowedFields = ['id_cart', 'nama', 'jumlah', 'harga', 'subtotal', 'file'];

    public function getAll()
    {
        $cart_items = [];

        if (session()->has('cart')) {
            $cart_items = session('cart');
        }

        $query = $this->db->table('products')
            ->select('cart.*, products.file as product_file')
            ->join('cart', 'cart.nama = products.name', 'inner');

        if (count($cart_items) > 0) {
            $query->whereIn('cart.id_cart', array_keys($cart_items));
        } else {
            $query->where('1', 0);
        }

        $result = $query->get()->getResult();

        foreach ($result as &$item) {
            $item->jumlah = $cart_items[$item->id_cart]['jumlah'];
            $item->subtotal = $cart_items[$item->id_cart]['subtotal'];
        }

        return $result;
    }

    public function saveCart($data)
    {
        $cart_items = [];

        if (session()->has('cart')) {
            $cart_items = session('cart');
        }

        $cart_items[$data['id_cart']] = [
            'nama' => $data['nama'],
            'jumlah' => $data['jumlah'],
            'harga' => $data['harga'],
            'subtotal' => $data['subtotal'],
            'file' => $data['file']
        ];

        session()->set('cart', $cart_items);

        return true;
    }

    public function simpanedit($data)
    {
        $cart_items = [];

        if (session()->has('cart')) {
            $cart_items = session('cart');
        }

        $cart_items[$data['id_cart']]['jumlah'] = $data['jumlah'];
        $cart_items[$data['id_cart']]['subtotal'] = $data['subtotal'];

        session()->set('cart', $cart_items);

        return true;
    }

    public function update_qty($id_cart, $jumlah)
    {
        $cart_items = [];

        if (session()->has('cart')) {
            $cart_items = session('cart');
        }

        if (isset($cart_items[$id_cart])) {
            $cart_items[$id_cart]['jumlah'] = $jumlah;
            $cart_items[$id_cart]['subtotal'] = $jumlah * $cart_items[$id_cart]['harga'];
        }

        session()->set('cart', $cart_items);

        return true;
    }
}