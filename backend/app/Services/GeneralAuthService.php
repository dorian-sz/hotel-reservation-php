<?php

namespace App\Services;

use App\Interfaces\IAuthenticate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GeneralAuthService implements IAuthenticate
{

    /**
     * @inheritDoc
     */
    public function authenticate($entity)
    {
        return Auth::attempt($entity);
    }

    public function getUser(){
        return Auth::user();
    }

    /** @var User $entity  */
    public function removeToken($entity)
    {
        $entity->currentAccessToken()->delete();
    }
}
