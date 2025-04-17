<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterApplicationTablePart5 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function($table) {
			$table->string('proof_of_compr_examiner_3',350)->nullable()->after('permintaan');
            $table->string('proof_of_compr_examiner_2',350)->nullable()->after('permintaan');
            $table->string('proof_of_compr_examiner_1',350)->nullable()->after('permintaan');
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
