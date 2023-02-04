<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class userController extends Controller
{
    use GeneralTrait;

    // to login as a user or register
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->returnError('404','You are unauthenticated');
        }

        if (! $token = auth()->attempt($validator->validated())) {
            return $this->returnError('404','You are unauthenticated');
        }

        
            if(Auth::attempt($request->only("email","password"))){
                // return "loggin :)";
                $token = $request->user()->createToken("api");
                return ['token' => $token->plainTextToken];
            }
        

    }
    public function logout()
    {
        auth()->logout();

        return $this->returnSuccessMessage('user logout successfully', '201');
    }
}
