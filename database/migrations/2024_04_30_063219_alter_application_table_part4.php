<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterApplicationTablePart4 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function($table) {
			$table->string('proof_of_ppwpro_nd',350)->nullable()->after('permintaan');
            $table->tinyInteger('ppwpro_nd_status')->nullable()->after('permintaan');
			$table->string('proof_of_examiner',350)->nullable()->after('permintaan');
            $table->tinyInteger('examiner_status')->nullable()->after('permintaan');
			$table->string('proof_of_examiner_nd',350)->nullable()->after('permintaan');
            $table->tinyInteger('examiner_nd_status')->nullable()->after('permintaan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
