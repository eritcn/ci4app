<?php

namespace App\Controllers;

class Ht extends BaseController
{  
    protected $htModel;
    public function __construct()
    {
        $this->htModel = new \App\Models\HtModel();
    }
      public function index(): string
      {
        // $gsjob = $this-> gsjobModel->findAll();

        $data = [
            'title' => 'Data Repair ',
            'ht' => $this->htModel->getHt()
        ];

      
       

    //     $db = \Config\Database::connect();
    //     $gsjob = $db->query("SELECT * FROM gsjob");
    //    foreach($gsjob->getResultArray() as $row) {
    //     d($row);
    //    }

        return view('ht' , $data);
        
    }
  
    public function detail($slug)
     {
       
        $data = [
            'title' => 'Detail Data Repair HT',
            'ht' => $this->htModel->getHt($slug)
        ];

        // jika gsjob tidak ada di tabel
        if(empty($data['ht'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Title Job'. $slug . ' tidak ditemukan');
        }

        return view('ht/detail', $data);
     }

     public function create()
     {
        $data = [
            'title' => 'Form Tambah Data Repair HT ',
             'validation' => \Config\Services::validation()
        ];

        return view('ht/create', $data);
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
            return view ('/ht/create', $data);
        }

        $slug = url_title($this->request->getVar('slug'), '', false);
        $this->htModel->save([
            'date' => $this->request->getVar('date'),
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'keterangan' => $this->request->getVar('keterangan'),
            'status' => $this->request->getVar('status')
        ]);
         session()->setFlashdata('pesan', 'DATA BERHASIL DITAMBAHKAN');
        return redirect()->to('/ht');

     }
}
