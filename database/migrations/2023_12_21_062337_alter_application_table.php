<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('applications', function($table) {
			$table->integer('general_status')->after('proof_of_sks');
			$table->integer('payment_status')->after('proof_of_sks');
            $table->integer('kajur_status')->after('proof_of_sks');
            $table->integer('degree_status')->after('proof_of_sks');
			$table->integer('sks_status')->after('proof_of_sks');
			$table->string('proof_of_payment',255)->after('proof_of_sks');
            $table->string('proof_of_kajur',255)->after('proof_of_sks');
            $table->string('proof_of_degree',255)->after('proof_of_sks');
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
