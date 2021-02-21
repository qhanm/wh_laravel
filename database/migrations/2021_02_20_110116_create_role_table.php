<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->integer('level');
        });

        /***
         * Score role
         *      Client: 5
         *      Staff: 10
         *      Admin: 15
         *      Super Admin: 20
         */

        \Illuminate\Support\Facades\DB::table('role')->insert(
            [
                ['id' => 1, 'name' => 'super_admin', 'level' => 20],
                ['id' => 2, 'name' => 'admin', 'level' => 15],
                ['id' => 3, 'name' => 'staff', 'level' => 10 ],
                ['id' => 4, 'name' => 'client', 'level' => 5],
            ]
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role');
    }
}
