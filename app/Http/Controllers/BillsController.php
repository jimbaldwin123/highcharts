<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bills;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BillsController extends Controller
{

    public function getAll($type = 'view')
    {
        switch ($type) {
            case 'api':
                // https://inventory.data.gov/api/action/datastore_search?resource_id=72a33ebb-3efe-455b-9e41-0733aaed7780

                $client = new Client();
                $response = $client->get(
                    'https://inventory.data.gov/api/action/datastore_search',
                    [
                        'query' => [
                            'resource_id' => '72a33ebb-3efe-455b-9e41-0733aaed7780',
                            'limit' => 5
                        ]
                    ]);

                $bills = (string) $response->getBody();
                return $bills;
                break;


            default:
                $b = new Bills;
                $bills = $b->where('year', '<', 1985)->get();

                if ($type == 'json') {
                    return $bills;
                } else {
                    return view('chart', ['bills' => $bills]);
                }

                break;

        }


    }

}
