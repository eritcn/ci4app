<?php

namespace App\Controllers;

class Gsjob extends BaseController
{  
    protected $gsjobModel;
    public function __construct()
    {
        $this-> gsjobModel = new \App\Models\GsjobModel();
    }
      public function index(): string
      {
        // $gsjob = $this-> gsjobModel->findAll();

        $data = [
            'title' => 'Daftar Job',
            'gsjob' => $this->gsjobModel->getGsjob()
        ];

      
       

    //     $db = \Config\Database::connect();
    //     $gsjob = $db->query("SELECT * FROM gsjob");
    //    foreach($gsjob->getResultArray() as $row) {
    //     d($row);
    //    }

        return view('gsjob' , $data);
        
    }
  
    public function detail($slug)
     {
       
        $data = [
            'title' => 'Detail Job',
            'gsjob' => $this->gsjobModel->getGsjob($slug)
        ];

        // jika gsjob tidak ada di tabel
        if(empty($data['gsjob'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Title Job'. $slug . ' tidak ditemukan');
        }

        return view('gsjob/detail', $data);
     }

     public function create()
     {
        // session();
        $data = [
            'title' => 'Form Tambah Data Job',
            'validation' => \Config\Services::validation()
        ];

        return view('gsjob/create', $data);
     }

    
     public function save()
     {

        if(!$this->validate([
            'slug' => 'required|is_unique[gsjob.slug]',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'status' => 'required',
            'jenis_pekerjaan' => 'required',
            'keterangan' => 'required'
        ])) {

            $validation = \Config\Services::validation();
      
            // return redirect()->to('/gsjob/create')->withInput()->with('validation', $validation);
            $data['validation'] = $validation;
            return view('/gsjob/create',$data);
        }

        $slug = url_title($this->request->getVar('slug'), ' ',  false);
        $this->gsjobModel->save([
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status' => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'DATA BERHASIL DITAMBAHKAN');
        
        return redirect()->to('/gsjob');

     }
}