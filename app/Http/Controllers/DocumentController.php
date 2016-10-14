<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Codedge\Fpdf\Facades\Fpdf;
class DocumentController extends Controller
{
    public static function renderDoc($msg)
    {


        Fpdf::AddPage();
        Fpdf::SetFont('Courier', 'B', 18);
        Fpdf::Cell(50, 25, $msg);
        Fpdf::Output('D', 'test.pdf');
    }
}