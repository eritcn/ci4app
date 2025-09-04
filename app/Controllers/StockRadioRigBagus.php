<?php

namespace App\Controllers;


use App\Models\StockRadioRigBagusModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Dompdf\Dompdf;  
use PhpOffice\PhpSpreadsheet\IOFactory;



class StockRadioRigBagus extends BaseController
{
    protected $stockradiorigbagusModel;
    protected $db;

    public function __construct()
    {
        $this->stockradiorigbagusModel = new StockRadioRigBagusModel();
        $this->db             = db_connect();
    }

    public function index(): string
    {
        $currentPage = $this->request->getVar('page_stock_radio_rig_bagus') ?? 1;
        $keyword     = strtolower(trim($this->request->getVar('keyword')));

        // Query untuk filter pencarian "limit" atau keyword lain
        $query = $this->db->table('stock_radio_rig_bagus');
        if (!empty($keyword)) {
            if ($keyword === "limit") {
                $query->groupStart()
                    ->where('CAST(stok_east AS UNSIGNED) <=', 5)
                    ->orWhere('CAST(stok_west AS UNSIGNED) <=', 5)
                    ->groupEnd();
            } else {
                $query->like('merk', $keyword)
                    ->orLike('type', $keyword)
                    ->orLike('serial_number', $keyword)
                    ->orLike('keterangan', $keyword)
                    ->orLike('posisi', $keyword)
                    ->orLike('updated_by', $keyword)
                    ->orLike('created_by', $keyword);
            }
        }
        $data['result'] = $query->get()->getResultArray();

        // Ambil data sparepart dengan pagination
        $stockradiorigbagus = $keyword
            ? $this->stockradiorigbagusModel->search($keyword)->orderBy('created_at', 'DESC')
            : $this->stockradiorigbagusModel->orderBy('created_at', 'DESC');

        $data = [
            'title'       => 'Daftar Stock RadioRig Bagus',
            'stock_radio_rig_bagus'   => $stockradiorigbagus->paginate(6, 'stock_radio_rig_bagus'),
            'pager'       => $this->stockradiorigbagusModel->pager,
            'currentPage' => $currentPage,
            'keyword'     => $keyword,
        ];

        return view('stock_radio_rig_bagus', $data);
    }

    public function detail($id)
    {
        $stockradiorigbagus = $this->stockradiorigbagusModel->find($id);

        if (empty($stockradiorigbagus)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data dengan ID $id tidak ditemukan");
        }

        return view('stock_radio_rig_bagus/detail', [
            'title'     => 'Detail Stock Radio Rig Bagus',
            'sparepart' => $stockradiorigbagus,
        ]);
    }

    public function create()
    {
        return view('stock_radio_rig_bagus/create', [
            'title'      => 'Form Tambah Stock Radio Rig Bagus',
            'validation' => \Config\Services::validation(),
        ]);
    }

    public function save()
    {
        $rules = [
            'merk' => 'required',
            'serial_number' => 'required|is_unique[stock_radio_rig_bagus.serial_number]',
            'type'      => 'required',
            'keterangan'      => 'required',
            'posisi'      => 'required',
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
            return view('stock_radio_rig_bagus/create', [
                'title'      => 'Form Tambah Stock Radio Rig Bagus',
                'validation' => $this->validator,
            ]);
        }

        $fileGambar = $this->request->getFile('gambar_dokumen');
        $namaFile   = $fileGambar->getRandomName();
        $fileGambar->move('uploads', $namaFile);

        $this->stockradiorigbagusModel->save([
            'merk' => $this->request->getVar('merk'),
            'type' => $this->request->getVar('type'),
            'serial_number'      => $this->request->getVar('serial_number'),
            'keterangan'      => $this->request->getVar('keterangan'),
            'posisi'    => $this->request->getVar('posisi'),
            'gambar_dokumen' => $namaFile,
            'created_by'     => user()->username,
        ]);

        session()->setFlashdata('pesan', 'DATA BERHASIL DITAMBAHKAN');
        return redirect()->to('/stock_radio_rig_bagus');
    }

public function delete($id)
{
    $stockradiorigbagus = $this->stockradiorigbagusModel->find($id);

    if (!$stockradiorigbagus) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Data tidak ditemukan");
    }

