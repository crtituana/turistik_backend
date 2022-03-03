<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-turistik')->create('rides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->nullable()->constrained('services');
            $table->foreignId('description_id')->nullable()->constrained('descriptions');
            $table->foreignId('reserv_id')->nullable()->constrained('reservs');
            $table->foreignId('companie_id')->nullable()->constrained('companies');
            $table->foreignId('guide_id')->nullable()->constrained('guides');
            $table->timestamp('hour_ride');
            $table->date('date_ride');
            $table->text('meeting_point');
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
        Schema::connection('pgsql-app')->dropIfExists('rides');
    }
}
