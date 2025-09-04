<?php

namespace App\Controllers;


use App\Models\SparepartModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Dompdf\Dompdf;  
use PhpOffice\PhpSpreadsheet\IOFactory;



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

    if (!$sparepart) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan");
    }

    // Hapus file gambar jika ada
    if ($sparepart['gambar_dokumen'] && file_exists('uploads/' . $sparepart['gambar_dokumen'])) {
        unlink('uploads/' . $sparepart['gambar_dokumen']);
    }

    $this->sparepartModel->delete($id);

    session()->setFlashdata('pesan', 'DATA BERHASIL DIHAPUS');
    return redirect()->to('/sparepart');
}

public function edit($id)
{
    $sparepart = $this->sparepartModel->find($id);

    if (!$sparepart) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Data dengan ID $id tidak ditemukan");
    }
     
    $isAdmin = in_groups('admin'); // true/false

    return view('sparepart/edit', [
        'title'      => 'Form Edit Sparepart',
        'validation' => \Config\Services::validation(),
        'sparepart'  => $sparepart,
        'isAdmin'    => $isAdmin,   // ⬅️ kirim ke view
    ]);
}

public function update($id)
{
    $rules = [
        'nama_sparepart' => 'required',
        'kode_sparepart' => "required|is_unique[sparepart.kode_sparepart,id,{$id}]",
        'stok_east'      => 'required|integer',
        'stok_west'      => 'required|integer',
        'detail_part'    => 'required',
    ];

    if (!$this->validate($rules)) {
        return redirect()->to("/sparepart/edit/$id")->withInput();
    }

    $fileGambar = $this->request->getFile('gambar_dokumen');

    if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
        $namaFile = $fileGambar->getRandomName();
        $fileGambar->move('uploads', $namaFile);
    } else {
        $namaFile = $this->request->getVar('gambar_lama');
    }

    $this->sparepartModel->update($id, [
        'nama_sparepart' => $this->request->getVar('nama_sparepart'),
        'kode_sparepart' => $this->request->getVar('kode_sparepart'),
        'stok_east'      => $this->request->getVar('stok_east'),
        'stok_west'      => $this->request->getVar('stok_west'),
        'detail_part'    => $this->request->getVar('detail_part'),
        'gambar_dokumen' => $namaFile,
        'updated_by'     => user()->username,
    ]);

    session()->setFlashdata('pesan', 'DATA BERHASIL DIUPDATE');
    return redirect()->to('/sparepart');
}

  public function exportSparepart()
{
    if (!in_groups('admin')) {
        return redirect()->to('/dashboard')->with('error', 'Anda tidak punya akses ke fitur ini.');
    }

    $spareparts = $this->sparepartModel->findAll();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Logo
    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing->setName('Logo');
    $drawing->setDescription('Logo Perusahaan');
    $drawing->setPath(FCPATH . 'images/logo.png');
    $drawing->setHeight(35);
    $drawing->setCoordinates('A1');
    $drawing->setOffsetX(5);
    $drawing->setOffsetY(5);
    $drawing->setWorksheet($sheet);

    // Judul
    $sheet->setCellValue('B1', 'DATA SPAREPART SISTEM INVENTORY');
    $sheet->mergeCells('B1:H1');
    $sheet->getStyle('B1')->getFont()->setBold(true)->setSize(10);
    $sheet->getStyle('B1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    // Header tabel
    $headers = ['ID', 'Nama Sparepart', 'Kode Sparepart', 'Detail', 'Stock West', 'Stock East', 'Created By', 'Updated By'];
    $col = 'A';
    foreach ($headers as $h) {
        $sheet->setCellValue($col . '3', $h);
        $col++;
    }

    // Styling header
    $sheet->getStyle('A3:H3')->applyFromArray([
        'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
        'alignment' => [
            'horizontal' => Alignment::HORIZONTAL_CENTER,
            'vertical' => Alignment::VERTICAL_CENTER
        ],
        'borders' => [
            'allBorders' => ['borderStyle' => Border::BORDER_THIN]
        ],
        'fill' => [
            'fillType' => Fill::FILL_SOLID,
            'startColor' => ['rgb' => '4F81BD']
        ]
    ]);

    // Isi data
    $row = 4;
    foreach ($spareparts as $s) {
        $sheet->setCellValue('A' . $row, $s['id']);
        $sheet->setCellValue('B' . $row, $s['nama_sparepart']);
        $sheet->setCellValue('C' . $row, $s['kode_sparepart']);
        $sheet->setCellValue('D' . $row, $s['detail_part']);
        $sheet->setCellValue('E' . $row, $s['stok_west']);
        $sheet->setCellValue('F' . $row, $s['stok_east']);
        $sheet->setCellValue('G' . $row, $s['created_by']);
        $sheet->setCellValue('H' . $row, $s['updated_by']);

        // Border tiap baris
        $sheet->getStyle('A' . $row . ':H' . $row)->applyFromArray([
            'borders' => [
                'allBorders' => ['borderStyle' => Border::BORDER_THIN]
            ]
        ]);

        $row++;
    }

    // Tambahkan filter di header
    $sheet->setAutoFilter('A3:H3');

    // Conditional formatting stok <= 5 → merah
    $conditional = new \PhpOffice\PhpSpreadsheet\Style\Conditional();
    $conditional->setConditionType(\PhpOffice\PhpSpreadsheet\Style\Conditional::CONDITION_CELLIS)
        ->setOperatorType(\PhpOffice\PhpSpreadsheet\Style\Conditional::OPERATOR_LESSTHANOREQUAL)
        ->addCondition('5');
    $conditional->getStyle()->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FF0000');
    $conditional->getStyle()->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);

    // Terapkan ke kolom stok west & east
    $conditionalStyles = $sheet->getStyle('E4:F' . ($row - 1))->getConditionalStyles();
    $conditionalStyles[] = $conditional;
    $sheet->getStyle('E4:F' . ($row - 1))->setConditionalStyles($conditionalStyles);

    // Footer total data
    $sheet->setCellValue('A' . $row, 'Total Data');
    $sheet->setCellValue('B' . $row, count($spareparts));
    $sheet->mergeCells('A' . $row . ':B' . $row);
    $sheet->getStyle('A' . $row . ':B' . $row)->getFont()->setBold(true);

    // Tanggal export
    $row++;
    $sheet->setCellValue('A' . $row, 'Tanggal Export: ' . date('d-m-Y H:i:s'));
    $sheet->mergeCells('A' . $row . ':H' . $row);
    $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

    // Auto-size kolom
    foreach (range('A', 'H') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    // Export
    $writer = new Xlsx($spreadsheet);
    $filename = 'Data_Sparepart_' . date('Ymd_His') . '.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    exit;
}

public function exportSparepartPdf()
{
    if (!in_groups('admin')) {
        return redirect()->to('/dashboard')->with('error', 'Anda tidak punya akses ke fitur ini.');
    }

    $spareparts = $this->sparepartModel->findAll();

    // Siapkan HTML untuk Dompdf
    $html = '
    <h3 style="text-align:center;">DATA SPAREPART SISTEM INVENTORY</h3>
    <table border="1" cellpadding="5" cellspacing="0" width="100%" style="border-collapse:collapse; font-size:12px;">
        <thead>
            <tr style="background-color:#4F81BD; color:#fff; text-align:center;">
                <th>ID</th>
                <th>Nama Sparepart</th>
                <th>Kode Sparepart</th>
                <th>Detail</th>
                <th>Stock West</th>
                <th>Stock East</th>
                <th>Created By</th>
                <th>Updated By</th>
            </tr>
        </thead>
        <tbody>';

    foreach ($spareparts as $s) {
        // Conditional formatting: merah kalau stok < 5
        $stockWestStyle = ($s['stok_west'] <= 5) ? 'color:red; font-weight:bold;' : 'color:black;';
        $stockEastStyle = ($s['stok_east'] <= 5) ? 'color:red; font-weight:bold;' : 'color:black;';

        $html .= '
            <tr>
                <td style="text-align:center;">' . $s['id'] . '</td>
                <td>' . $s['nama_sparepart'] . '</td>
                <td>' . $s['kode_sparepart'] . '</td>
                <td>' . $s['detail_part'] . '</td>
                <td style="' . $stockWestStyle . ' text-align:center;">' . $s['stok_west'] . '</td>
                <td style="' . $stockEastStyle . ' text-align:center;">' . $s['stok_east'] . '</td>
                <td>' . $s['created_by'] . '</td>
                <td>' . $s['updated_by'] . '</td>
            </tr>';
    }

    $html .= '
        </tbody>
    </table>
    <br>
    <p><b>Total Data:</b> ' . count($spareparts) . '</p>
    <p><b>Tanggal Export:</b> ' . date('d-m-Y H:i:s') . '</p>
    ';

    // Generate PDF dengan Dompdf
    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('Data_Sparepart_' . date('Ymd_His') . '.pdf', ["Attachment" => false]);
}


public function importExcel()
{
    $file = $this->request->getFile('file_excel'); // ambil dulu objek file

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $extension = $file->getClientExtension();

        if (in_array($extension, ['xls', 'xlsx'])) {
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($file->getTempName());
            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            // Lewati header misal baris ke-3
            for ($i = 3; $i < count($sheetData); $i++) {
    $row = $sheetData[$i];

    // Skip baris kosong
    if (!array_filter($row)) continue;

    // Skip kalau sparepart utama kosong
    if (empty($row[1]) || empty($row[2])) continue;

    $data = [
        'nama_sparepart' => $row[1],
        'kode_sparepart' => $row[2],
        'detail_part'    => $row[3] ?? null,
        'stok_west'      => $row[4] ?? 0,
        'stok_east'      => $row[5] ?? 0,
        'created_by'     => $row[6] ?? 'system',
        'updated_by'     => $row[7] ?? 'system',
    ];

    $this->sparepartModel->insert($data);
}


            return redirect()->to('/sparepart')->with('success', 'Data berhasil diimport dari Excel!');
        } else {
            return redirect()->back()->with('error', 'Format file tidak didukung. Gunakan xls/xlsx.');
        }
    }

    return redirect()->back()->with('error', 'File tidak valid atau gagal diupload.');
}

public function importView()
{
    return view('sparepart/import_sparepart', [
        'title' => 'Import Data Sparepart'
    ]);
}



}
