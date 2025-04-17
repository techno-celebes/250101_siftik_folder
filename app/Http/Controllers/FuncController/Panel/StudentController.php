<?php

namespace App\Http\Controllers\FuncController\Panel;

use TechnoCelebes\BasicController\MasterCont\FunctionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User as UserModel;
use App\Models\UserRole as UserRoleModel;
use App\Models\Application as ApplicationModel;
use App\Models\Prodi;
use Exception;
use Throwbale;
use Validator;


class StudentController extends FunctionController
{
    public function __construct(Request $request){
    	parent::__construct($request);
    }

    public function get_prodi(Request $request){
		return Prodi::all();
    }

    public function get_all_students(Request $request){
    	$data = array();

		
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

		$user_role = UserRoleModel::join("users","users.id","=","user_roles.user_id");
	    if(strlen($name)!=0){
	    	$user_role = $user_role->where("users.name",'LIKE',"%" . $name . "%");
	    }
		if(strlen($username)!=0){
	    	$user_role = $user_role->where("users.username",'LIKE',"%" . $username . "%");
	    }
	    $user_role = $user_role->where("role_id",1);

	    $user_role = $user_role->paginate(10)->onEachSide(2);

    	return $user_role;
    }

    public function insert_student(Request $request){
    	$data = array();

    	try{
			$email = $request['email'];
		    $data['email'] = $email;
    	}catch(\Exception $e){
    		$email = "-";
    	}

    	try{
			$name = $request['name'];
		    $data['name'] = $name;
    	}catch(\Exception $e){
    		$name = "-";
    	}

    	try{
			$username = $request['username'];
		    $data['username'] = $username;
    	}catch(\Exception $e){
    		$username = "-";
    	}

    	try{
			$password = $request['password'];
		    $data['password'] = $password;
    	}catch(\Exception $e){
    		$password = "-";
    	}

    	try{
			$prodi_id = $request['prodi_id'];
		    $data['prodi_id'] = $prodi_id;
    	}catch(\Exception $e){
    		$prodi_id = 0;
    	}

	    $rules = [
	        'email' => 'required|email|unique:users,email',
	        'username' => 'required|unique:users,username',
			'prodi_id' => 'required|exists:prodi,prodi_id',
	        'name' => 'required|string',
	        'password' => 'required|string',
	    ];

	    $validator = Validator::make($data, $rules);
	    if (!$validator->passes()) {
	    	$data['error'] = $validator->messages();
	    	return $data;
	    }

    	$my_role = Auth::user()->Role->role_id;
    	if($my_role == 2){
		    $k = new UserModel();
		    $k->name = $name;
		    $k->password = Hash::make($password);
		    $k->email = $email;
		    $k->username = $username;
		    $k->prodi_id = $prodi_id;
			$k->save();

			$cs = new UserRoleModel();
			$cs->role_id = 1;
			$cs->user_id = $k->id;
			$cs->save();

			return $data;
    	}
    }

    public function get_student_single(Request $request){
    	$data = array();

    	try{
		    $user_id = $request['user_id'];

		    if(strlen($user_id)==0){
		    	$user_id= "";
		    }

		    $data['user_id'] = $user_id;
    	}catch(\Exception $e){
    		$user_id = 0;
    	}

	    $rules = [
	        'user_id' => 'required|numeric|exists:users,id',
	    ];

	    $validator = Validator::make($data, $rules);
	    if (!$validator->passes()) {
	    	$data['error'] = $validator->messages();
	    	return $data;
	    }

		$student = UserModel::with(['prodi'])
		->join("user_roles", "users.id", "=", "user_roles.user_id")
		    ->where("role_id", 1)
		    ->where("users.id",$user_id)
		    ->first();

    	return $student;
    }

    public function update_student_name(Request $request){
	    $user_id = $request['id'];

        $n = UserModel::where("id",$user_id)->first();

 		$request->validate([
            'name' => 'required', // Adjust the validation rules as needed
        ]);
		
		$name = $request->name;
        
        $n->name = $name;
        $n->save();
    }

	public function update_student_username(Request $request){
	    $user_id = $request['id'];

        $n = UserModel::where("id",$user_id)->first();

 		$request->validate([
            'name' => 'required', // Adjust the validation rules as needed
        ]);
		
		$username = $request->username;
        
        $n->username = $username;
        $n->save();
    }

	public function update_student_email(Request $request){
	    $user_id = $request['id'];

        $n = UserModel::where("id",$user_id)->first();

 		$request->validate([
            'email' => 'required', // Adjust the validation rules as needed
        ]);
		
		$email = $request->email;
        
        $n->email = $email;
        $n->save();
    }

	public function update_student_prodi(Request $request){
	    $user_id = $request['id'];

        $n = UserModel::where("id",$user_id)->first();

 		$request->validate([
            'prodi_id' => 'required', // Adjust the validation rules as needed
        ]);
		
		$prodi_id = $request->prodi_id;
        
        $n->prodi_id = $prodi_id;
        $n->save();
    }


    public function update_student_password(Request $request){
	    $user_id = $request['id'];

        $n = UserModel::where("id",$user_id)->first();

 		$request->validate([
            'new_password' => 'required', // Adjust the validation rules as needed
        ]);
		
		$password = Hash::make($request->new_password);
        
        $n->password = $password;
        $n->save();
    }
}
