<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ViewController\Home\HomeController@home')->name('home');

Auth::routes(['register' => false]);
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get("visi-misi","ViewController\Home\HomeController@visi_misi")->name("visimisiku");
Route::get("renstra-fuad","ViewController\Home\HomeController@renstra_fuad")->name("renstrafuad");
Route::get("renop-fuad","ViewController\Home\HomeController@renop_fuad")->name("renopfuad");
Route::get("struktur-organisasi","ViewController\Home\HomeController@struktur_organisasi")->name("struktur");
Route::get("sarpras","ViewController\Home\HomeController@sarpras")->name("sarpras");
Route::get("jurnal-ebi","ViewController\Home\HomeController@jurnal_ebi")->name("jurnal_ebi");
Route::get("jurnal-kps","ViewController\Home\HomeController@jurnal_kps")->name("jurnal_kps");
Route::get("visi-misi-esy","ViewController\Home\HomeController@vimi_esy")->name("vimi_esy");
Route::get("visi-misi-psy","ViewController\Home\HomeController@vimi_psy")->name("vimi_psy");
Route::get("visi-misi-asy","ViewController\Home\HomeController@vimi_asy")->name("vimi_asy");
Route::get("profil-lulusan-esy","ViewController\Home\HomeController@prolus_esy")->name("prolus_esy");
Route::get("profil-lulusan-psy","ViewController\Home\HomeController@prolus_psy")->name("prolus_psy");
Route::get("profil-lulusan-asy","ViewController\Home\HomeController@prolus_asy")->name("prolus_asy");
Route::get("kurikulum-esy","ViewController\Home\HomeController@kurlum_esy")->name("kurlum_esy");
Route::get("kurikulum-psy","ViewController\Home\HomeController@kurlum_psy")->name("kurlum_psy");
Route::get("kurikulum-asy","ViewController\Home\HomeController@kurlum_asy")->name("kurlum_asy");
Route::get("audit-mutu-internal","ViewController\Home\HomeController@audit")->name("audit");
Route::get("profile","ViewController\Home\HomeController@profile")->name("profile");
Route::get("about","ViewController\Home\HomeController@about")->name("about");
Route::get("akreditas","ViewController\Home\HomeController@akreditas")->name("akreditas");
Route::get("non-akademik","ViewController\Home\HomeController@non_akademik")->name("nonakademik");
Route::get("doped","ViewController\Home\HomeController@doped")->name("doped");
Route::get("cek-plagiasi","ViewController\Home\HomeController@cek_plagiasi")->name("cekplagi");
Route::get("blog","ViewController\Home\HomeController@blog")->name("blog");

Route::group(['middleware' => 'auth','prefix' => 'panel'], function(){
	Route::get('/', 'ViewController\Panel\PanelController@panel')->name('panel');
	Route::get('student-data', 'ViewController\Panel\PanelController@data_mahasiswa')->name('panel.student-data');
	Route::get('thesis-application', 'ViewController\Panel\PanelController@thesis_application')->name('panel.thesis-application');
	Route::get('thesis-application-single/{any}', 'ViewController\Panel\PanelController@thesis_application_single')->name('panel.thesis-application-single');
	Route::get('view-pdf/{any}', 'ViewController\Panel\PanelController@view_pdf')->name('panel.view-pdf');

	Route::get('apply-thesis', 'ViewController\Panel\PanelController@apply_thesis')->name('panel.apply-thesis');
	Route::get('my-thesis-application-single/{any}', 'ViewController\Panel\PanelController@my_thesis_application_single')->name('panel.my-thesis-application-single');
	Route::get('bantuan', 'ViewController\Panel\PanelController@bantuan')->name('panel.bantuan');
	Route::get('student-data-single/{any}', 'ViewController\Panel\PanelController@student_data_single')->name('panel.student-data-single');
});

