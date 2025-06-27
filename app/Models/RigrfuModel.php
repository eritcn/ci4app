<?php

namespace App\Models;

use CodeIgniter\Model;

class RigrfuModel extends Model
{
       protected $table      = 'rigrfu';
       protected $useTimestamps      = true;
       protected $createdField      = 'created_at';
       protected $updatedField      = 'updated_at';
       protected $allowedFields = ['date', 'jenis_pekerjaan', 'slug', 'tanggal', 'lokasi', 'status','keterangan'];
       public function getRigrfu($slug = false)
       {
              if($slug ==false) {
                     return $this->findAll();
              }

              return $this->where(['slug' => $slug] )->first();
       }
          
}