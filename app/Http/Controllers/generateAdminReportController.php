<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class generateAdminReportController extends Controller
{
    public function createExcel() {
        

       $insurances = insurance::all();
       Excel::create($sheetname, function($excel) use ($insurances) {
        // Set the spreadsheet title, creator, and description
        $excel->setTitle('Insurance Report');
        $excel->setCreator('FIRMS')->setCompany('Tanauan City of Agriculturist');
        $excel->setDescription('Insurance Report');
        // Build the spreadsheet, passing in the payments array
        $excel->sheet('sheet1', function($sheet) use ($insurances) {
        $sheet->fromArray($insurances, null, 'A1', false, false);
        });
        })->download('xlsx');
        
    
    }
}
