<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\insurance;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class generateAdminReportController extends Controller
{
    //exporting excel
    public function createExcel() {
        // Fetch insurance data from the database
        $insurances = Insurance::all();

        // Check if any insurances are found
        if ($insurances->isEmpty()) {
            return abort(404, 'No insurance data found');
        }

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set the active worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Set the header row based on model attributes (replace with desired fields)
        $worksheet->setCellValue('A1', 'Insurance ID');
        $worksheet->setCellValue('B1', 'Crops');
        $worksheet->setCellValue('C1', 'Insurance Type');
        $worksheet->setCellValue('D1', 'Farmer\'s ID');
        $worksheet->setCellValue('E1', 'First Name');
        $worksheet->setCellValue('F1', 'Last Name');
        $worksheet->setCellValue('G1', 'Barangay');
        $worksheet->setCellValue('H1', 'City');
        $worksheet->setCellValue('I1', 'Date of Harvest');
        $worksheet->setCellValue('J1', 'Farm Location');
        $worksheet->setCellValue('K1', 'Date Created');
        $worksheet->setCellValue('L1', 'Status');
        $worksheet->setCellValue('M1', 'Status Note');

        // Add data to the worksheet
        $row = 2;
        foreach ($insurances as $insurance) {
            $worksheet->setCellValue('A' . $row, $insurance->id);
            $worksheet->setCellValue('B' . $row, $insurance->cropName);
            $worksheet->setCellValue('C' . $row, $insurance->insuranceType);
            $worksheet->setCellValue('D' . $row, $insurance->farmersID);
            $worksheet->setCellValue('E' . $row, $insurance->firstName);
            $worksheet->setCellValue('F' . $row, $insurance->lastName);
            $worksheet->setCellValue('G' . $row, $insurance->barangayAddress);
            $worksheet->setCellValue('H' . $row, $insurance->cityAddress);
            $worksheet->setCellValue('I' . $row, $insurance->dateHarvest);
            $worksheet->setCellValue('J' . $row, $insurance->barangayFarm);
            $worksheet->setCellValue('K' . $row, $insurance->created_at);
            $worksheet->setCellValue('L' . $row, $insurance->status);
            $worksheet->setCellValue('M' . $row, $insurance->statusNote);
            $row++;
        }

        // Set auto-size for columns
        $worksheet->getColumnDimension('A')->setAutoSize(true);
        $worksheet->getColumnDimension('B')->setAutoSize(true);
        $worksheet->getColumnDimension('C')->setAutoSize(true);
        $worksheet->getColumnDimension('D')->setAutoSize(true);
        $worksheet->getColumnDimension('E')->setAutoSize(true);
        $worksheet->getColumnDimension('F')->setAutoSize(true);
        $worksheet->getColumnDimension('G')->setAutoSize(true);
        $worksheet->getColumnDimension('H')->setAutoSize(true);
        $worksheet->getColumnDimension('I')->setAutoSize(true);
        $worksheet->getColumnDimension('J')->setAutoSize(true);
        $worksheet->getColumnDimension('K')->setAutoSize(true);
        $worksheet->getColumnDimension('L')->setAutoSize(true);
        $worksheet->getColumnDimension('M')->setAutoSize(true);

        // Create the writer object
        $writer = new Xlsx($spreadsheet);

        // Set the filename for the exported file
        $filename = 'insurance_export.xlsx';

        // Output the file to the browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    //exporting csv
    public function exportCsv(){
        // Fetch insurance data from the database
        $insurances = Insurance::all();

        // Check if any insurances are found
        if ($insurances->isEmpty()) {
            return abort(404, 'No insurance data found');
        }

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set the active worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Set the header row
        $worksheet->setCellValue('A1', 'Insurance ID');
        $worksheet->setCellValue('B1', 'Crops');
        $worksheet->setCellValue('C1', 'Insurance Type');
        $worksheet->setCellValue('D1', 'Farmer\'s ID');
        $worksheet->setCellValue('E1', 'First Name');
        $worksheet->setCellValue('F1', 'Last Name');
        $worksheet->setCellValue('G1', 'Barangay');
        $worksheet->setCellValue('H1', 'City');
        $worksheet->setCellValue('I1', 'Date of Harvest');
        $worksheet->setCellValue('J1', 'Farm Location');
        $worksheet->setCellValue('K1', 'Date Created');
        $worksheet->setCellValue('L1', 'Status');
        $worksheet->setCellValue('M1', 'Status Note');

        // Set data starting from row 2
        $row = 2;
        foreach ($insurances as $insurance) {
              $worksheet->setCellValue('A' . $row, $insurance->id);
            $worksheet->setCellValue('B' . $row, $insurance->cropName);
            $worksheet->setCellValue('C' . $row, $insurance->insuranceType);
            $worksheet->setCellValue('D' . $row, $insurance->farmersID);
            $worksheet->setCellValue('E' . $row, $insurance->firstName);
            $worksheet->setCellValue('F' . $row, $insurance->lastName);
            $worksheet->setCellValue('G' . $row, $insurance->barangayAddress);
            $worksheet->setCellValue('H' . $row, $insurance->cityAddress);
            $worksheet->setCellValue('I' . $row, $insurance->dateHarvest);
            $worksheet->setCellValue('J' . $row, $insurance->barangayFarm);
            $worksheet->setCellValue('K' . $row, $insurance->created_at);
            $worksheet->setCellValue('L' . $row, $insurance->status);
            $worksheet->setCellValue('M' . $row, $insurance->statusNote);
            $row++;
        }

        // Create the writer object
        $writer = new Csv($spreadsheet);

        // Set the filename for the exported file
        $filename = 'insurance_export.csv';

        // Output the file to the browser
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }


    //generate report for user
    public function createPDFUser() {
       $users = User::all();
       $pdf = PDF::loadView('pdf_user_view', compact('users'))->setPaper('a4', 'landscape');

       $pdf->render();
       $dompdf = $pdf->getDomPDF();
       $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
       $dompdf->get_canvas()->page_text(34, 18, "{PAGE_NUM} / {PAGE_COUNT}", $font, 10, array(0, 0, 0));
       
       return $pdf->download('user.pdf');
    }

    public function createExcelUser() {
        // Fetch insurance data from the database
        $users = User::all();

        // Check if any insurances are found
        if ($users->isEmpty()) {
            return abort(404, 'No insurance data found');
        }

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set the active worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Set the header row based on model attributes (replace with desired fields)
        $worksheet->setCellValue('A1', 'Farmer \'s ID');
        $worksheet->setCellValue('B1', 'RSBSA');
        $worksheet->setCellValue('C1', 'First Name');
        $worksheet->setCellValue('D1', 'Middle Name');
        $worksheet->setCellValue('E1', 'Last Name');
        $worksheet->setCellValue('F1', 'Extension Name');
        $worksheet->setCellValue('G1', 'isActive');
        $worksheet->setCellValue('H1', 'Barangay Address');
        $worksheet->setCellValue('I1', 'Contact Number');

        // Add data to the worksheet
        $row = 2;
        foreach ($users as $user) {
            $worksheet->setCellValue('A' . $row, $user->id);
            $worksheet->setCellValue('B' . $row, $user->rsbsa);
            $worksheet->setCellValue('C' . $row, $user->firstName);
            $worksheet->setCellValue('D' . $row, $user->middleName);
            $worksheet->setCellValue('E' . $row, $user->lastName);
            $worksheet->setCellValue('F' . $row, $user->extensionName);
            $worksheet->setCellValue('G' . $row, $user->isActive);
            $worksheet->setCellValue('H' . $row, $user->barangayAddress);
            $worksheet->setCellValue('I' . $row, $user->contactNumber);
            $row++;
        }

        // Set auto-size for columns
        $worksheet->getColumnDimension('A')->setAutoSize(true);
        $worksheet->getColumnDimension('B')->setAutoSize(true);
        $worksheet->getColumnDimension('C')->setAutoSize(true);
        $worksheet->getColumnDimension('D')->setAutoSize(true);
        $worksheet->getColumnDimension('E')->setAutoSize(true);
        $worksheet->getColumnDimension('F')->setAutoSize(true);
        $worksheet->getColumnDimension('G')->setAutoSize(true);
        $worksheet->getColumnDimension('H')->setAutoSize(true);
        $worksheet->getColumnDimension('I')->setAutoSize(true);

        // Create the writer object
        $writer = new Xlsx($spreadsheet);

        // Set the filename for the exported file
        $filename = 'farmer_export.xlsx';

        // Output the file to the browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    //exporting csv
    public function exportCsvUser(){
        // Fetch insurance data from the database
        $users = User::all();

        // Check if any insurances are found
        if ($users->isEmpty()) {
            return abort(404, 'No insurance data found');
        }

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set the active worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Set the header row
        $worksheet->setCellValue('A1', 'Farmer \'s ID');
        $worksheet->setCellValue('B1', 'RSBSA');
        $worksheet->setCellValue('C1', 'First Name');
        $worksheet->setCellValue('D1', 'Middle Name');
        $worksheet->setCellValue('E1', 'Last Name');
        $worksheet->setCellValue('F1', 'Extension Name');
        $worksheet->setCellValue('G1', 'isActive');
        $worksheet->setCellValue('H1', 'Barangay Address');
        $worksheet->setCellValue('I1', 'Contact Number');

        // Set data starting from row 2
        $row = 2;
        foreach ($users as $user) {
            $worksheet->setCellValue('A' . $row, $user->id);
            $worksheet->setCellValue('B' . $row, $user->rsbsa);
            $worksheet->setCellValue('C' . $row, $user->firstName);
            $worksheet->setCellValue('D' . $row, $user->middleName);
            $worksheet->setCellValue('E' . $row, $user->lastName);
            $worksheet->setCellValue('F' . $row, $user->extensionName);
            $worksheet->setCellValue('G' . $row, $user->isActive);
            $worksheet->setCellValue('H' . $row, $user->barangayAddress);
            $worksheet->setCellValue('I' . $row, $user->contactNumber);
            $row++;
        }

        // Create the writer object
        $writer = new Csv($spreadsheet);

        // Set the filename for the exported file
        $filename = 'farmer_export.csv';

        // Output the file to the browser
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }
}

