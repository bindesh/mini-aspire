<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Contracts\UserContract;
use App\User;

class RegisterService implements UserContract
{

    public function register(array $data){
        $data['password'] = bcrypt($data['password']);
        
         $user = User::create($data);
        
         $success['token'] =  $user->createToken('my-apire')->accessToken;
         $success['name'] =  $user->name;

        return  $success;
    }

    public function login(array $data){
        
    }
}