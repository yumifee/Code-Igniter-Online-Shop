<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Jual extends Model
{
    protected $table = 'jual';

    protected $allowedFields = ['id', 'id_transaksi', 'harga_jual', 'jumlah_jual'];

    public function getAllData()
    {
        $sql_query = 'SELECT * FROM jual';
        return $this->db->query($sql_query)->getResultArray();
    }

    public function insertData($data)
    {
        $sql_query = "INSERT INTO jual VALUES('" . $data['id_cart'] . "', '" . $data['id_transaksi'] . "', '" . $data['harga_jual'] . "', '" . $data['jumlah_jual'] . "')";
        return $this->db->query($sql_query);
    }

}
?>