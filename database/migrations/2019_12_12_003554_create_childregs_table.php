<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildregsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('childregs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('certnumber');
            $table->string('lastname');
            $table->string('firstname');
            $table->string('othername');
            $table->string('gender');
            $table->string('dob');
            $table->string('placeofbirth');
            $table->string('fathername');
            $table->string('mothername');
            $table->integer('user_id');
            $table->integer('stateoforigin_id');
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
        Schema::dropIfExists('childregs');
    }
}
