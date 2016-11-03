<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Codedge\Fpdf\Facades\Fpdf;

class TestController extends Controller
{
//    public function injection(\Codedge\Fpdf\Fpdf\FPDF $fpdf)
//    {
//        $fpdf->AddPage();
//        $fpdf->SetFont('Courier', 'B', 18);
//        $fpdf->Cell(50, 25, 'Hello Atlanta!');
//        $fpdf->Output('F', '/home/ninge/Downloads/atlanta.pdf');
//
//    }
//
//    public function facade()
//    {
//        Fpdf::AddPage();
//        Fpdf::SetFont('Courier', 'B', 18);
//        Fpdf::Cell(50, 25, 'Hello Atlanta!');
//        Fpdf::Output('F', '/home/ninge/Downloads/atlanta.pdf');
//
//        $pdf = new FPDF('P','mm',array(100,150));
//        Fpdf::AddPage();
//        Fpdf::SetFont('Courier', 'B', 18);
//        Fpdf::Cell(50, 25, 'Hello Altoona!');
//        Fpdf::Output('F', '/home/ninge/Downloads/altoona.pdf');
//    }
}
