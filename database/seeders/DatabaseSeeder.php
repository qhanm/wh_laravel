<?php

namespace Database\Seeders;

use App\Models\Accounts\Client;
use App\Models\Accounts\Staff;
use App\Models\General\Information;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $information = new Information();
        $information->id = 1;
        $information->first_name = 'Quach';
        $information->middle_name = 'Hoai';
        $information->last_name = 'Nam';
        $information->email = 'qhnam.67@gmail.com';

        $information->save();

        $staff = new Staff();
        $staff->username = 'qhnam';
        $staff->password = Hash::make('123456');
        $staff->fk_information = 1;
        $staff->fk_role = 1;
        $staff->save();

        $client = new Client();
        $client->fk_information = 1;
        $client->fk_role = 4;
        $client->username = 'qhnam_client';
        $client->password = Hash::make('123456');
        $client->no = '000001';
        $client->internal_ref = 'QHN-000001';
        $client->save();
    }
}
