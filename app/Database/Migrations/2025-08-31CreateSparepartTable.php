<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSparepartTable extends Migration

{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_sparepart' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'nama_sparepart' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'gambar_dokumen' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'stok_east' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'stok_west' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('sparepart');
    }

    public function down()
    {
        $this->forge->dropTable('sparepart');
    }
}
