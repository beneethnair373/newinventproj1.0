<?php

namespace App\Http\Controllers;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Http\Request;
use App\Project;
use App\Report;

class ReportsController extends Controller
{
    public function word()
    {
    	$templateProcessor = new TemplateProcessor('./templates/Certificate of Recognition.docx');

    	$templateProcessor->setValue('first_name', 'Juan');
    	$templateProcessor->setValue('last_name', 'Blank');

    	$templateProcessor->saveAs('Juan DelaCruz.docx');

    	return response()->download('Juan DelaCruz.docx');
    }

      public function excel()
    {
    	$spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load('./templates/form138.xlsx');

		$worksheet = $spreadsheet->getActiveSheet();

		$worksheet->getCell('A7')->setValue('Name: Juan dela');
		$worksheet->getCell('A8')->setValue('11-B');

		$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xls');
		$writer->save('form138.xlsx');

		return response()->download('form138.xlsx');
    }
}