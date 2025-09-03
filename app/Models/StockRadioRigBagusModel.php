<?php

namespace App\Models;

use CodeIgniter\Model;

class StockRadioRigBagusModel extends Model
{
    protected $table            = 'stock_radio_rig_bagus';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    protected $updatedField     = 'updated_at';

    protected $allowedFields = [
        'merk',
        'type',
        'serial_number',
        'keterangan',
        'posisi',
        'gambar_dokumen',
        'created_by',
        'updated_by'
    ];

    /**
     * Ambil semua radio rig stock bagus atau 1 berdasarkan serial number
     */
    public function getStockRadioRigBagus($serial_number = null)
    {
        if ($serial_number === null) {
            return $this->findAll();
        }

        return $this->where(['serial_number' => $serial_number])->first();
    }

    /**
     * Search stock radio rig bagus berdasarkan keyword
     */
    public function search($keyword)
    {
        // Ubah format tanggal dd/mm/yyyy ke Y-m-d
        if (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $keyword)) {
            $parts = explode('/', $keyword);
            $keyword = $parts[2] . '-' . $parts[1] . '-' . $parts[0];
        }

        return $this->groupStart()
            ->like('merk', $keyword)
            ->orLike('type', $keyword)
            ->orLike('serial_number', $keyword)
            ->orLike('keterangan', $keyword)
            ->orLike('posisi', $keyword)
            ->orLike('updated_by', $keyword)
            ->orLike('created_by', $keyword)
            ->groupEnd();
    }
}
