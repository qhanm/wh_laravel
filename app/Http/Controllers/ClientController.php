<?php

namespace App\Http\Controllers;

use App\Components\Controller;
use App\Helpers\HtmlHelper;
use App\Helpers\StringHelper;
use App\Http\Requests\ClientRequest;
use App\Models\Accounts\Client;
use App\Models\Accounts\Role;
use App\Models\General\Country;
use App\Models\General\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        dd(Client::lastId());
        $model = new Client();
        $countries = Country::query()->get()->toArray();

        return view('client.create', [
            'model' => $model,
            'countries' => Arr::pluck($countries, 'name'),
        ]);
    }

    public function store(ClientRequest $request)
    {
        try
        {
            DB::beginTransaction();
            $mInformation = new Information();
            $mInformation->fill($request->all());
            $mInformation->save();

            $mClient = new Client();
            $mClient->fill($request->all());
            $mClient->fk_information = $mInformation->id;
            $mClient->fk_role = Role::ROLE_CLIENT;
            $mClient->password = Hash::make($mClient->password);

        }catch (\Exception $exception){
            DB::rollBack();
            return false;
        }

    }
}
