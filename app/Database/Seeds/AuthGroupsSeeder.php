<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AuthGroupsSeeder extends Seeder
{
    public function run()
    {
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
}
