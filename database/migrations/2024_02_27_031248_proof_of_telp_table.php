<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProofOfTelpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('applications', function($table) {
			$table->string('no_telp',350)->nullable()->after('user_id');
            $table->tinyInteger('telp_status')->nullable()->after('user_id');
            $table->string('email_nec',350)->nullable()->after('user_id');
            $table->tinyInteger('email_status')->nullable()->after('user_id');
            $table->string('address',350)->nullable()->after('user_id');
            $table->tinyInteger('address_status')->nullable()->after('user_id');
            $table->tinyInteger('sk_status')->default("0")->after('user_id');
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
