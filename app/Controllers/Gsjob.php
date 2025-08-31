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

       $currentPage = $this->request->getVar('page_gsjob') ? $this->request->getVar('page_gsjob') : 1;
    
       $keyword = $this->request->getVar('keyword');
       if($keyword) {
       $gsjob = $this->gsjobModel->search($keyword);
       } else {
        $gsjob = $this->gsjobModel;
       }
    //  d($this->request->getVar('keyword'));

        $data = [
            'title' => 'Daftar Job',
            'gsjob' => $gsjob->paginate(5, 'gsjob'),
            'pager' => $this->gsjobModel->pager,
            'currentPage' => $currentPage
            // 'gsjob' => $this->gsjobModel->findAll()
            // 'gsjob' => $this->gsjobModel->getGsjob()
        ];

      
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
        session();
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
               'keterangan' => [
                'rules' => 'uploaded[keterangan]|max_size[keterangan,7000]|is_image[keterangan]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Format gambar harus JPG/JPEG/PNG'
                ]
            ]
        ])) {

            $validation = \Config\Services::validation();
            // dd(\Config\Services::validation()->listErrors());
            $data['validation'] = $validation;
            return view('/gsjob/create',$data);
        }

           $fileGambar = $this->request->getFile('keterangan');
        $namaFile = $fileGambar->getRandomName();
        $fileGambar->move('uploads', $namaFile);

        $slug = url_title($this->request->getVar('slug'), ' ',  false);
        $this->gsjobModel->save([
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'keterangan' => $namaFile,
            'status' => $this->request->getVar('status')
        ]);

        session()->setFlashdata('pesan', 'DATA BERHASIL DITAMBAHKAN');
        
        return redirect()->to('/gsjob');
     }

     
     public function delete($id)
     {  
          $gsjob = $this->gsjobModel->find($id);
        unlink('uploads/' . $gsjob['keterangan']);
        $this->gsjobModel->delete($id);
         session()->setFlashdata('pesan', 'DATA BERHASIL DIHAPUS');
        return redirect()->to('/gsjob');
     }

           public function edit($slug)
     {
            $data = [
            'title' => 'Form Ubah Data GS Job',
             'validation' => \Config\Services::validation(),
             'gsjob' => $this->gsjobModel->getGsjob($slug)
        ];

        return view('gsjob/edit', $data); 
     }

        public function update($id)
     {
          $slug = url_title($this->request->getVar('slug'), ' ', false);

               $dataLama =$this->gsjobModel->find($id);

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

        $this->gsjobModel->save([
            'id' => $id,
            'jenis_pekerjaan' => $this->request->getVar('jenis_pekerjaan'),
            'slug' => $slug,
            'tanggal' => $this->request->getVar('tanggal'),
            'lokasi' => $this->request->getVar('lokasi'),
            'keterangan' => $namaGambarBaru,
            'status' => $this->request->getVar('status')
        ]);

          session()->setFlashdata('pesan', 'DATA BERHASIL DI UBAH');

        return redirect()->to('/gsjob');
     }
}