<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SparepartSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'kode_sparepart' => 'SP-001',
                'nama_sparepart' => 'Filter Oli',
                'gambar_dokumen' => null,
                'stok_east'      => 10,
                'stok_west'      => 5,
            ],
            [
                'kode_sparepart' => 'SP-002',
                'nama_sparepart' => 'Busi',
                'gambar_dokumen' => null,
                'stok_east'      => 20,
                'stok_west'      => 8,
            ],
        ];

        $this->db->table('sparepart')->insertBatch($data);
    }
}
