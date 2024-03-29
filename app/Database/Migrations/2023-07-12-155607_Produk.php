<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_produk' => ['type' => 'varchar', 'constraint' => 255],
            'slug' => ['type' => 'varchar', 'contraint' => 255],
            'kuantitas' => ['type' => 'varchar', 'contraint' => 255],
            'harga' => ['type' => 'varchar', 'contraint' => 255],
            'deskripsi' => ['type' => 'varchar', 'contraint' => 255],
            'foto' => ['type' => 'varchar', 'contraint' => 255],
            'foto2' => ['type' => 'varchar', 'contraint' => 255],
            'foto3' => ['type' => 'int', 'contraint' => 30],
            'foto4' => ['type' => 'varchar', 'contraint' => 255],
            'kategori' => ['type' => 'varchar', 'contraint' => 255],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('produk', true);
        //
    }

    public function down()
    {
        $this->forge->dropTable('produk', true);
        //
    }
}
