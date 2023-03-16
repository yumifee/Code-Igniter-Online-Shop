<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Product extends Migration
{
    public function up()
    {
        $this->forge->addField([
			'id' => [
				'type'           => 'INT',
				'constraint'     => 5,
				'unsigned'       => true,
				'auto_increment' => true
			],
			'name' => [
				'type'           => 'VARCHAR',
				'constraint'     => '255'
			],
			'stock' => [
				'type'           => 'INT',
				'constraint'     => 5,
			],
            'price' => [
				'type'           => 'INT',
				'constraint'     => 11,
			],
			'desc' => [
				'type'           => 'TEXT',
				'null'           => true,
			],
			'file'      => [
				'type'           => 'VARCHAR',
				'constraint'     => 255,
			],
		]);

		$this->forge->addKey('id', TRUE);

		$this->forge->createTable('products', TRUE);
    }

    public function down()
    {
        $this->forge->dropTable('products');
    }
}
