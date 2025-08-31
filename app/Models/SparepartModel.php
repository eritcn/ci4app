<?php

namespace App\Models;

use CodeIgniter\Model;

class SparepartModel extends Model
{
    protected $table            = 'sparepart';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'nama_sparepart',
        'kode_sparepart',
        'detail_part',
        'stok_west',
        'stok_east',
        'gambar_dokumen',
        'created_by',
        'updated_by'
    ];

    /**
     * Ambil semua sparepart atau 1 berdasarkan kode_sparepart
     */
    public function getSparepart($kode_sparepart = null)
    {
        if ($kode_sparepart === null) {
            return $this->findAll();
        }

        return $this->where(['kode_sparepart' => $kode_sparepart])->first();
    }

    /**
     * Search sparepart berdasarkan keyword
     */
    public function search($keyword)
    {
        // Ubah format tanggal dd/mm/yyyy ke Y-m-d
        if (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $keyword)) {
            $parts = explode('/', $keyword);
            $keyword = $parts[2] . '-' . $parts[1] . '-' . $parts[0];
        }

        return $this->groupStart()
            ->like('nama_sparepart', $keyword)
            ->orLike('kode_sparepart', $keyword)
            ->orLike('detail_part', $keyword)
            ->orLike('stok_west', $keyword)
            ->orLike('stok_east', $keyword)
            ->orLike('updated_by', $keyword)
            ->orLike('created_by', $keyword)
            ->groupEnd();
    }
}
