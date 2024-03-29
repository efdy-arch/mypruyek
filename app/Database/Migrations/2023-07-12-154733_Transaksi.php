<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_user' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'nama_klien' => ['type' => 'varchar', 'contraint' => 255],
            'no_telepon' => ['type' => 'varchar', 'contraint' => 255],
            'provinsi' => ['type' => 'varchar', 'contraint' => 255],
            'kota' => ['type' => 'varchar', 'contraint' => 255],
            'alamat' => ['type' => 'varchar', 'contraint' => 255],
            'alamat_detail' => ['type' => 'varchar', 'contraint' => 255],
            'kode_pos' => ['type' => 'int', 'contraint' => 30],
            'nama_produk' => ['type' => 'varchar', 'contraint' => 255],
            'gambar_produk' => ['type' => 'varchar', 'contraint' => 255],
            'jumlah' => ['type' => 'int', 'contraint' => 255],
            'harga' => ['type' => 'int', 'contraint' => 255],
            'total_harga' => ['type' => 'varchar', 'contraint' => 255],
            'metode_pembayaran' => ['type' => 'varchar', 'contraint' => 255],
            'status' => ['type' => 'varchar', 'contraint' => 255],
            'status_pembayaran' => ['type' => 'varchar', 'contraint' => 255],
            'created_at'       => ['type' => 'datetime', 'null' => true],
            'updated_at'       => ['type' => 'datetime', 'null' => true],
            'deleted_at'       => ['type' => 'datetime', 'null' => true],
        ]);
        $this->forge->addKey('id', true);

        $this->forge->createTable('tb_transaksi', true);
    }

    public function down()
    {
        $this->forge->dropTable('tb_transaksi', true);
        //
    }
}
