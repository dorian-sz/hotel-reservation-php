<?php

namespace App\Interfaces;

use App\Models\User;

/**
 * @template T
 */
interface IAuthenticate
{
    /**
     * @param T $entity
     * @return bool
     */
    public function authenticate($entity);

    /**
     * @return User
     */
    public function getUser();

    /**
     * @param T $entity
     */
    public function removeToken($entity);
}
