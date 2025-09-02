<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use App\Models\UserModel;
use Dompdf\Dompdf;

class ExportController extends BaseController
{
    
    
    public function exportExcel()
    {
        if (!in_groups('admin')) {
        return redirect()->to('/dashboard')->with('error', 'Anda tidak punya akses ke fitur ini.');
    }
        
        $users = new UserModel();
        $data = $users->findAll();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Tambahkan logo di pojok kiri atas
        $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
        $drawing->setName('Logo');
        $drawing->setDescription('Logo Perusahaan');
        $drawing->setPath(FCPATH . 'images/logo.png'); // pastikan path benar
        $drawing->setHeight(35); // ukuran logo (px)
        $drawing->setCoordinates('A1'); // posisi dasar
        $drawing->setOffsetX(5); // geser ke kanan 5px
        $drawing->setOffsetY(5); // geser ke bawah 5px
        $drawing->setWorksheet($sheet);


     // Judul
        $sheet->setCellValue('B1', 'DATA USERS SISTEM INVENTORY');
        $sheet->mergeCells('B1:D1');
        $sheet->getStyle('B1')->getFont()->setBold(true)->setSize(10);
        $sheet->getStyle('B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);


        // Header tabel
        $sheet->setCellValue('A3', 'ID');
        $sheet->setCellValue('B3', 'Nama');
        $sheet->setCellValue('C3', 'Email');

        // Styling header
        $sheet->getStyle('A3:C3')->applyFromArray([
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
        foreach ($data as $d) {
            $sheet->setCellValue('A' . $row, $d->id);
            $sheet->setCellValue('B' . $row, $d->username);
            $sheet->setCellValue('C' . $row, $d->email);

            // Border tiap baris
            $sheet->getStyle('A' . $row . ':C' . $row)->applyFromArray([
                'borders' => [
                    'allBorders' => ['borderStyle' => Border::BORDER_THIN]
                ]
            ]);

            // Zebra background
            if ($row % 2 == 0) {
                $sheet->getStyle('A' . $row . ':C' . $row)->getFill()
                    ->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()->setRGB('F2F2F2');
            }

            $row++;
        }

        // Footer total data
        $sheet->setCellValue('A' . $row, 'Total Data');
        $sheet->setCellValue('B' . $row, count($data));
        $sheet->mergeCells('A' . $row . ':B' . $row);
        $sheet->getStyle('A' . $row . ':B' . $row)->getFont()->setBold(true);

        // Tanggal export
        $row++;
        $sheet->setCellValue('A' . $row, 'Tanggal Export: ' . date('d-m-Y H:i:s'));
        $sheet->mergeCells('A' . $row . ':C' . $row);
        $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // Auto-size kolom
        foreach (range('A', 'C') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Export
        $writer = new Xlsx($spreadsheet);
        $filename = 'Data_Users_' . date('Ymd_His') . '.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

        public function testPdf()
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<h1>Test PDF Berhasil 🎉</h1><p>Sistem export PDF sudah siap dipakai!</p>');

        // Atur ukuran kertas & orientasi
        $dompdf->setPaper('A4', 'portrait');

        // Render dan tampilkan PDF
        $dompdf->render();
        $dompdf->stream("test.pdf", ["Attachment" => false]);
    }
   


}
