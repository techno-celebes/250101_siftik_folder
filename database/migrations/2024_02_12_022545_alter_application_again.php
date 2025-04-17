<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterApplicationAgain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::table('applications', function($table) {
			$table->string('proof_of_kk',350)->nullable()->after('user_id');
			$table->tinyInteger('kk_status')->nullable()->after('user_id');
			$table->string('proof_of_ktp',350)->nullable()->after('user_id');
			$table->tinyInteger('ktp_status')->nullable()->after('user_id');
            $table->string('proof_of_sbp',350)->nullable()->after('user_id');
			$table->tinyInteger('sbp_status')->nullable()->after('user_id');
            $table->string('proof_of_transkrip',350)->nullable()->after('user_id');
			$table->tinyInteger('transkrip_status')->nullable()->after('user_id');
            $table->string('proof_of_pas_foto',350)->nullable()->after('user_id');
			$table->tinyInteger('pas_foto_status')->nullable()->after('user_id');
            $table->string('proof_of_sertif_opak',350)->nullable()->after('user_id');
			$table->tinyInteger('sertif_opak_status')->nullable()->after('user_id');
            $table->string('proof_of_kartu_bim',350)->nullable()->after('user_id');
			$table->tinyInteger('kartu_bim_status')->nullable()->after('user_id');
            $table->string('proof_of_kartu_hadir',350)->nullable()->after('user_id');
			$table->tinyInteger('kartu_hadir_status')->nullable()->after('user_id');
            $table->string('proof_of_pers_skrip',350)->nullable()->after('user_id');
			$table->tinyInteger('pers_skrip_status')->nullable()->after('user_id');
            $table->string('proof_of_surat_cuti',350)->nullable()->after('user_id');
			$table->tinyInteger('surat_cuti_status')->nullable()->after('user_id');
            $table->string('proof_of_penguji_propo',350)->nullable()->after('user_id');
			$table->tinyInteger('penguji_propo_status')->nullable()->after('user_id');
            $table->string('proof_of_pem_propo',350)->nullable()->after('user_id');
			$table->tinyInteger('pem_propo_status')->nullable()->after('user_id');
            $table->string('proof_of_fc_kartuhadir',350)->nullable()->after('user_id');
			$table->tinyInteger('fc_kartuhadir_status')->nullable()->after('user_id');
            $table->string('proof_of_fc_slip_spp',350)->nullable()->after('user_id');
			$table->tinyInteger('fc_slip_spp_status')->nullable()->after('user_id');
            $table->string('proof_of_persetuju_pem',350)->nullable()->after('user_id');
			$table->tinyInteger('persetuju_pem_status')->nullable()->after('user_id');
            $table->string('proof_of_sertif_kkn',350)->nullable()->after('user_id');
			$table->tinyInteger('sertif_kkn_status')->nullable()->after('user_id');
            $table->string('proof_of_nilai_matkul',350)->nullable()->after('user_id');
			$table->tinyInteger('nilai_matkul_status')->nullable()->after('user_id');
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
