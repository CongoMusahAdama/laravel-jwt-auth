<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\User;  //importing our db

class AuthController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    

    //register a user using name, email, password
    public function register(Request $request){
        $validator =Validator :: make($request->all(),[
            'name'=> 'required',
            'email'=>'required|string|email|unique:users', //table name users
            'password'=>'required|string|confirmed|min:6'
        ]);
        if($validator->fails()){
            return response()->json($validator->error()->toJson(),400);
        }
        $user = User::create(array_merge(
            $validator ->validated(),
            ['password'=>bcrypt($request->password)]
        ));
        return response()-> json([
            'message'=>'User successfully registered',
            
        ], 201);

    }


    //login using the email and password
    public function login(Request $request) {
        $validator = validator :: make($request-> all(),[
            'email'=>'required|email',
            'password'=>'required|string|min:6'
        ]);
        if($validator->fails()){
            return response()->json($validator ->errors(), 422);
        }
        if(!$token=auth()->attempt($validator->validated())){
            return response()->json(['error'=>'Unauthorized', 401]);
        }
        return $this->createNewToken($token);
    }


    //creating a token for a user for successfully login in
    // Creating a token
public function createNewToken($token) {
    return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth()->factory()->getTTL() * 60,
        'user' => auth()->user()
    ]);
}

    //get the user profile
public function profile(){
    return response()->json(auth()->user());
}

    //creating the logout 
public function logout(){
    auth()->logout();
    return response()->json([
        'message'=>'User logged out'
    ]);
}
}
