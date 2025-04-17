<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdiMkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prodi_mk', function (Blueprint $table) {
            $table->bigIncrements('prodi_mk_id')->unsigned();
            $table->bigInteger('prodi_id')->unsigned();
            $table->string('prodi_mk_name',250);
            $table->timestamps();

			$table->foreign('prodi_id')->references('prodi_id')->on('prodi')->onDelete("cascade")->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prodi_mk');
    }
}
