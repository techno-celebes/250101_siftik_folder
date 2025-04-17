<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterApplicationTablePart6 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function($table) {
			$table->string('proof_of_journal_correspondent',350)->nullable()->after('permintaan');
            $table->tinyInteger('journal_correspondent_status')->nullable()->after('permintaan');
			$table->string('proof_of_loa',350)->nullable()->after('permintaan');
            $table->tinyInteger('loa_status')->nullable()->after('permintaan');
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
