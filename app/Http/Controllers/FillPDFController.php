<?php

namespace App\Http\Controllers;

use App\Models\Pelatihan;
use App\Models\User;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class FillPDFController extends Controller
{
    public function process(Request $request, $id)
    {
        $data_pelatihan = User::find($id);
        $nama = $data_pelatihan->name;
        $nomor = $data_pelatihan->created_at->format('l, d-M-Y');
        $id = $data_pelatihan->id;
        $outputfile = public_path() . 'dcc.pdf';
        $this->fillPDF(public_path() . '/master/dcc.pdf', $outputfile, $nama, $nomor, $id);

        return response()->file($outputfile);
    }

    public function fillPDF($file, $outputfile, $nama, $nomor, $id)
    {
        $fpdi = new FPDI;
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'], array($size['width'], $size['height']));
        $fpdi->useTemplate($template);
        $top = 125;
        $right = 120;
        $top1 = 150;
        $right1 = 110;
        $name = $nama;
        $nomors = $nomor;
        $ids = $id;
        // $font = $fpdi->SetFont("courier", "I", 30);
        $fpdi->SetFont("courier", "I", 30);
        $fpdi->SetXY(110, 115);
        $fpdi->Cell(40, 10, $name);
        $fpdi->SetFont("courier", "I", 16);
        $fpdi->SetXY(115, 130);
        $fpdi->Cell(40, 10, $nomors);
        $fpdi->SetFont("courier", "I", 16);
        $fpdi->SetXY(115, 85);
        $fpdi->Cell(40, 10, "B/$ids/Januari/2024");
        // $text = "This is a multi-line text.\nIt can span multiple lines. this it multiline";

        // Add a MultiCell to the PDF
        // $fpdi->MultiCell(200, 20, $name, 'C', false);

        // Set a different font size
        // $fpdi->SetFont('Arial', '', 18);

        // Add another MultiCell with a different font size
        // $fpdi->MultiCell(200, 20, $text, 1, 'L', false);


        // $fpdi->SetXY(190, 70);
        // $fpdi->Write(10, "Test");
        // $fpdi->SetMargins(5, 39, 5, 30);
        // $fpdi->SetAutoPageBreak(true, 22);
        // $fpdi->setPageFormat();
        $fpdi->SetTextColor(25, 26, 25);
        // $fpdi->Text($right, $top, $name);
        // $fpdi->Text($right1, $top1, $nomors);

        return $fpdi->Output($outputfile, 'F');
    }
}
