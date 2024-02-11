<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\damage;
use App\Models\indemnity;
use App\Models\insurance;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Csv;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class generateAdminReportController extends Controller
{
    //exporting insurance 
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
    //generate report for damage
    public function createPDFDamage() {
       $damages = damage::all();
       $pdf = PDF::loadView('pdf_damage_view', compact('damages'))->setPaper('a4', 'landscape');

       $pdf->render();
       $dompdf = $pdf->getDomPDF();
       $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
       $dompdf->get_canvas()->page_text(34, 18, "{PAGE_NUM} / {PAGE_COUNT}", $font, 10, array(0, 0, 0));
       
       return $pdf->download('damages.pdf');
    }
    public function createExcelDamage() {
        // Fetch insurance data from the database
        $damages = damage::all();

        // Check if any insurances are found
        if ($damages->isEmpty()) {
            return abort(404, 'No insurance data found');
        }

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set the active worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Set the header row based on model attributes (replace with desired fields)
        $worksheet->setCellValue('A1', 'Notice of Loss ID');
        $worksheet->setCellValue('B1', 'Farmer\'s ID');
        $worksheet->setCellValue('C1', 'RSBSA');
        $worksheet->setCellValue('D1', 'First Name');
        $worksheet->setCellValue('E1', 'Middle Name');
        $worksheet->setCellValue('F1', 'Last Name');
        $worksheet->setCellValue('G1', 'Extension Name');
        $worksheet->setCellValue('H1', 'Barangay Address');
        $worksheet->setCellValue('I1', 'Crop Insurance ID');
        $worksheet->setCellValue('J1', 'Crops');
        $worksheet->setCellValue('K1', 'Insurance Type');
        $worksheet->setCellValue('L1', 'Area Insured');
        $worksheet->setCellValue('M1', 'CIC Number');
        $worksheet->setCellValue('N1', 'Damage Cause');
        $worksheet->setCellValue('O1', 'Extent of Damage');
        $worksheet->setCellValue('P1', 'Date of Loss');
        $worksheet->setCellValue('Q1', 'Growth Stage');
        $worksheet->setCellValue('R1', 'Area Damage');
        $worksheet->setCellValue('S1', 'Harvest Date');
        $worksheet->setCellValue('T1', 'Farm Location');
        $worksheet->setCellValue('U1', 'Date Submitted');

        // Add data to the worksheet
        $row = 2;
        foreach ($damages as $damage) {
            $worksheet->setCellValue('A' . $row, $damage->id);
            $worksheet->setCellValue('B' . $row, $damage->farmersID);
            $worksheet->setCellValue('C' . $row, $damage->rsbsa);
            $worksheet->setCellValue('D' . $row, $damage->firstName);
            $worksheet->setCellValue('E' . $row, $damage->middleName);
            $worksheet->setCellValue('F' . $row, $damage->lastName);
            $worksheet->setCellValue('G' . $row, $damage->extensioName);
            $worksheet->setCellValue('H' . $row, $damage->barangayAddress);
            $worksheet->setCellValue('I' . $row, $damage->cropInsuranceID);
            $worksheet->setCellValue('J' . $row, $damage->cropName);
            $worksheet->setCellValue('K' . $row, $damage->insuranceType);
            $worksheet->setCellValue('L' . $row, $damage->areaInsured);
            $worksheet->setCellValue('M' . $row, $damage->cicNumber);
            $worksheet->setCellValue('N' . $row, $damage->damageCause);
            $worksheet->setCellValue('O' . $row, $damage->extentDamage);
            $worksheet->setCellValue('P' . $row, $damage->dateLoss);
            $worksheet->setCellValue('Q' . $row, $damage->growthStage);
            $worksheet->setCellValue('R' . $row, $damage->areaDamage);
            $worksheet->setCellValue('S' . $row, $damage->dateHarvest);
            $worksheet->setCellValue('T' . $row, $damage->barangayFarm);
            $worksheet->setCellValue('U' . $row, $damage->dateSubmitted);
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
        $worksheet->getColumnDimension('N')->setAutoSize(true);
        $worksheet->getColumnDimension('O')->setAutoSize(true);
        $worksheet->getColumnDimension('Q')->setAutoSize(true);
        $worksheet->getColumnDimension('R')->setAutoSize(true);
        $worksheet->getColumnDimension('S')->setAutoSize(true);
        $worksheet->getColumnDimension('T')->setAutoSize(true);
        $worksheet->getColumnDimension('U')->setAutoSize(true);

        // Create the writer object
        $writer = new Xlsx($spreadsheet);

        // Set the filename for the exported file
        $filename = 'notice_of_loss.xlsx';

        // Output the file to the browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }
    public function exportCsvDamage(){
        // Fetch notice of loss data from the database
        $damages = damage::all();

        // Check if any insurances are found
        if ($damages->isEmpty()) {
            return abort(404, 'No insurance data found');
        }

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();

        // Set the active worksheet
        $worksheet = $spreadsheet->getActiveSheet();

        // Set the header row
        $worksheet->setCellValue('A1', 'Notice of Loss ID');
        $worksheet->setCellValue('B1', 'Farmer\'s ID');
        $worksheet->setCellValue('C1', 'RSBSA');
        $worksheet->setCellValue('D1', 'First Name');
        $worksheet->setCellValue('E1', 'Middle Name');
        $worksheet->setCellValue('F1', 'Last Name');
        $worksheet->setCellValue('G1', 'Extension Name');
        $worksheet->setCellValue('H1', 'Barangay Address');
        $worksheet->setCellValue('I1', 'Crop Insurance ID');
        $worksheet->setCellValue('J1', 'Crops');
        $worksheet->setCellValue('K1', 'Insurance Type');
        $worksheet->setCellValue('L1', 'Area Insured');
        $worksheet->setCellValue('M1', 'CIC Number');
        $worksheet->setCellValue('N1', 'Damage Cause');
        $worksheet->setCellValue('O1', 'Extentof Damage');
        $worksheet->setCellValue('P1', 'Date of Loss');
        $worksheet->setCellValue('Q1', 'Growth Stage');
        $worksheet->setCellValue('R1', 'Area Damage');
        $worksheet->setCellValue('S1', 'Harvest Date');
        $worksheet->setCellValue('T1', 'Farm Location');
        $worksheet->setCellValue('U1', 'Date Submitted');

        // Set data starting from row 2
        $row = 2;
        foreach ($damages as $damage) {
            $worksheet->setCellValue('A' . $row, $damage->id);
            $worksheet->setCellValue('B' . $row, $damage->farmersID);
            $worksheet->setCellValue('C' . $row, $damage->rsbsa);
            $worksheet->setCellValue('D' . $row, $damage->firstName);
            $worksheet->setCellValue('E' . $row, $damage->middleName);
            $worksheet->setCellValue('F' . $row, $damage->lastName);
            $worksheet->setCellValue('G' . $row, $damage->extensioName);
            $worksheet->setCellValue('H' . $row, $damage->barangayAddress);
            $worksheet->setCellValue('I' . $row, $damage->cropInsuranceID);
            $worksheet->setCellValue('J' . $row, $damage->cropName);
            $worksheet->setCellValue('K' . $row, $damage->insuranceType);
            $worksheet->setCellValue('L' . $row, $damage->areaInsured);
            $worksheet->setCellValue('M' . $row, $damage->cicNumber);
            $worksheet->setCellValue('N' . $row, $damage->damageCause);
            $worksheet->setCellValue('O' . $row, $damage->extentDamage);
            $worksheet->setCellValue('P' . $row, $damage->dateLoss);
            $worksheet->setCellValue('Q' . $row, $damage->growthStage);
            $worksheet->setCellValue('R' . $row, $damage->areaDamage);
            $worksheet->setCellValue('S' . $row, $damage->dateHarvest);
            $worksheet->setCellValue('T' . $row, $damage->barangayFarm);
            $worksheet->setCellValue('U' . $row, $damage->dateSubmitted);
            $row++;
        }

        // Create the writer object
        $writer = new Csv($spreadsheet);

        // Set the filename for the exported file
        $filename = 'notice_of_loss.csv';

        // Output the file to the browser
        header('Content-Type: application/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }
    //generate report for indemnity
    public function createPDFIndemnity() {
        $indemnities = indemnity::all();
        $pdf = PDF::loadView('pdf_indemnity_view', compact('indemnities'))->setPaper('a4', 'landscape');
 
        $pdf->render();
        $dompdf = $pdf->getDomPDF();
        $font = $dompdf->getFontMetrics()->get_font("helvetica", "bold");
        $dompdf->get_canvas()->page_text(34, 18, "{PAGE_NUM} / {PAGE_COUNT}", $font, 10, array(0, 0, 0));
        
        return $pdf->download('indemnity.pdf');
     }
     public function createExcelIndemnity() {
         // Fetch insurance data from the database
         $indemnities = indemnity::all();
 
         // Check if any insurances are found
         if ($indemnities->isEmpty()) {
             return abort(404, 'No insurance data found');
         }
 
         // Create a new Spreadsheet object
         $spreadsheet = new Spreadsheet();
 
         // Set the active worksheet
         $worksheet = $spreadsheet->getActiveSheet();
 
         // Set the header row based on model attributes (replace with desired fields)
         $worksheet->setCellValue('A1', 'Indemnity ID');
         $worksheet->setCellValue('B1', 'Farmer\'s ID');
         $worksheet->setCellValue('C1', 'First Name');
         $worksheet->setCellValue('D1', 'Middle Name');
         $worksheet->setCellValue('E1', 'Last Name');
         $worksheet->setCellValue('F1', 'Extension Name');
         $worksheet->setCellValue('G1', 'Barangay');
         $worksheet->setCellValue('H1', 'Insurance ID');
         $worksheet->setCellValue('I1', 'Crops');
         $worksheet->setCellValue('J1', 'Insurance Type');
         $worksheet->setCellValue('K1', 'Area Insured');
         $worksheet->setCellValue('L1', 'CIC Number');
         $worksheet->setCellValue('M1', 'Damage Cause');
         $worksheet->setCellValue('N1', 'Date of Loss');
         $worksheet->setCellValue('O1', 'Harvest Date');
         $worksheet->setCellValue('P1', 'Farm Location');
         $worksheet->setCellValue('Q1', 'Claiming Date');
         $worksheet->setCellValue('R1', 'Amount to Claim');
         $worksheet->setCellValue('S1', 'Received By');
         $worksheet->setCellValue('T1', 'Date Received By');
 
         // Add data to the worksheet
         $row = 2;
         foreach ($indemnities as $indemnity) {
             $worksheet->setCellValue('A' . $row, $indemnity->id);
             $worksheet->setCellValue('B' . $row, $indemnity->farmersID);
             $worksheet->setCellValue('C' . $row, $indemnity->firstName);
             $worksheet->setCellValue('D' . $row, $indemnity->middleName);
             $worksheet->setCellValue('E' . $row, $indemnity->lastName);
             $worksheet->setCellValue('F' . $row, $indemnity->extensioName);
             $worksheet->setCellValue('G' . $row, $indemnity->barangayAddress);
             $worksheet->setCellValue('H' . $row, $indemnity->cropInsuranceID);
             $worksheet->setCellValue('I' . $row, $indemnity->cropName);
             $worksheet->setCellValue('J' . $row, $indemnity->insuranceType);
             $worksheet->setCellValue('K' . $row, $indemnity->areaInsured);
             $worksheet->setCellValue('L' . $row, $indemnity->cicNumber);
             $worksheet->setCellValue('M' . $row, $indemnity->damageCause);
             $worksheet->setCellValue('N' . $row, $indemnity->dateLoss);
             $worksheet->setCellValue('O' . $row, $indemnity->dateHarvest);
             $worksheet->setCellValue('P' . $row, $indemnity->barangayFarm);
             $worksheet->setCellValue('Q' . $row, $indemnity->dateClaiming);
             $worksheet->setCellValue('R' . $row, $indemnity->amountToClaim);
             $worksheet->setCellValue('S' . $row, $indemnity->receivedBy);
             $worksheet->setCellValue('T' . $row, $indemnity->dateReceivedBy);
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
         $worksheet->getColumnDimension('N')->setAutoSize(true);
         $worksheet->getColumnDimension('O')->setAutoSize(true);
         $worksheet->getColumnDimension('Q')->setAutoSize(true);
         $worksheet->getColumnDimension('R')->setAutoSize(true);
         $worksheet->getColumnDimension('S')->setAutoSize(true);
         $worksheet->getColumnDimension('T')->setAutoSize(true);
 
         // Create the writer object
         $writer = new Xlsx($spreadsheet);
 
         // Set the filename for the exported file
         $filename = 'indemnity.xlsx';
 
         // Output the file to the browser
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment;filename="' . $filename . '"');
         header('Cache-Control: max-age=0');
         $writer->save('php://output');
         exit;
     }
     public function exportCsvIndemnity(){
         // Fetch notice of loss data from the database
         $indemnities = indemnity::all();
 
         // Check if any insurances are found
         if ($indemnities->isEmpty()) {
             return abort(404, 'No insurance data found');
         }
 
         // Create a new Spreadsheet object
         $spreadsheet = new Spreadsheet();
 
         // Set the active worksheet
         $worksheet = $spreadsheet->getActiveSheet();
 
         // Set the header row
         $worksheet->setCellValue('A1', 'Indemnity ID');
         $worksheet->setCellValue('B1', 'Farmer\'s ID');
         $worksheet->setCellValue('C1', 'First Name');
         $worksheet->setCellValue('D1', 'Middle Name');
         $worksheet->setCellValue('E1', 'Last Name');
         $worksheet->setCellValue('F1', 'Extension Name');
         $worksheet->setCellValue('G1', 'Barangay');
         $worksheet->setCellValue('H1', 'Insurance ID');
         $worksheet->setCellValue('I1', 'Crops');
         $worksheet->setCellValue('J1', 'Insurance Type');
         $worksheet->setCellValue('K1', 'Area Insured');
         $worksheet->setCellValue('L1', 'CIC Number');
         $worksheet->setCellValue('M1', 'Damage Cause');
         $worksheet->setCellValue('N1', 'Date of Loss');
         $worksheet->setCellValue('O1', 'Harvest Date');
         $worksheet->setCellValue('P1', 'Farm Location');
         $worksheet->setCellValue('Q1', 'Claiming Date');
         $worksheet->setCellValue('R1', 'Amount to Claim');
         $worksheet->setCellValue('S1', 'Received By');
         $worksheet->setCellValue('T1', 'Date Received By');
         // Set data starting from row 2
         $row = 2;
         foreach ($indemnities as $indemnity) {
            $worksheet->setCellValue('A' . $row, $indemnity->id);
            $worksheet->setCellValue('B' . $row, $indemnity->farmersID);
            $worksheet->setCellValue('C' . $row, $indemnity->firstName);
            $worksheet->setCellValue('D' . $row, $indemnity->middleName);
            $worksheet->setCellValue('E' . $row, $indemnity->lastName);
            $worksheet->setCellValue('F' . $row, $indemnity->extensioName);
            $worksheet->setCellValue('G' . $row, $indemnity->barangayAddress);
            $worksheet->setCellValue('H' . $row, $indemnity->cropInsuranceID);
            $worksheet->setCellValue('I' . $row, $indemnity->cropName);
            $worksheet->setCellValue('J' . $row, $indemnity->insuranceType);
            $worksheet->setCellValue('K' . $row, $indemnity->areaInsured);
            $worksheet->setCellValue('L' . $row, $indemnity->cicNumber);
            $worksheet->setCellValue('M' . $row, $indemnity->damageCause);
            $worksheet->setCellValue('N' . $row, $indemnity->dateLoss);
            $worksheet->setCellValue('O' . $row, $indemnity->dateHarvest);
            $worksheet->setCellValue('P' . $row, $indemnity->barangayFarm);
            $worksheet->setCellValue('Q' . $row, $indemnity->dateClaiming);
            $worksheet->setCellValue('R' . $row, $indemnity->amountToClaim);
            $worksheet->setCellValue('S' . $row, $indemnity->receivedBy);
            $worksheet->setCellValue('T' . $row, $indemnity->dateReceivedBy);
             $row++;
         }
 
         // Create the writer object
         $writer = new Csv($spreadsheet);
 
         // Set the filename for the exported file
         $filename = 'indemnity.csv';
 
         // Output the file to the browser
         header('Content-Type: application/csv');
         header('Content-Disposition: attachment; filename="' . $filename . '"');
         header('Cache-Control: max-age=0');
         $writer->save('php://output');
         exit;
     }

}

