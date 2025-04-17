<?php

namespace App\Http\Controllers\FuncController\Panel;

use TechnoCelebes\BasicController\MasterCont\FunctionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User as UserModel;
use App\Models\UserRole as UserRoleModel;
use App\Models\Application as ApplicationModel;

use Exception;
use Throwbale;
use Validator;


class ApplicationController extends FunctionController
{
    public function __construct(Request $request){
    	parent::__construct($request);
    }

    public function get_all_applications(Request $request){
    	$data = array();

    	try{
		    $username = $request['username'];

		    if(strlen($username)==0){
		    	$username= "";
		    }

		    $data['username'] = $username;
    	}catch(\Exception $e){
    		$username = "";
    	}

    	try{
		    $name = $request['name'];

		    if(strlen($name)==0){
		    	$name= "";
		    }

		    $data['name'] = $name;
    	}catch(\Exception $e){
    		$name = "";
    	}

    	try{
		    $status = $request['status'];

		    if($status<0 || $status == null){
		    	$status= -1;
		    }

		    $data['status'] = $status;
    	}catch(\Exception $e){
			$status = -1;
    	}


		$rules = [
	        'username' => 'sometimes|string',
			'status' => 'nullable|numeric'
	    ];

	    $validator = Validator::make($data, $rules);
	    if (!$validator->passes()) {
	    	$data['error'] = $validator->messages();
	    	return $data;
	    }

		$application = ApplicationModel::join("users","users.id","=","applications.user_id");
	    if(strlen($username)!=0){
	    	$application = $application->where("users.username",'LIKE',"%" . $username . "%");
	    }
	    if(strlen($name)!=0){
	    	$application = $application->where("users.name",'LIKE',"%" . $name . "%");
	    }
	    if($status>=0){
	    	$application = $application->where("applications.general_status","=",$status);
	    }
		$application = $application->orderBy("application_id","DESC");
		$application = $application->paginate(10)->onEachSide(2);

	    foreach($application as $k){
	    	if($k->general_status == 0){
		    	$k->general_status_string = "Belum diperiksa";
	    	}else if($k->general_status == 1){
		    	$k->general_status_string = "Diterima";
	    	}else if($k->general_status == 2){
		    	$k->general_status_string = "Ditolak";
	    	}else{
		    	$k->general_status_string = "Unknown";
	    	}

	    }

    	return $application;
    }

    public function get_all_my_applications(Request $request){
    	$data = array();

    	try{
		    $username = $request['username'];

		    if(strlen($username)==0){
		    	$username= "";
		    }

		    $data['username'] = $username;
    	}catch(\Exception $e){
    		$username = "";
    	}

	    $rules = [
	        'username' => 'sometimes|string',
	    ];

	    $validator = Validator::make($data, $rules);
	    if (!$validator->passes()) {
	    	$data['error'] = $validator->messages();
	    	return $data;
	    }

		$application = ApplicationModel::join("users","users.id","=","applications.user_id");
	    if(strlen($username)!=0){
	    	$application = $application->where("users.username",'LIKE',"%" . $username . "%");
	    }
    	$application = $application->where("users.id",Auth::user()->id);
	    $application = $application->get();

	    foreach($application as $k){
	    	if($k->general_status == 0){
		    	$k->general_status_string = "Belum diperiksa";
	    	}else if($k->general_status == 1){
		    	$k->general_status_string = "Diterima";
	    	}else if($k->general_status == 2){
		    	$k->general_status_string = "Ditolak";
	    	}else{
		    	$k->general_status_string = "Unknown";
	    	}

	    }

    	return $application;
    }

    public function get_single_application(Request $request){
    	$data = array();

    	try{
		    $application_id = $request['application_id'];

		    if(strlen($application_id)==0){
		    	$application_id= "";
		    }

		    $data['application_id'] = $application_id;
    	}catch(\Exception $e){
    		$application_id = "";
    	}

	    $rules = [
	        'application_id' => 'required|numeric|exists:applications,application_id',
	    ];

	    $validator = Validator::make($data, $rules);
	    if (!$validator->passes()) {
	    	$data['error'] = $validator->messages();
	    	return $data;
	    }

		$application = ApplicationModel::with(['userDetail.prodi.prodiMks'])
			->join("users", "users.id", "=", "applications.user_id")
		    ->where("applications.application_id", $application_id)
		    ->first();


			if($application->kk_status == 0){
				$application->kk_status_string = "Belum Diperiksa";
			}else if($application->kk_status == 1){
				$application->kk_status_string = "Valid";
			}else if($application->kk_status == 2){
				$application->kk_status_string = "Tidak Valid";
			}else{
				$application->kk_status_string = "Unknown";
			}

		if($application->sks_status == 0){
			$application->sks_status_string = "Belum Diperiksa";
		}else if($application->sks_status == 1){
			$application->sks_status_string = "Valid";
		}else if($application->sks_status == 2){
			$application->sks_status_string = "Tidak Valid";
		}else{
			$application->sks_status_string = "Unknown";
		}

		if($application->payment_status == 0){
			$application->payment_status_string = "Belum Diperiksa";
		}else if($application->payment_status == 1){
			$application->payment_status_string = "Valid";
		}else if($application->payment_status == 2){
			$application->payment_status_string = "Tidak Valid";
		}else{
			$application->payment_status_string = "Unknown";
		}

		if($application->degree_status == 0){
			$application->degree_status_string = "Belum Diperiksa";
		}else if($application->degree_status == 1){
			$application->degree_status_string = "Valid";
		}else if($application->degree_status == 2){
			$application->degree_status_string = "Tidak Valid";
		}else{
			$application->degree_status_string = "Unknown";
		}

		if($application->kajur_status == 0){
			$application->kajur_status_string = "Belum Diperiksa";
		}else if($application->kajur_status == 1){
			$application->kajur_status_string = "Valid";
		}else if($application->kajur_status == 2){
			$application->kajur_status_string = "Tidak Valid";
		}else{
			$application->kajur_status_string = "Unknown";
		}

    	return $application;
    }

