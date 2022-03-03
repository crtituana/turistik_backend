<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-turistik')->create('guides', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ride_id')->nullable()->constrained('rides');
            $table->string('name')->unique();
            $table->string('last_name')->unique();
            $table->text('experience')->comment('describir la experiencia del guia');
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
        Schema::connection('pgsql-app')->dropIfExists('guides');
    }
}
