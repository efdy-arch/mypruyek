<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pembayaran extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_transaksi' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'total_harga' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_produk' => ['type' => 'varchar', 'constraint' => 255],
            'nama_klien' => ['type' => 'varchar', 'contraint' => 255],
            'bukti_pembayaran' => ['type' => 'varchar', 'contraint' => 255],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pembayaran', true);
    }

    public function down()
    {
        $this->forge->dropTable('pembayaran', true);
        //
    }
}
