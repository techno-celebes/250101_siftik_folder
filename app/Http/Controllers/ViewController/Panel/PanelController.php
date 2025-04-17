<?php

namespace App\Http\Controllers\ViewController\Panel;

use App\Http\Controllers\ViewController\MasterPanelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PanelController extends MasterPanelController
{
    public function __construct(Request $request){
    	parent::__construct($request);
    }

    public function panel(){
		$user = Auth::user();

		$role = $user->Role->role_id;
        $this->set_data_send("menu","dashboard");
        $this->set_data_send("role",$role);
    	return view("panel.main.dashboard",$this->get_data_send());
    }

    public function data_mahasiswa(){
		$user = Auth::user();

		$role = $user->Role->role_id;
        $this->set_data_send("menu","data-mahasiswa");
        $this->set_data_send("role",$role);
    	return view("panel.main.dashboard",$this->get_data_send());
    }

	public function thesis_application(){
		$user = Auth::user();

		$role = $user->Role->role_id;
        $this->set_data_send("menu","thesis-application");
        $this->set_data_send("role",$role);
    	return view("panel.main.dashboard",$this->get_data_send());
	}

	public function apply_thesis(){
		$user = Auth::user();

		$role = $user->Role->role_id;
        $this->set_data_send("menu","apply-thesis");
        $this->set_data_send("role",$role);
    	return view("panel.main.dashboard",$this->get_data_send());
	}

	public function thesis_application_single(){
		$user = Auth::user();

		$role = $user->Role->role_id;
        $this->set_data_send("menu","apply-thesis");
        $this->set_data_send("role",$role);
    	return view("panel.main.dashboard",$this->get_data_send());
	}

	public function my_thesis_application_single(){
		$user = Auth::user();

		$role = $user->Role->role_id;
        $this->set_data_send("menu","apply-thesis");
        $this->set_data_send("role",$role);
    	return view("panel.main.dashboard",$this->get_data_send());
	}
 
	public function view_pdf(){
		$user = Auth::user();

		$role = $user->Role->role_id;
        $this->set_data_send("menu","apply-thesis");
        $this->set_data_send("role",$role);
    	return view("panel.main.dashboard",$this->get_data_send());
	}

	public function bantuan(){
		$user = Auth::user();

		$role = $user->Role->role_id;
        $this->set_data_send("menu","apply-thesis");
        $this->set_data_send("role",$role);
    	return view("panel.main.dashboard",$this->get_data_send());
	}

	public function student_data_single(){
		$user = Auth::user();

		$role = $user->Role->role_id;
        $this->set_data_send("menu","apply-thesis");
        $this->set_data_send("role",$role);
    	return view("panel.main.dashboard",$this->get_data_send());
	}
}
