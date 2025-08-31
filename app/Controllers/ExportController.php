<?php

namespace App\Controllers;

use App\Models\UserModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends BaseController
{
    public function exportUsers()
    {
        $userModel = new UserModel();
        $users = $userModel->findAll(); // ambil semua data user

        // Buat objek Spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom Excel
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Username');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Created At');

        // Isi data dari database
// Isi data dari database
$row = 2;
foreach ($users as $user) {
    $sheet->setCellValue('A' . $row, $user->id);
    $sheet->setCellValue('B' . $row, $user->username);
    $sheet->setCellValue('C' . $row, $user->email);
    $sheet->setCellValue('D' . $row, $user->created_at);
    $row++;
}

// Auto size kolom A sampai D
foreach (range('A', 'D') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
}

        // Set nama file Excel
        $fileName = 'users_export.xlsx';

        // Output ke browser (download file)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit();
    }
}
