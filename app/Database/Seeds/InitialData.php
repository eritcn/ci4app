<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitialData extends Seeder
{
    public function run()
    {
        // Insert groups
        $groups = [
            [
                'name'        => 'admin',
                'description' => 'Site Administrator',
            ],
            [
                'name'        => 'user',
                'description' => 'Regular User',
            ],
        ];

        $this->db->table('auth_groups')->insertBatch($groups);

        // Insert admin user
        $user = [
            'email'         => 'admin@example.com',
            'username'      => 'admin',
            'password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
            'active'        => 1,
        ];
        $this->db->table('users')->insert($user);
        $userId = $this->db->insertID();

        // Assign user ke group admin
        $this->db->table('auth_groups_users')->insert([
            'group_id' => 1, // admin
            'user_id'  => $userId,
        ]);
    }
}
