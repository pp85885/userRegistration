<?php

namespace App\Http\Controllers;
use App\Models\Roles;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ManageUser extends Controller
{
    function index(){

    }

    public function add(){
        $roles    =     Roles::all();
        return view('add',compact('roles'));
    }

    function store(Request $request){
        $userData   =   array(
            'name'          =>          $request->name,
            "email"         =>          $request->email,
            "phone"         =>          $request->phone,
            'password'      =>          Hash::make($request->password),
            "address"       =>          $request->address,
            "city"          =>          $request->city,
            "state"         =>          $request->state,
            "country"       =>          $request->country,
            "zip_code"      =>          $request->zip_code,
            'role_id'       =>          $request->user_role
        );

        $user       =       Users::create($userData);
        if($user){
            return back()->with('message','Registration completed');
        }else{
            return back()->with('message','Something went wrong please try again or later');
        }
    }

    public function login(){
        return view('login');
    }

    public function validateUser(Request $request){

        $validator = Validator::make($request->all(), [
            'email' =>    'required',
            'password' => 'required',
        ]);

        if(!$validator->passes()){
            return response()->json([
                'status'=>0, 
                'error'=>$validator->errors()->toArray()
            ]);
        }

        $email = $request->get('email');
        $password = $request->get('password');

        $email =Users::where('email',$email)->get()->toarray();
        if(!empty($email)){
            if (!Hash::check($password, $email[0]['password'])) {
                return response()->json([2]);
            }else{
                if($email[0]['role_id'] == '1'){
                    $user   =  'Admin';
                }else{
                    $user   =  'Guest';
                }
                return response()->json(array('user'=>$user));
            }
        }else {      
            return response()->json([2]);
        }
    }
}
