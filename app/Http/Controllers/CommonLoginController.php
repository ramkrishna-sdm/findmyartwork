<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Input;
use Session;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Redirect,Response,File;
use Socialite;
use App\Repository\SavedArtistRepository;
use App\Repository\SavedArtworkRepository;
class CommonLoginController extends Controller
{
	public function __construct(Request $request,SavedArtistRepository $savedArtistRepository,SavedArtworkRepository $savedArtworkRepository)
    {
        $this->request = $request;
        $this->savedArtistRepository = $savedArtistRepository;
        $this->savedArtworkRepository = $savedArtworkRepository;
    }

	public function login(){
		
		if(!Auth::check()){

			return redirect()->to('/');
		
		}else{
			
			$user_role = Auth::user()->role;
		
			if($user_role == "admin"){
				return redirect()->to('/home');
			}
			elseif($user_role == "buyer"){
				return redirect()->to('/buyer/dashboard');
			}
			elseif($user_role == "artist"){
				return redirect()->to('/artist/dashboard');
			}
			elseif($user_role == "gallery"){
				return redirect()->to('/gallery/dashboard');
			}else{
				return redirect()->back()->with('message', 'Information not appropriate');
			}
		}
	}

	public function submitLogin(Request $request){

		$rules = array(
					'email' => 'required|min:6',
					'password' => 'required|min:6',
				);
		
		$validator = Validator::make($request->all(), $rules);
		
		if ($validator->fails()){
			return redirect()->back()->withErrors($validator);
		}else{
	
			$userdata = array(
						'email' => Input::get('email'),
						'password' => Input::get('password'),
					);
			
			if(Auth::attempt($userdata)){
				
				$user_role = Auth::user()->role;
		
					if($user_role == "admin"){

						$url = url('/home');
					}
		
					if($user_role == "buyer"){

						$url = url('/buyer/dashboard');
						
					}
					
					if($user_role == "artist"){

						$url = url('/artist/dashboard');
						
					}
					
					if($user_role == "gallery"){

						$url = url('/gallery/dashboard');
						
					}


					$user_info = [];
					$user_info['user_id'] = Auth::user()->id;
					$user_info['guest_id'] = "";
					// print_r($user_info);die;
					if(Session::has('random_id')){

						$count_artist = $this->savedArtistRepository->getData(['guest_id'=> Session::get('random_id')],'count',[],0);

						if($count_artist){
							$artist = $this->savedArtistRepository->createUpdateData(['guest_id'=> Session::get('random_id')],$user_info);
						}

						$count_artwork = $this->savedArtworkRepository->getData(['guest_id'=> Session::get('random_id')],'count',[],0);
						if($count_artwork){
							$artist = $this->savedArtworkRepository->createUpdateData(['guest_id'=> Session::get('random_id')],$user_info);
						}
					}

					return response()->json(array(
						'redirect_url' => $url,
						'status' => 200,
					), 200);
		
			}else{
					
				return response()->json(array(
					'message' => 'User not found with these credentials!',
					'status' => 400,
				), 200);
			}
		}

	}

	public function logout(){
		Auth::logout();
		Session::flush();
		return redirect()->to('/')->with('message', 'You are Successfully Logged Out');
	}

	public function redirect($provider){
		
		return Socialite::driver($provider)->redirect();
	}
	
	public function callback($provider){
		$getInfo = Socialite::driver($provider)->user();
		$user = $this->createUser($getInfo,$provider);
		auth()->login($user);
		return redirect()->to('/user_login');
	}
	
	public function createUser($getInfo,$provider){
		$user = User::where('provider_id', $getInfo->id)->first();
		if (!$user) {
		$user = User::create([
		'first_name'     => $getInfo->name,
		'email'    => $getInfo->email,
		'provider' => $provider,
		'provider_id' => $getInfo->id
		]);
		}
		return $user;
	}
}