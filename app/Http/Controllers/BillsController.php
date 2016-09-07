<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bills;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BillsController extends Controller
{

    public function getAll()
    {
        $b = new Bills;
        $bills = $b->where('year', '<', '1985')->get();
        return view('chart',['bills' => $bills]);
    }
}
