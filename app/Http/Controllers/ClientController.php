<?php

namespace App\Http\Controllers;

use App\Components\Controller;
use App\Helpers\HtmlHelper;
use App\Http\Requests\ClientRequest;
use App\Models\Accounts\Client;
use App\Models\General\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
                return join(' ', [
                    $client->information->first_name,
                    $client->information->middle_name,
                    $client->information->last_name,
                ]);
            })
            ->addColumn('created', function (Client $client) {
                return date('d-m-Y H:i:s', strtotime($client->created_at));
            })
            ->addColumn('action', function (Client $client) {
                return HtmlHelper::renderAction(route('authentication.login'), $client->id, ['view', 'edit', 'delete']);
            })
            ->make(true);
    }

    public function create()
    {
        $model = new Client();

        return view('client.create', [
            'model' => $model
        ]);
    }

    public function store(ClientRequest $request)
    {

        $request->validate();

        return redirect()->route('client.create')->withInput()->withErrors($validator);
    }
}