    // Hapus file gambar jika ada
    if ($stockradiorigbagus['gambar_dokumen'] && file_exists('uploads/' . $stockradiorigbagus['gambar_dokumen'])) {
        unlink('uploads/' . $stockradiorigbagus['gambar_dokumen']);
    }

    $this->stockradiorigbagusModel->delete($id);

    session()->setFlashdata('pesan', 'DATA BERHASIL DIHAPUS');
    return redirect()->to('/stock_radio_rig_bagus');
}

public function edit($id)
{
    $stockradiorigbagus = $this->stockradiorigbagusModel->find($id);

    if (!$stockradiorigbagus) {
        throw new \CodeIgniter\Exceptions\PageNotFoundException("Data dengan ID $id tidak ditemukan");
    }
     
    $isAdmin = in_groups('admin'); // true/false

    return view('stock_radio_rig_bagus/edit', [
        'title'      => 'Form Edit Stock Radio Rig Bagus',
        'validation' => \Config\Services::validation(),
        'stock_radio_rig_bagus'  => $stockradiorigbagus,
        'isAdmin'    => $isAdmin,   // ⬅️ kirim ke view
    ]);
}

public function update($id)
{
    $rules = [
        'merk' => 'required',
        'serial_number' => "required|is_unique[stock_radio_rig_bagus.serial_number,id,{$id}]",
        'type'      => 'required|integer',
        'keterangan'      => 'required|integer',
        'posisi'    => 'required',
    ];

    if (!$this->validate($rules)) {
        return redirect()->to("/stock_radio_rig_bagus/edit/$id")->withInput();
    }

    $fileGambar = $this->request->getFile('gambar_dokumen');

    if ($fileGambar && $fileGambar->isValid() && !$fileGambar->hasMoved()) {
        $namaFile = $fileGambar->getRandomName();
        $fileGambar->move('uploads', $namaFile);
    } else {
        $namaFile = $this->request->getVar('gambar_lama');
    }

    $this->stockradiorigbagusModel->update($id, [
        'merk' => $this->request->getVar('merk'),
        'type' => $this->request->getVar('type'),
        'serial_number'      => $this->request->getVar('serial_number'),
        'keterangan'      => $this->request->getVar('keterangan'),
        'posisi'    => $this->request->getVar('posisi'),
        'gambar_dokumen' => $namaFile,
        'updated_by'     => user()->username,
    ]);

    session()->setFlashdata('pesan', 'DATA BERHASIL DIUPDATE');
    return redirect()->to('/stock_radio_rig_bagus');
}

