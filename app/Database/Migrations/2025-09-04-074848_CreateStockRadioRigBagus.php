<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateStockRadioRigBagus extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'             => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'merk'           => ['type' => 'VARCHAR', 'constraint' => 100],
            'type'           => ['type' => 'VARCHAR', 'constraint' => 100],
            'serial_number'  => ['type' => 'VARCHAR', 'constraint' => 100, 'unique' => true],
            'keterangan'     => ['type' => 'TEXT', 'null' => true],
            'posisi'         => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'gambar_dokumen' => ['type' => 'VARCHAR', 'constraint' => 255, 'null' => true],
            'created_by'     => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'updated_by'     => ['type' => 'VARCHAR', 'constraint' => 100, 'null' => true],
            'created_at'     => ['type' => 'DATETIME', 'null' => true],
            'updated_at'     => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('stock_radio_rig_bagus');
    }

    public function down()
    {
        $this->forge->dropTable('stock_radio_rig_bagus');
    }
}
