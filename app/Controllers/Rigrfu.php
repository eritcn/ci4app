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
        
        
       $currentPage = $this->request->getVar('page_rigrfu') ? $this->request->getVar('page_rigrfu') : 1;
    
       $keyword = $this->request->getVar('keyword');
       if($keyword) {
       $rigrfu = $this->rigrfuModel->search($keyword);
       } else {
        $rigrfu = $this->rigrfuModel;
       }

          $data = [
            'title' => 'Daftar Rig Rfu',
            'rigrfu' => $rigrfu->paginate(8, 'rigrfu'),
            'pager' => $this->rigrfuModel->pager,
            'currentPage' => $currentPage
            // 'gsjob' => $this->rigrfuModel->findAll()
            // 'gsjob' => $this->rigrfuModel->getGsjob()
        ];

      
       

 

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
        session();
        $data = [
            'title' => 'Form Tambah Data Rig Rfu',
            'validation' => \Config\Services::validation()
        ];

        return view('rigrfu/create', $data);
     }

     public function save()
     {
              if(!$this->validate([
            'slug' => 'required|is_unique[rigrfu.slug]',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'status' => 'required',
            'jenis_pekerjaan' => 'required',
            'keterangan' => [
                'rules' => 'uploaded[keterangan]|max_size[keterangan,5000]|is_image[keterangan]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Format gambar harus JPG/JPEG/PNG'
                ]
            ]
        ])) {

             $validation = \Config\Services::validation();
              $data['validation'] = $validation;
            return view ('/rigrfu/create', $data);
        }

            $fileGambar = $this->request->getFile('keterangan');
        $namaFile = $fileGambar->getRandomName();
        $fileGambar->move('uploads', $namaFile);


        $slug = url_title($this->request->getVar('slug'), '', false);
        $this->rigrfuModel->save([
            'date' => $this->request->getVar('date'),
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'keterangan' => $namaFile,
            'status' => $this->request->getVar('status')
        ]);
         session()->setFlashdata('pesan', 'DATA BERHASIL DITAMBAHKAN');
        return redirect()->to('/rigrfu');
     }

        public function delete($id)
     {  
         $rigrfu = $this->rigrfuModel->find($id);
        unlink('uploads/' . $rigrfu['keterangan']);
        $this->rigrfuModel->delete($id);
         session()->setFlashdata('pesan', 'DATA BERHASIL DIHAPUS');
        return redirect()->to('/rigrfu');
     }

         public function edit($slug)
     {
            $data = [
            'title' => 'Form Ubah Data Radio Rfu',
             'validation' => \Config\Services::validation(),
             'rigrfu' => $this->rigrfuModel->getRigrfu($slug)
        ];

        return view('rigrfu/edit', $data); 
     }

        public function update($id)
     {
          $slug = url_title($this->request->getVar('slug'), ' ', false);

             $dataLama =$this->rigrfuModel->find($id);

          $fileGambar = $this->request->getFile('keterangan');

          if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambarBaru = $fileGambar->getRandomName();
            $fileGambar->move('uploads/' , $namaGambarBaru);

            if (!empty($dataLama['keterangan']) && file_exists('uploads/' . $dataLama['keterangan'])) {
                unlink('uploads/' . $dataLama['keterangan']);
            }
          } else {
            $namaGambarBaru = $dataLama['keterangan'];
          }


        $this->rigrfuModel->save([
            'id' => $id,
            'date' => $this->request->getVar('date'),
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'keterangan' => $namaGambarBaru,
            'status' => $this->request->getVar('status')
        ]);

          session()->setFlashdata('pesan', 'DATA BERHASIL DI UBAH');

        return redirect()->to('/rigrfu');
     }
}
