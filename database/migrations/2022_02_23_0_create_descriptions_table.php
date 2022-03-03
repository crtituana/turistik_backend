<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-turistik')->create('descriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('potho_id')->nullable()->constrained('app.photos');
            $table->text('equipment');
            $table->text('height');
            $table->text('difficulty');
            $table->text('duration');
            $table->text('location');
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
        Schema::connection('pgsql-app')->dropIfExists('descriptions');
    }
}
