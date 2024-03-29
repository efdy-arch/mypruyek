<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Keranjang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_keranjang' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_keranjang' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_produk' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_produk' => ['type' => 'varchar', 'constraint' => 255],
            'harga' => ['type' => 'varchar', 'contraint' => 255],
            'slug' => ['type' => 'varchar', 'contraint' => 255],
            'gambar_produk' => ['type' => 'varchar', 'contraint' => 255],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id_keranjang', true);
        $this->forge->createTable('keranjang', true);
        //
    }

    public function down()
    {
        $this->forge->dropTable('keranjang', true);
        //
    }
}
