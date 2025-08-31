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
       
          $currentPage = $this->request->getVar('page_ht') ? $this->request->getVar('page_ht') : 1;
    
       $keyword = $this->request->getVar('keyword');
       if($keyword) {
       $ht = $this->htModel->search($keyword);
       } else {
        $ht = $this->htModel;
       }

          $data = [
            'title' => 'Daftar Repair HT',
            'ht' => $ht->paginate(5, 'ht'),
            'pager' => $this->htModel->pager,
            'currentPage' => $currentPage
            // 'gsjob' => $this->rigrfuModel->findAll()
            // 'gsjob' => $this->rigrfuModel->getGsjob()
        ];


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
            'slug' => 'required|is_unique[ht.slug]',
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
            return view ('/ht/create', $data);
        }

               $fileGambar = $this->request->getFile('keterangan');
        $namaFile = $fileGambar->getRandomName();
        $fileGambar->move('uploads', $namaFile);


        $slug = url_title($this->request->getVar('slug'), '', false);
        $this->htModel->save([
            'date' => $this->request->getVar('date'),
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'keterangan' => $namaFile,
            'status' => $this->request->getVar('status')
        ]);
         session()->setFlashdata('pesan', 'DATA BERHASIL DITAMBAHKAN');
        return redirect()->to('/ht');
     }

            public function delete($id)
     {  
         $ht = $this->htModel->find($id);
        unlink('uploads/' . $ht['keterangan']);
        $this->htModel->delete($id);
         session()->setFlashdata('pesan', 'DATA BERHASIL DIHAPUS');
        return redirect()->to('/ht');
     }

      public function edit($slug)
     {
            $data = [
            'title' => 'Form Ubah Data Radio Ht',
             'validation' => \Config\Services::validation(),
             'ht' => $this->htModel->getHt($slug)
        ];

        return view('ht/edit', $data); 
     }

        public function update($id)
     {
          $slug = url_title($this->request->getVar('slug'), ' ', false);

              $dataLama =$this->htModel->find($id);

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

        $this->htModel->save([
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

        return redirect()->to('/ht');
     }
}
