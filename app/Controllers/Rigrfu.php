<?php

namespace App\Controllers;

class Rigrfu extends BaseController
{  
    protected $rigrfuModel;
    public function __construct()
    {
        $this-> rigrfuModel = new \App\Models\RigrfuModel();
    }
      public function index(): string
      {
        // $gsjob = $this-> gsjobModel->findAll();

        $data = [
            'title' => 'Data rig rfu',
            'rigrfu' => $this->rigrfuModel->getRigrfu()
        ];

      
       

    //     $db = \Config\Database::connect();
    //     $gsjob = $db->query("SELECT * FROM gsjob");
    //    foreach($gsjob->getResultArray() as $row) {
    //     d($row);
    //    }

        return view('rigrfu' , $data);
        
    }
  
    public function detail($slug)
     {
       
        $data = [
            'title' => 'Detail Data Rig',
            'rigrfu' => $this->rigrfuModel->getRigrfu($slug)
        ];

        // jika gsjob tidak ada di tabel
        if(empty($data['rigrfu'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Title Job'. $slug . ' tidak ditemukan');
        }

        return view('rigrfu/detail', $data);
     }

     public function create()
     {
        $data = [
            'title' => 'Form Tambah Data Rig Rfu',
            'validation' => \Config\Services::validation()
        ];

        return view('rigrfu/create', $data);
     }

     public function save()
     {
              if(!$this->validate([
            'slug' => 'required|is_unique[gsjob.slug]',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'status' => 'required',
            'jenis_pekerjaan' => 'required',
            'keterangan' => 'required',
            'date' => 'required'
        ])) {
             $validation = \Config\Services::validation();
              $data['validation'] = $validation;
            return view ('/rigrfu/create', $data);
        }

        $slug = url_title($this->request->getVar('slug'), '', false);
        $this->rigrfuModel->save([
            'date' => $this->request->getVar('date'),
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status' => $this->request->getVar('status')
        ]);
         session()->setFlashdata('pesan', 'DATA BERHASIL DITAMBAHKAN');
        return redirect()->to('/rigrfu');

     }
}
