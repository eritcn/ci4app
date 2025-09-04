<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDetailPartToSparepart extends Migration
{
    public function up()
    {
        // Tambah kolom detail_part saja
        $this->forge->addColumn('sparepart', [
            'detail_part' => [
                'type' => 'TEXT',
                'null' => true,
                'after' => 'kode_sparepart', // opsional: biar posisi rapi
            ],
        ]);
    }

    public function down()
    {
        // Hapus kolom detail_part kalau rollback
        $this->forge->dropColumn('sparepart', 'detail_part');
    }
}
