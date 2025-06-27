<?php

namespace App\Controllers;

class Rusak extends BaseController
{  
    protected $rusakModel;
    public function __construct()
    {
        $this-> rusakModel = new \App\Models\RusakModel();
    }
      public function index(): string
      {
        // $gsjob = $this-> gsjobModel->findAll();

        $data = [
            'title' => 'Data rig rusak',
            'rusak' => $this->rusakModel->getRusak()
        ];

      
       

    //     $db = \Config\Database::connect();
    //     $gsjob = $db->query("SELECT * FROM gsjob");
    //    foreach($gsjob->getResultArray() as $row) {
    //     d($row);
    //    }

        return view('rusak' , $data);
        
    }
  
    public function detail($slug)
     {
       
        $data = [
            'title' => 'Detail Data Rig Rusak',
            'rusak' => $this->rusakModel->getRusak($slug)
        ];

        // jika gsjob tidak ada di tabel
        if(empty($data['rusak'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Title Job'. $slug . ' tidak ditemukan');
        }

        return view('rusak/detail', $data);
     }

     public function create()
     {
        $data = [
            'title' => 'Form Tambah Data Rig Rusak',
            'validation' => \Config\Services::validation()
        ];

        return view('rusak/create', $data);
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
            return view ('/rusak/create', $data);
        }

        $slug = url_title($this->request->getVar('slug'), '', false);
        $this->rusakModel->save([
            'date' => $this->request->getVar('date'),
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status' => $this->request->getVar('status')
        ]);
         session()->setFlashdata('pesan', 'DATA BERHASIL DITAMBAHKAN');
        return redirect()->to('/rusak');

     }
}
