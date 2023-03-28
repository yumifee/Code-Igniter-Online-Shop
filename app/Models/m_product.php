<?php
namespace App\Models;

use CodeIgniter\Model;

class m_product extends Model
{
    protected $table = "products";
    protected $allowedFields = ['id', 'name', 'stock', 'price', 'desc', 'file'];

    public function getAll()
    {
        $query = $this->db->query("SELECT * FROM products ");
        return $query->getResult();
    }

    public function getBarang($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        } else {
            $query = $this->db->query("SELECT * FROM products where id = '$id'");
            return $query->getResultArray();
        }
    }

    public function saveProduct($data)
    {
        $query = $this->db->query("INSERT INTO products (id, name, stock, price, `desc`, file) 
                                   VALUES('" . $data['id'] . "', 
                                          '" . $data['name'] . "', 
                                          '" . $data['stock'] . "', 
                                          '" . $data['price'] . "', 
                                          '" . $data['desc'] . "', 
                                          '" . $data['file'] . "')");
        return $query;
    }

    public function getOne($id)
    {
        $query = $this->db->query("SELECT * FROM products where id = '$id'");
        return $query->getRow();
    }

    public function updateStok($data)
    {
        $sql_query = "UPDATE products SET stock = '" . $data['stok_barang_baru'] . "' WHERE id = '" . $data['id_cart'] . "'";
        return $this->db->query($sql_query);
    }
}