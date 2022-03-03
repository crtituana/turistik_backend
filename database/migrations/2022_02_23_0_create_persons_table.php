<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-turistik')->create('persons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->nullable()->constrained('roles');
            $table->string('name')->unique();
            $table->string('last_name')->unique();
            $table->string('email')->unique();
            $table->string('password')->unique();
            $table->string('number_phone')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('pgsql-app')->dropIfExists('persons');
    }
}
