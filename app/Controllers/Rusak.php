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

           
       $currentPage = $this->request->getVar('page_rusak') ? $this->request->getVar('page_rusak') : 1;
    
       $keyword = $this->request->getVar('keyword');
       if($keyword) {
       $rusak = $this->rusakModel->search($keyword);
       } else {
        $rusak = $this->rusakModel;
       }

          $data = [
            'title' => 'Daftar Rig Rusak',
            'rusak' => $rusak->paginate(6, 'rusak'),
            'pager' => $this->rusakModel->pager,
            'currentPage' => $currentPage
            // 'gsjob' => $this->rigrfuModel->findAll()
            // 'gsjob' => $this->rigrfuModel->getGsjob()
        ];

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
         session();
        $data = [
            'title' => 'Form Tambah Data Rig Rusak',
            'validation' => \Config\Services::validation()
        ];

        return view('rusak/create', $data);
     }

     public function save()
     {
             if(!$this->validate([
            'slug' => 'required|is_unique[rusak.slug]',
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
            return view ('/rusak/create', $data);
        }

         $fileGambar = $this->request->getFile('keterangan');
        $namaFile = $fileGambar->getRandomName();
        $fileGambar->move('uploads', $namaFile);


        $slug = url_title($this->request->getVar('slug'), '', false);
        $this->rusakModel->save([
            'date' => $this->request->getVar('date'),
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'keterangan' => $namaFile,
            'status' => $this->request->getVar('status')
        ]);
         session()->setFlashdata('pesan', 'DATA BERHASIL DITAMBAHKAN');
        return redirect()->to('/rusak');
     }

           public function delete($id)
     {
         $rusak = $this->rusakModel->find($id);
        unlink('uploads/' . $rusak['keterangan']);
        $this->rusakModel->delete($id);
         session()->setFlashdata('pesan', 'DATA BERHASIL DIHAPUS');
        return redirect()->to('/rusak');
     }

     
         public function edit($slug)
     {
            $data = [
            'title' => 'Form Ubah Data Radio Rusak',
             'validation' => \Config\Services::validation(),
             'rusak' => $this->rusakModel->getRusak($slug)
        ];

        return view('rusak/edit', $data); 
     }

        public function update($id)
     {
          $slug = url_title($this->request->getVar('slug'), ' ', false);

               $dataLama =$this->rusakModel->find($id);

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

        $this->rusakModel->save([
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

        return redirect()->to('/rusak');
     }
}

