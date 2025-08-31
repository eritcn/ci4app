<?php

namespace App\Controllers;

// use App\Models\DatabaseModel;

class Database extends BaseController
{  
    protected $databaseModel;
    public function __construct()
    {
        $this-> databaseModel = new \App\Models\DatabaseModel();
    }
      public function index(): string
      {

         $currentPage = $this->request->getVar('page_database') ? $this->request->getVar('page_database') : 1;
    
       $keyword = $this->request->getVar('keyword');
       if($keyword) {
       $database = $this->databaseModel->search($keyword);
       } else {
        $database = $this->databaseModel;
       }
        
        $data = [
             'title' => 'Daftar Sparepart',
            'database' => $database->paginate(5, 'database'),
            'pager' => $this->databaseModel->pager,
            'currentPage' => $currentPage
        ];    

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
        session();
        $data = [
            'title' => 'Form Tambah Data Sparepart',
             'validation' => \Config\Services::validation()
        ];

        return view('database/create', $data);
     }
     
     
     public function save()
     {

              if(!$this->validate([
            'slug' => 'required|is_unique[database.slug]',
            'tanggal' => 'required',
            'lokasi' => 'required',
            'status' => 'required',
            'jenis_pekerjaan' => 'required',
            'date' => ['required',
            'errors' => ['required' => '{field} Tanggal harus diisi'] ],
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
            return view ('/database/create', $data);  
         }

        $fileGambar = $this->request->getFile('keterangan');
        $namaFile = $fileGambar->getRandomName();
        $fileGambar->move('uploads', $namaFile);

        $slug = url_title($this->request->getVar('slug'), ' ', false);
        $this->databaseModel->save([
            // 'date' => $this->request->getVar('date'),
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'keterangan' => $namaFile,
            'status' => $this->request->getVar('status')
        ]);

          session()->setFlashdata('pesan', 'DATA BERHASIL DITAMBAHKAN');

        return redirect()->to('/database');
     }

     public function delete($id)
     {
        $database = $this->databaseModel->find($id);
        unlink('uploads/' . $database['keterangan']);
        $this->databaseModel->delete($id);
         session()->setFlashdata('pesan', 'DATA BERHASIL DIHAPUS');
        return redirect()->to('/database');
     }

     public function edit($slug)
     {
            $data = [
            'title' => 'Form Ubah Data Sparepart',
             'validation' => \Config\Services::validation(),
             'database' => $this->databaseModel->getDatabase($slug),
        ];

        return view('database/edit', $data); 
     }

     public function update($id)
     {
          $slug = url_title($this->request->getVar('slug'), ' ', false);

          $dataLama =$this->databaseModel->find($id);

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

        $this->databaseModel->save([
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

        return redirect()->to('/database');
     }

}
