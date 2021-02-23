<?php

namespace App\Http\Controllers;

use App\Components\Controller;
use App\Models\Accounts\Client;
use App\Models\General\Information;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ClientController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function getClient()
    {
        $model = Client::with('information');

        return \Yajra\DataTables\Facades\DataTables::eloquent($model)
            ->addColumn('information', function (Client $client) {
                return $client->information->last_name;
            })
            ->toJson();
    }
}
