<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Services\GeneralAuthService;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private UserService $service, private GeneralAuthService $authenticate)
    {
    }

    public function login(LoginRequest $request){
        $credentials = $request->validated();
        $attempt = $this->authenticate->authenticate($credentials);

        if (!$attempt){
            return response([
                'message'=>'Incorrect credentials'
            ], 422);
        }
        $user = $this->authenticate->getUser();
        $token = $user->createToken('main')->plainTextToken;
        return response([
            'user'=>$user,
            'token'=>$token,
            'isAdmin'=>false
        ]);
    }

    public function signup(SignupRequest $request){
        $data = $request->validated();
        $user = $this->service->add($data);

        $token = $user->createToken('main')->plainTextToken;

        return response([
            "user" => $user,
            "token" =>$token,
            "isAdmin" => false
        ]);
    }

    public function logout(Request $request){
        $user = $request->user();
        $this->authenticate->removeToken($user);

        return response('', 204);
    }
}
