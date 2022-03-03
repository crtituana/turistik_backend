<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-turistik')->create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('companie_id')->nullable()->constrained('companies');
            $table->foreignId('ride_id')->nullable()->constrained('rides');
            $table->string('name_service')->unique();
            $table->text('type_service');
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
        Schema::connection('pgsql-app')->dropIfExists('services');
    }
}
