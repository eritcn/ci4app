<?php

namespace App\Controllers;

use App\Models\SparepartModel;

class Sparepart extends BaseController
{
    protected $sparepartModel;
    protected $db;

    public function __construct()
    {
        $this->sparepartModel = new SparepartModel();
        $this->db             = db_connect();
    }

    public function index(): string
    {
        $currentPage = $this->request->getVar('page_sparepart') ?? 1;
        $keyword     = strtolower(trim($this->request->getVar('keyword')));

        // Query untuk filter pencarian "limit" atau keyword lain
        $query = $this->db->table('sparepart');
        if (!empty($keyword)) {
            if ($keyword === "limit") {
                $query->groupStart()
                    ->where('CAST(stok_east AS UNSIGNED) <=', 5)
                    ->orWhere('CAST(stok_west AS UNSIGNED) <=', 5)
                    ->groupEnd();
            } else {
                $query->like('nama_sparepart', $keyword)
                    ->orLike('kode_sparepart', $keyword)
                    ->orLike('stok_east', $keyword)
                    ->orLike('stok_west', $keyword)
                    ->orLike('detail_part', $keyword)
                    ->orLike('updated_by', $keyword)
                    ->orLike('created_by', $keyword);
            }
        }
        $data['result'] = $query->get()->getResultArray();

        // Ambil data sparepart dengan pagination
        $sparepart = $keyword
            ? $this->sparepartModel->search($keyword)->orderBy('created_at', 'DESC')
            : $this->sparepartModel->orderBy('created_at', 'DESC');

        $data = [
            'title'       => 'Daftar Sparepart',
            'sparepart'   => $sparepart->paginate(6, 'sparepart'),
            'pager'       => $this->sparepartModel->pager,
            'currentPage' => $currentPage,
            'keyword'     => $keyword,
        ];

        return view('sparepart', $data);
    }

    public function detail($id)
    {
        $sparepart = $this->sparepartModel->find($id);

        if (empty($sparepart)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data dengan ID $id tidak ditemukan");
        }

        return view('sparepart/detail', [
            'title'     => 'Detail Sparepart',
            'sparepart' => $sparepart,
        ]);
    }

    public function create()
    {
        return view('sparepart/create', [
            'title'      => 'Form Tambah Sparepart',
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function save()
    {
        $rules = [
            'nama_sparepart' => 'required',
            'kode_sparepart' => 'required|is_unique[sparepart.kode_sparepart]',
            'stok_east'      => 'required|integer',
            'stok_west'      => 'required|integer',
            'detail_part'      => 'required',
            'gambar_dokumen' => [
                'rules'  => 'uploaded[gambar_dokumen]|max_size[gambar_dokumen,5245]|is_image[gambar_dokumen]|mime_in[gambar_dokumen,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'uploaded' => 'Pilih gambar terlebih dahulu',
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in'  => 'Format gambar harus JPG/JPEG/PNG',
                ],
            ],
        ];

        if (!$this->validate($rules)) {
            return view('sparepart/create', [
                'title'      => 'Form Tambah Sparepart',
                'validation' => $this->validator,
            ]);
        }

        $fileGambar = $this->request->getFile('gambar_dokumen');
        $namaFile   = $fileGambar->getRandomName();
        $fileGambar->move('uploads', $namaFile);

        $this->sparepartModel->save([
            'nama_sparepart' => $this->request->getVar('nama_sparepart'),
            'kode_sparepart' => $this->request->getVar('kode_sparepart'),
            'stok_east'      => $this->request->getVar('stok_east'),
            'stok_west'      => $this->request->getVar('stok_west'),
            'detail_part'    => $this->request->getVar('detail_part'),
            'gambar_dokumen' => $namaFile,
            'created_by'     => user()->username,
        ]);

        session()->setFlashdata('pesan', 'DATA BERHASIL DITAMBAHKAN');
        return redirect()->to('/sparepart');
    }

 public function delete($id)
     {
        $sparepart = $this->sparepartModel->find($id);
        unlink('uploads/' . $sparepart['gambar_dokumen']);
        $this->sparepartModel->delete($id);
         session()->setFlashdata('pesan', 'DATA BERHASIL DIHAPUS');
        return redirect()->to('/sparepart');
     }

     public function edit($id)
     {
            $data = [
            'title' => 'Form Ubah Data Sparepart',
             'validation' => \Config\Services::validation(),
             'sparepart' => $this->sparepartModel->getDatabase($id),
        ];

        return view('sparepart/edit', $data); 
     }

     public function update($id)
     {
          $id = url_title($this->request->getVar('id'), ' ', false);

          $dataLama =$this->sparepartModel->find($id);

          $fileGambar = $this->request->getFile('gambar_dokumen');

          if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
            $namaGambarBaru = $fileGambar->getRandomName();
            $fileGambar->move('uploads/' , $namaGambarBaru);

            if (!empty($dataLama['gambar_dokumen']) && file_exists('uploads/' . $dataLama['gambar_dokumen'])) {
                unlink('uploads/' . $dataLama['gambar_dokumen']);
            }
          } else {
            $namaGambarBaru = $dataLama['gambar_dokumen'];
          }

        $this->sparepartModel->save([
            
            'nama_sparepart' => $this->request->getVar('nama_sparepart'),
            'kode_sparepart' => $this->request->getVar('kode_sparepart'),
            'stock_east' => $this->request->getVar('stock_east'),
            'stock_west' => $this->request->getVar('stock_west'),
            'gambar_dokumen' => $namaGambarBaru,
            'detail_part' => $this->request->getVar('detail_part'),
            'created_by' => user()->username
        ]);

          session()->setFlashdata('pesan', 'DATA BERHASIL DI UBAH');

        return redirect()->to('/sparepart');
     }

}
