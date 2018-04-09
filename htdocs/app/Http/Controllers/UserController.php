<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use \App\App;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    //

	 protected function validator_manager(array $data)
    {
        return Validator::make($data, [
        	'slug'=>'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'trello-key'=>'required|string|max:255',
            'trello-token'=>'required|string|max:255',
        ]);
    }

     protected function validator_collaborator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
    }



	public function index(){

		$cant =0;
		$users=[];
		// si es tipo admin muestra todos los usuarios
		if(auth()->user()->type=="admin"){
			$users = User::paginate(8);
			$cant = \DB::table('users')->count();	
			$users->type="Usuarios";
		}

		// si es tipo administrados
		// mostrar solo sys colaboradores
		if(auth()->user()->type=="manager"){
			$cant = auth()->user()->collaborators()->count();
			$users = auth()->user()->collaborators()->paginate(8);
			$users->type="Colaboradores";
			//User::where('manager_id',auth()->user()->id)->paginate(8);
			//dd($users);
		}
		if(auth()->user()->type=="collaborator"){
			$cant = \DB::table('users')->where('manager_id',auth()->user()->manager_id)->count();
			$users = \DB::table('users')->where('manager_id',auth()->user()->manager_id)->paginate(8);
			$users->type="Miembros";
		}

		

		

		$users->cant= $cant;
		//dd($users);
		return view('user.index')->with('users',$users);

	}

	public function create(){

		return view('user.create');
	}

	public function store(Request $request){
		$data = $request->all();
		//dd($data);


		$data['slug'] = $this->generateSlug($data['email']);
		$data['email']= $data['email']."@jssdevops.com";
		$data['password'] = \Hash::make('123456789');


		if($data['type-user']=="manager"){
			$this->validator_manager($data)->validate();
		}
		if($data['type-user']=="collaborator"){
			$this->validator_collaborator($data)->validate();
		}
		
		//dd($data);
		$user = User::create([
			'slug'=> $data['slug'],
			'name'=> $data['name'],
			'email'=> $data['email'],
			'password'=> $data['password'],
			'profile_img'=>'img/user-profile/default.png',
			'type'	=> $data['type-user'],
			'manager_id'=>( $data['type-user']=="collaborator" ? auth()->user()->id : null )
		]);
		//dd($user);
		// APP TRELO
		$app = App::create([
			'key'=> (isset($data['trello-key'])==true ? $data['trello-key'] : null),
			'token'=>(isset($data['trello-token'])==true ? $data['trello-token'] : null),
			'name'=>'trello',
			'email'=>$data['trello-email'],
			'user_id'=>$user->id
		]);

		

		return redirect()->route('user.index');


	}

	public function edit()
	{


	}


	public function update(){}

	public function delete(){}

	public function destroy(){}



	public function profile($slug)
	{

	}

	function generateSlug($value) 
	{

    // Convert all dashes to hyphens
			    $value = str_replace('—', '-', $value);
			    $value = str_replace('‒', '-', $value);
			    $value = str_replace('―', '-', $value);

			    // Convert underscores and spaces to hyphens
			    $value = str_replace('_', '-', $value);
			    $value = str_replace(' ', '-', $value);
			    
			    // Convert all accented latin-1 supplement characters to their non-accented counterparts
			    // Characters are taken from https://en.wikipedia.org/wiki/Latin-1_Supplement_(Unicode_block)
			    $accents   = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ',  'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ',  'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ð', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'þ', 'ÿ');
			    $noAccents = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 'B', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'p', 'y');
			        
			    $value = str_replace($accents, $noAccents, $value);

			    // Remove everything except 0-9, a-z, A-Z and hyphens
			    $value = preg_replace('/[^A-Za-z0-9-]+/', '', $value);
			    
			    // Make lowercase - no need for this to be multibyte since there are only 0-9, a-z, A-Z and hyphens left in the string 
			    $value = strtolower($value);
			    
			    // Only allow single hyphens
			    do {
			    
			        $value = str_replace('--', '-', $value);
			    
			    }
			    while (mb_substr_count($value, '--') > 0);
			    
			    return $value;

	}





}
