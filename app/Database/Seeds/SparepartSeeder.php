<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SparepartSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_sparepart' => 'Transistor Final MRF1550N',
                'kode_sparepart' => 'TRX-001',
                'stok_west'      => 10,
                'stok_east'      => 5,
                'gambar_dokumen' => 'transistor.jpg',
                'created_by'     => 'system',
                'updated_by'     => 'system',
            ],
            [
                'nama_sparepart' => 'Kabel Coaxial RG-213',
                'kode_sparepart' => 'KBL-002',
                'stok_west'      => 20,
                'stok_east'      => 15,
                'gambar_dokumen' => 'coaxial.jpg',
                'created_by'     => 'system',
                'updated_by'     => 'system',
            ],
            [
                'nama_sparepart' => 'Power Supply 13.8V 30A',
                'kode_sparepart' => 'PSU-003',
                'stok_west'      => 7,
                'stok_east'      => 3,
                'gambar_dokumen' => 'psu.jpg',
                'created_by'     => 'system',
                'updated_by'     => 'system',
            ],
        ];

        $this->db->table('sparepart')->insertBatch($data);
    }
}