    public function get_my_thesis_application_single(Request $request){
    	$data = array();

    	try{
		    $application_id = $request['application_id'];

		    if(strlen($application_id)==0){
		    	$application_id= "";
		    }

		    $data['application_id'] = $application_id;
    	}catch(\Exception $e){
    		$application_id = "";
    	}

	    $rules = [
	        'application_id' => 'required|numeric|exists:applications,application_id',
	    ];

	    $validator = Validator::make($data, $rules);
	    if (!$validator->passes()) {
	    	$data['error'] = $validator->messages();
	    	return $data;
	    }

		$application = ApplicationModel::join("users", "users.id", "=", "applications.user_id")
		    ->where("applications.application_id", $application_id)
		    ->where("users.id",Auth::user()->id)
		    ->first();

		if($application->sks_status == 0){
			$application->sks_status_string = "Belum Diperiksa";
		}else if($application->sks_status == 1){
			$application->sks_status_string = "Valid";
		}else if($application->sks_status == 2){
			$application->sks_status_string = "Tidak Valid";
		}else{
			$application->sks_status_string = "Unknown";
		}

		if($application->payment_status == 0){
			$application->payment_status_string = "Belum Diperiksa";
		}else if($application->payment_status == 1){
			$application->payment_status_string = "Valid";
		}else if($application->payment_status == 2){
			$application->payment_status_string = "Tidak Valid";
		}else{
			$application->payment_status_string = "Unknown";
		}

		if($application->degree_status == 0){
			$application->degree_status_string = "Belum Diperiksa";
		}else if($application->degree_status == 1){
			$application->degree_status_string = "Valid";
		}else if($application->degree_status == 2){
			$application->degree_status_string = "Tidak Valid";
		}else{
			$application->degree_status_string = "Unknown";
		}

		if($application->kajur_status == 0){
			$application->kajur_status_string = "Belum Diperiksa";
		}else if($application->kajur_status == 1){
			$application->kajur_status_string = "Valid";
		}else if($application->kajur_status == 2){
			$application->kajur_status_string = "Tidak Valid";
		}else{
			$application->kajur_status_string = "Unknown";
		}

    	return $application;
    }

