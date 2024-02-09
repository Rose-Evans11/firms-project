<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Models\insurance;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

class generateAdminReportController extends Controller
{
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
}

