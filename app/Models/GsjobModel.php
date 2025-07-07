<?php

namespace App\Models;

use CodeIgniter\Model;

class GsjobModel extends Model
{
       protected $table      = 'gsjob';
       protected $useTimestamps      = true;
       protected $createdField      = 'created_at';
       protected $updatedField      = 'updated_at';
       protected $allowedFields = ['jenis_pekerjaan', 'slug', 'tanggal', 'lokasi', 'keterangan','status'];
       public function getGsjob($slug = false)
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

              return $this->table('gsjob')->like('slug', $keyword)->orLike('status', $keyword);
       }
}