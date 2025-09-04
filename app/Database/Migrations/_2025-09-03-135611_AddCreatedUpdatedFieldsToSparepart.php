<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCreatedUpdatedFieldsToSparepart extends Migration
{
    public function up()
    {
        $this->forge->addColumn('sparepart', [
            'created_by' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'updated_at'
            ],
            'updated_by' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => true,
                'after'      => 'created_by'
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('sparepart', ['created_by', 'updated_by']);
    }
}