    public function insert_application(Request $request){
    	$permintaan = $request['permintaan'];

 		$request->validate([
 			'thesis_title' => 'required|string',
 			'address' => 'required|string',
 			'no_telp' => 'required|string',
 			'email_nec' => 'required|string',
			'permintaan' => 'required|numeric',
			'proof_of_ppwpro' => 'sometimes|string',
			'proof_of_compr_examiner_1' => 'sometimes|string',
			'proof_of_compr_examiner_2' => 'sometimes|string',
			'proof_of_compr_examiner_3' => 'sometimes|string',
			'proof_of_examiner_nd' => 'sometimes|string',
			'proof_of_ppwpro_nd' => 'sometimes|string',
			'proof_of_kartu_kel' => 'nullable|mimes:pdf|max:2048',
			'proof_of_ktp' => 'sometimes|nullable|mimes:pdf|max:2048',
			'proof_of_sbp' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_transkrip' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_pas_foto' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_sertif_opak' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_kartu_bim' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_kartu_hadir' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_pers_skrip' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_surat_cuti' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_penguji_propo' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_pem_propo' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_fc_kartuhadir' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_fc_slip_spp' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_persetuju_pem' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_sertif_kkn' => 'sometimes|mimes:pdf|max:2048',
			'proof_of_nilai_matkul' => 'sometimes|mimes:pdf|max:2048'
        ]);

        // Save the file to the storage path
		try{
			$thesis_title = $request['thesis_title'];
		}catch(\Throwable $e){
			$thesis_title = "-";
		}

		try{
			$proof_of_compr_examiner_1 = $request['proof_of_compr_examiner_1'];
		}catch(\Throwable $e){
			$proof_of_compr_examiner_1 = "-";
		}

		try{
			$proof_of_compr_examiner_2 = $request['proof_of_compr_examiner_2'];
		}catch(\Throwable $e){
			$proof_of_compr_examiner_2 = "-";
		}

		try{
			$proof_of_compr_examiner_3 = $request['proof_of_compr_examiner_3'];
		}catch(\Throwable $e){
			$proof_of_compr_examiner_3 = "-";
		}

		try{
			$proof_of_examiner_nd = $request['proof_of_examiner_nd'];
		}catch(\Throwable $e){
			$proof_of_examiner_nd = "-";
		}

		try{
			$proof_of_ppwpro_nd = $request['proof_of_ppwpro_nd'];
		}catch(\Throwable $e){
			$proof_of_ppwpro_nd = "-";
		}


		try{
			$proof_of_ppwpro = $request['proof_of_ppwpro'];
		}catch(\Throwable $e){
			$proof_of_ppwpro = "-";
		}

		try{
			$address = $request['address'];
		}catch(\Throwable $e){
			$address = "-";
		}

		try{
			$email_nec = $request['email_nec'];
		}catch(\Throwable $e){
			$email_nec = "-";
		}

		try{
			$no_telp = $request['no_telp'];
		}catch(\Throwable $e){
			$no_telp = "-";
		}

		try{
			$permintaan = $request['permintaan'];
		}catch(\Throwable $e){
			$permintaan = "-";
		}

		try{
			$proof_of_ktp = $request->file('proof_of_ktp');
			$fileName_ktp = time() . '_' . $proof_of_ktp->getClientOriginalName();
			$filePath_ktp = $proof_of_ktp->storeAs('uploads', $fileName_ktp, 'public');
		}catch(\Throwable $e){
			$fileName_ktp = "";
		}

		try{
			$proof_of_kartu_kel = $request->file('proof_of_kartu_kel');
			$fileName_kartu_kel = time() . '_' . $proof_of_kartu_kel->getClientOriginalName();
			$filePath_kartu_kel = $proof_of_kartu_kel->storeAs('uploads', $fileName_kartu_kel, 'public');
		}catch(\Throwable $e){
			$fileName_kartu_kel = "";
		}

		try{
			$proof_of_kbp = $request->file('proof_of_kbp');
			$fileName_kbp = time() . '_' . $proof_of_kbp->getClientOriginalName();
			$filePath_kbp = $proof_of_kbp->storeAs('uploads', $fileName_kbp, 'public');
		}catch(\Throwable $e){
			$fileName_kbp = "";
		}

		try{
			$proof_of_sbp = $request->file('proof_of_sbp');
			$fileName_sbp = time() . '_' . $proof_of_sbp->getClientOriginalName();
			$filePath_sbp = $proof_of_sbp->storeAs('uploads', $fileName_sbp, 'public');
		}catch(\Throwable $e){
			$fileName_sbp = "";
		}
		try{
			$proof_of_transkrip = $request->file('proof_of_transkrip');
			$fileName_transkrip = time() . '_' . $proof_of_transkrip->getClientOriginalName();
			$filePath_transkrip = $proof_of_transkrip->storeAs('uploads', $fileName_transkrip, 'public');
		}catch(\Throwable $e){
			$fileName_transkrip = "";
		}
		try{
			$proof_of_pas_foto = $request->file('proof_of_pas_foto');
			$fileName_pas_foto = time() . '_' . $proof_of_pas_foto->getClientOriginalName();
			$filePath_pas_foto = $proof_of_pas_foto->storeAs('uploads', $fileName_pas_foto, 'public');
		}catch(\Throwable $e){
			$fileName_pas_foto = "";
		}
		try{
			$proof_of_sertif_opak = $request->file('proof_of_sertif_opak');
			$fileName_sertif_opak = time() . '_' . $proof_of_sertif_opak->getClientOriginalName();
			$filePath_sertif_opak= $proof_of_sertif_opak->storeAs('uploads', $fileName_sertif_opak, 'public');
		}catch(\Throwable $e){
			$fileName_sertif_opak = "";
		}
		try{
			$proof_of_kartu_bim = $request->file('proof_of_kartu_bim');
			$fileName_kartu_bim = time() . '_' . $proof_of_kartu_bim->getClientOriginalName();
			$filePath_kartu_bim = $proof_of_kartu_bim->storeAs('uploads', $fileName_kartu_bim, 'public');
		}catch(\Throwable $e){
			$fileName_kartu_bim = "";
		}
		try{
			$proof_of_kartu_hadir = $request->file('proof_of_kartu_hadir');
			$fileName_kartu_hadir = time() . '_' . $proof_of_kartu_hadir->getClientOriginalName();
			$filePath_kartu_hadir = $proof_of_kartu_hadir->storeAs('uploads', $fileName_kartu_hadir, 'public');
		}catch(\Throwable $e){
			$fileName_kartu_hadir = "";
		}
		try{
			$proof_of_pers_skrip = $request->file('proof_of_pers_skrip');
			$fileName_pers_skrip = time() . '_' . $proof_of_pers_skrip->getClientOriginalName();
			$filePath_pers_skrip = $proof_of_pers_skrip->storeAs('uploads', $fileName_pers_skrip, 'public');
		}catch(\Throwable $e){
			$fileName_pers_skrip = "";
		}
		try{
			$proof_of_surat_cuti = $request->file('proof_of_surat_cuti');
			$fileName_surat_cuti = time() . '_' . $proof_of_surat_cuti->getClientOriginalName();
			$filePath_surat_cuti = $proof_of_surat_cuti->storeAs('uploads', $fileName_surat_cuti, 'public');
		}catch(\Throwable $e){
			$fileName_surat_cuti = "";
		}
		try{
			$proof_of_penguji_propo = $request->file('proof_of_penguji_propo');
			$fileName_penguji_propo = time() . '_' . $proof_of_penguji_propo->getClientOriginalName();
			$filePath_penguji_propo = $proof_of_penguji_propo->storeAs('uploads', $fileName_penguji_propo, 'public');
		}catch(\Throwable $e){
			$fileName_penguji_propo = "";
		}
		try{
			$proof_of_pem_propo = $request->file('proof_of_surat_cuti');
			$fileName_pem_propo = time() . '_' . $proof_of_pem_propo->getClientOriginalName();
			$filePath_pem_propo = $proof_of_pem_propo->storeAs('uploads', $fileName_pem_propo, 'public');
		}catch(\Throwable $e){
			$fileName_pem_propo = "";
		}
		try{
			$proof_of_fc_kartuhadir = $request->file('proof_of_fc_kartuhadir');
			$fileName_fc_kartuhadir = time() . '_' . $proof_of_fc_kartuhadir->getClientOriginalName();
			$filePath_fc_kartuhadir = $proof_of_fc_kartuhadir->storeAs('uploads', $fileName_fc_kartuhadir, 'public');
		}catch(\Throwable $e){
			$fileName_fc_kartuhadir = "";
		}
		try{
			$proof_of_fc_slip_spp = $request->file('proof_of_fc_slip_spp');
			$fileName_fc_slip_spp = time() . '_' . $proof_of_fc_slip_spp->getClientOriginalName();
			$filePath_fc_slip_spp = $proof_of_fc_slip_spp->storeAs('uploads', $fileName_fc_slip_spp, 'public');
		}catch(\Throwable $e){
			$fileName_fc_slip_spp = "";
		}
		try{
			$proof_of_persetuju_pem = $request->file('proof_of_persetuju_pem');
			$fileName_persetuju_pem = time() . '_' . $proof_of_persetuju_pem->getClientOriginalName();
			$filePath_persetuju_pem = $proof_of_persetuju_pem->storeAs('uploads', $fileName_persetuju_pem, 'public');
		}catch(\Throwable $e){
			$fileName_persetuju_pem = "";
		}
		try{
			$proof_of_sertif_kkn = $request->file('proof_of_sertif_kkn');
			$fileName_sertif_kkn = time() . '_' . $proof_of_sertif_kkn->getClientOriginalName();
			$filePath_sertif_kkn = $proof_of_sertif_kkn->storeAs('uploads', $fileName_sertif_kkn, 'public');
		}catch(\Throwable $e){
			$fileName_sertif_kkn = "";
		}
		try{
			$proof_of_nilai_matkul = $request->file('proof_of_nilai_matkul');
			$fileName_nilai_matkul = time() . '_' . $proof_of_nilai_matkul->getClientOriginalName();
			$filePath_nilai_matkul = $proof_of_nilai_matkul->storeAs('uploads', $fileName_nilai_matkul, 'public');
		}catch(\Throwable $e){
			$fileName_nilai_matkul = "";
		}

        $n = new ApplicationModel();
        $n->thesis_title = $thesis_title;
        $n->address = $address;
        $n->email_nec = $email_nec;
		$n->proof_of_ppwpro = $proof_of_ppwpro;
		$n->proof_of_ppwpro_nd = $proof_of_ppwpro_nd;
		$n->proof_of_examiner_nd = $proof_of_examiner_nd;
		$n->proof_of_compr_examiner_1 = $proof_of_compr_examiner_1;
		$n->proof_of_compr_examiner_2 = $proof_of_compr_examiner_2;
		$n->proof_of_compr_examiner_3 = $proof_of_compr_examiner_3;
        $n->no_telp = $no_telp;
		$n->proof_of_sks = "";
		$n->proof_of_degree = "";
		$n->proof_of_kajur = "";
		$n->proof_of_payment = "";
		$n->sks_status = 0;
		$n->degree_status = 0;
		$n->payment_status = 0;
		$n->kajur_status = 0;
		$n->general_status = 0;
		$n->proof_of_kk = $fileName_kartu_kel;
		$n->proof_of_ktp = $fileName_ktp;
		$n->proof_of_sbp = $fileName_sbp;
		$n->proof_of_kbp = $fileName_kbp;
		$n->proof_of_transkrip = $fileName_transkrip;
		$n->proof_of_pas_foto = $fileName_pas_foto;
		$n->proof_of_sertif_opak = $fileName_sertif_opak;
		$n->proof_of_kartu_bim = $fileName_kartu_bim;
		$n->proof_of_kartu_hadir = $fileName_kartu_hadir;
		$n->proof_of_pers_skrip = $fileName_pers_skrip;
		$n->proof_of_surat_cuti = $fileName_surat_cuti;
		$n->proof_of_penguji_propo = $fileName_penguji_propo;
		$n->proof_of_pem_propo = $fileName_pem_propo;
		$n->proof_of_fc_kartuhadir = $fileName_fc_kartuhadir;
		$n->proof_of_fc_slip_spp = $fileName_fc_slip_spp;
		$n->proof_of_persetuju_pem = $fileName_persetuju_pem;
		$n->proof_of_sertif_kkn = $fileName_sertif_kkn;
		$n->proof_of_nilai_matkul = $fileName_nilai_matkul;
		$n->permintaan = $permintaan;
		$n->user_id = Auth::user()->id;
        $n->save();

        return response()->json(['message' => 'File uploaded successfully']);
    }

