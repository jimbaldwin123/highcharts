<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bills;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BillsController extends Controller
{

    public function getAll($type = 'view')
    {
        $b = new Bills;
        $bills = $b->where('twos', '>', 0)->get();
//         $bills = $b->all();
        if ($type == 'json') {
            return $bills;
        } else {
            return view('chart', ['bills' => $bills]);
        }
    }

}
