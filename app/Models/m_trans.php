<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Trans extends Model
{
    protected $table = 'transaksi';
    // protected $primaryKey = 'id_transaksi';

    protected $allowedFields = ['id_transaksi', 'tgl_trans', 'no_hp', 'alamat', 'total_trans', 'kode_pos'];

    public function getAllData()
    {
        $sql_query = 'SELECT * FROM transaksi';
        return $this->db->query($sql_query)->getResultArray();
    }

    public function countAllData()
    {
        $sql_query = 'SELECT COUNT(*) FROM transaksi';
        return $this->db->query($sql_query)->getResultArray();
    }

    public function insertData($data)
    {
        $sql_query = "INSERT INTO transaksi VALUES('" . $data['id_transaksi'] . "', '" . $data['nama'] . "', '" . $data['tgl_trans'] . "', '" . $data['no_telp'] . "', '" . $data['alamat'] . "', '', '" . $data['kode_pos'] . "')";
        return $this->db->query($sql_query);
    }

    public function updateTotalTrans($data)
    {
        $sql_query = "UPDATE transaksi SET total_trans = '" . $data['total_trans'] . "' WHERE id_transaksi = '" . $data['id_transaksi'] . "'";
        return $this->db->query($sql_query);
    }
}
?>