    public function update_application(Request $request){
		$application_id = $request['application_id'];

		$statuses = [
			'ppwpro_status', 'kbp_status', 'nilai_matkul_status', 'sertif_kkn_status',
			'journal_correspondent_status','loa_status',
			'persetuju_pem_status', 'fc_slip_spp_status', 'fc_kartuhadir_status', 
			'ppwpro_status', 'proof_of_ppwpro','proof_of_ppwpro_nd','ppwpro_nd_status',
			'proof_of_examiner','proof_of_examiner_nd','examiner_status','examiner_nd_status',
			'proof_of_compr_examiner_1','proof_of_compr_examiner_2','proof_of_compr_examiner_3',
			'pem_propo_status', 'penguji_propo_status', 'surat_cuti_status', 'pers_skrip_status',
			'kartu_hadir_status', 'kartu_bim_status', 'sertif_opak_status', 'pas_foto_status',
			'transkrip_status', 'sbp_status', 'ktp_status', 'kk_status', 'sks_status',
			'degree_status', 'kajur_status', 'payment_status', 'general_status','sk_status','email_status','telp_status','address_status',
			'thesis_title_status'
		];
		
		foreach ($statuses as $status) {
			try {
				${$status} = $request[$status];
				$data[$status] = (strlen(${$status}) == 0) ? 0 : ${$status};
			} catch (\Throwbale $e) {
				${$status} = 0;
			}
		}
		
		$my_role = Auth::user()->Role->role_id;
		if ($my_role == 2) {
			$n = ApplicationModel::find($application_id);
			$n->fill($data);
			$n->save();
		}



        return response()->json(['message' => $n]);
    }

