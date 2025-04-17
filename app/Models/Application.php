<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 	

class Application extends Model
{
    protected $table = "applications";
    protected $primaryKey = 'application_id';

    protected $fillable = [
        'user_id', 'proof_of_sks', 'kk_status', 'created_at', 'updated_at',
        'ppwpro_status', 'proof_of_ppwpro','proof_of_ppwpro_nd','ppwpro_nd_status',
        'proof_of_examiner','proof_of_examiner_nd','examiner_status','examiner_nd_status',
        'proof_of_compr_examiner_1','proof_of_compr_examiner_2','proof_of_compr_examiner_3',
        'kbp_status','proof_of_kbp',
        'proof_of_journal_correspondent','journal_correspondent_status','proof_of_loa','loa_status',
        'nilai_matkul_status', 'proof_of_nilai_matkul', 'sertif_kkn_status', 'proof_of_sertif_kkn',
        'persetuju_pem_status', 'proof_of_persetuju_pem', 'fc_slip_spp_status', 'proof_of_fc_slip_spp',
        'fc_kartuhadir_status', 'proof_of_fc_kartuhadir', 'pem_propo_status', 'proof_of_pem_propo',
        'penguji_propo_status', 'proof_of_penguji_propo', 'surat_cuti_status', 'proof_of_surat_cuti',
        'pers_skrip_status', 'proof_of_pers_skrip', 'kartu_hadir_status', 'proof_of_kartu_hadir',
        'kartu_bim_status', 'proof_of_kartu_bim', 'sertif_opak_status', 'proof_of_sertif_opak',
        'pas_foto_status', 'proof_of_pas_foto', 'transkrip_status', 'proof_of_transkrip',
        'sbp_status', 'proof_of_sbp', 'ktp_status', 'proof_of_ktp', 'kk_status', 'proof_of_kk',
        'thesis_title', 'proof_of_sks', 'proof_of_degree', 'proof_of_kajur', 'proof_of_payment',
        'sks_status', 'degree_status', 'kajur_status', 'payment_status', 'general_status',
        'sk_status','address_status','address','email_status','telp_status','no_telp',
        'thesis_title_status'
    ];

    public function userDetail()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Other methods and relationships can be defined here
}