Route::group(['middleware' => 'auth','prefix' => 'f-panel'], function(){
	Route::post('get-prodi', 'FuncController\Panel\StudentController@get_prodi')->name('get-prodi');
	Route::post('get-student', 'FuncController\Panel\StudentController@get_all_students')->name('get-student');
	Route::post('get-student-single', 'FuncController\Panel\StudentController@get_student_single')->name('get-student-single');
	Route::post('insert-student', 'FuncController\Panel\StudentController@insert_student')->name('insert-student');
	Route::post('update-student-name', 'FuncController\Panel\StudentController@update_student_name')->name('update-student-name');
	Route::post('update-student-email', 'FuncController\Panel\StudentController@update_student_email')->name('update-student-email');
	Route::post('update-student-password', 'FuncController\Panel\StudentController@update_student_password')->name('update-student-password');
	Route::post('update-student-username', 'FuncController\Panel\StudentController@update_student_username')->name('update-student-username');
	Route::post('update-student-prodi', 'FuncController\Panel\StudentController@update_student_prodi')->name('update-student-prodi');

	Route::post('read-single-application', 'FuncController\Panel\ApplicationController@get_single_application')->name('get-single-applications');
	Route::post('get-all-applications', 'FuncController\Panel\ApplicationController@get_all_applications')->name('get-all-applications');
	Route::post('get-my-applications', 'FuncController\Panel\ApplicationController@get_all_my_applications')->name('get-all-my-applications');
	Route::post('insert-application', 'FuncController\Panel\ApplicationController@insert_application')->name('insert-application');
	Route::post('update-application', 'FuncController\Panel\ApplicationController@update_application')->name('update-application');
	Route::post('delete-application', 'FuncController\Panel\ApplicationController@delete_application')->name('delete-application');

	
	Route::post('update-application-user-kk', 'FuncController\Panel\ApplicationController@update_application_user_kk')->name('update-application-user-kk');
	Route::post('update-application-user-title', 'FuncController\Panel\ApplicationController@update_application_user_title')->name('update-application-user-title');
	Route::post('update-application-user-sks', 'FuncController\Panel\ApplicationController@update_application_user_sks')->name('update-application-user-sks');
	Route::post('update-application-user-payment', 'FuncController\Panel\ApplicationController@update_application_user_payment')->name('update-application-user-payment');
	Route::post('update-application-user-degree', 'FuncController\Panel\ApplicationController@update_application_user_degree')->name('update-application-user-degree');
	Route::post('update-application-user-kajur', 'FuncController\Panel\ApplicationController@update_application_user_kajur')->name('update-application-user-kajur');

	Route::post('update-application-loa', 'FuncController\Panel\ApplicationController@update_application_loa')->name('update-application-loa');
	Route::post('update-application-journal-correspondent', 'FuncController\Panel\ApplicationController@update_application_journal_correspondent')->name('update-application-journal-correspondent');	
	

	Route::post('update-application-ppwpro', 'FuncController\Panel\ApplicationController@update_application_ppwpro')->name('update-application-nilai-matkul');
	Route::post('update-application-ppwpro-nd', 'FuncController\Panel\ApplicationController@update_application_ppwpro_nd')->name('update-application-nilai-matkul');
	Route::post('update-application-examiner-nd', 'FuncController\Panel\ApplicationController@update_application_examiner_nd')->name('update-application-nilai-matkul');
	Route::post('update-application-nilai-matkul', 'FuncController\Panel\ApplicationController@update_application_nilai_matkul')->name('update-application-nilai-matkul');
	Route::post('update-application-sertif-kkn', 'FuncController\Panel\ApplicationController@update_application_sertif_kkn')->name('update-application-sertif-kkn');
	Route::post('update-application-persetuju-pem', 'FuncController\Panel\ApplicationController@update_application_persetuju_pem')->name('update-application-persetuju-pem');
	Route::post('update-application-fc-slip-spp', 'FuncController\Panel\ApplicationController@update_application_fc_slip_spp')->name('update-application-fc-slip-spp');
	Route::post('update-application-fc-kartuhadir', 'FuncController\Panel\ApplicationController@update_application_fc_kartuhadir')->name('update-application-fc_kartuhadir');
	Route::post('update-application-pem-propo', 'FuncController\Panel\ApplicationController@update_application_pem_propo')->name('update-application-pem-propo');


	Route::post('update-application-penguji-propo', 'FuncController\Panel\ApplicationController@update_application_penguji_propo')->name('update-application-penguji-propo');
	Route::post('update-application-surat-cuti', 'FuncController\Panel\ApplicationController@update_application_surat_cuti')->name('update-application-surat_cuti');
	Route::post('update-application-pers-skrip', 'FuncController\Panel\ApplicationController@update_application_pers_skrip')->name('update-application-pers-skrip');
	Route::post('update-application-kartu-hadir', 'FuncController\Panel\ApplicationController@update_application_kartu_hadir')->name('update-application-kartu-hadir');
	Route::post('update-application-kartu-bim', 'FuncController\Panel\ApplicationController@update_application_kartu_bim')->name('update-application-kartu-bim');
	Route::post('update-application-kbp', 'FuncController\Panel\ApplicationController@update_application_kbp')->name('update-application-kbp');
	Route::post('update-application-sertif-opak', 'FuncController\Panel\ApplicationController@update_application_sertif_opak')->name('update-application-sertif-opak');
	
	
	Route::post('update-application-sertif-opak', 'FuncController\Panel\ApplicationController@update_application_sertif_opak')->name('update-application-sertif-opak');
	Route::post('update-application-pas-foto', 'FuncController\Panel\ApplicationController@update_application_pas_foto')->name('update-application-pas_foto');
	Route::post('update-application-transkrip', 'FuncController\Panel\ApplicationController@update_application_transkrip')->name('update-application-transkrip');
	Route::post('update-application-sbp', 'FuncController\Panel\ApplicationController@update_application_sbp')->name('update-application-sbp');
	Route::post('update-application-ktp', 'FuncController\Panel\ApplicationController@update_application_ktp')->name('update-application-ktp');

	Route::post('update-application-email', 'FuncController\Panel\ApplicationController@update_application_email')->name('update-application-email');
	Route::post('update-application-address', 'FuncController\Panel\ApplicationController@update_application_alamat')->name('update-application-address');
	Route::post('update-application-phone-number', 'FuncController\Panel\ApplicationController@update_application_no_telp')->name('update-application-number-phone');
});