    public function update_application_user_title(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'thesis_title' => 'required', // Adjust the validation rules as needed
        ]);
		
		$thesis_title = $request->thesis_title;
        
        $n->thesis_title = $thesis_title;
        $n->thesis_title_status = 0;
		$n->general_status = 0;
        $n->save();
    }

    public function update_application_ktp(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_ktp' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_ktp = $request->file('proof_of_ktp');
        $fileName_ktp = time() . '_' . $proof_of_ktp->getClientOriginalName();
        $filePath_ktp = $proof_of_ktp->storeAs('uploads', $fileName_ktp, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_ktp);

        $n->proof_of_ktp = $fileName_ktp;
        $n->ktp_status = 0;
		$n->general_status = 0;
        $n->save();
    }

    public function update_application_user_kk(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_kk' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_kk = $request->file('proof_of_kk');
        $fileName_kk = time() . '_' . $proof_of_kk->getClientOriginalName();
        $filePath_kk = $proof_of_kk->storeAs('uploads', $fileName_kk, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_kk);

        $n->proof_of_kk = $fileName_kk;
        $n->kk_status = 0;
		$n->general_status = 0;
        $n->save();
    }

    public function update_application_user_sks(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_sks' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_sks = $request->file('proof_of_sks');
        $fileName_sks = time() . '_' . $proof_of_sks->getClientOriginalName();
        $filePath_sks = $proof_of_sks->storeAs('uploads', $fileName_sks, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_sks);

        $n->proof_of_sks = $fileName_sks;
        $n->sks_status = 0;
		$n->general_status = 0;
        $n->save();
    }

    public function update_application_persetuju_pem(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_persetuju_pem' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_persetuju_pem = $request->file('proof_of_persetuju_pem');
        $fileName_persetuju_pem = time() . '_' . $proof_of_persetuju_pem->getClientOriginalName();
        $filePath_persetuju_pem = $proof_of_persetuju_pem->storeAs('uploads', $fileName_persetuju_pem, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_persetuju_pem);

        $n->proof_of_persetuju_pem = $fileName_persetuju_pem;
        $n->persetuju_pem_status = 0;
		$n->general_status = 0;
        $n->save();
    }

    public function update_application_user_degree(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_degree' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_degree = $request->file('proof_of_degree');
        $fileName_degree = time() . '_' . $proof_of_degree->getClientOriginalName();
        $filePath_degree = $proof_of_degree->storeAs('uploads', $fileName_degree, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_degree);

        $n->proof_of_degree = $fileName_degree;
        $n->degree_status = 0;
		$n->general_status = 0;
        $n->save();
    }

    public function update_application_user_telp(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_telp' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_telp = $request->file('proof_of_telp');
        $fileName_telp = time() . '_' . $proof_of_telp->getClientOriginalName();
        $filePath_telp = $proof_of_telp->storeAs('uploads', $fileName_telp, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_telp);

        $n->proof_of_telp = $fileName_telp;
        $n->telp_status = 0;
		$n->general_status = 0;
        $n->save();
    }

    public function update_application_kbp(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_kbp' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_kbp = $request->file('proof_of_kbp');
        $fileName_kbp = time() . '_' . $proof_of_kbp->getClientOriginalName();
        $filePath_kbp = $proof_of_kbp->storeAs('uploads', $fileName_kbp, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_kbp);

        $n->proof_of_kbp = $fileName_kbp;
        $n->kbp_status = 0;
		$n->general_status = 0;
        $n->save();
    }

    public function update_application_sbp(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_sbp' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_sbp = $request->file('proof_of_sbp');
        $fileName_sbp = time() . '_' . $proof_of_sbp->getClientOriginalName();
        $filePath_sbp = $proof_of_sbp->storeAs('uploads', $fileName_sbp, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_sbp);

        $n->proof_of_sbp = $fileName_sbp;
        $n->sbp_status = 0;
		$n->general_status = 0;
        $n->save();
    }

    public function update_application_user_payment(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_payment' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_payment = $request->file('proof_of_payment');
        $fileName_payment = time() . '_' . $proof_of_payment->getClientOriginalName();
        $filePath_payment = $proof_of_payment->storeAs('uploads', $fileName_payment, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_payment);

        $n->proof_of_payment = $fileName_payment;
        $n->payment_status = 0;
        $n->general_status = 0;
        $n->save();
    }

    public function update_application_user_kajur(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_kajur' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_kajur = $request->file('proof_of_kajur');
        $fileName_kajur = time() . '_' . $proof_of_kajur->getClientOriginalName();
        $filePath_kajur = $proof_of_kajur->storeAs('uploads', $fileName_kajur, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_kajur);

        $n->proof_of_kajur = $fileName_kajur;
        $n->kajur_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_user_nilai_matkul(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_nilai_matkul' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_nilai_matkul = $request->file('proof_of_nilai_matkul');
        $fileName_nilai_matkul = time() . '_' . $proof_of_nilai_matkul->getClientOriginalName();
        $filePath_nilai_matkul = $proof_of_nilai_matkul->storeAs('uploads', $fileName_nilai_matkul, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_nilai_matkul);

        $n->proof_of_nilai_matkul = $fileName_nilai_matkul;
        $n->nilai_matkul_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_sertif_kkn(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_sertif_kkn' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_sertif_kkn = $request->file('proof_of_sertif_kkn');
        $fileName_sertif_kkn = time() . '_' . $proof_of_sertif_kkn->getClientOriginalName();
        $filePath_sertif_kkn = $proof_of_sertif_kkn->storeAs('uploads', $fileName_sertif_kkn, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_sertif_kkn);

        $n->proof_of_sertif_kkn = $fileName_sertif_kkn;
        $n->sertif_kkn_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_persetuju_pim(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_persetuju_pim' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_persetuju_pim = $request->file('proof_of_persetuju_pim');
        $fileName_persetuju_pim = time() . '_' . $proof_of_persetuju_pim->getClientOriginalName();
        $filePath_persetuju_pim = $proof_of_persetuju_pim->storeAs('uploads', $fileName_persetuju_pim, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_persetuju_pim);

        $n->proof_of_persetuju_pim = $fileName_persetuju_pim;
        $n->persetuju_pim_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_fc_slip_spp(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_fc_slip_spp' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_fc_slip_spp = $request->file('proof_of_fc_slip_spp');
        $fileName_fc_slip_spp = time() . '_' . $proof_of_fc_slip_spp->getClientOriginalName();
        $filePath_fc_slip_spp = $proof_of_fc_slip_spp->storeAs('uploads', $fileName_fc_slip_spp, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_fc_slip_spp);

        $n->proof_of_fc_slip_spp = $fileName_fc_slip_spp;
        $n->fc_slip_spp_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_journal_correspondent(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_journal_correspondent' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_journal_correspondent = $request->file('proof_of_journal_correspondent');
        $fileName_journal_correspondent = time() . '_' . $proof_of_journal_correspondent->getClientOriginalName();
        $filePath_journal_correspondent = $proof_of_journal_correspondent->storeAs('uploads', $fileName_journal_correspondent, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_journal_correspondent);

        $n->proof_of_journal_correspondent = $fileName_journal_correspondent;
        $n->journal_correspondent_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_loa(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_loa' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_loa = $request->file('proof_of_loa');
        $fileName_loa = time() . '_' . $proof_of_loa->getClientOriginalName();
        $filePath_loa = $proof_of_loa->storeAs('uploads', $fileName_loa, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_loa);

        $n->proof_of_loa = $fileName_loa;
        $n->loa_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_fc_kartuhadir(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_fc_kartuhadir' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_fc_kartuhadir  = $request->file('proof_of_fc_kartuhadir');
        $fileName_fc_kartuhadir  = time() . '_' . $proof_of_fc_kartuhadir ->getClientOriginalName();
        $filePath_fc_kartuhadir  = $proof_of_fc_kartuhadir ->storeAs('uploads', $fileName_fc_kartuhadir , 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_fc_kartuhadir );

        $n->proof_of_fc_kartuhadir  = $fileName_fc_kartuhadir ;
        $n->fc_kartuhadir_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_pem_propo(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_pem_propo' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_pem_propo  = $request->file('proof_of_pem_propo');
        $fileName_pem_propo  = time() . '_' . $proof_of_pem_propo ->getClientOriginalName();
        $filePath_pem_propo  = $proof_of_pem_propo ->storeAs('uploads', $fileName_pem_propo , 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_pem_propo );

        $n->proof_of_pem_propo  = $fileName_pem_propo ;
        $n->pem_propo_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_penguji_propo(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_penguji_propo' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_penguji_propo  = $request->file('proof_of_penguji_propo ');
        $fileName_penguji_propo  = time() . '_' . $proof_of_penguji_propo ->getClientOriginalName();
        $filePath_penguji_propo  = $proof_of_penguji_propo ->storeAs('uploads', $fileName_penguji_propo , 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_penguji_propo );

        $n->proof_of_penguji_propo  = $fileName_penguji_propo ;
        $n->penguji_propo_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_ppwpro(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_ppwpro' => 'required|string', // Adjust the validation rules as needed
        ]);
		
		$proof_of_ppwpro = $request->proof_of_ppwpro;
        
        $n->proof_of_ppwpro = $proof_of_ppwpro;
        $n->ppwpro_status = 0;
		$n->general_status = 0;
        $n->save();
    }
	
	public function update_application_ppwpro_nd(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_ppwpro_nd' => 'required|string', // Adjust the validation rules as needed
        ]);
		
		$proof_of_ppwpro_nd = $request->proof_of_ppwpro_nd;
        
        $n->proof_of_ppwpro_nd = $proof_of_ppwpro_nd;
        $n->ppwpro_nd_status = 0;
		$n->general_status = 0;
        $n->save();
    }

	public function update_application_examiner_nd(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_examiner_nd' => 'required|string', // Adjust the validation rules as needed
        ]);
		
		$proof_of_examiner_nd = $request->proof_of_examiner_nd;
        
        $n->proof_of_examiner_nd = $proof_of_examiner_nd;
        $n->examiner_nd_status = 0;
		$n->general_status = 0;
        $n->save();
    }

	public function update_application_surat_cuti(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_surat_cuti' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_surat_cuti  = $request->file('proof_of_surat_cuti');
        $fileName_surat_cuti  = time() . '_' . $proof_of_surat_cuti->getClientOriginalName();
        $filePath_surat_cuti  = $proof_of_surat_cuti ->storeAs('uploads', $fileName_surat_cuti , 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_surat_cuti);

        $n->proof_of_surat_cuti  = $fileName_surat_cuti ;
        $n->surat_cuti_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_pers_skrip(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_pers_skrip' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_pers_skrip  = $request->file('proof_of_pers_skrip');
        $fileName_pers_skrip  = time() . '_' . $proof_of_pers_skrip->getClientOriginalName();
        $filePath_pers_skrip  = $proof_of_pers_skrip->storeAs('uploads', $fileName_pers_skrip, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_pers_skrip);

        $n->proof_of_pers_skrip = $fileName_pers_skrip;
        $n->pers_skrip_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_kartu_hadir(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_kartu_hadir' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_kartu_hadir  = $request->file('proof_of_kartu_hadir');
        $fileName_kartu_hadir  = time() . '_' . $proof_of_kartu_hadir->getClientOriginalName();
        $filePath_kartu_hadir  = $proof_of_kartu_hadir->storeAs('uploads', $fileName_kartu_hadir, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_kartu_hadir);

        $n->proof_of_kartu_hadir = $fileName_kartu_hadir;
        $n->kartu_hadir_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_kartu_bim(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_kartu_bim' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_kartu_bim = $request->file('proof_of_kartu_bim');
        $fileName_kartu_bim = time() . '_' . $proof_of_kartu_bim->getClientOriginalName();
        $filePath_kartu_bim = $proof_of_kartu_bim->storeAs('uploads', $fileName_kartu_bim, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_kartu_bim);

        $n->proof_of_kartu_bim = $fileName_kartu_bim;
        $n->kartu_bim_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_sertif_opak(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_sertif_opak' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_sertif_opak = $request->file('proof_of_sertif_opak');
        $fileName_sertif_opak = time() . '_' . $proof_of_sertif_opak->getClientOriginalName();
        $filePath_sertif_opak = $proof_of_sertif_opak->storeAs('uploads', $fileName_sertif_opak, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_sertif_opak);

        $n->proof_of_sertif_opak = $fileName_sertif_opak;
        $n->sertif_opak_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_pas_foto(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_pas_foto' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_pas_foto = $request->file('proof_of_pas_foto');
        $fileName_pas_foto = time() . '_' . $proof_of_pas_foto->getClientOriginalName();
        $filePath_pas_foto = $proof_of_pas_foto->storeAs('uploads', $fileName_pas_foto, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_pas_foto);

        $n->proof_of_pas_foto = $fileName_pas_foto;
        $n->pas_foto_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_transkrip(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_transkrip' => 'required|mimes:pdf|max:2048', // Adjust the validation rules as needed
        ]);

        // Save the file to the storage path
        $proof_of_transkrip = $request->file('proof_of_transkrip');
        $fileName_transkrip = time() . '_' . $proof_of_transkrip->getClientOriginalName();
        $filePath_transkrip = $proof_of_transkrip->storeAs('uploads', $fileName_transkrip, 'public');

        \Storage::delete("/public/uploads/" . $n->proof_of_transkrip);

        $n->proof_of_transkrip = $fileName_transkrip;
        $n->transkrip_status = 0;
        $n->general_status = 0;
        $n->save();
    }

	public function update_application_proof_of_examiner(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_examiner' => 'required|string', // Adjust the validation rules as needed
        ]);
		
		$proof_of_examiner = $request->proof_of_examiner;
        
        $n->proof_of_examiner = $proof_of_examiner;
        $n->examiner_status = 0;
		$n->general_status = 0;
        $n->save();
    }

	public function update_application_proof_of_examiner_nd(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'proof_of_examiner_nd' => 'required|string', // Adjust the validation rules as needed
        ]);
		
		$proof_of_examiner_nd = $request->proof_of_examiner_nd;
        
        $n->proof_of_examiner_nd = $proof_of_examiner_nd;
        $n->examiner_nd_status = 0;
		$n->general_status = 0;
        $n->save();
    }
	
	public function update_application_email(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'email_nec' => 'required|string', // Adjust the validation rules as needed
        ]);
		
		$email_nec = $request->email_nec;
        
        $n->email_nec = $email_nec;
        $n->email_status = 0;
		$n->general_status = 0;
        $n->save();
    }

	public function update_application_alamat(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'address' => 'required|string', // Adjust the validation rules as needed
        ]);
		
		$address = $request->address;
        
        $n->address = $address;
        $n->address_status = 0;
		$n->general_status = 0;
        $n->save();
    }

	public function update_application_no_telp(Request $request){
	    $application_id = $request['application_id'];

        $n = ApplicationModel::where("application_id",$application_id)->where("user_id",Auth::user()->id)->first();

 		$request->validate([
            'no_telp' => 'required|string', // Adjust the validation rules as needed
        ]);
		
		$no_telp = $request->no_telp;
        
        $n->no_telp = $no_telp;
        $n->telp_status = 0;
		$n->general_status = 0;
        $n->save();
    }

    public function delete_application(Request $request){
    	$data = array();

    	try{
			$application_id = $request['application_id'];
		    $data['application_id'] = $application_id;
    	}catch(\Exception $e){
    		$application_id = "-";
    	}

		$rules = [
			'application_id' => 'required|numeric|exists:applications,application_id'
	    ];

	    $validator = Validator::make($data, $rules);
	    if (!$validator->passes()) {
	    	$data['error'] = $validator->messages();
	    	return $data;
	    }

    	$my_role = Auth::user()->Role->role_id;
    	if($my_role == 2){
            $application = ApplicationModel::find($request->application_id);

            $application->delete();
    	}

    	return $data;
    }
}
