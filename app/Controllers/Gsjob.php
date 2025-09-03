<?php

namespace App\Controllers;

use App\Models\GsjobModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Dompdf\Dompdf;  
use PhpOffice\PhpSpreadsheet\IOFactory;

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

     public function exportGsjobPdf()
{
    if (!in_groups('admin')) {
        return redirect()->to('/dashboard')->with('error', 'Anda tidak punya akses ke fitur ini.');
    }

    $gsjob = $this->gsjobModel->findAll();

    // Siapkan HTML untuk Dompdf
    $html = '
    <h3 style="text-align:center;">LIST GS JOB</h3>
    <table border="1" cellpadding="5" cellspacing="0" width="100%" style="border-collapse:collapse; font-size:12px;">
        <thead>
            <tr style="background-color:#4F81BD; color:#fff; text-align:center;">
                <th>ID</th>
                <th>Tanggal</th>
                <th>Lokasi</th>
                <th>Pekerjaan</th>
                <th>Keterangan</th>
                <th>Status</th>
                <th>Created By</th>
                <th>Updated By</th>
            </tr>
        </thead>
        <tbody>';

    foreach ($gsjob as $g) {
    
        $html .= '
            <tr>
                <td style="text-align:center;">' . $g['id'] . '</td>
                <td>' . $g['tanggal'] . '</td>
                <td>' . $g['lokasi'] . '</td>
                <td>' . $g['slug'] . '</td>
                <td><img src="' . FCPATH . 'uploads/' . $g['keterangan'] . '" width="80"></td>
                <td>' . $g['status'] . '</td>
                <td>' . $g['created_by'] . '</td>
                <td>' . $g['updated_by'] . '</td>
            </tr>';
    }

    $html .= '
        </tbody>
    </table>
    <br>
    <p><b>Total Data:</b> ' . count($gsjob) . '</p>
    <p><b>Tanggal Export:</b> ' . date('d-m-Y H:i:s') . '</p>
    ';

    // Generate PDF dengan Dompdf
    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('Data_GS Job' . date('Ymd_His') . '.pdf', ["Attachment" => false]);
}

}