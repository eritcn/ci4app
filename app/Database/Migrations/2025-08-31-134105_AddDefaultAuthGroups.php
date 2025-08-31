<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDefaultAuthGroups extends Migration
{
    public function up()
    {
        // Insert default groups
        $data = [
            [
                'name'        => 'admin',
                'description' => 'Site Administrator'
            ],
            [
                'name'        => 'user',
                'description' => 'Regular User'
            ]
        ];

        $this->db->table('auth_groups')->insertBatch($data);
    }

    public function down()
    {
        $this->db->table('auth_groups')->whereIn('name', ['admin', 'user'])->delete();
    }
}
