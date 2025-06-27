<?php

namespace App\Controllers;

class Database extends BaseController
{  
    protected $databaseModel;
    public function __construct()
    {
        $this-> databaseModel = new \App\Models\DatabaseModel();
    }
      public function index(): string
      {
        // $gsjob = $this-> gsjobModel->findAll();

        $data = [
            'title' => 'Database Radio Unit',
            'database' => $this->databaseModel->getDatabase()
        ];

      
       

    //     $db = \Config\Database::connect();
    //     $gsjob = $db->query("SELECT * FROM gsjob");
    //    foreach($gsjob->getResultArray() as $row) {
    //     d($row);
    //    }

        return view('database' , $data);
        
    }
  
    public function detail($slug)
     {
       
        $data = [
            'title' => 'Detail Data Radio Unit',
            'database' => $this->databaseModel->getDatabase($slug)
        ];

        // jika gsjob tidak ada di tabel
        if(empty($data['database'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Title Job'. $slug . ' tidak ditemukan');
        }

        return view('database/detail', $data);
     }

     public function create()
     {
        $data = [
            'title' => 'Form Tambah Data Radio Unit',
             'validation' => \Config\Services::validation()
        ];

        return view('database/create', $data);
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
            return view ('/database/create', $data);
        }

        $slug = url_title($this->request->getVar('slug'), '', false);
        $this->databaseModel->save([
            'date' => $this->request->getVar('date'),
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status' => $this->request->getVar('status')
        ]);

          session()->setFlashdata('pesan', 'DATA BERHASIL DITAMBAHKAN');

        return redirect()->to('/database');

     }
}
