<?php

namespace App\Controllers;

use App\Models\m_product;
use App\Models\m_trans;
use App\Models\m_jual;
use Config\Services;
use DateTimeZone;
use DateTime;

class C_Trans extends BaseController
{
    public function checkout()
    {
        $request = Services::request();
        $session = session();

        $m_jual = new m_jual();
        $m_trans = new m_trans();
        $m_barang = new m_product();

        $countTrans = $m_trans->countAllData()[0]['COUNT(*)'] + 1;

        $nama = $request->getPost('nama');
        $no_telp = $request->getPost('no_telp');
        $alamat = $request->getPost('alamat');
        $kode_pos = $request->getPost('kode_pos');

        $tgl_trans = new DateTime("now", new DateTimeZone('Asia/Jakarta'));

        $data = [
            'id_transaksi' => $countTrans,
            'nama' => $nama,
            'no_telp' => $no_telp,
            'alamat' => $alamat,
            'tgl_trans' => $tgl_trans->format('Y-m-d H:i:s'),
            'kode_pos' => $kode_pos,
        ];

        $m_trans->insertData($data);
        $cart = session()->get('cart') ?? array();
        $sub_total = 0;
        foreach ($cart as $cart_item) {
            $data = [
                'id_cart' => $cart_item['id_cart'],
                'id_transaksi' => $countTrans,
                'harga_jual' => $cart_item['harga'],
                'jumlah_jual' => $cart_item['jumlah'],
                'stok_barang_baru' => ($m_barang->getBarang($cart_item['id_cart'])[0]['stock'] - $cart_item['jumlah']),
            ];

            $m_jual->insertData($data);

            $m_barang->updateStok($data);

            $sub_total += $cart_item['harga'] * $cart_item['jumlah'];
        }

        $data = [
            'id_transaksi' => $countTrans,
            'total_trans' => $sub_total,
        ];

        $m_trans->updateTotalTrans($data);

        return redirect('proses_hapus_semua_cart');
    }
}