public function exportStockRadioRigBagusExcel()
{
    if (!in_groups('admin')) {
        return redirect()->to('/dashboard')->with('error', 'Anda tidak punya akses ke fitur ini.');
    }

    $radios = $this->stockradiorigbagusModel->findAll();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Judul
    $sheet->setCellValue('A1', 'DATA STOCK RADIO RIG BAGUS - INVENTORY');
    $sheet->mergeCells('A1:H1');
    $sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
    $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

    // Header tabel
    $headers = ['ID', 'Merk', 'Type', 'Serial Number', 'Keterangan', 'Posisi', 'Created By', 'Updated By'];
    $col = 'A';
    foreach ($headers as $h) {
        $sheet->setCellValue($col . '3', $h);
        $col++;
    }

    // Styling header
    $sheet->getStyle('A3:H3')->applyFromArray([
        'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
        'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
        'fill' => ['fillType' => Fill::FILL_SOLID, 'startColor' => ['rgb' => '4F81BD']]
    ]);

    // Isi data
    $row = 4;
    foreach ($radios as $r) {
        $sheet->setCellValue('A' . $row, $r['id']);
        $sheet->setCellValue('B' . $row, $r['merk']);
        $sheet->setCellValue('C' . $row, $r['type']);
        $sheet->setCellValue('D' . $row, $r['serial_number']);
        $sheet->setCellValue('E' . $row, $r['keterangan']);
        $sheet->setCellValue('F' . $row, $r['posisi']);
        $sheet->setCellValue('G' . $row, $r['created_by']);
        $sheet->setCellValue('H' . $row, $r['updated_by']);

        // Border tiap baris
        $sheet->getStyle('A' . $row . ':H' . $row)->applyFromArray([
            'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]]
        ]);

        $row++;
    }

    // Footer total data
    $sheet->setCellValue('A' . $row, 'Total Data');
    $sheet->setCellValue('B' . $row, count($radios));
    $sheet->mergeCells('A' . $row . ':B' . $row);
    $sheet->getStyle('A' . $row . ':B' . $row)->getFont()->setBold(true);

    // Auto-size kolom
    foreach (range('A', 'H') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    // Export
    $writer = new Xlsx($spreadsheet);
    $filename = 'StockRadioRigBagus_' . date('Ymd_His') . '.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $filename . '"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    exit;
}


public function exportStockRadioRigBagusPdf()
{
    if (!in_groups('admin')) {
        return redirect()->to('/dashboard')->with('error', 'Anda tidak punya akses ke fitur ini.');
    }

    $stockradiorigbagus = $this->stockradiorigbagusModel->findAll();

    // Siapkan HTML untuk Dompdf
    $html = '
    <h3 style="text-align:center;">DATA STOCK RADIO RIG SISTEM INVENTORY</h3>
    <table border="1" cellpadding="5" cellspacing="0" width="100%" style="border-collapse:collapse; font-size:12px;">
        <thead>
            <tr style="background-color:#4F81BD; color:#fff; text-align:center;">
                <th>ID</th>
                <th>Merk</th>
                <th>Type</th>
                <th>Serial Number</th>
                <th>Keterangan</th>
                <th>Posisi</th>
                <th>Created By</th>
                <th>Updated By</th>
            </tr>
        </thead>
        <tbody>';

    foreach ($stockradiorigbagus as $sb) {
    
        $html .= '
            <tr>
                <td style="text-align:center;">' . $sb['id'] . '</td>
                <td>' . $sb['merk'] . '</td>
                <td>' . $sb['type'] . '</td>
                <td>' . $sb['serial_number'] . '</td>
                <td>' . $sb['keterangan'] . '</td>
                <td>' . $sb['posisi'] . '</td>
                <td>' . $sb['created_by'] . '</td>
                <td>' . $sb['updated_by'] . '</td>
            </tr>';
    }

    $html .= '
        </tbody>
    </table>
    <br>
    <p><b>Total Data:</b> ' . count($stockradiorigbagus) . '</p>
    <p><b>Tanggal Export:</b> ' . date('d-m-Y H:i:s') . '</p>
    ';

    // Generate PDF dengan Dompdf
    $dompdf = new \Dompdf\Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $dompdf->stream('Data_Stock_Bagus' . date('Ymd_His') . '.pdf', ["Attachment" => false]);
}


public function importStockRadioRigBagus()
{
    $file = $this->request->getFile('file_excel');

    if ($file && $file->isValid() && !$file->hasMoved()) {
        $extension = $file->getClientExtension();

        if (in_array($extension, ['xls', 'xlsx'])) {
            $spreadsheet = IOFactory::load($file->getTempName());
            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            // Lewati header (baris 1–2)
            for ($i = 3; $i < count($sheetData); $i++) {
                $row = $sheetData[$i];

                if (!array_filter($row)) continue; // skip baris kosong

                $data = [
                    'merk'          => $row[1] ?? null,
                    'type'          => $row[2] ?? null,
                    'serial_number' => $row[3] ?? null,
                    'keterangan'    => $row[4] ?? null,
                    'posisi'        => $row[5] ?? null,
                    'created_by'    => $row[6] ?? 'system',
                    'updated_by'    => $row[7] ?? 'system',
                ];

                // Insert hanya jika serial number belum ada
                if (!$this->stockradiorigbagusModel->where('serial_number', $data['serial_number'])->first()) {
                    $this->stockradiorigbagusModel->insert($data);
                }
            }

            return redirect()->to('/stock_radio_rig_bagus')->with('success', 'Data berhasil diimport dari Excel!');
        } else {
            return redirect()->back()->with('error', 'Format file tidak didukung. Gunakan xls/xlsx.');
        }
    }

    return redirect()->back()->with('error', 'File tidak valid atau gagal diupload.');
}




}
