<?php

namespace App\Models;

use CodeIgniter\Model;

class DatabaseModel extends Model
{
       protected $table      = 'database';
       protected $useTimestamps      = true;
       protected $createdField      = 'created_at';
       protected $updatedField      = 'updated_at';
       protected $allowedFields = ['date', 'jenis_pekerjaan', 'slug', 'tanggal', 'lokasi', 'status','keterangan'];
       public function getDatabase($slug = false)
       {
              if($slug ==false) {
                     return $this->findAll();
              }

              return $this->where(['slug' => $slug] )->first();
       }
          
        public function search($keyword)
       {
              // $builder = $this->table('gsjob');
              // $builder->like('slug', $keyword);
              // return $builder;

              return $this->table('database')->like('slug', $keyword)->orLike('status', $keyword)->orLike('date', $keyword)->orLike('tanggal', $keyword)->orLike('lokasi', $keyword);
       }

}
