<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id');
            $table->string('name');
            $table->string('surname');
            $table->string('south_african_id_number');
            $table->string('mobile_number');
            $table->string('email');
            $table->date('birth_date');
            $table->unsignedBigInteger('language_id');
            $table->timestamps();

            $table->foreign('language_id')
                ->references('id')
                ->on('languages')
                ->onDelete('cascade');

            $table->foreign('creator_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
