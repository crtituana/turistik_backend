<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-turistik')->create('reservs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->nullable()->constrained('persons');
            $table->foreignId('ride_id')->nullable()->constrained('rides');
            $table->foreignId('companie_id')->nullable()->constrained('companies');
            $table->string('number_people');
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
        Schema::connection('pgsql-app')->dropIfExists('reservs');
    }
}
