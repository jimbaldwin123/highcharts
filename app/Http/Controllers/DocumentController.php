<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class DocumentController extends Controller
{

    public function test()
    {
        $fpdf = new \Ladislau\Fpdf\FPDF;
        $fpdf->AddPage();
        $fpdf->SetFont('Courier', 'B', 18);
        $fpdf->Cell(50, 25, 'Hello Atlanta!');
        $fpdf->Output('F', '/home/ninge/Downloads/atlanta.pdf');

        $fpdf = new \Ladislau\Fpdf\FPDF;
        $fpdf->AddPage();
        $fpdf->SetFont('Courier', 'B', 18);
        $fpdf->Cell(50, 25, 'Hello Altoona!');
        $fpdf->Output('F', '/home/ninge/Downloads/altoona.pdf');
    }

//    public function altoona(\Codedge\Fpdf\Fpdf\FPDF $fpdf)
//    {
//        $fpdf->AddPage();
//        $fpdf->SetFont('Courier', 'B', 18);
//        $fpdf->Cell(50, 25, 'Hello Altoona!');
//        $fpdf->Output('F', '/home/ninge/Downloads/altoona.pdf');
//    }
//
//    public function injection()
//    {
//        $this->atlanta();
//        $this->altoona();
//    }
}